@extends('layouts.template')
@section('stylesheet')
<link rel="stylesheet" href="{{url('assets/magnific-popup/magnific-popup.css')}}">
<link href="{{URL::asset('assets/upload_image/css/fileinput.css')}}" rel="stylesheet">
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
.hide{
  display: none;
}
.btn, .navbar .navbar-nav>a.btn {
    font-size: 12px;
  }
  .btn-file{
        margin: 0px 0px;
  }
  .input-group-btn .btn {
    margin: 0px 0px;
}
</style>

  <div class="section " style="padding: 20px 0;">

      <div class="container">


          <div id="images">

                        <div class="row magnific-gallery">

                            <div class="col-12">
                              <p class="category" style="color: #2c2c2c;">สร้าง อัลบั้ม ของคุณ</p>

                              <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                              <div class="form-group">
                                    <input type="text" name="album_name" placeholder="ชื่ออัลบั้ม" class="form-control">
                                    <input type="hidden" name="shop_id" value="{{$shop_id}}" >
                                </div>







            <div class="row">
              <div class="col-md-12" style="padding-right: 15px;">
                            <div class="form-group">
                <label for="exampleInputFile">Image input</label>

                <input type="file" name="img" class="form-control" multiple>

                </div>
                <div class="">
                  <br>
                    <button type="submit" class="btn btn-info btn-fill btn-wd">อัพโหลดรูปภาพ</button>
                </div>

                </div>
                </div>

              </form>














                            </div>




                        </div>
                        <div class="row">
                        </div>
                    </div>




      </div>
  </div>







@endsection

@section('scripts')

<script src="{{URL::asset('assets/upload_image/js/fileinput.js')}}?v1.2"></script>


@stop('scripts')
