<h2 class="mb-3 fs-7 fw-bolder">Welcome</h2>
<p class="mb-9">To Your Admin Dashboard</p>
<div class="row">
    <form onsubmit="adminAuth(event)" id="adminAuthForm">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email/Username</label>
            <input type="text" name="email" class="form-control" id="exampleInputEmail1" autocomplete="off"
                aria-describedby="emailHelp" required>
        </div>
        <div class="mb-4 password-input-group position-relative">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" autocomplete="off" name="password" class="form-control" id="exampleInputPassword1"
                required>
            <button onclick="showHidePassword(this)" type="button" style="top: 30px; right:1px;"
                class="password-show-hide-button btn btn-primary position-absolute">
                <i class="bi bi-eye-slash"></i>
            </button>
        </div>
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="form-check">
                <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label text-dark" for="flexCheckChecked">
                    Remeber this Device
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign
            In</button>
        <div class="text-center">
            Forgot Password ?
            <span onclick="renderSendEmailForm('{{ csrf_token() }}')" role="button"
                class="text-primary fw-medium">Reset Now</span>
        </div>
    </form>
</div>
