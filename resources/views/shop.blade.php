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
</style>

  <div class="section section-tabs" style="padding: 20px 0;">

      <div class="container">


          <div id="images">

                        <div class="row">
                            <div class="col-4 col-md-3">
                              <div class="avatar">
                                <img src="{{url('assets/img/RUOK__Twitter_400x400_V1-400x400.png')}}" alt="Rounded Image" class="rounded ">
                              </div>

                            </div>
                            <div class="col-8 col-md-9" style="padding-left: 1px;">
                              <h6 style="font-size: 1.2em;">บริษัท แมคไทย จำกัด</h6>

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
                                  <table class="table">

                                    <tbody>
                                      <tr>
                                        <th scope="row">
                                          <h5 class="h5-set">ชื่อ</h5>
                                          <p class="category-1">Little Reveurs</p>
                                        </th>
                                      </tr>
                                      <tr>
                                        <th scope="row">
                                          <h5 class="h5-set">เบอร์โทรศัพ์</h5>
                                          <p class="category-1">080-111-3193</p>
                                        </th>
                                      </tr>
                                      <tr>
                                        <th scope="row">
                                          <h5 class="h5-set">กลุ่มสินค้า</h5>
                                          <p class="category-1">กิ๊ฟช็อป</p>
                                        </th>
                                      </tr>
                                      <tr>
                                        <th scope="row">
                                          <h5 class="h5-set">ร้านค้าประเภท</h5>
                                          <p class="category-1">กิ๊ฟช็อป</p>
                                        </th>
                                      </tr>
                                      <tr>
                                        <th scope="row">
                                          <h5 class="h5-set">ที่อยู่</h5>
                                          <p class="category-1">31/99 โพธิ์ทองแมนชั่น ซอยพหลโยธิน34 แขวงเสนานิคม เขตจตุจักร กรุงเทพฯ 10900</p>
                                        </th>
                                      </tr>

                                      <tr>
                                        <th scope="row">
                                          <h5 class="h5-set">รายละเอียด</h5>
                                          <p class="category-1">Little Reveurs ขายตุ๊กตา น่ารัก น่ากอด ขนนุ่ม ขนฟู เหมาะสำหรับเป็นของขวัญในทุกโอกาสพิเศษ</p>
                                        </th>
                                      </tr>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile" role="tabpanel">
                                <div class="col-md-10 ml-auto mr-auto">
                                    <div class="row collections">
                                        <div class="col-md-6">
                                            <img src="../assets/img/bg6.jpg" class="img-raised">
                                            <img src="../assets/img/bg11.jpg" alt="" class="img-raised">
                                        </div>
                                        <div class="col-md-6">
                                            <img src="../assets/img/bg7.jpg" alt="" class="img-raised">
                                            <img src="../assets/img/bg8.jpg" alt="" class="img-raised">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="messages" role="tabpanel">
                                <div class="col-md-10 ml-auto mr-auto">
                                    <div class="row collections">
                                        <div class="col-md-6">
                                            <img src="../assets/img/bg3.jpg" alt="" class="img-raised">
                                            <img src="../assets/img/bg8.jpg" alt="" class="img-raised">
                                        </div>
                                        <div class="col-md-6">
                                            <img src="../assets/img/bg7.jpg" alt="" class="img-raised">
                                            <img src="../assets/img/bg6.jpg" class="img-raised">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>






                    </div>





                </div>
            </div>



@endsection
