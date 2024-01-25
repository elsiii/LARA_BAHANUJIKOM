@php
    //$Reff = new \App\Helpers\Reff; //panggil no static function
    $segment1=request()->segment(1);
    $segment2=request()->segment(2);
    $url=request()->url();
    $namerole=auth()->user()->namerole;
@endphp
<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="sticky">
        <aside class="app-sidebar sidebar-scroll">
            <div class="main-sidebar-header active">
            <a class="desktop-logo logo-light active" href="/"><img src="{{asset('')}}back/img/brand/logo.png" class="main-logo" alt="logo"></a>
                <a class="desktop-logo logo-dark active" href="/"><img src="{{asset('')}}back/img/brand/logo-white.png" class="main-logo" alt="logo"></a>
                <a class="logo-icon mobile-logo icon-light active" href="/"><img src="{{asset('')}}back/img/brand/favicon.png" alt="logo"></a>
                <a class="logo-icon mobile-logo icon-dark active" href="/"><img src="{{asset('')}}back/img/brand/favicon-white.png" alt="logo"></a>
            </div>
            <div class="main-sidemenu">
                <div class="main-sidebar-loggedin">
                    <div class="app-sidebar__user">
                        <div class="dropdown user-pro-body text-center">
                            <div class="user-pic">
                                <img src="{{asset('')}}back/img/faces/6.jpg" alt="user-img" class="rounded-circle mCS_img_loaded">
                            </div>
                            <div class="user-info">
                                <h6 class=" mb-0 text-dark">@auth {{ auth()->user()->name }} @endauth</h6>
                                <span class="text-muted app-sidebar__user-name text-sm">@auth {{ auth()->user()->namerole }} @endauth</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-navs">
                    <ul class="nav  nav-pills-circle d-flex justify-content-center">
                        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Settings" aria-describedby="tooltip365540">
                            <a href="javascript:void(0)" class="nav-link text-center m-2">
                                <i class="fe fe-settings"></i>
                            </a>
                        </li>
                        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Log Login" aria-describedby="tooltip143427">
                            <a href="javascript:void(0)" class="nav-link text-center m-2">
                                <i class="fe fe-clock"></i>
                            </a>
                        </li> 
                        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit Profile">
                            <a href="javascript:void(0)" class="nav-link text-center m-2">
                                <i class="fe fe-user"></i>
                            </a>
                        </li>
                        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Logout">
                            <a href="javascript:void(0)" class="nav-link text-center m-2">
                                <i class="fe fe-power"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
                <ul class="side-menu ">
                    <li class="slide @if($segment1=='dashboard') is-expanded @endif">
                        <a class="side-menu__item @if($segment1=='dashboard') active @endif" href="{{ route('dashboard') }}" title="Dashboard"><i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">Dashboard</span></a>
                    </li>
                    <li class="slide @if(in_array(''.$segment1.'',array('data_barang'))) is-expanded @endif">
                        <a class="side-menu__item @if(in_array(''.$segment1.'',array('data_barang'))) active @endif" href="{{ route('data_barang') }}" title="Data Barang"><i class="side-menu__icon fe fe-fe fe-box"></i><span class="side-menu__label">Data Barang</span></a>
                    </li>
                    @if($namerole=='administrator')
                    <li class="slide @if(in_array(''.$segment1.'',array('data_pengguna'))) is-expanded @endif">
                        <a class="side-menu__item" data-bs-toggle="slide"   href="javascript:void(0);"><i class="side-menu__icon fe fe-settings"></i><span class="side-menu__label">Sistem</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu @if(in_array(''.$segment1.'',array('data_pengguna'))) open @endif">
                            <li class="side-menu__label1"><a href="javascript:void(0);">Sistem</a></li>
                            <li><a class="slide-item @if(in_array(''.$segment1.'',array('data_pengguna'))) active @endif" href="{{ route('data_pengguna') }}" title="Pengguna">Pengguna</a></li>
                        </ul>
                    </li>
                    @endif
                    
                </ul>

                <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
            </div>
        </aside>
    </div>
    <!-- main-sidebar -->