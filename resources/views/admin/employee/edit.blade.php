@extends('admin.layouts.template')

@section('stylesheet')

@stop('stylesheet')

@section('content')



        <div class="content">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6">
                      <div class="card">
                          <div class="header">
                              <h4 class="title">{{$header}}</h4>

                          </div>


                          <div class="content">

                            <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}

                                          <div class="row">
                                              <div class="col-md-12" style="padding-right: 15px;">

                                                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                      <label>ชื่อพนักงาน*</label>
                                                      <input type="text" class="form-control border-input" name="name" value="{{$employee->name}}">
                                                      <input type="hidden" name="shop_id" class="form-control" value="{{ $shop_id }}" required>
                                                      @if ($errors->has('name'))
                                                          <span class="help-block">
                                                              <strong>กรุณาใส่ ชื่อพนักงาน ของคุณด้วย</strong>
                                                          </span>
                                                      @endif
                                                  </div>

                                                  <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                      <label>เบอร์โทร*</label>
                                                      <input type="number" class="form-control border-input" name="phone" value="{{$employee->phone}}">
                                                      @if ($errors->has('phone'))
                                                          <span class="help-block">
                                                              <strong>กรุณาใส่ เบอร์โทร ของคุณด้วย</strong>
                                                          </span>
                                                      @endif
                                                  </div>


                                                  <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                                                      <label>เลือกเพศ*</label>
                                                      <select name="sex" class="form-control border-input" required>

                    								                      <option value="1" onload="
                                                          @if($employee->sex == 1)
                                                          selected="selected"
                                                          @endif
                                                          ">เพศชาย</option>
                                                          <option value="2"
                                                          @if($employee->sex == 2)
                                                          selected="selected"
                                                          @endif
                                                          >เพศหญิง</option>

                    								                    </select>
                                                      @if ($errors->has('sex'))
                                                          <span class="help-block">
                                                              <strong>กรุณา เลือกเพศ ของคุณด้วย</strong>
                                                          </span>
                                                      @endif
                                                  </div>










                                              </div>


                                          </div>

                                          <div class="">
                                              <button type="submit" class="btn btn-info btn-fill btn-wd">กดสร้าง พนักงาน</button>
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


@stop('scripts')
