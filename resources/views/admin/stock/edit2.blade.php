@extends('admin.layouts.template')
@section('stylesheet')

<style>
        .box-upload-file {
            background-image: url('{{url('front/asset/img/bg-blue-2.png')}}');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .box-upload-file {
            padding: 25px;
            max-width: 410px;
            margin: 0 auto 50px;
        }

        .box-upload-file h4 {
            margin-bottom: 30px;
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
}
    </style>
@stop('stylesheet')

@section('content')



        <div class="content">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <a href="{{url('admin/product/'.$id_pro)}}" class="btn btn-danger btn-fill ">กลับสู่ หน้าสินค้า</a>
                    <br><br>
                  </div>
                  <div class="col-md-6">
                      <div class="card">
                          <div class="header">
                              <h4 class="title">แก้ไขข้อมูล</h4>

                          </div>


                          <div class="content">

                            <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}

                                          <div class="row">
                                              <div class="col-md-12" style="padding-right: 15px;">

                                                <div class="form-group">
                                                    <label>ผู้สร้างรายการ*</label>
                                                    <input type="text" class="form-control border-input" name="product_total" value="{{ $stock->name }}">
                                                    <input type="hidden" class="form-control border-input" name="stock_id" value="{{ $stock->st_id }}">

                                                </div>

                                                <div class="form-group">
                                                    <label>วันที่*</label>
                                                    <input type="text" class="form-control border-input" name="product_total" value="{{ $stock->created_stock }}">

                                                </div>





                                                  <div class="form-group{{ $errors->has('product_id') ? ' has-error' : '' }}">
                                                      <label>เลือกตัดสินค้า*</label>
                                                      <select name="product_id" class="form-control border-input js-example-basic-single" required="">
                                                          <option value="">-- เลือกสินค้า --</option>


                                                          @if(isset($products))
                                                            @foreach($products as $u)
                                                                <option value="{{$u->id}}"
                                                                  @if($stock->product_id == $u->id)
                                                                  selected
                                                                  @endif
                                                                  >{{$u->product_name}}</option>
                                                            @endforeach
                                                          @endif

                                                  </select>
                                                      @if ($errors->has('provience_id'))
                                                          <span class="help-block">
                                                              <strong>กรุณาเลือกสินค้า ของคุณด้วย</strong>
                                                          </span>
                                                      @endif
                                                  </div>




                                                  <div class="form-group{{ $errors->has('product_total') ? ' has-error' : '' }}">
                                                      <label>จำนวนสินค้า*</label>
                                                      <input type="number" class="form-control border-input" name="product_total" value="{{ $stock->product_total }}">
                                                      @if ($errors->has('product_total'))
                                                          <span class="help-block">
                                                              <strong>กรุณาใส่ จำนวนสินค้า ของคุณด้วย</strong>
                                                          </span>
                                                      @endif
                                                  </div>







                                <div class="form-group{{ $errors->has('product_detail') ? ' has-error' : '' }}">
                                    <label>รายละเอียดสินค้า*</label>

                                    <textarea rows="3" class="form-control border-input" name="product_detail" placeholder="Here can be your description" value="Mike">{{ $stock->detail }}</textarea>
                                    @if ($errors->has('product_detail'))
                                        <span class="help-block">
                                            <strong>กรุณาใส่ รายละเอียด ของคุณด้วย</strong>
                                        </span>
                                    @endif
                                </div>





                                              </div>


                                          </div>

                                          <div class="">
                                              <button type="submit" class="btn btn-info btn-fill btn-wd">แก้ไขรายการ</button>
                                          </div>
                            </form>
                            <br>
                          </div>



                      </div>
                  </div>
                </div>


            </div>
        </div>











//success_edit

@stop

@section('scripts')

<script src="{{url('assets/js/bootstrap-notify.js')}}"></script>
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});


</script>

@if ($message = Session::get('success_edit'))
<script type="text/javascript">
type = ['success'];
color = Math.floor((Math.random() * 4) + 1);
$.notify({
    icon: "ti-gift",
    message: "ยินดีด้วย ได้ทำการแก้ไขข้อมูล สำเร็จเรียบร้อยแล้วค่ะ"

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
