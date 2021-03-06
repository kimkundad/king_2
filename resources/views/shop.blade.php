@extends('layouts.template')

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
  font-size: 1em;
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
.table td, .table th {
    padding: .5rem;
}
.document-subtitle {
    color: #616161;
    display: inline-block;

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

                        <div class="row">
                            <div class="col-4 col-md-3">
                              <div class="avatar">
                                <img src="{{url('admin/assets/product/'.$brander->branders_image)}}" alt="{{$brander->branders_name}}" class="rounded ">
                              </div>

                            </div>
                            <div class="col-8 col-md-9" style="padding-left: 1px;">
                              <h6 style="font-size: 1.2em;">{{$brander->branders_name}}</h6>

                              <div class="button-container" style="    margin-top: 12px;">
                                  <a href="#button" class="btn btn-primary btn-round btn-sm"> ร่วมใช้งาน </a>
                                  <a href="#button" class="btn btn-default btn-round btn-sm btn-icon" rel="tooltip" title="" data-original-title="Follow me on Twitter">
                                      <i class="fa fa-twitter"></i>
                                  </a>
                                  <a href="#button" class="btn btn-default btn-round btn-sm btn-icon" rel="tooltip" title="" data-original-title="Follow me on Instagram">
                                      <i class="fa fa-instagram"></i>
                                  </a>
                              </div>

                              <div class="hidden-sm hidden-xs">
                                <p class="document-subtitle" style="margin-top: 10px;"><b>กลุ่มสินค้า : {{$brander->branders_group}}</b> , ร้านค้าประเภท : {{$brander->branders_type}} </p>
                              </div>



                            </div>

                        </div>
                        <div class="row">
                        </div>
                    </div>




      </div>
  </div>



  <div class="section section-basic visible-sm visible-xs" style="padding-bottom: 0px;">
                <div class="container">

  <br>





                  <div class="row">

                    <div class="col-md-10 ml-auto mr-auto">

                      <h6>ข้อมูลของ {{$brander->branders_name}}</h6>
                      <table class="table">

                        <tbody>
                          <tr>
                            <th scope="row">
                              <h5 class="h5-set">ชื่อ Account</h5>
                              <p class="category-1">{{$brander->branders_name}}</p>
                            </th>
                          </tr>

                          <tr>
                            <th scope="row">
                              <h5 class="h5-set">กลุ่มสินค้า</h5>
                              <p class="category-1">{{$brander->branders_group}}</p>
                            </th>
                          </tr>

                        </tbody>
                        </table>
                    </div>






                  </div>










                </div>
            </div>










                        <div class="section section-basic " style="padding-bottom: 15px;">
                                      <div class="container">









                                        <br>


                                        <div class="row">

                                          <div class="col-md-11 ml-auto mr-auto">

                                            <h6>Shop ที่เกี่ยวข้าง</h6>
                                            <hr>

                                            <div class="row collections">
                                                      @if($shop)
                                                  @foreach($shop as $u)
                                                        <div class="col-6 col-md-3" style="padding-right: 2px; padding-left: 2px;">
                                                          <a href="{{url('sub_shop/'.$u->id)}}">
                                                            <p class="text-muted" style="margin-bottom: 5px; font-size: 13px; font-weight: 600;">{{$u->shop_name}}</p>

                                                            <img src="{{url('admin/assets/blog/'.$u->image_shop)}}" alt="{{$u->shop_name}}" class=" mar-bot">
                                                          </a>

                                                        </div>

                                                        @endforeach
                                                  @endif

                                                  </div>

                                                  <br>
                                              <hr>


                                              <div class="row hidden-sm hidden-xs">

                                                <div class="col-md-8 ml-auto mr-auto" style="padding-right: 0px; padding-left: 0px;">
                                                  <div class="text-center">
                                                  <img src="{{url('assets/img/cr-banner_2.jpg')}}" class="img-responsive ">
                                                  <br><br><br>
                                                  </div>
                                                </div>

                                              </div>







                                          </div>



                                          <div class="text-center visible-sm visible-xs">
                                          <img src="{{url('assets/img/cr-banner_2.jpg')}}" class="img-responsive ">
                                          <br>
                                          <br>
                                          </div>
                                          <br>

                                          <hr>





<style>

.short_info {
    position: absolute;
    left: 0;
    bottom: -1px;
    background: url(../img/shadow_tour.png) left bottom repeat-x;
    width: 100%;
    padding: 10px 10px 8px 5px;
    color: #fff;
    font-size: 13px;
}
</style>

                                          <div class="col-md-11 ml-auto mr-auto" style="padding-right: 5px; padding-left: 5px;">

                                            <h6>สินค้า ทั้งหมด</h6>
                                            <hr>

                                              <div class="row collections" style="    margin-right: -5px; margin-left: -5px;">

                                                @if($product)
                                                  @foreach($product as $products)

                                                  <div class="col-6 col-md-3" style="padding-right: 5px; padding-left: 5px;">

                                                    <a href="{{url('product/'.$products->ids)}}" class="ab img-raised">
                                                      <p class="text-muted" style="margin-bottom: 5px; font-size: 12px;">{{$products->product_name}}</p>
                                                      <div style="max-height: 195px; min-height: 195px; overflow: hidden; position: relative;" >
                                                      <img src="{{url('admin/assets/product/'.$products->product_image)}}" alt="" class=" mar-bot" >

                                                    </div>
                                                    </a>

                                                    <br>
                                                  </div>
                                                  @endforeach
                                                @endif

                                              </div>
                                          </div>






                                        </div>










                                      </div>
                                  </div>







@endsection
