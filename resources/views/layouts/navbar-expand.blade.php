<!-- Navbar -->


    @if($template == 1)
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
    @else
    <nav class="navbar navbar-expand-lg bg-primary fixed-top" >
    @endif
      <div class="container">
          <div class="navbar-translate">
              <a class="navbar-brand" href="{{url('home')}}" rel="tooltip" title="Designed by Invision. Coded by Creative Tim" data-placement="bottom" >
                APP LinChak
              </a>
              <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
              </button>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="./assets/img/blurred-image-1.jpg">
              <ul class="navbar-nav">


                <!--  <li class="nav-item">
                      <a class="nav-link" >
                          <i class="now-ui-icons arrows-1_cloud-download-93"></i>
                          <p>Download</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="" >
                          <i class="now-ui-icons files_paper"></i>
                          <p>Components</p>
                      </a>
                  </li> -->
                  <li class="nav-item">
                      <a class="nav-link btn btn-neutral" href="{{url('admin/dashboard')}}">
                          <i class="now-ui-icons design_app"></i>
                          <p>Administration</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" rel="tooltip" title="Shop ของฉัน" data-placement="bottom" >
                          <i class="now-ui-icons shopping_shop"></i>
                          <p>Shop</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" rel="tooltip" title="สินค้าของฉัน" data-placement="bottom" >
                          <i class="now-ui-icons objects_spaceship"></i>
                          <p>Product</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" href="{{url('logout')}}" >
                          <i class="now-ui-icons ui-1_lock-circle-open"></i>
                          <p>Sign out</p>
                      </a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
  <!-- End Navbar -->
