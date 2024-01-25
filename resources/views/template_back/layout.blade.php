<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>

    <!-- Title -->
    <title>@yield('title','Index')</title>

    <!--- Favicon --->
    <link rel="icon" href="{{ asset('') }}back/img/brand/favicon.png" type="image/x-icon" />

    <!-- Bootstrap css -->
	<link href="{{ asset('') }}back/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" id="style"/>

    <!--- Style css --->
    <link href="{{ asset('') }}back/css/style.css" rel="stylesheet">
    <link href="{{ asset('') }}back/css/plugins.css" rel="stylesheet">

    <!--- Icons css --->
    <link href="{{ asset('') }}back/css/icons.css" rel="stylesheet">

    <!--- Animations css --->
    <link href="{{ asset('') }}back/css/animate.css" rel="stylesheet">

	@stack('costum-css')
	<!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}plugin/datatables/css.css" />
	<!---datepicker-->
	<link href="{{ asset('') }}plugin/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
	<link href="{{ asset('') }}plugin/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" />
    
    <!--- JQuery min js --->
	<script src="{{ asset('') }}plugin/jquery-3.6.0.js"></script>
	<script src="{{ asset('') }}back/plugins/jquery/jquery.min.js"></script>
	<!-- DataTables  -->
    <script type="text/javascript" src="{{ asset('') }}plugin/datatables/pdf.js"></script>
    <script type="text/javascript" src="{{ asset('') }}plugin/datatables/font.js"></script>
    <script type="text/javascript" src="{{ asset('') }}plugin/datatables/datatables.js"></script>
    <script type="text/javascript" src="{{ asset('') }}plugin/datatables/js/dataTables.checkboxes.min.js"></script>
	<!---select2-->
	<script src="{{ asset('') }}plugin/select2/select2.full.min.js"></script>
	<!---datepicker-->
	<script src="{{ asset('') }}plugin/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="{{ asset('') }}plugin/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!---Highchart-->
	<script src="{{ asset('') }}plugin/Highcharts-11.3.0/code/highcharts.js"></script>
	<script src="{{ asset('') }}plugin/Highcharts-11.3.0/code/modules/series-label.js"></script>
	<script src="{{ asset('') }}plugin/Highcharts-11.3.0/code/modules/exporting.js"></script>
	<script src="{{ asset('') }}plugin/Highcharts-11.3.0/code/modules/offline-exporting.js"></script>
	<script src="{{ asset('') }}plugin/Highcharts-11.3.0/code/modules/export-data.js"></script>
</head>

