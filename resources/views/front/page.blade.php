<!DOCTYPE html>
<html lang="en">
@php
    if (session()->has('customer')) {
        $customer_id = \App\Models\Customer::where('email', session('customer'))->first(['email', 'id'])->id;
        $cart_count = \App\Models\Cart::where('customer_id', $customer_id)->count();
    } else {
        if (session()->has('session_id')) {
            $session_id = session('session_id');
            $cart_count = \App\Models\Cart::where('session_id', $session_id)->count();
        } else {
            $cart_count = 0;
        }
    }
    $header_code_exists = \App\Models\Option::where('option_name', 'header_code')->exists();
    if ($header_code_exists) {
        $header_code = \App\Models\Option::where('option_name', 'header_code')->first()->option_value;
    } else {
        $header_code = '';
    }
    $site_name_exists = \App\Models\Option::where('option_name', 'site_name')->exists();
    if ($site_name_exists) {
        $site_name = \App\Models\Option::where('option_name', 'site_name')->first()->option_value;
        $site_name = '- ' . $site_name;
    } else {
        $site_name = '';
    }
    $google_analytics_code_exists = \App\Models\Option::where('option_name', 'google_analytics_code')->exists();
    if ($google_analytics_code_exists) {
        $google_analytics_code = \App\Models\Option::where('option_name', 'google_analytics_code')->first()->option_value;
    } else {
        $google_analytics_code = '';
    }
@endphp

<head>
    <title>{{ $page->page_name }} {{ $site_name }}</title>
    <link rel="shortcut icon" href="frontend/logos/favicon.ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="{{ $page->meta_title }}">
    <meta name="description" content="{{ $page->meta_description }}">
    <meta name="keywords" content="{{ $page->meta_keyword }}">
    <meta name="theme-color" content="#ef6f91" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="frontend/css/style.css?v=3.10" rel="stylesheet" />
    {!! html_entity_decode($google_analytics_code) !!}
    
</head>

<body >
    <!-- header -->
    <header id="header"
        class="{{ Request::is('/') ? 'dark-bg' : 'light-bg' }} {{ \Route::currentRouteName() == 'product-details' ? 'bg-shadow' : '' }}">
       
        <div class="container border-0">
            <div class="d-flex justify-content-between" id="desktop-heder-menu">
            <a class="navbar-brand" href="{{ route('home') }}">
                    <img width="50%" height="auto" src="frontend/logos/logo.png">

                </a>
                <div class="d-flex">
                <nav class="navbar navbar-expand-lg " id="desktop-menu">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="https://web.cricademia.com/">Home</a> </li>
                    <li class="nav-item"><a class="nav-link" href="/about-us">About Us</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{url('/')}}/book-a-lane?date=<?php echo date('Y-m-d');?>">Book Now</a></li>
                    <li class="nav-item"><a class="nav-link" href="/events">Events</a>  </li>
                    <li class="nav-item"><a class="nav-link" href="/our-communities">Our Communities</a>  </li>
                     <li class="nav-item"><a class="nav-link" href="match-schedule">Fixtures</a>  </li>
                    <li class="nav-item"><a class="nav-link" href="https://arccricket.com/" target="_blank">Cricket Shop</a>  </li>
                    <!--<li class="nav-item"><a class="nav-link" href="/elites&c">Elite S&C</a>  </li>-->
                    <li class="nav-item dropdown" id="dropdown-link">
                    <a href="#" class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        More
                    </a>
                    <ul class="dropdown-menu" id="dropdown">
                        <li><a class="dropdown-item" href="{{route('gallery')}}">Gallery</a></li>
                        <li><a class="dropdown-item" href="https://coach.cricademia.com/" target="_blank">Schedule</a></li>
                    </ul>
                    
                    </ul>
                    </li>
                    </ul>
                </nav>
                <div class="wrap d-flex align-items-center" style="gap: 16px;">
                  
                   
                    <a href="{{route('customer-dashboard')}}" class="site-cart">
                        <span class="icon icon-shopping_cart"></span>
                        <div class="cart">
                            <img src="../assets/images/person.svg" />
                        </div>
                    </a>
                </div>
                </div>

            </div>
           
            <!-- mobile view menu -->
            <div class="mob-menu d-xl-none d-lg-flex d-md-flex d-sm-flex justify-content-between align-items-center">
                <a class="logo" href="{{ route('home') }}"><img src="frontend/img/logo.png" alt=""
                        width="50%"></a>
                <div class="d-flex gap-4">
                    <a href="{{route('customer-dashboard')}}" class="site-cart">
                        <div class="cart">
                            <img src="../assets/images/person.svg" />
                        </div>
                    </a>

                    <!--<a href="#" class="site-cart" id="sitecart">-->
                       
                    </a>
                    <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                        aria-controls="offcanvasExample">
                        <i class="fa-solid fa-bars text-white"></i>
                    </a>
                </div>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                    aria-labelledby="offcanvasExampleLabel" style="width: 80%;">
                    <div class="offcanvas-header" style="
                    padding: 2rem !important;">
                        <a class="logo" href="{{ route('home') }}"><img src="frontend/img/logo.png"
                                alt="" width="35%"></a>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav mr-auto">
                            {{-- <li class="nav-item {{ \Request::is('/') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item {{ \Request::is('about-us') ? 'active' : '' }}">
                                <a class="nav-link" href="about-us">About</a>
                            </li>
                            <li class="nav-item {{ \Request::is('products') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('products') }}">Shop</a>
                            </li>
                            <li class="nav-item {{ \Request::is('catalogue') ? 'active' : '' }}">
                                <a class="nav-link" href="assets/files/catalogue.pdf">Catalogue</a>
                            </li>
                            <li class="nav-item {{ \Request::is('contact-us') ? 'active' : '' }}">
                                <a class="nav-link" href="contact-us">Contact Us</a>
                            </li> --}}
                            {!! html_entity_decode($header_code) !!}
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <!-- header -->
    <!-- benar -->
    <!-- benar -->
     @if($page->page_image)
    <section class="shop" style="background-image: url({{$banner_image}});">
    <div class="container">
            <div class="row">
                <h3 class="Shop-text">{{ $page->page_name }}</h3>
                <p class="link-products"> <a href="{{ route('home') }}">Home</a> / <span>{{ $page->page_name }}</span>
                </p>
            </div>
        </div>
    </section>
        @else
        
        @endif    
       
    <section>
        {!! html_entity_decode($page->page_description) !!}
    </section>
    <x-front_footer />
