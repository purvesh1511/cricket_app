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
                        <!-- <div class="card">
                            <div class="card-body"> -->
                                <div class="table-responsive">
                                <table class="table border table-striped table-bordered text-nowrap">
                                        <form method="post" action="{{route('event-order')}}">
                                            @csrf
                                        <tr>
                                            <td>Start Date: <input type="date" class="form-control" value="<?php if(isset($_POST['start_date'])) echo $_POST['start_date'];?>" name="start_date" id="start_date"> </td>
                                            <td>End Date: <input type="date" class="form-control" name="end_date" value="<?php if(isset($_POST['end_date'])) echo $_POST['end_date'];?>" id="end_date"> </td>
                                            <td>Event:<input type="text" class="form-control" name="event_name" value="<?php if(isset($_POST['event_name'])) echo $_POST['event_name'];?>" id="event_name"> </td>
                                            <td><input type="submit" class="btn btn-primary btn-sm mt-4" value="Filter"> </td>
                                        </tr> 
                                    </form>
                                    </table>
                                    <table id="zero_config"
                                        class="table border table-striped table-bordered text-nowrap">
                                        <thead>
                                            <!-- start row -->
                                            <tr>
                                                <th>ID</th>
                                                <th>Order Id</th>
                                                <th>Order Date</th>
                                                <th>Event Name</th>
                                                <th>Price</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Age</th>
                                                <th>Medical Condition</th>
                                                <th>Emergency Contact Name</th>
                                                 <th>Emergency Contact No</th>
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
                                                   
                                                @endphp
                                                <tr>
												
                                                    <td >{{$order->id}}</td>
                                                    <td>
                                                        <a class="text-primary" href="{{route('event-order-details')}}?order_id={{$order->order_id}}">
                                                            {{ $order->order_id }}
                                                        </a>
                                                    </td>
                                                    
                                                    <td>
                                                        {{ $order->order_date }}
                                                    </td>
                                                    <td>
                                                        {{ $order->event_name }} 
                                                    </td>
                                                    <td>
                                                        {{ $order->order_amount }}
                                                    </td>
                                                    <td>
                                                        {{ $order->fname }}
                                                    </td>
                                                     <td>
                                                        {{ $order->lname }}
                                                    </td>
                                                     <td>
                                                        {{ $order->age }}
                                                    </td>
                                                    <td>
                                                        {{ $order->medical_condition }}
                                                    </td>
                                                    <td>
                                                        {{ $order->emergency_contact_name }}
                                                    </td>
                                                    <td>
                                                        {{ $order->emergency_contact_number }}
                                                    </td>
                                                    
                                                    <td> {{ $order->payment_mode }}
                                                    </td>
                                                    <!-- <td>
                                                   @if($order->payment_status==1){{'Complete'}}@else {{'Pending'}}@endif</button>
                                                    </td> -->
                                                </tr>
                                                
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <!-- </div>
                    </div> -->
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
