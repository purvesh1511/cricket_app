@php
    $title = 'Dashboard';
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
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4 py-5">
                <x-customer-sidebar/>
            </div>

            <div class="col-md-8">
                <div class="box-my-account">
                    <form action="{{ route('update-my-profile') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="exampleInputPassword1" class="form-label">First Name *</label>
                                <input type="text" name="fname" value="{{$customer->fname}}" class="form-control" autocomplete="off" id="exampleInputPassword1" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="exampleInputPassword1" class="form-label">Last Name *</label>
                                <input type="text" name="lname" value="{{$customer->lname}}" class="form-control" autocomplete="off" id="exampleInputPassword1" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="exampleInputPassword1" class="form-label">Username *</label>
                                <input type="text" class="form-control" name="username" value="{{$customer->username}}" id="exampleInputPassword1" autocomplete="off" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="exampleInputPassword1" class="form-label">Email *</label>
                                <input type="email" name="email" value="{{$customer->email}}" class="form-control" disabled id="exampleInputPassword1" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <label for="exampleInputPassword1" class="form-label">Phone Number *</label>
                                <input type="number" name="phone" value="{{$customer->phone}}" class="form-control" id="exampleInputPassword1" autocomplete="off" required>
                            </div>
                        </div>
                        <button type="submit" id="Register" class="btn">UPDATE</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<x-front_footer />
