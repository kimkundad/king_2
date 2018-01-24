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

<body class="index-page sidebar-collapse" style="background-image: url('{{asset('/assets/img/Fonds.jpeg')}}'); background-attachment: fixed;">




    <!-- Navbar  -->
@include('layouts.navbar-expand')
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="page-header clear-filter" filter-color="orange">
            <div class="page-header-image" data-parallax="true" >
            </div>
            <div class="container">


              @yield('content')

            </div>
        </div>

    </div>




</body>
<!--   Core JS Files   -->
@include('layouts.inc-scripts')
@yield('scripts')



</html>
