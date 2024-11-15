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
    $title="";
    $currentRouteName = Route::currentRouteName();
    if($currentRouteName=='dashboard') $title='Dashboard';
    if($currentRouteName=='add-page') $title='Add Page';
    if($currentRouteName=='all-pages') $title='All Page';
    if($currentRouteName=='edit-page') $title='Edit Page';

    if($currentRouteName=='add-achivement') $title='Add Achivement';
    if($currentRouteName=='all-achivement') $title='All Achivement';
    if($currentRouteName=='edit-achivement') $title='Edit Achivement';

    if($currentRouteName=='add-media') $title='Add Media';
    if($currentRouteName=='all-media') $title='All Media';
    if($currentRouteName=='edit-media') $title='Edit Media';

    if($currentRouteName=='add-gallery') $title='Add Gallery';
    if($currentRouteName=='all-gallery') $title='All Gallery';
    
    if($currentRouteName=='add-event') $title='Add Event';
    if($currentRouteName=='all-event') $title='All Event';
    if($currentRouteName=='edit-event') $title='Edit Event';

    if($currentRouteName=='all-customer') $title='All Customer';
    if($currentRouteName=='edit-customer') $title='Edit Customer';
    if($currentRouteName=='customers') $title='All Customer';

    if($currentRouteName=='orders') $title='All Orders';
    if($currentRouteName=='event-order') $title='Event Orders';
    if($currentRouteName=='refundorder') $title='Refund Orders';
    if($currentRouteName=='event-refundorder') $title='Event Refund Orders';

    if($currentRouteName=='manualbooking') $title='Manual Booking';
    
    if($currentRouteName=='coachs') $title='All Coach';
    if($currentRouteName=='edit-coachs') $title='Edit Coach';

    if($currentRouteName=='lanes') $title='All Lane';
    if($currentRouteName=='edit-lane') $title='Edit Lane';

    if($currentRouteName=='slots') $title='All Slots';
    if($currentRouteName=='edit-slot') $title='Edit Slot';
    if($currentRouteName=='add-lane-slot') $title='Add Lane Slot';
    if($currentRouteName=='manage-lane-slot') $title='Manage Lane Slot';
    if($currentRouteName=='add-disable-slot') $title='Add Disable Slot';

    if($currentRouteName=='add-disable') $title='All Disable Slot';
    if($currentRouteName=='manage-disable-slot') $title='All Disable Slot';
    if($currentRouteName=='settings') $title='Settings';
    if($currentRouteName=='my-profile') $title='My Profile';
    if($currentRouteName=='my-profile') $title='My Profile';
    if($currentRouteName=='admin-change-password') $title='Change Password';

    if($currentRouteName=='event-order-details') $title='Order Details';
    if($currentRouteName=='order-details') $title='Order Details';
     if($currentRouteName=='store-media') $title='Add Media';

    @endphp

    
<head>
    <!--  Title -->
    <title>{{$title}} {{$site_name}}</title>
    <link rel="shortcut icon" href="assets/images/logos/favicon.png">
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="theme-color" content="#ffa500" />
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">

    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="assets/css/style.min.css?v=1.1" />
    <link rel="stylesheet" href="assets/css/iziToast.min.css">
    <link rel="stylesheet" href="assets/css/ckeditor.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
@php
    $agent = new \Jenssegers\Agent\Agent();
@endphp

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="assets/images/logos/logo.png" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- Preloader -->
    <div class="preloader">
        <img src="assets/images/logos/logo.png" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical"
        data-sidebar-position="fixed" data-header-position="fixed">
