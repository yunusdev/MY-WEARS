<!DOCTYPE html>
<html lang="en">
<head>
{{--    acb5f6--}}
    <meta charset="utf-8">
    <title>
        @yield('title') | MY Wears
    </title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="MY WEARS">
    <meta name="keywords" content="MY WEARS, shop, e-commerce, modern, flat style, responsive, online store, business, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="yunusdev">
    <!-- Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon and Apple Icons-->
{{--    <link rel="icon" type="image/x-icon" href="favicon.ico">--}}
{{--    <link rel="icon" type="image/png" href="favicon.png">--}}
{{--    <link rel="apple-touch-icon" href="touch-icon-iphone.png">--}}
{{--    <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad.png">--}}
{{--    <link rel="apple-touch-icon" sizes="180x180" href="touch-icon-iphone-retina.png">--}}
{{--    <link rel="apple-touch-icon" sizes="167x167" href="touch-icon-ipad-retina.png">--}}

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RM16J0MK5F"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-RM16J0MK5F');
    </script>

    <link rel="stylesheet" media="screen" href="{{asset('css/vendor.min.css')}}">
    <link rel="stylesheet" media="screen" href="{{asset('css/base.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

{{--    <link rel="stylesheet" href="{{asset('css/font_awesome.css')}}" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">--}}
    <script src="{{asset('js/modernizr.min.js')}}"></script>
    <link id="mainStyles" rel="stylesheet" media="screen" href="{{asset('css/styles.min.css')}}">
    @yield('styles')
</head>
<!-- Body-->
<body>
    <div id="app">
        <nav-bar raw_url="{{$url}}" raw_user="{{auth()->user()}}"></nav-bar>
        <div class="offcanvas-wrapper">
            @yield('content')
            <user-footer raw_user="{{auth()->user()}}"></user-footer>
        </div>
    </div>
<a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
<div class="site-backdrop"></div>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/vendor.min.js')}}"></script>
    <script src="{{asset('js/scripts.min.js')}}"></script>
</body>
</html>
