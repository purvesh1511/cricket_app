<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse"
                    href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
           
        </ul>
       
        <div class="d-block d-lg-none">
            <img src="assets/images/logos/logo.png"
                class="dark-logo" width="100" alt="" />
            <img src="assets/images/logos/logo.png"
                class="light-logo" width="100" alt="" />
        </div>
        <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="p-2">
                <i class="ti ti-dots fs-7"></i>
            </span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-end">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                   
                    
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <?php
                                  $user_id= session('admin');
                                $profile=DB::table('admins')->where('id',$user_id)->first();
                                ?>
                                <div class="user-profile-img">
                                    <img src="{{($profile->image == null) ? 'assets/images/logos/logo.png' : $profile->image}}"
                                        class="rounded-circle" width="35" height="35"
                                        alt="" />
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar>
                                
                               
                                <div class="message-body">
                                    <a href="{{route('my-profile')}}"
                                        class="py-8 px-7 mt-8 d-flex align-items-center">
                                        <span
                                            class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                            <img src="assets/images/icon-account.svg"
                                                alt="" width="24" height="24">
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3">
                                            <h6 class="mb-1 bg-hover-primary fw-semibold"> My Profile
                                            </h6>
                                           
                                        </div>
                                    </a>
                                    
                                    
                                </div>
                                <div class="d-grid py-4 px-7 pt-8">
                                    
                                    <a href="{{ route('logout') }}"
                                        class="btn btn-outline-primary">Log Out</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>