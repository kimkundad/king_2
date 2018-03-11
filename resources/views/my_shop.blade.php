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
  color: #848282;
  font-size: 0.9em;
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
.text-muted {
    font-size: 12px;
}
.author {
    text-align: center;

}
.table td, .table th {
    padding: .45rem;
}
a.ab {
      text-decoration: none;
}
.document-subtitle {
  margin-bottom: 0.5rem;
}

.document-subtitle i {
  color: #18ce0f;
}
.badge {
    border-radius: 8px;
    padding: 5px 8px;
    text-transform: uppercase;
    font-size: 0.8em;
    line-height: 12px;
    background-color: transparent;
    border: 1px solid;
    margin-bottom: 5px;
    margin-top: 5px;
    border-radius: 0.875rem;
}
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1rem;
}
.title1 {
    color: #212121;
    display: block;
    font-size: 16px;
    line-height: 18px;
    max-height: 36px;
    min-height: 18px;
    overflow: hidden;
    text-decoration: none;
    position: relative;
    white-space: nowrap;
}
.display-price {
    color: #689f38;
}
.display-price{
    background: #fff;
    cursor: pointer;
    display: inline-block;
    font-size: 13px;
    font-weight: 400;
    line-height: 17px;
    padding-left: 2px;
    position: relative;
    text-align: right;
    text-transform: uppercase;
}
</style>
<?php
function DateThai($strDate)
{
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strHour= date("H",strtotime($strDate));
$strMinute= date("i",strtotime($strDate));
$strSeconds= date("s",strtotime($strDate));
$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$strMonthThai=$strMonthCut[$strMonth];
return "$strDay $strMonthThai $strYear";
}
 ?>



  <div class="section section-tabs" style="padding: 20px 0;">

      <div class="container">


          <div id="images" class="col-md-10 ml-auto mr-auto">


            <h5>Shop ของฉัน</h5>
            <hr>
              <div class="row collections">




                <div class="col-6 col-md-3">
                  <a class="example-image-link" href="{{url('')}}" >
                  <div class="card">
                    <div class="card-body">
                      <img src="https://lh3.googleusercontent.com/lwr6G_ATC66LavAnNEcg8sRSoX-z8v3d97hrCEL8DOkQOmy82tUmcVqBhVCuOvJfAQ=w170-rw" alt="" class=" mar-bot ">
                      <h6 class="title1">BNK48 Jigsaw</h6>
                      <span class="display-price">เครื่องไฟฟ้า</span>
                    </div>
                  </div>
                  </a>
                </div>


              </div>

                    </div>




      </div>
  </div>












@endsection

@section('scripts')
<script src="{{url('assets/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{url('admin/assets/js/bootstrap-notify.js')}}"></script>

@if ($message = Session::get('success_stock'))
<script type="text/javascript">
type = ['success'];
$.notify({
    icon: "ti-gift",
    message: "ทำการเพิ่มข้อมูล สำเร็จเรียบร้อย"

  },{
      type: type[0],
      timer: 2000,
      placement: {
          from: 'top',
          align: 'right'
      }
  });
</script>
@endif

@if ($message = Session::get('error_stock'))
<script type="text/javascript">
type = ['danger'];

$.notify({
    icon: "ti-face-sad",
    message: "จำนวนสินค้าของคุณไม่เพียงพอ ต่อการทำรายการ"

  },{
      type: type[0],
      timer: 2000,
      placement: {
          from: 'top',
          align: 'right'
      }
  });
</script>

@endif







@stop('scripts')
