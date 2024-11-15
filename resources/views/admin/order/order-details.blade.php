@php
    $title = 'Order Details';
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
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">ORDER DETAILS</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('orders') }}">Orders</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        Order Details
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="text-muted mb-3">Ordered Items</h5>
                                </div>
                                <div>
                                    <form action="{{route('update-order-status')}}" method="POST">
                                        @csrf 
                                        <input type="hidden" name="order_id" value="{{$orders->first()->order_id}}">
                                        <div class="d-flex justify-content-end mb-3">
                                            <button type="button" class="btn btn-outline-primary me-2">
                                                <i class="ti ti-clock"></i>
                                                {{\Carbon\Carbon::parse($orders->first()->created_at)->format('d-m-Y H:i:s A')}}
                                            </button>
                                            <a href="{{route('generate-invoice')}}?order_id={{$orders->first()->order_id}}" class="btn btn-primary me-2">
                                                <i class="ti ti-download"></i>
                                                Download Invoice
                                            </a>
                                            <div class="me-2">
                                                <select name="status" class="form-control form-select" required>
                                                    <option value="">Select Status</option>
                                                    <option {{($orders->first()->status == 'Processing') ? 'selected' : ''}} value="Processing">Processing</option>
                                                    <option {{($orders->first()->status == 'Shipped') ? 'selected' : ''}} value="Shipped">Shipped</option>
                                                    <option {{($orders->first()->status == 'Delivered') ? 'selected' : ''}} value="Delivered">Delivered</option>
                                                </select>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-primary">Update Status</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
                            <div class="table-responsive mb-4">
                                <table class="table table-bordered">
                                    <tr class="text-center">
                                        <th>Date</th>
                                        <th>Slot</th>
                                        <th>Lane</th>
                                        <th>Price</th>
                                       
                                    </tr>
                                    @php
                                        $total = 0;
                                        $grand_total = 0;
                                        $shipping_charge = 0;
                                        $coupon_discount = 0;
                                    @endphp
                                    @foreach($orders as $order)
                                        @php
                                            $total = $order->lane_price;
                                            $grand_total += $total;
                                           
                                        @endphp
                                        <tr>
                                            <td class="mx-auto text-center">
                                            {{$order->slot_date}}
                                            </td>
                                            <td class="mx-auto text-center">
                                            {{$order->slot_name}}
                                            </td>
                                            <td class="mx-auto text-center">{{$order->lane_name}}</td>
                                            <td class="mx-auto text-center">€{{$order->lane_price}}</td>
                                        </tr>
                                    @endforeach
                                   
                                    
                                    <tr>
                                        <td class="text-end fw-bolder" colspan="3">Sub Total</td>
                                        <td class="fw-bolder">₹{{number_format($grand_total,2)}}</td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <td class="text-end fw-bolder" colspan="3">Grand Total</td>
                                        <td class="fw-bolder">€{{number_format(($grand_total),2)}}</td>
                                    </tr>
                                </table>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <div class="dark-transparent sidebartoggler"></div>
<x-footer />