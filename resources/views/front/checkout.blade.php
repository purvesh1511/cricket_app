@php
    $title = 'Checkout';
@endphp
<x-front_header :title="$title" />
<section class="shop" style="background-image: url('assets/images/banner.jpeg');">


    <div class="container">
        <div class="row">
            <h3 class="Shop-text">Checkout</h3>
            <p class="link-products"><a href="{{route('home')}}">Home</a> / <span>Checkout</span></p>
        </div>
    </div>
</section>


<div class="site-section">
    <div class="container">
        @if (!session()->has('customer'))
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="Returning border p-4 rounded" role="alert">
                        Returning customer? <a href="#">Click here</a> to login
                    </div>
                </div>
            </div>
        @endif
        <form action="{{ route('place-order') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Customer form</h2>
                    <div class="p-3 p-lg-5 border">
                        
                    @if($customers->type=='coach')   
                        <div class="form-group row">       
                            <div class="col-md-12">
                            <select class="form-control" id="student_id" name="student_id" autocomplete="off" required>
                                        <option value=""> Select Customer</option>
                                        @if($customers_list)
                                         @foreach($customers_list as $customer)
                                        <option value="{{$customer->id}}"> {{$customer->fname}} {{$customer->lname}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                            </div>
                        </div>    
                    @endif    
                    
                    @if($customers->type=='customer')   
                    <div class="form-group row">
                            
                            <div class="col-md-6">
                                <small class="Country text-black">First Name <span class="text-danger">*</span></small>
                                <input type="text" value="{{$customers->fname}}" id="Country-1" class="form-control"
                                    autocomplete="off" name="fname" placeholder="First name" required="">
                            </div>
                            <div class="col-md-6">
                                <small class="Country text-black">Last Name <span class="text-danger">*</span></small>
                                <input type="text" value="{{$customers->lname}}" id="Country-1" class="form-control"
                                    autocomplete="off" name="lname" placeholder="Last name" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <small class="Country text-black">Email Address <span
                                        class="text-danger">*</span></small>
                                <input type="text" value="{{$customers->email}}" id="Country-1" placeholder="Email address"
                                    class="form-control" autocomplete="off" name="email" required="">
                            </div>
                            <div class="col-md-6">
                                <small class="Country text-black">Phone <span class="text-danger">*</span></small>
                                <input type="text" value="{{$customers->phone}}" id="Country-1" class="form-control"
                                    autocomplete="off" name="phone" placeholder="Phone Number" required="">
                            </div>
                        </div>
                        @endif

                        <div class="form-group row">
                            <div class="col-md-12">
                                <small class="Country text-black">Address <span class="text-danger">*</span></small>
                                <textarea class="form-control" name="address_line_1" required="">{{$customers->address}}</textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-12">
                                <small class="Country text-black">Test Name <span class="text-danger">*</span></small>
                                <input type="text" value="{{$customers->test_name}}" id="test_name" class="form-control"
                                    autocomplete="off" name="test_name" placeholder="Test Name" required="">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-12">
                                <small class="Country text-black">Test Description <span class="text-danger">*</span></small>
                                <textarea class="form-control" name="test_description" placeholder="Test Description" required="">{{$customers->test_description}}</textarea>
                            </div>
                        </div>

                       
                    </div>
                </div>
                <div class="col-md-6">

                    <!-- <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Coupon Code</h2>
                            <div class="p-3 p-lg-5 border">

                                <div id="couponCodeWrap">
                                    <small for="c_code" class="text-black mb-3">Enter your coupon code if you have
                                        one</small>
                                    <div class="input-group w-75">
                                        <input type="text" class="form-control" id="c_code"
                                            placeholder="Coupon Code" aria-small="Coupon Code"
                                            aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                            <button onclick="applyCoupon('{{csrf_token()}}')"
                                                class="btn btn-primary btn-sm" type="button"
                                                id="button-addon2">Apply</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> -->

                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Your Order</h2>
                            <div class="p-3 p-lg-5 border">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                        <tr>
                                            <th>Slot</th>
                                            <th>Lane</th>
                                            <th>Price</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @section('content')
                                        @php
                                            $total = 0;
                                            $sub_total = 0;
                                            $grand_total = 0;
                                        @endphp
                                        @foreach ($cart_list as $cart)
                                            @php
                                                $total = $cart->lane_price;
                                                $sub_total += $total;
                                                $grand_total = $sub_total;
                                            @endphp
                                        <tr>
                                            <td>
                                                {{ $cart->slot_name }} 
                                                
                                            </td>
                                            <td>{{ $cart->lane_name }}</td>
                                            <td>{{ $cart->lane_price }}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td> </td>
                                            
                                            <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong>
                                            </td>
                                            <td class="text-black font-weight-bold">
                                                <strong>£{{ number_format($sub_total, 2) }}</strong>
                                                <input type="hidden" name="order_subtotal" value="{{ number_format($sub_total, 2) }}">
                                            </td>
                                        </tr>
                                        
                                        
                                        <tr>
                                        
                                        <td> </td>
                                            <td class="text-black font-weight-bold"><strong>Order Total</strong>
                                            </td>
                                            <td class="text-black font-weight-bold">
                                                <strong id="grandTotal">£{{ number_format($grand_total, 2) }}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                               @if($customers->type=='coach')
                                    <div class="border px-4 py-2 mb-3">
                                        <h3 class="h6 mb-0">
                                            <input class="form-check-input primary mt-2" type="radio" id="Cash"
                                                value="Cash On Delivery" name="payment_mode" checked="">
                                            <label class="mt-1">
                                                Cash On Delivery
                                            </label>
                                        </h3>
                                    </div>
                                @endif    
                               

                                
                                    <div class="border px-4 py-2 mb-3">
                                        <h3 class="h6 mb-0">
                                            <input class="form-check-input primary mt-2" type="radio" id="Online"
                                                value="Online Payment" name="payment_mode" checked="">
                                            <label class="mt-1">
                                                Online Payment
                                            </label>
                                        </h3>
                                    </div>
                              


                                
                                    <div class="form-group">
                                        <button id="placeOrder" class="btn btn-primary btn-lg py-3 btn-block">Place
                                            Order</button>
                                    </div>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

</div>
<x-front_footer />
<script src="assets/js/coupon.js"></script>
<script>
    function showHidePassword(el) {
        var password_type = $(el).parent().find('.form-control:first').attr('type');
        if (password_type == 'password') {
            $(el).parent().find('.form-control:first').attr('type', 'text');
            $(el).find('i').attr('class', 'bi bi-eye');
        }
        if (password_type == 'text') {
            $(el).parent().find('.form-control:first').attr('type', 'password');
            $(el).find('i').attr('class', 'bi bi-eye-slash');
        }
    }
</script>
<script>
    function calculateShippingCharge(el) {
        let state = $(el).val();
        if (state.length > 0) {
            $.ajax({
                url: "calculate-shipping-charge",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    state: state
                },
                success: function(calculateShippingChargeResponse) {
                    let grandTotal = parseInt('{{ $grand_total }}');
                    $('#shippingCharge').html('+ ₹' + (Math.round(calculateShippingChargeResponse
                        .shipping_charge * 100) / 100).toFixed(2));
                    $('#couponDiscount').html('- ₹' + (Math.round(calculateShippingChargeResponse
                        .coupon_discount * 100) / 100).toFixed(2));
                    $('#grandTotal').html('₹' + (Math.round((grandTotal + calculateShippingChargeResponse
                        .shipping_charge - calculateShippingChargeResponse.coupon_discount
                    ) * 100) / 100).toFixed(2));
                },
                error: function(calculateShippingChargeErrors) {
                    console.log(calculateShippingChargeErrors);
                }
            });
        }
    }
</script>
