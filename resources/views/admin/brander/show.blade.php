@extends('admin.layouts.template')
@section('stylesheet')
<link href="{{URL::asset('assets/vendor/jstree/themes/default/style.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('admin/assets/bootstrap-switch-master/css/bootstrap3/bootstrap-switch.css')}}" />
<style>
.jstree-default .colored {
    color: #0088cc !important;
}
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
img {
vertical-align: middle;
border-style: none;
border-radius: 5px 5px 5px 5px;
}

</style>
@stop('stylesheet')

@section('content')



        <div class="content">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-4">
                      <div class="card">



                          <div class="content">

                            <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}

                                          <div class="row">
                                              <div class="col-md-12" style="padding-right: 15px;">

                                                <div class="form-group">
                                                    <label>รูป Brand*</label>
                                                    <div class="col-md-12" style="text-align: center">
                                                    <img src="{{url('admin/assets/product/'.$brander->branders_image)}}"  style="width:50%;">
                                                  </div>
                                                </div>


                                                  <div class="form-group{{ $errors->has('brand_name') ? ' has-error' : '' }}">
                                                      <label>ชื่อ Brand*</label>
                                                      <input type="text" class="form-control border-input" name="brand_name" placeholder="Adidas.co.th" value="{{ $brander->branders_name }}">
                                                      @if ($errors->has('brand_name'))
                                                          <span class="help-block">
                                                              <strong class="text-danger">**กรุณาใส่ ชื่อ Brand ของคุณด้วย</strong>
                                                          </span>
                                                      @endif
                                                  </div>

                                                  <div class="form-group{{ $errors->has('brand_group') ? ' has-error' : '' }}">
                                                      <label>กลุ่ม Brand*</label>
                                                      <input type="text" class="form-control border-input" name="brand_group" placeholder="สินค้าจัดแสดง.." value="{{ $brander->branders_group }}">
                                                      @if ($errors->has('brand_group'))
                                                          <span class="help-block">
                                                              <strong class="text-danger">**กรุณาใส่ กลุ่ม Brand ของคุณด้วย</strong>
                                                          </span>
                                                      @endif
                                                  </div>

                                                  <div class="form-group{{ $errors->has('brand_type') ? ' has-error' : '' }}">
                                                      <label>ประเภท Brand*</label>
                                                      <input type="text" class="form-control border-input" name="brand_type" placeholder="สิ่งของเครื่องใช้.." value="{{ $brander->branders_type }}">
                                                      @if ($errors->has('brand_type'))
                                                          <span class="help-block">
                                                              <strong class="text-danger">**กรุณาใส่ ประเภท Brand ของคุณด้วย</strong>
                                                          </span>
                                                      @endif
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


                                          </div>

                                          <div class="text-center">
                                              <button type="submit" class="btn btn-info btn-fill btn-wd">แก้ไข Brand</button>
                                          </div>
                            </form>
                            <br>
                          </div>

                      </div>
                  </div>



                  <div class="col-md-8">
                      <div class="card">

                          <div class="content">
                                          <div class="row">

                                            <div class="col-md-12">
                                              <a href="{{url('admin/shop/create')}}" class="btn btn-success btn-fill btn-wd"> สร้าง Shop ใหม่</a>
                                              <br><br>
                                            </div>

                                            @if($shop)
                                            @foreach($shop as $u)

                                              <div class="col-md-4 col-sm-6 col-xs-6" >
                                                <a href="{{url('admin/shop/'.$u->id)}}">
                                                <label>{{$u->shop_name}}</label>
                                                <img src="{{url('admin/assets/blog/'.$u->image_shop)}}"  class="img-responsive">
                                              </a><br>
                                              </div>
                                              @endforeach
                                            @endif


                                          </div>
                          </div>

                      </div>
                  </div>



                  <div class=" col-lg-8 col-md-7">
                    <div class="card">
                        <div class="header">

                            <div class="col-md-6" style="padding-left: 0px;">
                            <h4 class="title">สินค้าของ {{$brander->branders_name}}</h4>
                            <br>
                            </div>

                            <div class="col-md-6" style="padding-left: 0px; ">
                              <a class="btn btn-default btn-sm" href="{{url('admin/product_new/'.$brander->id)}}" role="button" style="padding-left: 0px; ">
                              <i class="fa fa-plus"></i> เพิ่ม สินค้าใหม่</a>
                              </div>

                        </div>
                        <div class="content table-responsive table-full-width" style="min-height:350px; padding-bottom: 120px;">

                          <table class="table table-striped">
                            <thead>
                              <tr>

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

                    <tr id="{{$products->id}}">

                                    <td>{{$products->product_code}}</td>
                                    <td>{{$products->product_name}}</td>
                                    <td>{{$products->cat_name}}</td>
                                    <td>{{number_format($products->product_sum)}}</td>
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
<script src="{{URL::asset('assets/vendor/jstree/jstree.js')}}"></script>
<script src="{{URL::asset('assets/js/examples/examples.treeview.js')}}"></script>

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

@stop('scripts')