<body class="main-body app sidebar-mini ltr">

    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ asset('') }}back/img/loaders/loader-4.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    <!-- Page -->
    <div class="page custom-index">
        @include('template_back.navheader')
        @include('template_back.sidebar') 

        <!-- main-content -->
		<div class="main-content app-content">
            <!-- container -->
            <div class="main-container container-fluid">
				<div id="content">
					@yield('content')
				</div>
            </div>
            <!-- /container -->
        </div>
        <!-- /main-content -->
        
        <!--Sidebar-right-->
		<div class="sidebar sidebar-right sidebar-animate">
			<div class="panel panel-primary card mb-0">
				<div class="panel-body tabs-menu-body p-0 border-0">
					<ul class="Date-time">
						<li class="time">
							<h1 class="animated ">21:00</h1>
							<p class="animated ">Sat,October 1st 2029</p>
						</li>
					</ul>
					<div class="card-body latest-tasks">
						<h3 class="events-title"><span>Events For Week </span></h3>
						<div class="event">
							<div class="Day">Monday 20 Jan</div>
							<a   href="javascript:void(0);">No Events Today</a>
						</div>
						<div class="event">
							<div class="Day">Tuesday 21 Jan</div>
							<a   href="javascript:void(0);">No Events Today</a>
						</div>
						<div class="event">
							<div class="Day">Wednessday 22 Jan</div>
							<div class="tasks">
								<div class=" task-line primary">
									<a   href="javascript:void(0);" class="label">
										XML Import &amp; Export
									</a>
									<div class="time">
										12:00 PM
									</div>
								</div>
								<div class="checkbox">
									<label class="check-box">
										<label class="ckbox"><input checked="" type="checkbox"><span></span></label>
									</label>
								</div>
							</div>
							<div class="tasks">
								<div class="task-line danger">
									<a   href="javascript:void(0);" class="label">
										Connect API to pages
									</a>
									<div class="time">
										08:00 AM
									</div>
								</div>
								<div class="checkbox">
									<label class="check-box">
										<label class="ckbox"><input type="checkbox"><span></span></label>
									</label>
								</div>
							</div>
						</div>
						<div class="event">
							<div class="Day">Thursday 23 Jan</div>
							<div class="tasks">
								<div class="task-line success">
									<a   href="javascript:void(0);" class="label">
										Create Wireframes
									</a>
									<div class="time">
										06:20 PM
									</div>
								</div>
								<div class="checkbox">
									<label class="check-box">
										<label class="ckbox"><input type="checkbox"><span></span></label>
									</label>
								</div>
							</div>
						</div>
						<div class="event">
							<div class="Day">Friday 24 Jan</div>
							<div class="tasks">
								<div class="task-line warning">
									<a   href="javascript:void(0);" class="label">
										Test new features in tablets
									</a>
									<div class="time">
										02: 00 PM
									</div>
								</div>
								<div class="checkbox">
									<label class="check-box">
										<label class="ckbox"><input type="checkbox"><span></span></label>
									</label>
								</div>
							</div>
							<div class="tasks">
								<div class="task-line teal">
									<a   href="javascript:void(0);" class="label">
										Design Evommerce
									</a>
									<div class="time">
										10: 00 PM
									</div>
								</div>
								<div class="checkbox">
									<label class="check-box">
										<label class="ckbox"><input type="checkbox"><span></span></label>
									</label>
								</div>
							</div>
							<div class="tasks mb-0">
								<div class="task-line purple">
									<a   href="javascript:void(0);" class="label">
										Fix Validation Issues
									</a>
									<div class="time">
										12: 00 AM
									</div>
								</div>
								<div class="checkbox">
									<label class="check-box">
										<label class="ckbox"><input type="checkbox"><span></span></label>
									</label>
								</div>
							</div>
						</div>
						<div class="d-flex pagination wd-100p">
							<a   href="javascript:void(0);">Previous</a>
							<a   href="javascript:void(0);" class="ms-auto">Next</a>
						</div>
					</div>
					<div class="card-body border-top border-bottom">
						<div class="row">
							<div class="col-4 text-center">
								<a class="" href=""><i class="dropdown-icon mdi  mdi-message-outline fs-20 m-0 leading-tight"></i></a>
								<div>Inbox</div>
							</div>
							<div class="col-4 text-center">
								<a class="" href=""><i class="dropdown-icon mdi mdi-tune fs-20 m-0 leading-tight"></i></a>
								<div>Settings</div>
							</div>
							<div class="col-4 text-center">
								<a class="" href=""><i class="dropdown-icon mdi mdi-logout-variant fs-20 m-0 leading-tight"></i></a>
								<div>Sign out</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/Sidebar-right-->
        <!-- Footer opened -->
		<div class="main-footer ht-45">
			<div class="container-fluid pd-t-0-f ht-100p">
			<span> Copyright © 2022 <a href="javascript:void(0);" class="text-primary">Azira</a>. Designed with <span class="fa fa-heart text-danger"></span> by <a href="javascript:void(0);"> Spruko </a> All rights reserved.</span>
			</div>
		</div>
		<!-- Footer closed -->
    </div>
    <!-- page closed -->

    <!--- Back-to-top --->
    <a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

    
    <!--- Bootstrap Bundle js --->
    <script src="{{ asset('') }}back/plugins/bootstrap/popper.min.js"></script>
    <script src="{{ asset('') }}back/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!--- Ionicons js --->
    <script src="{{ asset('') }}back/plugins/ionicons/ionicons.js"></script>

    <!--- Chart bundle min js --->
    <script src="{{ asset('') }}back/plugins/chart.js/Chart.bundle.min.js"></script>

    <!--- JQuery sparkline js --->
    <script src="{{ asset('') }}back/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!--- Eva-icons js --->
    <script src="{{ asset('') }}back/js/eva-icons.min.js"></script>

    <!--- Moment js --->
    <script src="{{ asset('') }}back/plugins/moment/moment.js"></script>

    <!--- Perfect-scrollbar js --->
    <script src="{{ asset('') }}back/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('') }}back/plugins/perfect-scrollbar/p-scroll.js"></script>

    <!--- Sidebar js --->
    <script src="{{ asset('') }}back/plugins/side-menu/sidemenu.js"></script>

    <!--- sticky js --->
    <script src="{{ asset('') }}back/js/sticky.js"></script>

    <!-- right-sidebar js -->
    <script src="{{ asset('') }}back/plugins/sidebar/sidebar.js"></script>
    <script src="{{ asset('') }}back/plugins/sidebar/sidebar-custom.js"></script>

    <!-- Morris js -->
    <script src="{{ asset('') }}back/plugins/raphael/raphael.min.js"></script>
    <script src="{{ asset('') }}back/plugins/morris.js/morris.min.js"></script>

	<!--- Internal Sweet-Alert js --->
	<script src="{{ asset('') }}back/plugins/sweet-alert/sweetalert.min.js"></script>
	<script src="{{ asset('') }}back/plugins/sweet-alert/jquery.sweet-alert.js"></script>

    <!--- Scripts js --->
    <script src="{{ asset('') }}back/js/script.js"></script>

    <!--- Index js --->
    <script src="{{ asset('') }}back/js/index.js"></script>

    <!--themecolor js-->
    <script src="{{ asset('') }}back/js/themecolor.js"></script>

    <!--swither-styles js-->
    <script src="{{ asset('') }}back/js/swither-styles.js"></script>

    <!--- Custom js --->
    <script src="{{ asset('') }}back/js/custom.js"></script>


    @stack('costum-script')

</body>
</html>