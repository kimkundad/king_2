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

<body class="template-page sidebar-collapse" >




    <!-- Navbar    -->
@include('layouts.navbar-expand')
    <!-- End Navbar -->
    <div class="wrapper">

      @if($template == 1)
      <div class="page-header page-header-small">
          <div class="page-header-image" data-parallax="true" style="background-image: url('{{asset('/assets/img/header.jpg')}}');">
          </div>
          <div class="container">
              <div class="content-center">

                <h3>A beautiful Bootstrap 4 UI kit. Yours free.</h3>
                <h6 class="category category-absolute">Designed by
                  <a href="#" >
                      <img src="./assets/img/invision-white-slim.png" class="invision-logo">
                  </a>. Coded by
                  <a href="#" >
                      <img src="./assets/img/creative-tim-white-slim2.png" class="creative-tim-logo">
                  </a>.</h6>
              </div>
          </div>
      </div>

      @else
      <div class="space-70" style="height: 65px;"></div>
      @endif







        <div class="main">


          @yield('content')



          @include('layouts.footer')

        </div>




    </div>




</body>
<!--   Core JS Files   -->
@include('layouts.inc-scripts')
@yield('scripts')



</html>
