@php
    $title = 'Thank You';
@endphp
<x-front_header :title="$title" />
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <img src="assets/images/thankyou.png" width="300px">
                <h2 class="text-muted">THANK YOU!</h2>
                <p class="lead mb-2">Your event was successfully completed.</p>
                @if(session()->has('order_id'))
                    <p><b>Order Id: </b>{{session('order_id')}}</p>
                    <!-- <p><a href="{{ route('my-order-details') }}?order_id={{session('order_id')}}" class="btn btn-sm btn-primary order-details-button">Order Details</a></p> -->
                    @php
                        session()->forget('order_id');
                    @endphp
                @endif
            </div>
        </div>
    </div>
</div>

<x-front_footer />
