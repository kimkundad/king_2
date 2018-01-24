@extends('layouts.template')

@section('content')






<div class="section section-images">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="hero-images-container">
                      <img src="{{asset('/assets/img/hero-image-1.png')}}" alt="">
                  </div>
                  <div class="hero-images-container-1">
                      <img src="{{asset('/assets/img/hero-image-2.png')}}" alt="">
                  </div>
                  <div class="hero-images-container-2">
                      <img src="{{asset('/assets/img/hero-image-3.png')}}" alt="">
                  </div>
              </div>
          </div>
      </div>
  </div>


  <div class="section section-basic">
      <div class="container">
          <h3 class="title">Basic Elements</h3>
          <div id="buttons">
              <h4>Buttons</h4>
              <p class="category">Pick your style</p>
              <div class="row">
                  <div class="col-md-10">
                      <button class="btn btn-primary" type="button">Default</button>
                      <button class="btn btn-primary btn-round" type="button">Round</button>
                      <button class="btn btn-primary btn-round" type="button">
                          <i class="now-ui-icons ui-2_favourite-28"></i> With Icon
                      </button>
                      <button class="btn btn-primary btn-icon btn-round" type="button">
                          <i class="now-ui-icons ui-2_favourite-28"></i>
                      </button>
                      <button class="btn btn-primary btn-simple btn-round" type="button">Simple</button>
                  </div>
              </div>
              <p class="category">Pick your size</p>
              <div class="row">
                  <div class="col-md-10">
                      <button class="btn btn-primary btn-sm">Small</button>
                      <button class="btn btn-primary">Regular</button>
                      <button class="btn btn-primary btn-lg">Large</button>
                  </div>
              </div>
              <p class="category">Pick your color</p>
              <div class="row">
                  <div class="col-md-10">
                      <button class="btn">Default</button>
                      <button class="btn btn-primary">Primary</button>
                      <button class="btn btn-info">Info</button>
                      <button class="btn btn-success">Success</button>
                      <button class="btn btn-warning">Warning</button>
                      <button class="btn btn-danger">Danger</button>
                      <button class="btn btn-neutral">Neutral</button>
                  </div>
              </div>
              <h4>Links</h4>
              <div class="row">
                  <div class="col-md-8">
                      <button class="btn btn-link">Default</button>
                      <button class="btn btn-link btn-primary ">Primary</button>
                      <button class="btn btn-link btn-info">Info</button>
                      <button class="btn btn-link btn-success">Success</button>
                      <button class="btn btn-link btn-warning">Warning</button>
                      <button class="btn btn-link btn-danger">Danger</button>
                  </div>
              </div>
          </div>
          <div id="inputs">
              <h4>Inputs</h4>
              <p class="category">Form Controls</p>
              <div class="row">
                  <div class="col-sm-6 col-lg-3">
                      <div class="form-group">
                          <input type="text" value="" placeholder="Regular" class="form-control" />
                      </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                      <div class="form-group has-success">
                          <input type="text" value="Success" class="form-control form-control-success" />
                      </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                      <div class="form-group has-danger">
                          <input type="email" value="Error Input" class="form-control form-control-danger" />
                      </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                      <div class="input-group">
                          <span class="input-group-addon">
                              <i class="fa fa-user-circle"></i>
                          </span>
                          <input type="text" class="form-control" placeholder="Left Font Awesome Icon">
                      </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Right Nucleo Icon">
                          <span class="input-group-addon">
                              <i class="now-ui-icons users_single-02"></i>
                          </span>
                      </div>
                  </div>
              </div>
          </div>
          <div class="space-70"></div>
          <div class="row" id="checkRadios">
              <div class="col-sm-6 col-lg-3">


              </div>
              <div class="col-sm-6 col-lg-3">


              </div>
          </div>
      </div>
  </div>



@endsection
