@php
    $title = 'Order Details';
@endphp
<x-front_header :title="$title" />
<!-- benar -->
<!--<section class="shop" style="background-image: url('assets/images/banner.jpeg');">
    <div class="container">
        <div class="row">
            <h3 class="Shop-text">Order Details</h3>
            <p class="link-products">
                <a href="{{route('home')}}">Home</a> / 
                <a href="{{route('my-orders')}}">My Orders</a> / 
                <span>Order Details</span>
            </p>
        </div>
    </div>
</section>-->
<!-- benar end-->
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <x-customer-sidebar />
            </div>
            <div class="col-md-8" id="det">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="mb-4">Order Details</h5>
                            </div>
                            <div id="bb">
                                <!-- <a href="{{route('generate-invoice')}}?order_id={{$orders->first()->order_id}}" class="btn btn-success text-light me-2">
                                    <i class="ti ti-download"></i>
                                    Download Invoice
                                </a>
                                <button class="btn btn-{{($orders->first()->status == 'Processing') ? 'info text-light' : (($orders->first()->status == 'Shipped') ? 'primary text-light' : (($orders->first()->status == 'Delivered') ? 'success text-light' : ''))}}">
                                    {{$orders->first()->status}}
                                </button> -->
                            </div>
                        </div>
                        <div class="row mt-4">
                            @if ($orders->count() > 0)
                                <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr class="text-center">
                                        <th>Date</th>
                                        <th>Slot</th>
                                        <th>Lane</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                       
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

                                        $slotDetArr=DB::table('slot_master')->where('id',$order->slot_id)->first();
                                        $Slotarr=explode('-',$slotDetArr->slot_name);
                                            $givenDateTimeStr = $order->slot_date.' '.$Slotarr[0];
                                            
                                            $givenDateTime = new DateTime($givenDateTimeStr);
                                            $currentDateTime = new DateTime();
                                            
                                            
                                           
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
                                            <td> {{$order->order_status}} </td>
                                            <td>
                                            @if($currentDateTime<$givenDateTime && $order->order_status=='Complete')   
                                            <a href="{{route('order-refund',['id'=>$order->orderid])}}" class="btn btn-primary btn-sm">Refund </a> 
                                            @endif
                                        </td>
                                        </tr>
                                    @endforeach
                                   
                                    
                                    <tr>
                                        <td class="text-end fw-bolder" colspan="5">Sub Total</td>
                                        <td class="fw-bolder">₹{{number_format($grand_total,2)}}</td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <td class="text-end fw-bolder" colspan="5">Grand Total</td>
                                        <td class="fw-bolder">€{{number_format(($grand_total),2)}}</td>
                                    </tr>
                                </table>
                                </div>
                                
                            @else
                                <div class="text-center mx-auto">
                                    <img src="assets/images/empty-cart.png" class="mx-auto">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-front_footer />
