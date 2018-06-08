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
    padding: 0.8rem;
}
.title1 {
    color: #212121;
    display: block;
    font-size: 15px;
    line-height: 18px;
    max-height: 36px;
    min-height: 18px;
    overflow: hidden;
    text-decoration: none;
    position: relative;
    white-space: nowrap;
        margin-bottom: .3rem;
}
.display-price {
    color: #689f38;
}
.display-price {
    margin-bottom: 5px;
    float: right;
    background: #fff;
    cursor: pointer;
    display: inline-block;
    font-size: 10px;
    font-weight: 400;
    line-height: 17px;
    padding-left: 2px;
    position: relative;
    text-align: right;
    text-transform: uppercase;
}
.mar-bot {
    margin-bottom: 10px;
}
.thumbnail {
    border-radius: 5px;
    display: block;
    padding: 0px;
}
.thumbnail {
    display: block;
    padding: 0px;
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    -webkit-transition: border .2s ease-in-out;
    -o-transition: border .2s ease-in-out;
    transition: border .2s ease-in-out;
}
.thumbnail a>img, .thumbnail>img {
    border-radius: 5px 5px 0px 0px;
}
.thumbnail .caption {
    padding: 9px;
    color: #333;
}
.descript a {
    color: #000;
    /* text-decoration: none; */
}
.descript {
    /* height: 35px; */
    margin-left: 8px;
    margin-right: 8px;
    margin-top: 6px;
    line-height: 1.2em;
    /* margin-bottom: 12px !important; */
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


            <h5>Product ของฉัน</h5>
            <hr>
              <div class="row collections">


                @if($product)
                  @foreach($product as $products)




                <div class="col-12 col-md-3" style="padding-right: 4px; padding-left: 4px;">

                        <div class="thumbnail a_sd_move">
                          <div style="max-height: 184px; min-height: 184px; overflow: hidden; position: relative;">
                          <a href="{{url('product/'.$products->ids)}}" >
                          <img src="{{url('admin/assets/product/'.$products->product_image)}}" >

                          </a></div>
                          <div class="caption" style="padding: 3px;">
                            <div class="descript bold">
                                <a href="{{url('product/'.$products->ids)}}">{{$products->product_name}}</a>
                            </div>
                            <div class="descript" style="padding-bottom: 5px;color: #777; font-size: 12px;border-bottom: 1px dashed #dff0d8;">
                              จำนวนสินค้า : {{$products->product_sum}}
                            </div>

                            <div class="descript" style="height: 20px;">
                              <span style="color: #e03753; font-size: 12px;"><i class="fa fa-map-marker"></i> shop:{{$products->branders_name}} </span>

                            </div>

                          </div>
                        </div>
                      </div>

                @endforeach
              @endif


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
