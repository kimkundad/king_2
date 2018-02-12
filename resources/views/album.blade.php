@extends('layouts.template')
@section('stylesheet')
<link rel="stylesheet" href="{{url('assets/magnific-popup/magnific-popup.css')}}">
@stop('stylesheet')
@section('content')


<style>
.mar-bot{
  margin-bottom: 20px;
}
.avatar {

    overflow: hidden;

    margin-right: 5px;
}
.category-1{
  margin-bottom: 5px;
color: #17a2b8;
font-size: 0.9em;
font-weight: 500;
}
.h5-set{
      font-weight: bold;
  color: #9A9A9A;
  font-size: 1.1em;
  margin-bottom: 0px;
  margin-top: 5px;
}
.table td, .table th {
    padding: .6rem;

}
.profile-page .gallery {
    margin-top: 45px;
    padding-bottom: 50px;
}
.img-circle {
    border-radius: 50%;
}
.avatar2 {
    width: 30px;
    height: 30px;
    overflow: hidden;
    border-radius: 50%;
    margin-right: 5px;
}
</style>

  <div class="section section-tabs" style="padding: 20px 0;">

      <div class="container">


          <div id="images">

                        <div class="row magnific-gallery">

                            <div class="col-12">
                              <p class="category" style="color: #2c2c2c;">Tabs with Icons on Card</p>
                            </div>
                            <div class="col-6">
                              <a class="example-image-link" href="{{url('assets/img/bg8.jpg')}}" >
                              <img src="{{url('assets/img/bg8.jpg')}}" alt="" class="img-raised mar-bot ">
                              </a>
                            </div>
                            <div class="col-6">
                              <a class="example-image-link" href="{{url('assets/img/bg8.jpg')}}" >
                              <img src="{{url('assets/img/bg8.jpg')}}" alt="" class="img-raised mar-bot ">
                              </a>
                            </div>
                            <div class="col-6">
                              <a class="example-image-link" href="{{url('assets/img/bg8.jpg')}}" >
                              <img src="{{url('assets/img/bg8.jpg')}}" alt="" class="img-raised mar-bot ">
                              </a>
                            </div>
                            <div class="col-6">
                              <a class="example-image-link" href="{{url('assets/img/bg8.jpg')}}" >
                              <img src="{{url('assets/img/bg8.jpg')}}" alt="" class="img-raised mar-bot ">
                              </a>
                            </div>


                        </div>
                        <div class="row">
                        </div>
                    </div>




      </div>
  </div>







@endsection

@section('scripts')
<script src="{{url('assets/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script>
$(document).ready(function() {
  $('.magnific-gallery').each(function() {
$(this).magnificPopup({
    delegate: 'a',
    type: 'image',
    gallery:{enabled:true}
});
});
});
</script>



@stop('scripts')