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
                            <div class="col-12">

                              <p class="category" style="color: #2c2c2c;">Tabs with Icons on Card</p>
                              <img src="{{url('assets/img/bg8.jpg')}}" alt="" class="img-raised mar-bot">

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
                                    <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#exclamation" role="tablist">
                                        <i class="fa fa-exclamation"></i>
                                    </a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#link" role="tablist">
                                        <i class="fa fa-suitcase"></i>
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
                                            <p class="category">Tabs with Icons on Card</p>
                                            <img src="{{url('assets/img/bg8.jpg')}}" alt="" class="img-raised mar-bot">

                                            <p class="category">Tabs with Icons on Card</p>
                                            <img src="{{url('assets/img/bg11.jpg')}}" alt="" class="img-raised mar-bot">
                                        </div>
                                        <div class="col-md-6">
                                          <p class="category">Tabs with Icons on Card</p>
                                            <img src="{{url('assets/img/bg7.jpg')}}" alt="" class="img-raised mar-bot">
                                            <p class="category">Tabs with Icons on Card</p>
                                            <img src="{{url('assets/img/bg6.jpg')}}" class="img-raised mar-bot">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="exclamation" role="tabpanel">
                                <div class="col-md-10 ml-auto mr-auto">
                                    <div class="row collections">
                                        <div class="col-md-12">
                                          <div id="map" style="width:100%; border:0; height:316px;" frameborder="0"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="messages" role="tabpanel">
                                <div class="col-md-10 ml-auto mr-auto">
                                  <div class="content table-responsive table-full-width">



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

@section('scripts')




<script>
      function initMap() {
        var uluru = {lat: 13.753777208133778, lng: 100.56428253650665};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClVRSTOcxX7RK5Zagc0HbsXPpJBTgfv1Q&callback=initMap">
    </script>

@stop('scripts')
