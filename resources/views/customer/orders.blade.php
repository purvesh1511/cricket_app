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
                                            <th>Date</th>
                                            <th>Order Id</th>
                                            
                                            <th>Total Amount</th>
                                            
                                        </tr>
                                        @foreach ($orders as $order)
                                            @php
                                                $orders = \App\Models\Orders::where('order_id',$order->order_id)
                                                ->get();
                                                $total = 0;
                                                $coupon_discount = 0;
                                                foreach ($orders as $order) {
                                                    $total += ($order->lane_price);
                                                }
                                               
                                            @endphp
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($orders->first()->created_at)->format('jS F, Y') }}</td>
                                                <td>
                                                    <a id="order-id" href="{{route('my-order-details')}}?order_id={{$order->order_id}}">
                                                        {{$order->order_id}}
                                                    </a>
                                                </td>
                                                
                                                <td>₹{{ number_format(($total + (int)$order->shipping_charge - (int) $coupon_discount),2) }}</td>
                                                
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
