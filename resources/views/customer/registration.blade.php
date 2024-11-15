@php
    $title = 'Registration';
@endphp
<x-front_header :title="$title" />
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
<section class="my-account">
    <div class="container">
        <div class="row my-5">
            <div class="New col-md-6 border mx-auto p-3">
                <h3>New Registration</h3>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('registration') }}"  method="POST">
                            @csrf

                            <div class="row" style="display:none">
                                <div class="col-md-12 mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Type *</label>
                                    <select class="form-control" id="user_type" name="user_type" autocomplete="off" >
                                        <option value=""> Select Type</option>
                                        <option value="customer" selected> Customer</option>
                                        <option value="coach"> Coach</option>
                                    </select>
                                </div>
                            </div>    

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="exampleInputPassword1" class="form-label">First Name *</label>
                                    <input type="text" name="fname" class="form-control" id="exampleInputPassword1" autocomplete="off" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Last Name *</label>
                                    <input type="text" name="lname" class="form-control" id="exampleInputPassword1" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Username *</label>
                                    <input type="text" name="username" class="form-control" id="exampleInputPassword1" autocomplete="off" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Email *</label>
                                    <input name="email" type="email" class="form-control" id="exampleInputPassword1" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password *</label>
                                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Phone Number *</label>
                                    <input type="number" name="phone" class="form-control" id="exampleInputPassword1" autocomplete="off" required>
                                </div>
                            </div>
                            <button type="submit" id="Register" class="btn">Register</button>
                            <div  class="Forgot mt-4">
                                <a><span>Already Registered?</span></a>
                                <a class="pointer-cursor" href="{{route('login')}}"><span class="Reset">Login</span></a>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<x-front_footer />
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
<script src="assets/js/forgot-password.js"></script>
