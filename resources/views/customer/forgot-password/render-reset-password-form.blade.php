<h5 class="mb-4">Create New Password</h5>
<form id="resetPasswordForm" onsubmit="resetPassword(event,'{{csrf_token()}}')">
    <div class="form-group row">
        <div class="col-md-12 password-input-group position-relative">
            <small for="c_lname" class="text-black">New Password <span class="text-danger">*</span></small>
            <input type="password" class="form-control" name="password" autocomplete="off" required>
            <button onclick="showHidePassword(this)" type="button"
                class="password-show-hide-button btn position-absolute">
                <i class="bi bi-eye-slash"></i>
            </button>
        </div>
        <div class="col-md-12 password-input-group position-relative">
            <small for="c_lname" class="text-black">Confirm Password <span class="text-danger">*</span></small>
            <input type="password" class="form-control" name="confirm_password" autocomplete="off" required>
            <button onclick="showHidePassword(this)" type="button"
                class="password-show-hide-button btn position-absolute">
                <i class="bi bi-eye-slash"></i>
            </button>
        </div>
        <div class="col-md-12 justify-content-between mt-3 d-flex">
            <div>
                <button class="btn btn-primary btn-sm" type="submit">Reset</button>
            </div>
            <div>
                <p>Forgot Password? <span onclick="renderSendEmailForm('{{ csrf_token() }}')"
                        class="text-primary pointer-cursor">Reset Now</span></p>
            </div>
        </div>
    </div>
</form>
