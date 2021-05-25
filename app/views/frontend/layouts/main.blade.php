<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Poly Shop')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{FRONTEND_URL}}img\favicon.png">

    <!-- all css here -->
    <link rel="stylesheet" href="{{FRONTEND_URL}}css\bootstrap.min.css">
    <link rel="stylesheet" href="{{FRONTEND_URL}}css\plugin.css">
    <link rel="stylesheet" href="{{FRONTEND_URL}}css\bundle.css">
    <link rel="stylesheet" href="{{FRONTEND_URL}}css\style.css">
    <link rel="stylesheet" href="{{FRONTEND_URL}}css\responsive.css">
    <script src="{{FRONTEND_URL}}js\vendor\modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- Add your site or application content here -->

    <!--pos page start-->
    <div class="pos_page">
        <div class="container">
            <!--pos page inner-->
            <div class="pos_page_inner">
                <!--header area -->
            
                @include('frontend.layouts.header')
                <!--header end -->

                <!--pos home section-->
                <div class="pos_home_section">
                     @yield('content')
                    <!--pos home section end-->
                </div>

    
                <!--pos page inner end-->
            </div>
        </div>
        <!--pos page end-->

        <!--footer area start-->
    
        @include('frontend.layouts.footer')
        <!--footer area end-->

        <!-- modal area start -->

        <!-- modal area end -->

        <!-- all js here -->

@include('frontend.layouts.script')
@yield('page-script')
       
</body>

</html>