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
