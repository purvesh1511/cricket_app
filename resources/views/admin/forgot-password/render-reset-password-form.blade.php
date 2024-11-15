<h2 class="mb-3 fs-7 fw-bolder">Reset Password</h2>
<p class="mb-9">Create New Password</p>
<div class="row">
    <form id="resetPasswordForm" onsubmit="resetPassword(event,'{{csrf_token()}}')">
        @csrf
        <div class="mb-4 password-input-group position-relative">
            <label class="form-label">New Password</label>
            <input type="password" autocomplete="off" name="password" class="form-control" required>
            <button onclick="showHidePassword(this)" type="button" style="top: 30px; right:1px;"
                class="password-show-hide-button btn btn-primary position-absolute">
                <i class="bi bi-eye-slash"></i>
            </button>
        </div>
        <div class="mb-4 password-input-group position-relative">
            <label class="form-label">Confirm Password</label>
            <input type="password" autocomplete="off" name="confirm_password" class="form-control" required>
            <button onclick="showHidePassword(this)" type="button" style="top: 30px; right:1px;"
                class="password-show-hide-button btn btn-primary position-absolute">
                <i class="bi bi-eye-slash"></i>
            </button>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Reset</button>
        <div class="text-center">
            <div class="text-center">
                <p>Remember Password? <span onclick="renderLoginForm('{{ csrf_token() }}')"
                    class="text-primary pointer-cursor">Login Now</span></p>
            </div>
        </div>
    </form>
</div>
