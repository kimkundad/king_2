@extends('admin.layouts.template')
@section('stylesheet')
<link rel="stylesheet" href="{{asset('admin/assets/bootstrap-switch-master/css/bootstrap3/bootstrap-switch.css')}}" />
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
</style>
@stop('stylesheet')

@section('content')




<div class="content">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-4 col-md-5">
                      <div class="card card-user">
                          <div class="image">
                              <img src="{{url('admin/assets/img/background.jpg')}}" alt="...">
                          </div>
                          <div class="content">
                              <div class="author">
                                <img class="avatar border-white" src="{{url('admin/assets/blog/'.$objs->image_shop)}}" alt="...">

                              </div>

                              <h5>กลุ่มสินค้า
                                  <p class="category">{{$objs->branders_group}}</p>
                              </h5>
                              <h5>ร้านค้าประเภท
                                  <p class="category">{{$objs->branders_type}}</p>
                              </h5>
                              <h5>ที่อยู่
                                  <p class="category">{{$objs->shop_address}}</p>
                              </h5>
                              <h5>เบอร์โทรศัพ์
                                  <p class="category">{{$objs->shop_phone}}</p>
                              </h5>

                              <h5>รายละเอียด
                                  <p class="category">{{$objs->detail_shop}}</p>
                              </h5>

                              <a href="{{url('admin/shop/'.$objs->p_id.'/edit')}}" >
                                <i class="ti-settings"></i>
                                แก้ไขข้อมูล
                              </a>
                          </div>
                          <hr>
                          <div class="text-center">
                              <div class="row">
                                  <div class="col-md-5 col-md-offset-1">
                                      <h5>{{$count_pro}}<br><small>Product</small></h5>
                                  </div>
                                  <div class="col-md-6">
                                      <h5>2GB<br><small>Shared</small></h5>
                                  </div>

                              </div>
                          </div>
                      </div>








                  </div>


                  <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-wallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Sales Amount</p>
                                            0
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-calendar"></i> ยอดขายปลีก 0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-server"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>จำนวนสินค้า</p>
                                            {{$total_product}}
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr>
                                    <div class="stats" style="color: #3091B2;">
                                        <i class="ti-briefcase"></i> จำนวนรายการ {{$count_pro}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class=" col-lg-8 col-md-7">
                      <div class="card">
                          <div class="header">

                              <div class="col-md-6" style="padding-left: 0px;">
                              <h4 class="title">สินค้าของ {{$objs->shop_name}}</h4>
                              <br>
                              </div>

                              <div class="col-md-6" style="padding-left: 0px; ">
                                <a class="btn btn-default btn-sm" href="{{url('admin/shop/create')}}" role="button" style="padding-left: 0px; ">
                                <i class="fa fa-plus"></i> เพิ่ม shop ใหม่</a>
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


            @if($product)
              @foreach($product as $products)
                                    <tr id="{{$products->ids}}">
                                      <td>{{$products->product_code}}</td>
                                      <td>{{$products->product_name}}</td>
                                      <td>{{$products->cat_name}}</td>
                                      <td>{{$products->product_sum}}</td>
                                      <td>

                                        <input type="checkbox" name="my-checkbox" id="switch-size" data-size="mini"
                       @if($products->product_status == 1)
                        checked="checked"
                        @endif
                        />
                                      </td>
                                      <td>

                                        <div class="dropdown">
                                              <a href="#" class="btn dropdown-toggle btn-sm" data-toggle="dropdown">
                                                  จัดการ
                                                  <b class="caret"></b>
                                              </a>
                                              <ul class="dropdown-menu">
                                                <li><a href="{{url('admin/product/'.$products->ids)}}">ดูข้อมูล</a></li>
                                                <li><a href="{{url('admin/product/'.$products->ids.'/edit')}}">แก้ไข</a></li>
                                                <li><a href="{{url('admin/product/del/'.$products->ids)}}">ลบข้อมูล</a></li>
                                              </ul>
                                        </div>

                                        </td>
                                    </tr>
              @endforeach
            @endif

                                </tbody>
                            </table>

                                {{ $product->links() }}


                          </div>
                      </div>
                    </div>






                </div>
            </div>
        </div>












@stop

@section('scripts')

<script src="{{url('admin/assets/js/bootstrap-notify.js')}}"></script>
<script src="{{asset('admin/assets/bootstrap-switch-master/js/bootstrap-switch.js')}}"></script>
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
