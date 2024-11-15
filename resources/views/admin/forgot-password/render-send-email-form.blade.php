<h2 class="mb-3 fs-7 fw-bolder">Reset Password</h2>
<p class="mb-9">Send Verification Mail</p>
<div class="row">
    <form action="#" id="sendVerificationMailForm" onsubmit="sendVerificationMail(event,'{{ csrf_token() }}')">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Your Registered Email <span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control" name="email" autocomplete="off"
                aria-describedby="emailHelp" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Send Code</button>
        <div class="text-center">
            Remember Password?
            <span onclick="renderLoginForm('{{ csrf_token() }}')" role="button"
                class="text-primary fw-medium">Login Now</span>
        </div>
    </form>
</div>
