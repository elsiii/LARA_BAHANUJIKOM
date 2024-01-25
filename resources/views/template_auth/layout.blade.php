<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>

    <!-- Title -->
    <title>@yield('title','Login')</title>

    <!--- Favicon --->
	<link rel="icon" href="{{ asset('') }}back/img/brand/favicon.png" type="image/x-icon"/>

    <!-- Bootstrap css -->
    <link href="{{ asset('') }}back/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" id="style"/>

    <!--- Icons css --->
    <link href="{{ asset('') }}back/css/icons.css" rel="stylesheet">

    <!--- Style css --->
    <link href="{{ asset('') }}back/css/style.css" rel="stylesheet">
    <link href="{{ asset('') }}back/css/plugins.css" rel="stylesheet">

    <!--- Animations css --->
    <link href="{{ asset('') }}back/css/animate.css" rel="stylesheet">
</head>

<body class="main-body bg-light login-img">

    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ asset('') }}back/img/loaders/loader-4.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->


    @yield('content')
    

    <!--- JQuery min js --->
    <script src="{{ asset('') }}back/plugins/jquery/jquery.min.js"></script>

    <!--- Bootstrap Bundle js --->
    <script src="{{ asset('') }}back/plugins/bootstrap/popper.min.js"></script>
    <script src="{{ asset('') }}back/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!--- Ionicons js --->
    <script src="{{ asset('') }}back/plugins/ionicons/ionicons.js"></script>

    <!--- Moment js --->
    <script src="{{ asset('') }}back/plugins/moment/moment.js"></script>

    <!--- Eva-icons js --->
    <script src="{{ asset('') }}back/js/eva-icons.min.js"></script>

    <!--themecolor js-->
    <script src="{{ asset('') }}back/js/themecolor.js"></script>

    <!--- Custom js --->
    <script src="{{ asset('') }}back/js/custom.js"></script>
</body>

</html>