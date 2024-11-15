@php
    $title = 'Login';
@endphp
<x-front_header :title="$title" />
<!--<section class="shop" style="background-image: url({{$banner_image}});">
    <div class="container">
        <div class="row">
            <h3 class="Shop-text">Login</h3>
            <p class="link-products">
                <a href="{{route('home')}}">Home</a>
                / <span>Login</span>
            </p>
        </div>
    </div>
</section>-->
<section class="my-account">
    <div class="container">
        <div class="row my-5" id="main-box">
            <div class="New col-md-6 border mx-auto p-3" id="loginFormWrap">
                <h3>Login</h3>
                <div class="row">
                    <form action="{{ route('customer-auth') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email/Username *</label>
                            <input type="text" name="email" class="form-control" id="exampleInputPassword1" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password *</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" autocomplete="off" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" id="Register" class="btn">Login</button>
                            <div class="Forgot">
                                <a><span>Forgot Password?</span></a>
                                <a class="pointer-cursor" onclick="renderSendEmailForm('{{csrf_token()}}')"><span class="Reset">Reset Now</span></a>
                            </div>
                        </div>
                        <div  class="Forgot mt-4">
                            <a><span>Not Registered Yet?</span></a>
                            <a class="pointer-cursor" href="{{route('signup')}}"><span class="Reset">Register</span></a>
                        </div>
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
