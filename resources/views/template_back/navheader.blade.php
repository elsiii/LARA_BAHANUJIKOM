    <!-- main-header -->
    <div class="main-header side-header sticky nav nav-item bg-primary">
        <div class="container-fluid main-container">
            <div class="main-header-left ">
                <div class="app-sidebar__toggle mobile-toggle" data-bs-toggle="sidebar">
                    <a class="open-toggle"   href="javascript:void(0);"><i class="header-icons" data-eva="menu-outline"></i></a>
                    <a class="close-toggle"   href="javascript:void(0);"><i class="header-icons" data-eva="close-outline"></i></a>
                </div>
                <div class="responsive-logo">
                    <a href="/" class="header-logo"><img src="{{asset('')}}back/img/brand/logo.png" class="logo-11"></a>
                    <a href="/" class="header-logo"><img src="{{asset('')}}back/img/brand/logo-white.png" class="logo-1"></a>
                </div>
              
            </div>
            <button class="navbar-toggler nav-link icon navresponsive-toggler vertical-icon ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
            </button>
            <div class="mb-0 navbar navbar-expand-lg navbar-nav-right responsive-navbar navbar-dark p-0  mg-lg-s-auto">
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <div class="main-header-right">
                        <div class="nav nav-item nav-link" id="bs-example-navbar-collapse-1">
                            <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button type="reset" class="btn btn-default">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <button type="submit" class="btn btn-default nav-link">
                                            <i class="fe fe-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <li class="dropdown nav-item main-layout">
                            <a class="new theme-layout nav-link-bg layout-setting" >
                                <span class="dark-layout"><i class="fe fe-moon"></i></span>
                                <span class="light-layout"><i class="fe fe-sun"></i></span>
                            </a>
                        </li>
                        <div class="nav nav-item  navbar-nav-right mg-lg-s-auto">
                            <div class="nav-item full-screen fullscreen-button">
                                <a class="new nav-link full-screen-link"   href="javascript:void(0);"><i class="fe fe-maximize"></i></span></a>
                            </div>
                            
                            <div class="dropdown main-profile-menu nav nav-item nav-link">
                                <a class="profile-user d-flex" href=""><img src="{{asset('')}}back/img/faces/6.jpg" alt="user-img" class="rounded-circle mCS_img_loaded"><span></span></a>

                                <div class="dropdown-menu">
                                    <div class="main-header-profile header-img">
                                        <div class="main-img-user"><img alt="" src="{{asset('')}}back/img/faces/6.jpg"></div>
                                        <h6>@auth {{ auth()->user()->name }} @endauth</h6>
                                        <span>@auth {{ auth()->user()->namerole }} @endauth</span>

                                    </div>
                                    <!-- <a class="dropdown-item" href=""><i class="far fa-user"></i> My Profile</a>
                                    <a class="dropdown-item" href=""><i class="far fa-clock"></i> Activity Logs</a> -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <div class="row mb-3 px-3"> 
                                            <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Sign Out</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="dropdown main-header-message right-toggle">
                                <!-- <a class="nav-link pe-0" data-bs-toggle="sidebar-right" data-bs-target=".sidebar-right">
                                    <i class="ion ion-md-menu tx-20 bg-transparent"></i>
                                </a> -->
                                <a class="nav-link pe-0">
                                    <i class="ion ion-md-menu tx-20 bg-transparent"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /main-header -->

