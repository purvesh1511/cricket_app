<!DOCTYPE html>
<html lang="en">
@php
    $site_name_exists = \App\Models\Option::where('option_name', 'site_name')->exists();
    if ($site_name_exists) {
        $site_name = \App\Models\Option::where('option_name', 'site_name')->first()->option_value;
        $site_name = '- ' . $site_name;
    } else {
        $site_name = '';
    }
@endphp

<head>
    <!--  Title -->
    <title>Admin Login {{$site_name}}</title>
    <link rel="shortcut icon" href="assets/images/logos/favicon.png">
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="theme-color" content="#ffa500" />
    <link id="themeColors" rel="stylesheet" href="assets/css/style.min.css" />
    <link rel="stylesheet" href="assets/css/loader.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/iziToast.min.css">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="frontend/logos/logo.png" alt="loader" width="150px" class="lds-ripple img-fluid" />
    </div>
    <!-- Preloader -->
    <div class="preloader">
        <img src="frontend/logos/logo.png" alt="loader" width="150px" class="lds-ripple img-fluid" />
    </div>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100">
            <div class="position-relative z-index-5">
                <div class="row">
                    <div class="col-md-7 d-none d-md-block d-lg-block d-xl-block">
                        <a href="{{ route('admin') }}" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                            <img src="assets/images/logos/favicon.png?v=1.1" width="32px" class="mb-2"
                                alt="favicon">
                            <span class="h3 ms-2 mt-3">Admin Panel</span>
                        </a>
                        <div class="d-flex align-items-center justify-content-center"
                            style="height: calc(100vh - 80px);">
                            <img src="frontend/logos/logo.png" alt="logo" class="img-fluid"
                                width="291">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div
                            class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center">
                            <div class="col-sm-8 col-md-6 col-xl-9 p-4 p-md-0 p-lg-0 p-xl-0" id="loginFormWrap">
                                <h2 class="mb-3 fs-7 fw-bolder">Welcome</h2>
                                <p class="mb-9">To your admin dashboard</p>
                                <div class="row">
                                    <form onsubmit="adminAuth(event)" id="adminAuthForm">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email/Username</label>
                                            <input type="text" name="email" class="form-control"
                                                id="exampleInputEmail1" autocomplete="off" aria-describedby="emailHelp"
                                                required>
                                        </div>
                                        <div class="mb-4 password-input-group position-relative">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" autocomplete="off" name="password"
                                                class="form-control" id="exampleInputPassword1" required>
                                            <button onclick="showHidePassword(this)" type="button"
                                                style="top: 30px; right:1px;"
                                                class="password-show-hide-button btn btn-primary position-absolute">
                                                <i class="bi bi-eye-slash"></i>
                                            </button>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input primary" type="checkbox" value=""
                                                    id="flexCheckChecked" checked>
                                                <label class="form-check-label text-dark" for="flexCheckChecked">
                                                    Remeber this device
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-primary w-100 py-8 mb-4 rounded-2">Login</button>
                                        <div class="text-center">
                                            Forgot password ?
                                            <span onclick="renderSendEmailForm('{{ csrf_token() }}')" role="button"
                                                class="text-primary fw-medium">Reset password</span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!--  Import Js Files -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/simplebar.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <!--  core files -->
        <script src="assets/js/app.min.js"></script>
        <script src="assets/js/app.init.js"></script>
        <script src="assets/js/app-style-switcher.js"></script>
        <script src="assets/js/sidebarmenu.js"></script>

        <script src="assets/js/custom.js"></script>
        <script src="assets/js/iziToast.min.js"></script>
        <script src="assets/js/admin-forgot-password.js"></script>
        <script src="assets/js/admin-auth.js"></script>
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
</body>
</html>
