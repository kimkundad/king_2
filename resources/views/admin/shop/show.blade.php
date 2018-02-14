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




                      <div class="card" style=" padding-bottom: 30px;">
                            <div class="header">
                                <h4 class="title">พนักงาน Shop</h4>
                                <br>
                                <a class="btn btn-default btn-sm" href="{{url('admin/new_employee/'.$objs->p_id)}}" role="button" style="padding-left: 0px; ">
                                <i class="fa fa-plus"></i> เพิ่ม</a>
                            </div>
                            <div class="content">
                                <ul class="list-unstyled team-members">

                                  @if($employee)
                                    @foreach($employee as $employees)
                                            <li>
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <div class="avatar">
                                                          @if($employees->sex == 1)
                                                            <img src="{{url('admin/assets/img/avatar/1483537975.png')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                                          @else
                                                            <img src="{{url('admin/assets/img/avatar/1483556517.png')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                                          @endif

                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        {{$employees->name}}
                                                        <br>
                                                        <span class="text-muted" style="color: #048a36;"><small>{{$employees->phone}}</small></span>
                                                    </div>
                                                    <div class="col-xs-3 text-right">
                                                      <div class="dropdown">
                                                            <a href="#" class="btn dropdown-toggle btn-sm" data-toggle="dropdown">

                                                                <b class="caret"></b>
                                                            </a>
                                                            <ul class="dropdown-menu" style="min-width: 80px;">

                                                              <li style="padding: 0px 0px;"><a style="padding: 5px 10px;" href="{{url('admin/employee/'.$employees->id.'/edit')}}">แก้ไข</a></li>
                                                              <li style="padding: 0px 0px;"><a style="padding: 5px 10px;" href="{{url('admin/employee_del/'.$employees->id)}}">ลบข้อมูล</a></li>
                                                            </ul>
                                                      </div>
                                                    </div>


                                                </div>
                                            </li>
                                  @endforeach
                                @endif


                                        </ul>
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




                    <div class=" col-lg-8 col-md-7">
                      <div class="card">
                          <div class="header">

                              <div class="col-md-6" style="padding-left: 0px;">
                              <h4 class="title">อัลบัมรูป</h4>
                              <br>
                              </div>

                              <div class="col-md-6" style="padding-left: 0px; ">
                                <a class="btn btn-default btn-sm" href="{{url('admin/new_album/'.$objs->p_id)}}" role="button" style="padding-left: 0px; ">
                                <i class="fa fa-plus"></i> เพิ่ม อัลบัมรูป ใหม่</a>
                                </div>

                          </div>
                          <div class="content table-responsive table-full-width" style=" padding-bottom: 70px;">

                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>อัลบัมรูป</th>
                                  <th>จำนวนรูป</th>
                                  <th>วันที่สร้าง</th>

                                  <th>จัดการ</th>
                                </tr>
                              </thead>
                                <tbody>


            @if($albums)
              @foreach($albums as $album)
                                    <tr id="{{$album->id}}">
                                      <td>{{$album->name}}</td>
                                      <td>{{$album->sum_album}}</td>
                                      <td><?php echo DateThai($album->created_at); ?></td>


                                      <td>

                                        <div class="dropdown">
                                              <a href="#" class="btn dropdown-toggle btn-sm" data-toggle="dropdown">
                                                  จัดการ
                                                  <b class="caret"></b>
                                              </a>
                                              <ul class="dropdown-menu">

                                                <li><a href="{{url('admin/albums/'.$album->id.'/edit')}}">แก้ไข</a></li>
                                                <li><a href="{{url('admin/albums/del/'.$album->id)}}">ลบข้อมูล</a></li>
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




