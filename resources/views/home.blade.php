@extends('layouts.template')

@section('content')



  <div class="section section-basic">
    <div class="space-50"></div>
      <div class="container">
          <h3 class="title">Basic Elements</h3>

          <div id="images">

                        <div class="row">
                            <div class="col-sm-3 col-xs-6">
                                <p class="category">Image</p>
                                <img src="{{url('assets/img/logo-of-adidas.jpg')}}" alt="Rounded Image" class="rounded">
                                <div class="space-50"></div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <p class="category">Image</p>
                                <img src="{{url('assets/img/logo-of-adidas.jpg')}}" alt="Rounded Image" class="rounded">
                                <div class="space-50"></div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <p class="category">Image</p>
                                <img src="{{url('assets/img/logo-of-adidas.jpg')}}" alt="Rounded Image" class="rounded">
                                <div class="space-50"></div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <p class="category">Image</p>
                                <img src="{{url('assets/img/logo-of-adidas.jpg')}}" alt="Rounded Image" class="rounded">
                                <div class="space-50"></div>
                            </div>
                        </div>
                        <div class="row">
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
