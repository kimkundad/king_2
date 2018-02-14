@extends('admin.layouts.template')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('stylesheet')

<link href="{{URL::asset('assets/upload_image/css/fileinput.css')}}" rel="stylesheet">
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













                  <div class="col-md-6">
                      <div class="card">
                          <div class="header">
                              <h4 class="title">ไฟล์งานประกอบ</h4>

                              <p class="category" style="margin-top:10px;">*เลือก upload ได้ 1 ไฟล์งานเท่านั้น</p>
                          </div>


                          <div class="content">

                            <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}

                                          <div class="row">
                                            <div class="col-md-12" style="padding-right: 15px;">
                                            <div class="form-group{{ $errors->has('album_name') ? ' has-error' : '' }}">
                                                <label>ชื่อ ไฟล์งาน*</label>
                                                <input type="text" class="form-control border-input" name="album_name" >
                                                @if ($errors->has('album_name'))
                                                    <span class="help-block">
                                                        <strong>กรุณาใส่ ชื่อ album ของคุณด้วย</strong>
                                                    </span>
                                                @endif
                                            </div>
                                              </div>


                                              <div class="col-md-12" style="padding-left: 15px;">


                            <div class="form-group">


                <label for="exampleInputFile">เลือกไฟล์งาน (ต้องเลือก 1 ไฟล์งานเท่านั้น)</label>

                <input id="file-0a" class="file " type="file" name="file">
                <input type="hidden" name="shop_id" class="form-control" value="{{ $shop_id }}" required>



                </div>

                <div class="">
                    <button type="submit" class="btn btn-info btn-fill btn-wd">อัพโหลดไฟล์งาน</button>
                </div>



                </div>
                </div>

              </form>












                            </div>






                      </div>
                  </div>








                </div>


            </div>
        </div>













@stop

@section('scripts')

<script src="{{url('assets/js/bootstrap-notify.js')}}"></script>
<script src="{{URL::asset('admin/assets/upload_image/js/fileinput.js')}}?v1.2"></script>




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

    @if ($message = Session::get('success_edit_product'))
    <script type="text/javascript">
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
    </script>
    @endif

    @if ($message = Session::get('success_product'))
    <script type="text/javascript">
    type = ['success'];
    color = Math.floor((Math.random() * 4) + 1);
    $.notify({
        icon: "ti-gift",
        message: "ยินดีด้วย ได้ทำการเพิ่มข้อมูล สำเร็จเรียบร้อยแล้วค่ะ"

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



    @if ($message = Session::get('add_gallery_success'))
    <script type="text/javascript">
    type = ['success'];
    color = Math.floor((Math.random() * 4) + 1);
    $.notify({
        icon: "ti-gift",
        message: "ยินดีด้วย ได้ทำการเพิ่มข้อมูล สำเร็จเรียบร้อยแล้วค่ะ"

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

    @if ($message = Session::get('del_gallery_success'))
    <script type="text/javascript">
    type = ['success'];
    color = Math.floor((Math.random() * 4) + 1);
    $.notify({
        icon: "ti-gift",
        message: "ยินดีด้วย ได้ทำการลบข้อมูล สำเร็จเรียบร้อยแล้วค่ะ"

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
