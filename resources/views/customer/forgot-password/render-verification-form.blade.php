<h5 class="mb-4">Email Verification</h5>
<form action="#" id="verifyEmailForm" onsubmit="veriyEmail(event,'{{csrf_token()}}')">
    <div class="form-group row">
        <div class="col-md-12">
            <small class="text-black">Enter 6 Digit verification Code <span class="text-danger">*</span></small>
            <input type="text" minlength="0" maxlength="6" class="form-control" name="code" autocomplete="off" required>
        </div>
        <div class="col-md-12 justify-content-between mt-3 d-flex">
            <div>
                <button class="btn btn-primary btn-sm" type="submit">Verify</button>
            </div>
            <div class="Forgot">
                <p>Remember Password? <span onclick="renderLoginForm('{{ csrf_token() }}')"
                        class="text-primary pointer-cursor">Login Now</span></p>
            </div>
        </div>
    </div>
</form>
