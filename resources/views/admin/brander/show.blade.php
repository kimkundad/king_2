@extends('admin.layouts.template')
@section('stylesheet')
<link href="{{URL::asset('assets/vendor/jstree/themes/default/style.css')}}" rel="stylesheet">
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
                  <div class="col-md-6">
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



                  <div class="col-md-6">
                      <div class="card">
                          <div class="header">
                              <h4 class="title">Tree-view</h4>

                          </div>


                          <div class="content">
                                          <div class="row">
                                              <div class="col-md-12" >

                                                <div id="treeBasic">
                                                  <ul>
                                                    <li class="colored">
                                                       {{$brander->branders_name}}
                                                      <ul>
                                                        <li data-jstree='{ "selected" : true }'>
                                                          <a href="#">Shop {{$brander->branders_name}} 1</a>
                                                        </li>
                                                        <li data-jstree='{ "opened" : true }'>
                                                           Shop {{$brander->branders_name}} 2
                                                          <ul>
                                                            <li data-jstree='{ "disabled" : true }'>
                                                               Product 1
                                                            </li>
                                                            <li data-jstree='{ "type" : "file" }'>
                                                               Child Node
                                                            </li>
                                                            <li data-jstree='{ "icon" : "fa fa-picture-o" }'>
                                                               Custom Icon
                                                            </li>
                                                          </ul>
                                                        </li>


                                                      </ul>
                                                    </li>

                                                  </ul>
                                                </div>


                                              </div>
                                          </div>
                          </div>

                      </div>
                  </div>




                  <div class="col-md-6">
                      <div class="card">




                          <div class="content">
                                          <div class="row">

                                            <div class="col-md-12">
                                              <a href="{{url('admin/shop/create')}}" class="btn btn-success btn-fill btn-wd"> สร้าง Shop ใหม่</a>
                                              <br><br>
                                            </div>


                                              <div class="col-md-4 col-sm-6 col-xs-6" >
                                                <label>Shop 1</label>
                                                <img src="{{url('admin/assets/product/'.$brander->branders_image)}}"  class="img-responsive"><br>
                                              </div>
                                              <div class="col-md-4 col-sm-6 col-xs-6" >
                                                <label>Shop 2</label>
                                                <img src="{{url('admin/assets/product/'.$brander->branders_image)}}"  class="img-responsive"><br>
                                              </div>
                                              <div class="col-md-4 col-sm-6 col-xs-6" >
                                                <label>Shop 1</label>
                                                <img src="{{url('admin/assets/product/'.$brander->branders_image)}}"  class="img-responsive"><br>
                                              </div>
                                              <div class="col-md-4 col-sm-6 col-xs-6" >
                                                <label>Shop 2</label>
                                                <img src="{{url('admin/assets/product/'.$brander->branders_image)}}"  class="img-responsive"><br>
                                              </div>


                                          </div>
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

@stop('scripts')
