@php
    $title = 'Orders';
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
            <div class="col-md-8" id="order-details-box">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-4">Order History</h5>
                        <div class="row mt-4">
                            @if ($orders->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="product-order">
                                        <tr>
                                            <th>Event Date</th>
                                            <th>Order Id</th>
                                            <th> Event Name </td>
                                            <th>Total Amount</th>
                                            <th> Status </th>
                                            <th> Action </th>
                                            
                                        </tr>
                                        @foreach ($orders as $order)
                                            @php
                                               
                                                $total = 0;
                                                $coupon_discount = 0;
                                                
                                                
                                                $EventDet=DB::table('events')->where('event_id',$order->event_id)->first();
                                                
                                                $Slotarr=explode('-',$EventDet->event_time);
                                                $givenDateTimeStr = $EventDet->event_date.' '.$Slotarr[0];
                                               
                                                $givenDateTime = new DateTime($givenDateTimeStr);
                                                $currentDateTime = new DateTime();
                                            @endphp
                                            <tr>
                                                <td>{{ $EventDet->event_date }}</td>
                                                <td>
                                                    <a id="order-id" href="#">
                                                        {{$order->order_id}}
                                                    </a>
                                                </td>
                                                <td>{{$EventDet->event_name}} </td>
                                                <td>₹{{$EventDet->event_price}}</td>
                                                <td>{{$order->status}}</td>
                                                <td>
                                                @if($currentDateTime<$givenDateTime && $order->status=='Complete')   
                                            <a href="{{route('event-order-refund',['id'=>$order->id])}}" class="btn btn-primary btn-sm">Refund </a> 
                                            </td>
                                            @endif
                                            </tr>
                                        @endforeach
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
