@php
    $title = 'Edit Customer';
@endphp
<x-header :title="$title" />
<link rel="stylesheet" type="text/css" href="assets/css/codemirror.min.css" />
<link rel="stylesheet" href="assets/css/blackboard.min.css" />
<link rel="stylesheet" href="assets/css/monokai.min.css" />
<link rel="stylesheet" href="assets/css/summernote-lite.min.css">
<!--  Body Wrapper -->
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
                            <h4 class="fw-semibold mb-8">EDIT CUSTOMER</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none"
                                            href="{{ route('customers') }}">Customers</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        Edit Customer
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('update-customer') }}" method="POST">
                                @csrf
                                <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>First Name*</label>
                                        <input type="text" name="fname" autocomplete="off" class="form-control mb-3"
                                            placeholder="First Name..." value="{{ $customer->fname }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last Name*</label>
                                        <input type="text" name="lname" autocomplete="off" class="form-control mb-3"
                                            placeholder="Last Name..." value="{{ $customer->lname }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Username*</label>
                                        <input type="text" name="username" autocomplete="off" class="form-control mb-3"
                                            placeholder="Username..." value="{{ $customer->username }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Customer Email*</label>
                                        <input type="email" name="email" autocomplete="off" class="form-control mb-3"
                                            placeholder="Customer Email..." value="{{ $customer->email }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Customer Phone*</label>
                                        <input type="number" name="phone" autocomplete="off" class="form-control mb-3"
                                            placeholder="Customer Phone Number..." value="{{ $customer->phone }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <div style="position: relative;">
                                            <label>Customer Password</label>
                                            <input type="password" name="password" id="password" autocomplete="off" class="form-control mb-3"
                                            placeholder="New Password ...">
                                            <span onclick="showHidePassword(this)" style="position: absolute; top:25px; right:10px;" class="input-group-text cursor-pointer "><i id="Iclass" class="ti ti-eye-off toggle-password"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-start mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg font-medium rounded-pill px-4">
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
</div>
<x-footer />
<!-- ---------------------------------------------- -->
<!-- current page js files -->
<!-- ---------------------------------------------- -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/codemirror.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/mode/xml/xml.min.js"></script>
<script>
    function showHidePassword(el) {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
        var y = document.getElementById("Iclass");
         var attribute=y.className;
         if(attribute=='ti ti-eye-off toggle-password'){
               y.classList.replace("ti-eye-off", "ti-eye");
         }else{
             y.classList.replace("ti-eye", "ti-eye-off"); 
         }
    }
</script>