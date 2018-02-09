@extends('layouts.template')

@section('content')


<style>
.mar-bot{
  margin-bottom: 20px;
}
</style>

  <div class="section section-basic">
    <div class="space-50"></div>
      <div class="container">
          <h3 class="title">Basic Elements</h3>

          <div id="images">

                        <div class="row">
                            <div class="col-6 col-md-3">
                                <img src="{{url('assets/img/RUOK__Twitter_400x400_V1-400x400.png')}}" alt="Rounded Image" class="rounded mar-bot">
                            </div>
                            <div class="col-6 col-md-3">
                                <img src="{{url('assets/img/logo-of-adidas.jpg')}}" alt="Rounded Image" class="rounded mar-bot">
                            </div>
                            <div class="col-6 col-md-3">
                                <img src="{{url('assets/img/mcdonalds.png')}}" alt="Rounded Image" class="rounded mar-bot">
                            </div>
                            <div class="col-6 col-md-3">
                                <img src="{{url('assets/img/cnn-logo.png')}}" alt="Rounded Image" class="rounded mar-bot">
                            </div>
                            <div class="col-6 col-md-3">
                                <img src="{{url('assets/img/logo-of-adidas.jpg')}}" alt="Rounded Image" class="rounded mar-bot">
                            </div>
                            <div class="col-6 col-md-3">
                                <img src="{{url('assets/img/cnn-logo.png')}}" alt="Rounded Image" class="rounded mar-bot">
                            </div>
                            <div class="col-6 col-md-3">
                                <img src="{{url('assets/img/RUOK__Twitter_400x400_V1-400x400.png')}}" alt="Rounded Image" class="rounded mar-bot">
                            </div>
                            <div class="col-6 col-md-3">
                                <img src="{{url('assets/img/logo-of-adidas.jpg')}}" alt="Rounded Image" class="rounded mar-bot">
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
