<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('/assets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Now Ui Kit by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    @include('layouts.inc-stylesheet')
	  @yield('stylesheet')
</head>

<body class="index-page sidebar-collapse" >




    <!-- Navbar    -->
@include('layouts.navbar-expand')
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="page-header clear-filter" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image: url('{{asset('/assets/img/header.jpg')}}');">
            </div>
            <div class="container">
                <div class="content-center brand">
                    <img class="n-logo" src="{{asset('/assets/img/now-logo.png')}}" alt="">
                    <h1 class="h1-seo">Now UI Kit.</h1>
                    <h3>A beautiful Bootstrap 4 UI kit. Yours free.</h3>
                </div>
                <h6 class="category category-absolute">Designed by
                    <a href="#" >
                        <img src="{{asset('/assets/img/invision-white-slim.png')}}" class="invision-logo" />
                    </a>. Coded by
                    <a href="#" >
                        <img src="{{asset('/assets/img/creative-tim-white-slim2.png')}}" class="creative-tim-logo" />
                    </a>.</h6>
            </div>
        </div>




        <div class="main">


          @yield('content')





        </div>




    </div>




</body>
<!--   Core JS Files   -->
@include('layouts.inc-scripts')
@yield('scripts')



</html>