<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>{{ $pageTitle }} - {{ generalSetting()->site_name }}</title>
    <link type="image/x-icon" href="https://script.viserlab.com/binaryecom/assets/images/logoIcon/favicon.png"
        rel="shortcut icon" />
    <link rel="stylesheet" href="{{ asset('assets/global/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/global/css/line-awesome.css') }}" />
    <link href="{{ asset('assets/admin/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/main.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>


<body>

    @yield('main-content')

    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app.js') }}"></script>
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>

</html>
