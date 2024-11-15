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
                            <h4 class="fw-semibold mb-8">EVENT ORDERS</h4>
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
                                    
                                    <table id="zero_config"
                                        class="table border table-striped table-bordered text-nowrap">
                                        <thead>
                                            <!-- start row -->
                                            <tr>
                                                <th >ID</th>
                                                <th>Order Id</th>
                                                <th> Customer Name</th>
                                                <th>Event Name</th>
                                                <th>Event Date</th>
                                               
                                                
                                                <th>Event Price </th>
                                               
                                                <th>Status</th>
                                                <th>Action</th> 
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
                                                    
                                                    $customerDet=DB::table('customers')->where('id',$order->customer_id)->first();
                                                    
                                                  
                                                @endphp
                                                <tr>
                                                    <td >{{$order->id}}</td>
                                                    <td>
                                                        <a class="text-primary" href="#">
                                                            {{ $order->order_id }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        {{ $customerDet->fname }} {{ $customerDet->lname }}<br>
														
                                                    </td>
                                                    <td>
                                                        {{ $order->event_name }}
                                                    </td>
                                                    
                                                    <td>
                                                    {{ $order->event_date }} {{ $order->event_time }}
                                                    </td>
                                                    <td>
                                                        {{ $order->event_price }}
                                                    </td>
                                                    <td>
                                                        {{ $order->status }}
                                                    </td>
                                                    
                                                   
                                                                                                        <td>
                                                    @if($order->status=='Refund Pending')
                                                    <a href="{{route('event-accept-refund',['id'=>$order->id])}}" class="btn btn-primary"> Accept Refund </a>
                                                    <a href="{{route('event-reject-refund',['id'=>$order->id])}}" class="btn btn-primary"> Reject Refund </a>
                                                    @endif

                                                    @if($order->status=='Accept Refund')
                                                    <a href="{{route('event-payment-refund',['id'=>$order->id])}}" class="btn success btn-primary"> Send Payment </a>
                                                    @endif
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
