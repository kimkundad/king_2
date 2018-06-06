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

          <a class="btn btn-primary btn-round " href="{{url('sub_shop/'.$shop_ids)}}" style="color: #FFFFFF;">กลับสู่ Shop</a>
          <br><br>
          <div id="images">

                        <div class="row ">

                            <div class="col-12">
                              <p class="category" style="color: #2c2c2c;">{{$shop_id->name}}</p>
                            </div>
                            @if($img_all)
                            @foreach($img_all as $img_u)
                            <div class="col-4" style="padding-right: 2px; padding-left: 2px;">
                              <a data-toggle="modal" data-target="#myModal-{{$img_u->id}}" >
                              <img src="{{url('admin/assets/gallery_shop/'.$img_u->image)}}" alt="{{$shop_id->name}}" class="img-raised " style="margin-bottom: 4px;">
                              </a>
                            </div>


                            <div class="modal fade" id="myModal-{{$img_u->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header" style="padding-top: 0px;">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="font-size:30px;top: 10px;"> &times;</button>
                                      <br>
                                    </div>
                                    <div class="modal-body">

                                      <img src="{{url('admin/assets/gallery_shop/'.$img_u->image)}}" alt="{{$shop_id->name}}" >
                                      <br>
                                      <div class="fb-comments" data-width="100%" data-href="{{url('album/'.$shop_id->id.'#image/'.$img_u->id)}}" data-numposts="5"></div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            @endforeach
                            @endif


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

<div id="fb-root"></div>
<script>
$(document).ready(function() {
  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.0&appId=203219603796007&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
});</script>


@stop('scripts')
