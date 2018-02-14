@extends('admin.layouts.template')
@section('stylesheet')
<link rel="stylesheet" href="{{asset('admin/assets/bootstrap-switch-master/css/bootstrap3/bootstrap-switch.css')}}" />
<link rel="stylesheet" href="{{url('assets/magnific-popup/magnific-popup.css')}}">
<style>
.card-user .avatar {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    position: relative;
    margin-bottom: 15px;
}
.card-user .avatar {
    width: 150px;
    height: 150px;
    border-radius: 5%;
    position: relative;
    margin-bottom: 15px;
}
h5, .h5 {
    font-size: 1em;
    font-weight: 700;
    line-height: 1.4em;
    margin-bottom: 15px;
}
.card .category, .card label {
    font-size: 13px;
}
.card-user .image {
    border-radius: 8px 8px 0 0;
    height: 100%;
    position: relative;
    overflow: hidden;
}
</style>
@stop('stylesheet')

@section('content')




<div class="content">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <a href="{{url('admin/shop/'.$product->ids)}}" class="btn btn-danger btn-fill ">กลับสู่ shop</a>
                    <a href="{{url('admin/product/'.$product->idp.'/edit')}}" class="btn btn-info btn-fill ">แก้ไขข้อมูล</a>
                    <br><br>
                  </div>
                  <div class="col-lg-4 col-md-5">
                      <div class="card card-user">
                          <div class="image">
                              <img src="{{url('admin/assets/product/'.$product->product_image)}}" alt="...">
                          </div>
                          <div class="content">


                              <h5>ชื่อสินค้า
                                  <p class="category">{{$product->product_name}}</p>
                              </h5>

                              <h5>code สินค้า
                                  <p class="category">{{$product->product_code}}</p>
                              </h5>

                              <h5>หมวดหมู่ สินค้า
                                  <p class="category">{{$product->cat_name}}</p>
                              </h5>

                              <h5>ร้านค้า
                                  <p class="category">{{$product->shop_name}}</p>
                              </h5>

                              <h5>รายละเอียด
                                  <p class="category">{{$product->product_detail}}</p>
                              </h5>


                              <a href="{{url('admin/product/'.$product->idp.'/edit')}}" >
                                <i class="ti-settings"></i>
                                แก้ไขข้อมูล
                              </a>
                          </div>
                          <hr>
                          <div class="text-center">
                              <div class="row">
                                  <div class="col-md-5 col-md-offset-1">
                                      <h5>{{$product->product_sum}}<br><small>จำนวน</small></h5>
                                  </div>
                                  <div class="col-md-6">
                                      <h5>2GB<br><small>Shared</small></h5>
                                  </div>

                              </div>
                          </div>
                      </div>






                      <div class="card" style=" padding-bottom: 30px;">
                            <div class="header">
                                <h4 class="title">QR Code</h4>

                            </div>
                            <div class="content">
                              <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($product->product_code, 'QRCODE',10,10)}}" alt="barcode"  />
                            </div>
                            <hr>
                            <div class="header">
                                <h4 class="title">Bar Code</h4>

                            </div>
                            <div class="content">
                              <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($product->product_code, 'C39+')}}" alt="barcode" style="width:100%;" />
                            </div>
                        </div>







                  </div>



                    <div class=" col-lg-8 col-md-7">
                      <div class="card">
                          <div class="header">

                              <div class="col-md-6" style="padding-left: 0px;">
                              <h4 class="title">สินค้าของ </h4>
                              <br>
                              </div>

                              <div class="col-md-6" style="padding-left: 0px; ">
                                <a class="btn btn-default btn-sm" href="{{url('/')}}" role="button" style="padding-left: 0px; ">
                                <i class="fa fa-plus"></i> เพิ่ม สินค้าใหม่</a>
                                </div>

                          </div>
                          <div class="content table-responsive table-full-width" style="min-height:350px; padding-bottom: 120px;">

                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>ชื่อสินค้า</th>
                                  <th>หมวดหมู่</th>
                                  <th>คงเหลือ</th>
                                  <th>ปิด/เปิด</th>
                                  <th>จัดการ</th>
                                </tr>
                              </thead>
                                <tbody>




                                </tbody>
                            </table>



                          </div>
                      </div>
                    </div>



                    <div class=" col-lg-8 col-md-7">

                      <div class="header">
                          <h5 class="title">รูปภาพประกอบ</h5>

                      </div>

                      <div class=" magnific-gallery">
                      @if($img_all)
                      @foreach($img_all as $img_u)

                          <div class="col-lg-4 col-sm-6">
                            <a class="example-image-link" href="{{url('admin/assets/gallery_product/'.$img_u->image)}}" >
                              <img src="{{url('admin/assets/gallery_product/'.$img_u->image)}}" class="img-responsive" >
                            </a>
                        </div>

                      @endforeach
                      @endif
                      </div>

                      </div>

















                </div>
            </div>
        </div>












@stop

@section('scripts')

<script src="{{url('admin/assets/js/bootstrap-notify.js')}}"></script>
<script src="{{asset('admin/assets/bootstrap-switch-master/js/bootstrap-switch.js')}}"></script>
<script src="{{url('assets/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script>
$(document).ready(function() {
  $('.magnific-gallery').each(function() {
$(this).magnificPopup({
    delegate: 'a',
    type: 'image',
    gallery:{enabled:true}
});
});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
  $("[name='my-checkbox']").bootstrapSwitch();
//  $("input:checkbox").change(function() {

$("[name='my-checkbox']").on('switchChange.bootstrapSwitch',function(){
    var product_id = $(this).closest('tr').attr('id');

    $.ajax({
            type:'POST',
            url:'{{asset('api/post_status')}}',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "product_id" : product_id },
            success: function(data){
              if(data.data.success){


                type = ['success'];
                color = Math.floor((Math.random() * 4) + 1);
                $.notify({
                    icon: "ti-gift",
                    message: "ยินดีด้วย ได้ทำการแก้ไขข้อมูล สำเร็จเรียบร้อยแล้วค่ะ"

                  },{
                      type: type[color],
                      timer: 2000,
                      placement: {
                          from: 'top',
                          align: 'right'
                      }
                  });

//http://localhost/king_2/public/api/post_status

              }
            }
        });
    });
});
</script>

@if ($message = Session::get('success_user'))
<script type="text/javascript">
type = ['success'];
color = Math.floor((Math.random() * 4) + 1);
$.notify({
    icon: "ti-gift",
    message: "ยินดีด้วย ได้ทำการเปลี่ยนรุป <b>User Profile</b> สำเร็จเรียบร้อยแล้วค่ะ"

  },{
      type: type[color],
      timer: 2000,
      placement: {
          from: 'top',
          align: 'right'
      }
  });
</script>
@endif



@stop('scripts')
