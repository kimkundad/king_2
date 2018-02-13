@extends('admin.layouts.template')
@section('stylesheet')

<style>

        .file-upload {
            position: relative;
            overflow: hidden;
            margin: 10px;
            max-width: 150px;
            background: #fff;
            border: 2px solid #000;
            margin-top: 20px;
        }

        .file-upload input.upload {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }
        .croppie-container {
    padding: 0px;
}
.croppie-container .cr-vp-circle {
    border-radius: 0%;
}
</style>


@stop('stylesheet')

@section('content')




<div class="content">
            <div class="container-fluid">
                <div class="row">





                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">New Shop</h4>
                                <p class="category">Created using your new shop and shared data</p>
                            </div>
                            <div class="content">

                              <div class="alert alert-warning">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> แจ้งเตือน - </b> กรุณา กรอกข้อมูลให้ครบถ้วนตามเครื่องหมาย ( * ) ที่ระบุไว้</span>
                                </div>



                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                              <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                            {{ method_field($method) }}
                                            {{ csrf_field() }}


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group{{ $errors->has('shop_name') ? ' has-error' : '' }}">
                                                        <label>ชื่อร้าน/SHOP NAME*</label>
                                                        <input type="text" class="form-control border-input" name="shop_name" placeholder="SHOP NAME" value="{{ old( 'shop_name') }}">
                                                        @if ($errors->has('shop_name'))
                                                            <span class="help-block">
                                                                <strong>กรุณาใส่ ชื่อร้าน/SHOP NAME ของคุณด้วย</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group{{ $errors->has('shop_email') ? ' has-error' : '' }}">
                                                        <label>Email ร้าน/SHOP Email*</label>
                                                        <input type="text" class="form-control border-input" name="shop_email" placeholder="kim.kundad@gmail.com" value="{{ old( 'shop_email') }}">
                                                        @if ($errors->has('shop_email'))
                                                            <span class="help-block">
                                                                <strong>กรุณาใส่ Email ร้าน/SHOP Email ของคุณด้วย</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                <label>ที่อยู่/ADDRESS*</label>
                                                <textarea rows="3" class="form-control border-input" name="address" placeholder="ที่อยู่" value="Mike">{{ old( 'address') }}</textarea>

                                                @if ($errors->has('address'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ ที่อยู่ ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('branders_id') ? ' has-error' : '' }}">
                                                <label>เลือกที่อยู่ Brand*</label>

                                                <select name="branders_id" class="form-control border-input js-example-basic-single" required="">
                                                    <option value="">-- เลือกที่อยู่ Brand --</option>


                                                    @if(isset($brander))
                                                      @foreach($brander as $u)
                                                          <option value="{{$u->id}}">{{$u->branders_name}}</option>
                                                      @endforeach
                                                    @endif

                                            </select>

                                                @if ($errors->has('branders_id'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ ที่อยู่ Brand ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>



  <hr>
  <br>

  <div class="row">
    <div class="col-md-12">
    <label>รูป Shop*</label>
    </div>
  <div class="col-md-12" style="text-align: center">
  <label for="imgAvatar"></label>
  <img width="150" id="imgAvatar" name="imgAvatar" src="{{url('admin/assets/img/thumb_upload.png')}}" width="250px" alt="">

  <div class="form-group">



  <div class="file-upload btn">
  <span>เลือกรูปภาพ</span>
  <input class="upload" id="fileAvatar" name="image" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">

  </div>

  </div>


  </div>
    </div>






                                            <br>



                                    <div class="row">
                                        <hr>
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('shop_phone') ? ' has-error' : '' }}">
                                                <label>เบอร์โทรศัพท์/TELEPHONE*</label>
                                                <input type="text" class="form-control border-input" name="shop_phone" placeholder="081100775xxx.." value="{{ old( 'shop_phone') }}">
                                                @if ($errors->has('shop_phone'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ เบอร์โทรศัพท์ ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('provience_id') ? ' has-error' : '' }}">
                                                <label>จังหวัด/ PROVIENCE*</label>
                                                <select name="provience_id" class="form-control border-input js-example-basic-single" required="">
                                                    <option value="">-- เลือกจังหวัด --</option>


                                                    @if(isset($province))
                                                      @foreach($province as $u)
                                                          <option value="{{$u->PROVINCE_ID}}">{{$u->PROVINCE_NAME}}</option>
                                                      @endforeach
                                                    @endif

                                            </select>
                                                @if ($errors->has('provience_id'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ จังหวัด ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>





                                    <div class="row">
                                        <div class="col-md-12" style="padding: 12px;">
                                            <div class="form-group">
                                                <label>Location*</label>
                                                <div id="map_canvas" style="width:100%; border:0; height:316px;" frameborder="0"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="padding: 12px;">
                                            <div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
                                                <label>latitude*</label>
                                                <input type="text" class="form-control border-input" name="lat" id="lat" size="10" value="{{ old('lat') }}" required>

                                            </div>
                                        </div>
                                        <div class="col-md-6" style="padding: 12px;">
                                            <div class="form-group{{ $errors->has('lng') ? ' has-error' : '' }}">
                                                <label>longitude*</label>
                                                <input type="text" class="form-control border-input" name="lng" id="lng" size="10" value="{{ old('lng') }}" required>

                                            </div>
                                       </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('shop_sale') ? ' has-error' : '' }}">
                                                <label>ยอดขายรายเดือน/SALEA AMOUNT*</label>
                                                <input type="number" class="form-control border-input" name="shop_sale" placeholder="150,000" value="{{ old( 'shop_sale') }}">
                                                @if ($errors->has('shop_sale'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ ยอดขายรายเดือน ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('shop_code') ? ' has-error' : '' }}">
                                                <label>รหัสสาขา/CHANNEL CODE*</label>
                                                <input type="text" class="form-control border-input" name="shop_code" placeholder="ZX-1540000" value="{{ old( 'shop_code') }}">
                                                @if ($errors->has('shop_code'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ รหัสสาขา ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                           </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('channel') ? ' has-error' : '' }}">
                                                <label>ช่องทางขาย/CHANNEL*</label>
                                                <input type="text" class="form-control border-input" name="channel" placeholder="สื่อโฆษณาทีวี" value="{{ old( 'channel') }}">
                                               @if ($errors->has('channel'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ ช่องทางขาย ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('shop_area') ? ' has-error' : '' }}">
                                                <label>พื้นที่/AREA</label>
                                                <textarea rows="2" class="form-control border-input" name="shop_area" placeholder="Here can be your Area" value="Mike">{{ old( 'shop_area') }}</textarea>
                                                @if ($errors->has('shop_area'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ พื้นที่ ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>รายละเอียด/Shop Detail</label>
                                                <textarea rows="5" class="form-control border-input" name="detail_shop" placeholder="Here can be your detail" value="Mike">{{ old( 'detail_shop') }}</textarea>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">สร้าง Shop</button>
                                    </div>


                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>












@stop

@section('scripts')
<script src="{{url('admin/assets/js/bootstrap-notify.js')}}"></script>

<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});


