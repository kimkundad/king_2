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
                <form class="form" method="" action="">
                    <div class="header header-primary text-center">
                        <div class="logo-container" style="margin-bottom: 20px;">
                            <img src="{{asset('/assets/img/logo/linchak-logo.png')}}" alt=""  >
                        </div>
                    </div>
                    <div class="content">
                      <div class="input-group form-group-no-border input-lg">
                          <span class="input-group-addon">
                              <i class="now-ui-icons users_single-02"></i>
                          </span>
                          <input type="text" class="form-control" placeholder="UserName...">
                      </div>
                        <div class="input-group form-group-no-border input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons ui-1_email-85"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Emain Address...">
                        </div>


                        <div class="input-group form-group-no-border input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons ui-1_lock-circle-open"></i>
                            </span>
                            <input type="password" placeholder="Password..." class="form-control" />
                        </div>

                        <div class="input-group form-group-no-border input-lg" style="margin-bottom: 0px;">
                            <span class="input-group-addon">
                                <i class="now-ui-icons ui-1_lock-circle-open"></i>
                            </span>
                            <input type="password" placeholder="Confirm Password..." class="form-control" />
                        </div>
                    </div>
                    <div class="footer text-center" style="padding-top:15px">
                        <a href="#pablo" class="btn btn-primary btn-round btn-lg btn-block">Get Started</a>

                        <a href="#pablo" style="margin-top:10px;" class="btn btn-facebook btn-round btn-lg btn-block"><i class="fa fa-facebook"></i> Connect with Facebook</a>
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
