@extends('admin.layouts.template')

@section('stylesheet')
<link href="{{URL::asset('admin/assets/text/dist/summernote.css')}}" rel="stylesheet">
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
                              <h4 class="title">สร้างใบเบิกสินค้าใหม่ Shop : {{$shop->shop_name}}</h4>

                          </div>


                          <div class="content">

                            <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}

                                          <div class="row">
                                              <div class="col-md-12" style="padding-right: 15px;">


                                                    <div class="form-group{{ $errors->has('product_id') ? ' has-error' : '' }}">
                                                        <label>เลือกสินค้าที่ต้องเบิก*</label>

                                                        <select name="product_id" class="form-control border-input js-example-basic-single" required="">
                                                            <option value="">-- เลือกสินค้าที่ต้องเบิก --</option>


                                                            @if(isset($product))
                                                              @foreach($product as $u)
                                                                  <option value="{{$u->id}}">{{$u->product_name}}</option>
                                                              @endforeach
                                                            @endif

                                                    </select>

                                                        @if ($errors->has('product_id'))
                                                            <span class="help-block">
                                                                <strong>กรุณาเลือกสินค้าที่ต้องเบิก ของคุณด้วย</strong>
                                                            </span>
                                                        @endif
                                                    </div>


                                                  <div class="form-group{{ $errors->has('product_total') ? ' has-error' : '' }}">
                                                      <label>จำนวนสินค้า*</label>
                                                      <input type="text" class="form-control border-input" placeholder="20" name="product_total" value="{{ old( 'product_total') }}">
                                                      @if ($errors->has('product_total'))
                                                          <span class="help-block">
                                                              <strong>กรุณาใส่ จำนวน สินค้า ของคุณด้วย</strong>
                                                          </span>
                                                      @endif
                                                  </div>







                                                  <input type="hidden" class="form-control border-input" name="shop_id" value="{{$shop->id}}">








                                <div class="form-group{{ $errors->has('product_detail') ? ' has-error' : '' }}">
                                    <label>รายละเอียดสินค้า*</label>

                                    <textarea rows="3" class="form-control border-input" name="product_detail" id="summernote" placeholder="Here can be your description" value="Mike">{{ old( 'product_detail') }}</textarea>
                                  
                                </div>





                                              </div>


                                          </div>

                                          <div class="">
                                              <button type="submit" class="btn btn-info btn-fill btn-wd">กดสร้างสินค้า</button>
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
