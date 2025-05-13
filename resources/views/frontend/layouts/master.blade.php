<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ __($headTitle) }}</title>
    <link type="image/x-icon" href="https://script.viserlab.com/binaryecom/assets/images/logoIcon/favicon.png"
        rel="shortcut icon" />
    <link href="https://script.viserlab.com/binaryecom/assets/images/logoIcon/logo.png" rel="apple-touch-icon" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/line-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/custom.css') }}" />
</head>

<body>

    @yield('main-content')

    <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/select2.min..js') }}"></script>
    <script src="{{ asset('assets/frontend/js/owl.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/viewport.jquery.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
</body>

</html>