<div class="col-lg-4 col-md-5">
</div>



                    <div class=" col-lg-8 col-md-7">
                      <div class="card">
                          <div class="header">

                              <div class="col-md-6" style="padding-left: 0px;">
                              <h4 class="title">ไฟล์เอกสาร</h4>
                              <br>
                              </div>

                              <div class="col-md-6" style="padding-left: 0px; ">
                                <a class="btn btn-default btn-sm" href="{{url('admin/new_file/'.$objs->p_id)}}" role="button" style="padding-left: 0px; ">
                                <i class="fa fa-plus"></i> เพิ่ม ไฟล์เอกสาร</a>
                                </div>

                          </div>
                          <div class="content table-responsive table-full-width" style=" padding-bottom: 80px;">

                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>ชื่อไฟล์</th>
                                  <th>วันที่สร้าง</th>
                                  <th>จัดการ</th>
                                </tr>
                              </thead>
                                <tbody>

                                  @if($file_shop)
                                    @foreach($file_shop as $file_shops)
                                                          <tr id="{{$file_shops->id}}">
                                                            <td>{{$file_shops->id}}</td>
                                                            <td>{{$file_shops->name_file}}</td>

                                                            <td><?php echo DateThai($file_shops->created_at); ?></td>


                                                            <td>

                                                              <div class="dropdown">
                                                                    <a href="#" class="btn dropdown-toggle btn-sm" data-toggle="dropdown">
                                                                        จัดการ
                                                                        <b class="caret"></b>
                                                                    </a>
                                                                    <ul class="dropdown-menu">

                                                                      <li><a href="{{asset('admin/assets/shop_file/'.$file_shops->file_sheet)}}" target="_blank">ดาวน์โหลด</a></li>
                                                                      <li><a href="{{url('admin/fileshops/del/'.$file_shops->id)}}">ลบข้อมูล</a></li>
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

@if ($message = Session::get('add_album_photo_success'))
<script type="text/javascript">
type = ['success'];
color = Math.floor((Math.random() * 4) + 1);
$.notify({
    icon: "ti-gift",
    message: "ยินดีด้วย ได้ทำการเพิ่มอัลบัม สำเร็จเรียบร้อยแล้วค่ะ"

  },{
      type: type[0],
      timer: 2000,
      placement: {
          from: 'top',
          align: 'right'
      }
  });
</script>
@endif

@if ($message = Session::get('add_album_file_success'))
<script type="text/javascript">
type = ['success'];
color = Math.floor((Math.random() * 4) + 1);
$.notify({
    icon: "ti-gift",
    message: "ยินดีด้วย ได้ทำการเพิ่มไฟล์ประกอบ สำเร็จเรียบร้อยแล้วค่ะ"

  },{
      type: type[0],
      timer: 2000,
      placement: {
          from: 'top',
          align: 'right'
      }
  });
</script>
@endif

@if ($message = Session::get('delete_file'))
<script type="text/javascript">
type = ['success'];
color = Math.floor((Math.random() * 4) + 1);
$.notify({
    icon: "ti-gift",
    message: "ยินดีด้วย ได้ทำการลบ ไฟล์ประกอบ สำเร็จเรียบร้อยแล้วค่ะ"

  },{
      type: type[0],
      timer: 2000,
      placement: {
          from: 'top',
          align: 'right'
      }
  });
</script>
@endif

@if ($message = Session::get('edit_employee_success'))
<script type="text/javascript">
type = ['success'];
color = Math.floor((Math.random() * 4) + 1);
$.notify({
    icon: "ti-gift",
    message: "ยินดีด้วย ได้ทำกาแก้ไขข้อมูลพนักงาน สำเร็จเรียบร้อยแล้วค่ะ"

  },{
      type: type[0],
      timer: 2000,
      placement: {
          from: 'top',
          align: 'right'
      }
  });
</script>
@endif


@if ($message = Session::get('add_employee_success'))
<script type="text/javascript">
type = ['success'];
color = Math.floor((Math.random() * 4) + 1);
$.notify({
    icon: "ti-gift",
    message: "ยินดีด้วย ได้ทำกาแก้ไขข้อมูลพนักงาน สำเร็จเรียบร้อยแล้วค่ะ"

  },{
      type: type[0],
      timer: 2000,
      placement: {
          from: 'top',
          align: 'right'
      }
  });
</script>
@endif

@if ($message = Session::get('delete_employee_success'))
<script type="text/javascript">
type = ['success'];
color = Math.floor((Math.random() * 4) + 1);
$.notify({
    icon: "ti-gift",
    message: "ยินดีด้วย ได้ทำกาแก้ไขข้อมูลพนักงาน สำเร็จเรียบร้อยแล้วค่ะ"

  },{
      type: type[0],
      timer: 2000,
      placement: {
          from: 'top',
          align: 'right'
      }
  });
</script>
@endif


@stop('scripts')
