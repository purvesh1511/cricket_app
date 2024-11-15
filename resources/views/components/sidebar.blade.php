<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
                <img src="assets/images/logos/favicon.png" width="30" class="mb-2" alt="">
                <span class="h3 ms-2 mt-3">Admin Panel</span>
            </a>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8 text-muted"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
                <!-- =================== -->
                <!-- Dashboard -->
                <!-- =================== -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Dashboard</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                        <i class="fa fa-sticky-note"></i>
                        </span>
                        <span class="hide-menu">Pages</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('add-page') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Add Page</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('all-pages') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">All Pages</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
                
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="fa fa-location-arrow"></i>
                        </span>
                        <span class="hide-menu">News</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('add-achivement') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Add News</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('all-achivement') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">All News</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="fa fa-image"></i>
                        </span>
                        <span class="hide-menu">Media</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('add-media2') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Add Media</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('all-media2') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">All Media</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                        <i class="fa fa-image"></i>
                        </span>
                        <span class="hide-menu">Gallery</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('add-gallery') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Add Gallery</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('all-gallery') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">All Gallery</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                        <i class="fa fa-image"></i>
                        </span>
                        <span class="hide-menu">Gallery Category</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">

                    <li class="sidebar-item">
                            <a href="{{ route('all-gallerycategory') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu"> Gallery Category</span>
                            </a>
                        </li>

                        
                        <li class="sidebar-item">
                            <a href="{{ route('add-gallerycategory') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Add Gallery Category</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="fa fa-id-card-o"></i>
                        </span>
                        <span class="hide-menu">Camp</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('add-event') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Add Camp</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('all-event') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">All Camp</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="fa fa-user"></i>
                        </span>
                        <span class="hide-menu">Customer</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('customers') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Manage Customer</span>
                            </a>
                        </li>
                        
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="fa fa-shopping-cart"></i>
                        </span>
                        <span class="hide-menu">Order</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('orders') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Slot/Lane Order</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('refundorder') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Slot Refund Order</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('event-order') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Event Order</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('event-refundorder') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Refund Event Order</span>
                            </a>
                        </li>
                        
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="fa fa-address-card"></i>
                        </span>
                        <span class="hide-menu">Manual Booking</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('manualbooking') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Manage Booking</span>
                            </a>
                        </li>
                        
                    </ul>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="fa fa-users"></i>
                        </span>
                        <span class="hide-menu">Coach</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('coachs') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Manage Coach</span>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="fa fa-sticky-note"></i>
                        </span>
                        <span class="hide-menu">Master Lane</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('lanes') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu"> Lane</span>
                            </a>
                        </li>
						
						
                        
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <span class="hide-menu">Master Slot</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('slots') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Slot</span>
                            </a>
                        </li>
						
						
                        
                    </ul>
                </li>
				
				
				<li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <span class="hide-menu">Slot Management</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        
						
						<li class="sidebar-item">
                            <a href="{{ route('add-lane-slot') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Assign Slot</span>
                            </a>
                        </li>
						
						<li class="sidebar-item">
                            <a href="{{ route('manage-lane-slot') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu"> Manage Slot</span>
                            </a>
                        </li>
                        
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <span class="hide-menu">Disable Slot Management</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        
						
						<li class="sidebar-item">
                            <a href="{{ route('add-disable-slot') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Assign Disable Slot</span>
                            </a>
                        </li>
						
						<li class="sidebar-item">
                            <a href="{{ route('manage-disable-slot') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu"> Manage Disable Slot</span>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="{{ route('settings') }}" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="ti ti-settings"></i>
                            </span>
                            <span class="hide-menu">Site Settings</span>
                        </div>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Profile</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="{{ route('my-profile') }}" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="ti ti-mood-smile"></i>
                            </span>
                            <span class="hide-menu">My Profile</span>
                        </div>
                    </a>
                    
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="{{ route('admin-change-password') }}" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="ti ti-key"></i>
                            </span>
                            <span class="hide-menu">Change Password</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="{{ route('logout') }}" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="ti ti-logout"></i>
                            </span>
                            <span class="hide-menu">Logout</span>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
            <div class="hstack gap-3">
                <div class="john-img">
                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/profile/user-1.jpg"
                        class="rounded-circle" width="40" height="40" alt="">
                </div>
                <div class="john-title">
                    <span class="fs-2 text-dark">Admin</span>
                </div>
                <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button"
                    aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                    <i class="ti ti-power fs-6"></i>
                </button>
            </div>
        </div>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
