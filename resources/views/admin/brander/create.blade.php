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
                  <div class="col-md-6">
                      <div class="card">
                          <div class="header">
                              <h4 class="title">สร้างสินค้าใหม่</h4>

                          </div>


                          <div class="content">

                            <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}

                                          <div class="row">
                                              <div class="col-md-12" style="padding-right: 15px;">
                                                  <div class="form-group{{ $errors->has('brand_name') ? ' has-error' : '' }}">
                                                      <label>ชื่อ Brand*</label>
                                                      <input type="text" class="form-control border-input" name="brand_name" placeholder="Adidas.co.th" value="{{ old( 'brand_name') }}">
                                                      @if ($errors->has('brand_name'))
                                                          <span class="help-block">
                                                              <strong class="text-danger">**กรุณาใส่ ชื่อ Brand ของคุณด้วย</strong>
                                                          </span>
                                                      @endif
                                                  </div>

                                                  <div class="form-group{{ $errors->has('brand_group') ? ' has-error' : '' }}">
                                                      <label>กลุ่ม Brand*</label>
                                                      <input type="text" class="form-control border-input" name="brand_group" placeholder="สินค้าจัดแสดง.." value="{{ old( 'brand_group') }}">
                                                      @if ($errors->has('brand_group'))
                                                          <span class="help-block">
                                                              <strong class="text-danger">**กรุณาใส่ กลุ่ม Brand ของคุณด้วย</strong>
                                                          </span>
                                                      @endif
                                                  </div>

                                                  <div class="form-group{{ $errors->has('brand_type') ? ' has-error' : '' }}">
                                                      <label>ประเภท Brand*</label>
                                                      <input type="text" class="form-control border-input" name="brand_type" placeholder="สิ่งของเครื่องใช้.." value="{{ old( 'brand_type') }}">
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
                                              <button type="submit" class="btn btn-info btn-fill btn-wd">กดสร้าง Brand</button>
                                          </div>
                            </form>
                            <br>
                          </div>



                      </div>
                  </div>
                </div>


            </div>
        </div>













@stop

@section('scripts')

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
@stop('scripts')
