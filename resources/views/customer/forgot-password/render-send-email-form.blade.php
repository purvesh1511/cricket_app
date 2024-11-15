<h5 class="mb-4">Send Verification Mail</h5>
<form action="#" id="sendVerificationMailForm" onsubmit="sendVerificationMail(event,'{{csrf_token()}}')">
    @csrf
    <div class="form-group row">
        <div class="col-md-12">
            <small class="text-black">Your Registered Email <span class="text-danger">*</span></small>
            <input type="email" class="form-control" name="email" autocomplete="off" required>
        </div>
        <div class="col-md-12 justify-content-between mt-3 d-flex">
            <div>
                <button class="btn btn-primary btn-sm" type="submit">Send Code</button>
            </div>
            <div class="Forgot">
                <p>Remember Password? <span onclick="renderLoginForm('{{ csrf_token() }}')"
                        class="Reset pointer-cursor">Login Now</span></p>
            </div>
        </div>
    </div>
</form>