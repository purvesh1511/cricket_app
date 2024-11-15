@php
    $title = 'My Profile';
@endphp
<x-header :title="$title" />
<link rel="stylesheet" type="text/css" href="assets/css/codemirror.min.css" />
<link rel="stylesheet" href="assets/css/blackboard.min.css" />
<link rel="stylesheet" href="assets/css/monokai.min.css" />
<link rel="stylesheet" href="assets/css/summernote-lite.min.css">
    <!-- Sidebar Start -->
    <x-sidebar />
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        <x-menu />
        <!--  Header End -->
        <div class="container-fluid">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Change Password</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        Change Password
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('update-admin-password') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                    <div class="row">
                                        <div class="col-md-6" style="position: relative;">
                                            <label>New Password <span class="text-danger mb-2">*</span></label>
                                            <input type="password" name="password" autocomplete="off"
                                                class="form-control mb-3" required>
                                            <span onclick="showHidePassword(this)" style="position: absolute; top:25px; right:15px;"
                                                class="input-group-text cursor-pointer "><i
                                                    class="ti ti-eye-off"></i></span>
                                        </div>
                                        <div class="col-md-6" style="position: relative;">
                                            <label>Retype Password <span class="text-danger mb-2">*</span></label>
                                            <input type="password" name="confirm_password" autocomplete="off"
                                                class="form-control mb-3" required>
                                            <span onclick="showHidePassword(this)" style="position: absolute; top:25px; right:15px;"
                                                class="input-group-text cursor-pointer "><i
                                                    class="ti ti-eye-off"></i></span>
                                        </div>
                                        <div class="col-md-6" style="position: relative;">
                                            <label>Old Password <span class="text-danger mb-2">*</span></label>
                                            <input type="password" name="old_password" autocomplete="off"
                                                class="form-control mb-3">
                                            <span onclick="showHidePassword(this)" style="position: absolute; top:25px; right:15px;"
                                                class="input-group-text cursor-pointer "><i
                                                    class="ti ti-eye-off"></i></span>
                                        </div>
                                    </div>
                                    <div class="text-start mt-4">
                                        <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                                            <div class="d-flex align-items-center">
                                                Update
                                            </div>
                                        </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <div class="dark-transparent sidebartoggler"></div>
<x-footer />
<script>
    function showHidePassword(el) {
        console.log($(el).parent().parent())
       var password_type = $(el).parent().find('input:first').attr('type');
       if(password_type == 'password') {
        $(el).parent().find('input:first').attr('type','text');
        $(el).find('i:first').attr('class','ti ti-eye');
       }
       if(password_type == 'text') {
        $(el).parent().find('input:first').attr('type','password');
        $(el).find('i:first').attr('class','ti ti-eye-off');
       }
    }
</script>