</script>


<script>
        $(document).ready(function () {
            $("#fileAvatar").on("change", previewFile);
            $('#btn_submit').click(() => {
                const file = document.querySelector('#fileAvatar').files[0];
                if (file) {
                    window.location = 'step-4.html';
                }
            });
        });

        function previewFile() {
            const file = document.querySelector('#fileAvatar').files[0];
            const preview = document.querySelector('#imgAvatar');
            const reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }
            if (file) {
                reader.readAsDataURL(file); //reads the data as a URL
            }
        }
    </script>

<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyClVRSTOcxX7RK5Zagc0HbsXPpJBTgfv1Q&libraries=places&sensor=false'></script>
<script type="text/javascript">
      var map;
      var geocoder;
      var mapOptions = { center: new google.maps.LatLng({{ old( 'lat', 0.0) }}, {{ old( 'lng', 0.0) }}), zoom: 2,
        mapTypeId: google.maps.MapTypeId.ROADMAP };

      function initialize() {
var myOptions = {
                center: new google.maps.LatLng({{ old( 'lat', 13.7211075) }}, {{ old( 'lng', 100.5904873) }} ),
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            geocoder = new google.maps.Geocoder();
            var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
            });

            var marker;
            function placeMarker(location) {
                if(marker){
                    marker.setPosition(location);
                }else{
                    marker = new google.maps.Marker({
                        position: location,
                        map: map
                    });
                }
                document.getElementById('lat').value=location.lat();
                document.getElementById('lng').value=location.lng();
                getAddress(location);
            }

      function getAddress(latLng) {
        geocoder.geocode( {'latLng': latLng},
          function(results, status) {
            if(status == google.maps.GeocoderStatus.OK) {
              if(results[0]) {
                document.getElementById("address").value = results[0].formatted_address;
              }
              else {
                document.getElementById("address").value = "No results";
              }
            }
            else {
              document.getElementById("address").value = status;
            }
          });
        }
      }
      google.maps.event.addDomListener(window, 'load', initialize);
</script>




@stop('scripts')
