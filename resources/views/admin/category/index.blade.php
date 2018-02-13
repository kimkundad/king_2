@extends('admin.layouts.template')
@section('stylesheet')
<style>

</style>
@stop('stylesheet')

@section('content')

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

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="header">

                              <p class="category">คุณจำเป็นต้องสร้างหมวดหมู่ก่อน เพื่อใช้ในการสร้างสินค้าในขั้นตอนถัดไป</p>
                          </div>






                          <div class="content table-responsive table-full-width" style="min-height:350px; padding-bottom: 120px;">

                            <a class="btn btn-default btn-sm" href="{{url('admin/category/create')}}" role="button" style="margin-left:12px;">
                            <i class="fa fa-plus"></i> เพิ่มหมวดหมู่</a>
                            <br><br>
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>ชื่อหมวดหมู่</th>
                                    <th>ชนิดสินค้า</th>
                                    <th>สินค้าทั้งหมด</th>
                                    <th>วันที่ส้ราง</th>
                                    <th>จัดการ</th>
                                  </tr>
                                </thead>
                                  <tbody>
                                    @if($objs)
                                      @foreach($objs as $u)
                                      <tr>
                                        <td>{{$u->id}}</td>
                                        <td>{{$u->cat_name}}</td>
                                        <td>{{$u->options}}</td>
                                        <td>{{$u->options2}}</td>
                                        <td><?php echo DateThai($u->created_at); ?></td>
                                        <td>

                                          <div class="dropdown">
                                                <a href="#" class="btn dropdown-toggle btn-sm" data-toggle="dropdown">
                                                    จัดการ
                                                    <b class="caret"></b>
                                                </a>
                                                <ul class="dropdown-menu">
                                                  <li><a href="{{url('admin/category/'.$u->id)}}">ดูข้อมูล</a></li>
                                                  <li><a href="{{url('admin/category/'.$u->id.'/edit')}}">แก้ไข</a></li>
                                                  <li><a href="#">ลบข้อมูล</a></li>

                                                </ul>
                                          </div>
                                          </td>
                                      </tr>
                                      @endforeach
                                  @endif
                                  </tbody>
                              </table>

                          </div>
                      </div>
                  </div>
                </div>
                <div class="row">


                </div>

            </div>
        </div>













@stop

@section('scripts')
<script src="{{url('admin/assets/js/bootstrap-notify.js')}}"></script>

@if ($message = Session::get('del_category'))
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

@if ($message = Session::get('add_success'))
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


@stop('scripts')
