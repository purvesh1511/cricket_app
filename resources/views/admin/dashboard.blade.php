@php
    $title = 'Dashboard';
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
            <!--  Owl carousel -->
            <div class="owl-carousel counter-carousel owl-theme">
             
                <div class="item">
                    <a href="{{route('all-event')}}" class="card border-0 zoom-in bg-light-primary shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="assets/images/menu.png" width="50" height="50"
                                    class="mb-3 mx-auto dashboard-slider-icon" alt="" />
                                <p class="fw-semibold fs-3 text-primary mb-1">Event</p>
                                <h5 class="fw-semibold text-primary mb-0">0</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="card border-0 zoom-in bg-light-info shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="assets/images/sub-category.png" width="50" height="50"
                                    class="mb-3 mx-auto dashboard-slider-icon" alt="" />
                                <p class="fw-semibold fs-3 text-info mb-1">Booking Today</p>
                                <h5 class="fw-semibold text-info mb-0">0</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="card border-0 zoom-in bg-light-warning shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="assets/images/trophy-icon.png" width="50" height="50"
                                    class="mb-3 mx-auto dashboard-slider-icon" alt="" />
                                <p class="fw-semibold fs-3 text-warning mb-1">Income Today</p>
                                <h5 class="fw-semibold text-warning mb-0">0</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="{{route('customers')}}" class="card border-0 zoom-in bg-light-success shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="assets/images/customers.png" width="50" height="50"
                                    class="mb-3 mx-auto dashboard-slider-icon" alt="" />
                                <p class="fw-semibold fs-3 text-success mb-1">Customers</p>
                                <h5 class="fw-semibold text-success mb-0">{{ $customer_count }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="{{route('all-pages')}}" class="card border-0 zoom-in bg-light-info shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="assets/images/web.png" width="50" height="50"
                                    class="mb-3 mx-auto dashboard-slider-icon" alt="" />
                                <p class="fw-semibold fs-3 text-info mb-1">Page</p>
                                <h5 class="fw-semibold text-info mb-0">{{ $page_count }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
        
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <div class="dark-transparent sidebartoggler"></div>
<x-footer />
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/apexcharts.min.js"></script>
<script src="assets/js/dashboard.js"></script>
