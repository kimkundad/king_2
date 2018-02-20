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


          <div id="images">

                        <div class="row">
                            <div class="col-12">
                              <a class="btn btn-primary btn-round " href="{{url('brander/'.$product->ids)}}" style="color: #FFFFFF;">กลับสู่ shop</a>
                              <br><br>

                              <p class="category" style="color: #2c2c2c;">{{$header}}</p>

                              <div class="author">
                              <img src="{{url('admin/assets/product/'.$product->product_image)}}" alt="{{$product->product_name}}" class="img-raised mar-bot">
                              </div>

                            </div>


                        </div>
                        <div class="row">
                        </div>
                    </div>




      </div>
  </div>



  <div class="section section-basic ">
                <div class="container">









                  <br>





                    <div class="row">
                        <div class="col-md-12">


                        </div>

                        <!-- Tab panes -->
                        <div class="col-md-12">


                        </div>






                    </div>













                </div>
            </div>



            <div class="text-center">
            <img src="{{url('assets/img/app-banner_2.png')}}" class="img-responsive ">
            </div>




            <div class="section section-basic " style="padding-bottom: 150px;">
                          <div class="container">

                            <br>

                            <div class="row">

                              <div class="col-md-10 ml-auto mr-auto">



                                <div class="content table-responsive table-full-width">


                                  <h6>รายชื่อพนักงาน</h6>
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>ชื่อพนักงาน</th>

                                <th>เบอร์โทร</th>

                              </tr>
                            </thead>
                              <tbody>

                              </tbody>
                          </table>

                      </div>


                                </div>

                                </div>

                                </div>

                                </div>

@endsection

@section('scripts')








@stop('scripts')
