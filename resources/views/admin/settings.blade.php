@php
    $title = 'Site Settings';
@endphp
<x-header :title="$title" />
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
                        <h4 class="fw-semibold mb-8">SETTINGS</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none"
                                        href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Site Settings
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('update-settings') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Site URL</label>
                                    <input type="text" value="{{ $site_url }}" name="site_url" autocomplete="off"
                                        class="form-control mb-3">
                                </div>
                                <div class="col-md-6">
                                    <label>Site Name</label>
                                    <input type="text" value="{{ $site_name }}" name="site_name"
                                        autocomplete="off" class="form-control mb-3">
                                </div>
                            </div>

                            <label>Booking Page Heading</label>
                            <textarea name="site_description" class="form-control" cols="30" autocomplete="off" rows="10">{!! html_entity_decode($site_description) !!}</textarea>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <label>Support Email</label>
                                    <input type="text" name="support_email" value="{{ $support_email }}"
                                        autocomplete="off" class="form-control mb-3">
                                </div>
                                <div class="col-md-6">
                                    <label>Auto Reply Email</label>
                                    <input type="text" name="auto_reply_email" value="{{ $auto_reply_email }}"
                                        autocomplete="off" class="form-control mb-3">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Date Format</label>
                                    <input type="text" name="date_format"
                                        value="{{ $date_format }}"autocomplete="off" class="form-control mb-3">
                                </div>
                                <div class="col-md-6">
                                    <label>Time Format</label>
                                    <input type="text" name="time_format" value="{{ $time_format }}"
                                        autocomplete="off" class="form-control mb-3">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>From Email</label>
                                    <input type="text" name="from_email"
                                        value="{{ $from_email }}"autocomplete="off" class="form-control mb-3">
                                </div>
                                <div class="col-md-6">
                                    <label>To Email</label>
                                    <input type="text" name="to_email" readonly value="{{ $to_email }}"
                                        autocomplete="off" class="form-control mb-3">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Stripe API Key</label>
                                    <input type="text" name="razorpay_api_key"
                                        value="{{ $razorpay_api_key }}"autocomplete="off" class="form-control mb-3">
                                </div>
                                <div class="col-md-6">
                                    <label>Stripe API Secret</label>
                                    <input type="text" name="razorpay_api_secret" value="{{ $razorpay_api_secret }}"
                                        autocomplete="off" class="form-control mb-3">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label>Menu Code</label>
                                    <textarea class="form-control mb-3" name="header_code" cols="30" rows="10">{{ $header_code }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Footer Code</label>
                                    <textarea class="form-control mb-3" name="footer_code" cols="30" rows="10">{{ $footer_code }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Google Analytics Code</label>
                                    <textarea class="form-control mb-3" name="google_analytics_code" cols="30" rows="10">{{ $google_analytics_code }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label>Page banner image</label>
                                    <input type="file" onchange="showPreview(event)" name="banner_image"
                                        class="form-control mb-3">
                                </div>
                                <div class="col-md-12  position-relative">
                                    <a href="javscript:void(0)" data-bs-toggle="modal" data-bs-target="#removeImage"
                                        class="position-absolute badge bg-danger text-light p-0"
                                        style="right: 20px;top: 10px; cursor: pointer;">
                                        <i class="ti ti-x"></i>
                                    </a>
                                    <img src="{{ $banner_image }}" class="w-100" alt=""
                                        id="bannerPreview">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <h6>Payment Options</h6>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input primary" type="checkbox"
                                            name="payment_option[]" value="cash_on_delivery" id="CashOnDelivery"
                                            {{ $cash_on_delivery_exists ? 'checked' : '' }}>
                                        <label class="form-check-label text-dark" for="CashOnDelivery">
                                           Counter Pay
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input primary" type="checkbox"
                                            value="online_payment" name="payment_option[]" id="OnlinePayment"
                                            {{ $online_payment_exists ? 'checked' : '' }}>
                                        <label class="form-check-label text-dark" for="OnlinePayment">
                                            Online Payment (Stripe)
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <h6>Maintenance</h6>
                                
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input primary" type="checkbox"
                                            value="1" name="site_mode" id="site_mode"
                                            {{ $site_mode ? 'checked' : '' }}>
                                        <label class="form-check-label text-dark" for="site_mode">
                                            Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-start mt-4">
                                <button type="submit" class="btn btn-primary btn-lg font-medium rounded-pill px-4">
                                    <div class="d-flex align-items-center">
                                        Submit
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
<div class="modal fade" id="removeImage" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content rounded-1">
            <div class="modal-body message-body text-center p-4" data-simplebar="">
                <h5 class="mb-0 fs-5 p-1 text-success mb-3">Remove Image</h5>
                <img src="{{ $banner_image }}" class="w-100">
                <div class="mt-4">
                    <a href="{{ route('delete-banner-image') }}"
                        class="btn btn-primary">Yes</a>
                    <button data-bs-dismiss="modal" class="btn btn-light border">No</button>
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
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        var y = document.getElementById("Iclass");
        var attribute = y.className;
        if (attribute == 'ti ti-eye-off toggle-password') {
            y.classList.replace("ti-eye-off", "ti-eye");
        } else {
            y.classList.replace("ti-eye", "ti-eye-off");
        }
    }
</script>
<script>
    function showPreview(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("bannerPreview");
            preview.src = src;
        }
    }
</script>
