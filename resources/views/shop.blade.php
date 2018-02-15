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

                        <div class="row">
                            <div class="col-4 col-md-3">
                              <div class="avatar">
                                <img src="{{url('admin/assets/product/'.$brander->branders_image)}}" alt="{{$brander->branders_name}}" class="rounded ">
                              </div>

                            </div>
                            <div class="col-8 col-md-9" style="padding-left: 1px;">
                              <h6 style="font-size: 1.2em;">{{$brander->branders_name}}</h6>

                              <div class="button-container" style="    margin-top: 10px;">
                                  <a href="#button" class="btn btn-primary btn-round btn-sm">Follow</a>
                                  <a href="#button" class="btn btn-default btn-round btn-sm btn-icon" rel="tooltip" title="" data-original-title="Follow me on Twitter">
                                      <i class="fa fa-twitter"></i>
                                  </a>
                                  <a href="#button" class="btn btn-default btn-round btn-sm btn-icon" rel="tooltip" title="" data-original-title="Follow me on Instagram">
                                      <i class="fa fa-instagram"></i>
                                  </a>
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

                            <div class="nav-align-center">
                                <ul class="nav nav-pills nav-pills-primary" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile" role="tablist">
                                            <i class="now-ui-icons design_image"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home" role="tablist">
                                            <i class="now-ui-icons location_world"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#messages" role="tablist">
                                            <i class="now-ui-icons sport_user-run"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Tab panes -->
                        <div class="col-md-12">
                            <div class="space-50"></div>
                        <div class="tab-content gallery">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="col-md-10 ml-auto mr-auto">

                                  <h5>ข้อมูลของ {{$brander->branders_name}}</h5>
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
                                      <tr>
                                        <th scope="row">
                                          <h5 class="h5-set">ร้านค้าประเภท</h5>
                                          <p class="category-1">{{$brander->branders_type}}</p>
                                        </th>
                                      </tr>

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

                                      <tr>
                                        <th scope="row">
                                          <h5 class="h5-set">วันที่สร้าง</h5>
                                          <p class="category-1"><?php echo DateThai($brander->created_at); ?></p>
                                        </th>
                                      </tr>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile" role="tabpanel">
                                <div class="col-md-10 ml-auto mr-auto">
                                  <h5>Shop ทั้งหมด</h5>
                                  <hr>
                                    <div class="row collections">

                                      @if($shop)
                                  @foreach($shop as $u)
                                        <div class="col-md-6">
                                          <a href="{{url('sub_shop/'.$u->id)}}">
                                            <p class="category">{{$u->shop_name}}</p>

                                            <img src="{{url('admin/assets/blog/'.$u->image_shop)}}" alt="{{$u->shop_name}}" class="img-raised mar-bot">
                                          </a>

                                        </div>

                                        @endforeach
                                  @endif



                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="messages" role="tabpanel">
                                <div class="col-md-10 ml-auto mr-auto">
                                  <div class="content table-responsive table-full-width">


                            <h5>ผู้ใช้งานร่วม </h5>
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>ชื่อผู้ใช้</th>
                                  <th>แหล่งที่มา</th>
                                  <th>Email</th>


                                </tr>
                              </thead>
                                <tbody>

                                                                                                            <tr id="5">
                                      <td>
                                        <div class="avatar2">
                                          <img src="{{url('assets/img/faces/face-0.jpg')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                      </td>
                                      <td>Fair St</td>
                                      <td>facebook</td>
                                      <td>fair____@hotmail.com</td>


                                    </tr>
                                                                          <tr id="4">
                                      <td><div class="avatar2">
                                        <img src="{{url('assets/img/faces/face-0.jpg')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                      </div></td>
                                      <td>Praewrawee Muannirut</td>
                                      <td>facebook</td>
                                      <td>tao_02081992@hotmail.com</td>


                                    </tr>
                                                                          <tr id="3">
                                      <td><div class="avatar2">
                                        <img src="{{url('assets/img/faces/face-1.jpg')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                      </div></td>
                                      <td>Tu Kanjana Sridet</td>
                                      <td>facebook</td>
                                      <td>ying_tu34@hotmail.com</td>


                                    </tr>
                                                                          <tr id="2">
                                      <td><div class="avatar2">
                                        <img src="{{url('assets/img/faces/face-0.jpg')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                      </div></td>
                                      <td>Shuvit Funsok</td>
                                      <td>facebook</td>
                                      <td>ighostzaa@gmail.com</td>


                                    </tr>
                                                                          <tr id="1">
                                      <td><div class="avatar2">
                                        <img src="{{url('assets/img/faces/face-1.jpg')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                      </div></td>
                                      <td>kim kundad</td>
                                      <td>email</td>
                                      <td>kim.kundad@gmail.com</td>


                                    </tr>


                                </tbody>
                            </table>

                        </div>
                                </div>
                            </div>
                        </div>
                        </div>






                    </div>





                </div>
            </div>



@endsection
