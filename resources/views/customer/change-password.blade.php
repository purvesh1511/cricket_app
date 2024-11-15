@php
    $title = 'Change Password';
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
                    <form action="{{ route('update-password') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="exampleInputPassword1" class="form-label">New Password *</label>
                                <input type="password"  class="form-control" name="password" autocomplete="off"
                                required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="exampleInputPassword1" class="form-label">Confirm Password *</label>
                                <input type="password"  name="confirmPassword" class="form-control" autocomplete="off"
                                required>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <label for="exampleInputPassword1" class="form-label">Old Password *</label>
                                <input type="password"  name="oldPassword" class="form-control" autocomplete="off"
                                required>
                            </div>
                        </div>
                        <button type="submit" id="Register" class="btn">CHANGE PASSWORD</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<x-front_footer />
<script>
    function showHidePassword(el) {
       var password_type = $(el).parent().find('.form-control:first').attr('type');
       if(password_type == 'password') {
        $(el).parent().find('.form-control:first').attr('type','text');
        $(el).find('i').attr('class','bi bi-eye');
       }
       if(password_type == 'text') {
        $(el).parent().find('.form-control:first').attr('type','password');
        $(el).find('i').attr('class','bi bi-eye-slash');
       }
    }
</script>
