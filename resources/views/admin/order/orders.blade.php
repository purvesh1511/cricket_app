@php
    $title = 'Orders';
@endphp
<x-header :title="$title" />
<!--  Body Wrapper -->
    <!-- Sidebar Start -->
    <x-sidebar />
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        <x-menu />
        <!--  Header End -->
        <div class="container-fluid">


            <!-- --------------------------------------------------- -->
            <!--  Table Datatable Basic Start -->
            <!-- --------------------------------------------------- -->
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">ORDERS</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted "
                                            href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Orders</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <section class="datatables">
                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table border table-striped table-bordered text-nowrap">
                                        <form method="post" action="{{route('orders')}}">
                                            @csrf
                                        <tr>
                                            <td>Start Date: <input type="date" class="form-control" value="<?php if(isset($_POST['start_date'])) echo $_POST['start_date'];?>" name="start_date" id="start_date"> </td>
                                            <td>End Date: <input type="date" class="form-control" name="end_date" value="<?php if(isset($_POST['end_date'])) echo $_POST['end_date'];?>" id="end_date"> </td>
                                            <td>User Type:<select name="user_type" id="user_type" class="form-control"><option value="">Select</option><option <?php if(isset($_POST['user_type']) && $_POST['user_type']=='customer') echo "selected";?> value="customer">Customer</option> 
                                            <option value="coach" <?php if(isset($_POST['user_type']) && $_POST['user_type']=='coach') echo "selected";?>>Coach</option></select>
                                             </td>
                                            <td><input type="submit" class="btn btn-primary btn-sm mt-4" value="Filter"> </td>
                                        </tr> 
                                    </form>
                                    </table>
                                    <table id="zero_config"
                                        class="table border table-striped table-bordered text-nowrap">
                                        <thead>
                                            <!-- start row -->
                                            <tr>
                                                <th >ID</th>
                                                <th>Order Id</th>
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Email</th>
                                                <th>Order date</th>
                                                <th>Payment Mode</th>
                                                <!-- <th>Status</th> -->
                                            </tr>
                                            <!-- end row -->
                                        </thead>
                                        <tbody>
                                            <!-- start row -->
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($orders as $order)
                                                @php
                                                    $i += 1;
                                                    $order = \App\Models\Orders::where('order_id', $order->order_id)->first();
													$CoachDet=DB::table('customers')->where('id',$order->created_by)->first();
                                                @endphp
                                                <tr>
                                                    <td >{{$order->id}}</td>
                                                    <td>
                                                        <a class="text-primary" href="{{route('order-details')}}?order_id={{$order->order_id}}">
                                                            {{ $order->order_id }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        {{ $order->customer->fname }} {{ $order->customer->lname }}<br>
														@if($CoachDet) created by {{$CoachDet->fname}}@endif
                                                    </td>
                                                    <td>
                                                        {{ $order->customer->phone }}
                                                    </td>
                                                    <td>
                                                        {{ $order->customer->email }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y, h:i:s A') }}
                                                    </td>
                                                    <td> {{ $order->payment_mode }}
                                                    </td>
                                                    <!-- <td>
                                                        <button data-bs-toggle="modal" data-bs-target="#orderStatus{{$order->order_id}}" class="btn btn-{{($order->status == 'Processing') ? 'warning' : (($order->status == 'Shipped') ? 'primary' : (($order->status == 'Delivered') ? 'success' : ''))}}">{{$order->status}}</button>
                                                    </td> -->
                                                </tr>
                                                {{-- Order Status Update --}}
                                                <div class="modal fade" id="orderStatus{{$order->order_id}}" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-md">
                                                        <div class="modal-content rounded-1">
                                                            <div class="modal-header">
                                                                <h5 class="mb-0 fs-5 p-1 text-danger">Update Order Status</h5>
                                                            </div>
                                                            <form action="{{ route('update-order-status') }}" method="POST">
                                                                <div class="modal-body message-body">
                                                                    @csrf
                                                                    <input type="hidden" name="order_id" value="{{$order->order_id}}">
                                                                    <select name="status" class="form-control form-select" required>
                                                                        <option value="">Select Status</option>
                                                                        <option {{($order->status == 'Processing') ? 'selected' : ''}} value="Processing">Processing</option>
                                                                        <option {{($order->status == 'Shipped') ? 'selected' : ''}} value="Shipped">Shipped</option>
                                                                        <option {{($order->status == 'Delivered') ? 'selected' : ''}} value="Delivered">Delivered</option>
                                                                    </select>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div>
                                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                                        <button type="button" data-bs-dismiss="modal" class="btn btn-light border">Close</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- End Order Status --}}
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- --------------------------------------------------- -->
            <!--  Table Datatable Basic End -->
            <!-- --------------------------------------------------- -->
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <div class="dark-transparent sidebartoggler"></div>
<x-footer />
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/datatable-basic.init.js"></script>
