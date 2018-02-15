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
font-size: 1em;
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
.text-muted {
    font-size: 12px;
}
.author {
    text-align: center;

}
</style>

  <div class="section section-tabs" style="padding: 20px 0;">

      <div class="container">


          <div id="images">

                        <div class="row">
                            <div class="col-12">

                              <p class="category" style="color: #2c2c2c;">{{$objs->shop_name}}</p>

                              <div class="author">
                              <img src="{{url('admin/assets/blog/'.$objs->image_shop)}}" alt="{{$objs->shop_name}}" class="img-raised mar-bot">
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
                                          <h5 class="h5-set">ชื่อ Shop</h5>
                                          <p class="category-1">{{$objs->shop_name}}</p>
                                        </th>
                                      </tr>
                                      <tr>
                                        <th scope="row">
                                          <h5 class="h5-set">รหัส Shop</h5>
                                          <p class="category-1">{{$objs->shop_code}}</p>
                                        </th>
                                      </tr>
                                      <tr>
                                        <th scope="row">
                                          <h5 class="h5-set">เบอร์โทร</h5>
                                          <p class="category-1">{{$objs->shop_phone}}</p>
                                        </th>
                                      </tr>

                                      <tr>
                                        <th scope="row">
                                          <h5 class="h5-set">อีเมล shop</h5>
                                          <p class="category-1">{{$objs->shop_email}}</p>
                                        </th>
                                      </tr>
                                      <tr>
                                        <th scope="row">
                                          <h5 class="h5-set">กลุ่มสินค้า</h5>
                                          <p class="category-1">{{$objs->branders_group}}</p>
                                        </th>
                                      </tr>
                                      <tr>
                                        <th scope="row">
                                          <h5 class="h5-set">ร้านค้าประเภท</h5>
                                          <p class="category-1">{{$objs->branders_type}}</p>
                                        </th>
                                      </tr>
                                      <tr>
                                        <th scope="row">
                                          <h5 class="h5-set">ที่อยู่</h5>
                                          <p class="category-1">{{$objs->shop_address}}</p>
                                        </th>
                                      </tr>

                                      <tr>
                                        <th scope="row">
                                          <h5 class="h5-set">จังหวัด</h5>
                                          <p class="category-1">{{$objs->PROVINCE_NAME}}</p>
                                        </th>
                                      </tr>

                                      <tr>
                                        <th scope="row">
                                          <h5 class="h5-set">Channel</h5>
                                          <p class="category-1">{{$objs->channel}}</p>
                                        </th>
                                      </tr>

                                      <tr>
                                        <th scope="row">
                                          <h5 class="h5-set">ยอดขายรายเดือน</h5>
                                          <p class="category-1">{{$objs->shop_sale}}</p>
                                        </th>
                                      </tr>

                                      <tr>
                                        <th scope="row">
                                          <h5 class="h5-set">จำนวนสินค้า</h5>
                                          <p class="category-1">{{number_format($total_product)}}</p>
                                        </th>
                                      </tr>

                                      <tr>
                                        <th scope="row">
                                          <h5 class="h5-set">รายละเอียด</h5>
                                          <p class="category-1">{{$objs->detail_shop}}</p>
                                        </th>
                                      </tr>
                                    </tbody>
                                    </table>
                                    <h5>Location</h5>
                                    <div id="map" style="width:100%; border:0; height:316px;" frameborder="0"></div>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile" role="tabpanel">
                                <div class="col-md-10 ml-auto mr-auto">
                                    <div class="row collections">
                                      <div class="col-12 text-center">
                                          <a href="{{url('new_album')}}" class="btn btn-primary btn-round btn-white" >สร้าง album ใหม่</a>
                                          <br><br>
                                      </div>
                                        <div class="col-md-6">
                                          <a href="{{url('album')}}">
                                            <p class="category" style="margin-bottom: 0.2rem;">Tabs with Icons on Card </p>
                                            <p class="text-muted"><i class="now-ui-icons tech_watch-time"></i> 1 ม.ค. 2513</p>
                                            <img src="{{url('assets/img/bg8.jpg')}}" alt="" class="img-raised mar-bot">
                                          </a>
                                        </div>
                                        <div class="col-md-6">
                                          <a href="{{url('album')}}">
                                            <p class="category" style="margin-bottom: 0.2rem;">Tabs with Icons on Card </p>
                                            <p class="text-muted"><i class="now-ui-icons tech_watch-time"></i> 1 ม.ค. 2513</p>
                                            <img src="{{url('assets/img/bg8.jpg')}}" alt="" class="img-raised mar-bot">
                                          </a>
                                        </div>
                                        <div class="col-md-6">
                                          <a href="{{url('album')}}">
                                            <p class="category" style="margin-bottom: 0.2rem;">Tabs with Icons on Card </p>
                                            <p class="text-muted"><i class="now-ui-icons tech_watch-time"></i> 1 ม.ค. 2513</p>
                                            <img src="{{url('assets/img/bg8.jpg')}}" alt="" class="img-raised mar-bot">
                                          </a>
                                        </div>
                                        <div class="col-md-6">
                                          <a href="{{url('album')}}">
                                            <p class="category" style="margin-bottom: 0.2rem;">Tabs with Icons on Card </p>
                                            <p class="text-muted"><i class="now-ui-icons tech_watch-time"></i> 1 ม.ค. 2513</p>
                                            <img src="{{url('assets/img/bg8.jpg')}}" alt="" class="img-raised mar-bot">
                                          </a>
                                        </div>
                                        <div class="col-md-6">
                                          <a href="{{url('album')}}">
                                            <p class="category" style="margin-bottom: 0.2rem;">Tabs with Icons on Card </p>
                                            <p class="text-muted"><i class="now-ui-icons tech_watch-time"></i> 1 ม.ค. 2513</p>
                                            <img src="{{url('assets/img/bg8.jpg')}}" alt="" class="img-raised mar-bot">
                                          </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="exclamation" role="tabpanel">
                                <div class="col-md-10 ml-auto mr-auto">
                                    <div class="row collections">
                                        <div class="col-md-6 ml-auto mr-auto">


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



<script  language=javascript src='https://maps.google.com/maps/api/js?key=AIzaSyClVRSTOcxX7RK5Zagc0HbsXPpJBTgfv1Q&callback=initMap'></script>
<script src="{{url('assets/js/markerclusterer.js')}}"></script>
<script>
    function initMap() {
        var center = new google.maps.LatLng({{$objs->lat}}, {{$objs->lat}});

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: center,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var markers = [];
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng({{$objs->lat}}, {{$objs->lat}})
        });
        markers.push(marker);

        var options = {
            imagePath: 'images/m'
        };

        var markerCluster = new MarkerClusterer(map, markers, options);
    }

    google.maps.event.addDomListener(window, 'load', initMap);
</script>




@stop('scripts')
