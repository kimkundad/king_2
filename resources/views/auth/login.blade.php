@extends('layouts.template-login')
<?php
if(Auth::check()){
  return Redirect::to('dashboard');
}else{

}
 ?>

@section('content')




<div class="page-header" filter-color="orange">

    <div class="page-header-image" style="background-image:url({{asset('/assets/img/login.jpg')}})"></div>


    <div class="container">
        <div class="col-md-4 content-center">
            <div class="card card-login card-plain">

                <form class="form" method="POST" action="{{ url('/login') }}">
                  {{ csrf_field() }}
                    <div class="header header-primary text-center">
                        <div class="logo-container">
                            <img src="{{asset('/assets/img/logo/linchak-logo.png')}}" alt=""  >
                        </div>
                    </div>
                    <div class="content">

                        <div class="input-group form-group-no-border input-lg has-danger">
                            <span class="input-group-addon">
                                <i class="now-ui-icons ui-1_email-85"></i>
                            </span>
                            <input type="text" class="form-control form-control-danger" placeholder="Emain Address..." name="email" value="{{ old('email') }}">
                        </div>
                        <div class="input-group form-group-no-border input-lg" style="margin-bottom: 20px;">
                            <span class="input-group-addon">
                                <i class="now-ui-icons ui-1_lock-circle-open"></i>
                            </span>
                            <input type="password" placeholder="Password..." name="password" class="form-control" />
                        </div>
                        @if ($errors->has('email'))
                        <p class="text-danger" style="font-size:11px; margin-bottom: 0px;">
                            {{ $errors->first('email') }}
                        </p>
                        @endif

                        @if ($errors->has('password'))
                        <p class="text-danger" style="font-size:11px; margin-bottom: 0px;">
                            {{ $errors->first('password') }}
                        </p>
                        @endif



                    </div>
                    <div class="footer text-center" style="padding-top:20px">

                        <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">Get Started</button>
                        <a href="#pablo" style="margin-top:10px;" class="btn btn-facebook btn-round btn-lg btn-block"><i class="fa fa-facebook"></i> Connect with Facebook</a>
                    </div>
                    <div class="pull-left">
                        <h6>
                            <a href="{{url('register')}}" class="link">Create Account</a>
                        </h6>
                    </div>
                    <div class="pull-right">
                        <h6>
                            <a href="#pablo" class="link">Need Help?</a>
                        </h6>
                    </div>
                </form>



            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <nav>
                <ul>
                    <li>
                        <a href="#">
                            Creative Tim
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            MIT License
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, Designed by
                <a href="#" target="_blank">Invision</a>. Coded by
                <a href="#" target="_blank">Creative Tim</a>.
            </div>
        </div>
    </footer>



</div>




@endsection
