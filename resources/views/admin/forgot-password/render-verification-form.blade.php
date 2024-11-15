<h2 class="mb-3 fs-7 fw-bolder">Verification</h2>
<p class="mb-9">Verify Your Email</p>
<div class="row">
    <form action="#" id="verifyEmailForm" onsubmit="veriyEmail(event,'{{csrf_token()}}')">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">
                Enter 6 Digit verification Code <span class="text-danger">*</span>
            </label>
            <input type="text" minlength="0" maxlength="6" class="form-control" name="code" autocomplete="off" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Verify</button>
        <div class="text-center">
            <p>Remember Password? <span onclick="renderLoginForm('{{ csrf_token() }}')"
                class="text-primary pointer-cursor">Login Now</span></p>
        </div>
    </form>
</div>
