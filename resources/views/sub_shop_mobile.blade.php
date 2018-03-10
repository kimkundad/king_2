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
            <a class="btn btn-primary btn-round " href="{{url('brander/'.$objs->bid)}}" style="color: #FFFFFF;">กลับสู่ Account</a>
            <br><br>
                        <div class="row">
                            <div class="col-4 col-md-3">
                              <div class="avatar">
                                <img src="{{url('admin/assets/blog/'.$objs->image_shop)}}" alt="{{$objs->shop_name}}" class="rounded ">
                              </div>

                            </div>
                            <div class="col-8 col-md-9" style="padding-left: 1px;">
                              <h6 style="font-size: 1.4em;">{{$objs->shop_name}}</h6>



                              <div class="hidden-sm hidden-xs">
                                รายละเอียดของร้านค้า
                                <p class="document-subtitle" style="margin-top: 10px;"><b><i class="fa fa-circle-o-notch" ></i> {{$objs->shop_code}}, {{$objs->branders_group}}, {{$objs->branders_type}}</b>
                                <b style="color: #756174; float:right;"><i class="fa fa-bookmark-o" style="color: #756174;"></i>Channel : {{$objs->channel}} </b>  </p>
                                <hr style="color:#ddd; margin-top: 0.5rem;  margin-bottom: 0.5rem;">
                                <p class="document-subtitle" style="font-size: 13px;"><b><i class="fa fa-phone" ></i></b> {{$objs->shop_phone}} , <b><i class="fa fa-envelope-o" ></i></b> {{$objs->shop_email}} </p>
                                <p class="document-subtitle" style="font-size: 13px;"><b><i class="fa fa-map-marker" ></i></b> {{$objs->shop_address}}, {{$objs->PROVINCE_NAME}}</p>
                                <span class="badge badge-primary">ยอดขายรายเดือน {{number_format($objs->shop_sale,2)}}</span>
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
                  <div class="col-md-10 ml-auto mr-auto">
                    <h6>album ทั้งหมด</h6>
                    <hr>
                    <br>
                      <div class="row collections">
                        <div class="col-12 text-center">
                            <a href="{{url('new_album/'.$objs->p_id)}}" class="btn btn-primary btn-round btn-white" >สร้าง album ใหม่</a>
                            <br><br>
                        </div>


                        @if($albums)
                          @foreach($albums as $album)

                          <div class="col-12 col-md-3">
                            <a href="{{url('album/'.$album->id)}}" class="ab">
                              <h5 class="h5-set">{{$album->name}} </h5>
                              <p class="text-muted"> <?php echo DateThai($album->created_at); ?></p>
                              <img src="{{url('admin/assets/gallery_shop/'.$album->sum_album->image)}}" alt="" class="img-raised mar-bot">
                            </a>
                          </div>
                          @endforeach
                        @endif

                      </div>

                      <br><br>
                      <div class="row hidden-sm hidden-xs">

                        <div class="col-md-8 ml-auto mr-auto" style="padding-right: 0px; padding-left: 0px;">
                          <div class="text-center">
                          <img src="{{url('assets/img/banner.png')}}" class="img-responsive ">
                          <br><br><br>
                          </div>
                        </div>

                      </div>



                      <h6>สินค้า ทั้งหมด</h6>
                      <hr>

                        <div class="row collections">

                          @if($product)
                            @foreach($product as $products)

                            <div class="col-6 col-md-3">

                              <a href="{{url('product/'.$products->ids)}}" class="ab">
                                <h5 class="h5-set">{{$products->product_name}} </h5>
                                <p class="text-muted"> <?php echo DateThai($products->created_at); ?></p>
                                <img src="{{url('admin/assets/product/'.$products->product_image)}}" alt="" class="img-raised mar-bot">
                              </a>
                              <br><br>
                            </div>
                            @endforeach
                          @endif

                        </div>


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
                      @if($employee)
                        @foreach($employee as $employees)
                        <tr id="5">
                          <td>
                            <div class="avatar2">
                              @if($employees->sex == 1)
                                <img src="{{url('admin/assets/img/avatar/1483537975.png')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                              @else
                                <img src="{{url('admin/assets/img/avatar/1483556517.png')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                              @endif

                            </div>
                          </td>
                          <td>{{$employees->name}}</td>
                          <td>{{$employees->phone}}</td>


                        </tr>
                        @endforeach
                      @endif
                    </tbody>
                </table>


                  </div>
                </div>
  </div>



@endsection

@section('scripts')



<script  language=javascript src='https://maps.google.com/maps/api/js?key=AIzaSyClVRSTOcxX7RK5Zagc0HbsXPpJBTgfv1Q&callback=initMap'></script>
<script src="{{url('assets/js/markerclusterer.js')}}"></script>
<script>
    function initMap() {
        var center = new google.maps.LatLng({{$objs->lat}}, {{$objs->lng}});

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: center,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var markers = [];
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng({{$objs->lat}}, {{$objs->lng}})
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
