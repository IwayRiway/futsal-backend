
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Futsal - Backend</title>
    
    @include('includes/style')
    @stack('after-style')

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
      @include('includes/sidebar')
        <!-- main content area start -->
        <div class="main-content">
         @include('includes/header')
         <div class="info" data-flashdata="{{session('info')}}"></div>
         <div class="gagal" data-flashdata="{{session('gagal')}}"></div>
         <div class="sukses" data-flashdata="{{session('sukses')}}"></div>
         <div class="warning" data-flashdata="{{session('warning')}}"></div>

         @include('includes/judul')
         @yield('content')
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    @stack('before-script')
    @include('includes/script')
    @stack('after-script')
</body>

</html>
