<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('title')
    <link href="{{ asset('Shop/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Shop/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Shop/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('Shop/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('Shop/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('Shop/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('Shop/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{ asset('Shop/js/html5shiv.js') }}"></script>
    <script src="{{ asset('aShopper/js/respond.min.js') }}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{ asset('Shop/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png'">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png'">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png'">
</head><!--/head-->
<body>
@include('patials.header')

@yield('content')

@include('patials.footer')

<script src="{{ asset('Shop/js/jquery.js') }}"></script>
<script src="{{ asset('Shop/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('Shop/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('Shop/js/price-range.js') }}"></script>
<script src="{{ asset('Shop/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('Shop/js/main.js') }}"></script>
</body>
</html>
