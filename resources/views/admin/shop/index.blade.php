@extends('admin.layouts.template')
@section('stylesheet')
  <link rel="stylesheet" href="{{asset('admin/assets/bootstrap-switch-master/css/bootstrap3/bootstrap-switch.css')}}" />
<style>

</style>
@stop('stylesheet')

@section('content')



        <div class="content">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                      <div class="card">







                          <div class="content table-responsive table-full-width">

                            <a class="btn btn-default " href="{{url('admin/shop/create')}}" role="button" style="margin-left:12px;">
                            <i class="fa fa-plus"></i> เพิ่ม shop ใหม่</a>
                            <br><br>
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>ชื่อ shop</th>
                                    <th>Brand</th>
                                    <th>เบอร์โทร</th>
                                    <th>สถานะ</th>
                                    <th>จัดการ</th>
                                  </tr>
                                </thead>
                                  <tbody>


              @if($objs)
                @foreach($objs as $u)
                                      <tr id="{{$u->ids}}">
                                        <td><a href="{{url('admin/shop/'.$u->ids)}}">{{$u->shop_code}}</a></td>
                                        <td><a href="{{url('admin/shop/'.$u->ids)}}">{{$u->shop_name}}</a></td>
                                        <td>{{$u->branders_name}}</td>
                                        <td>{{$u->shop_phone}}</td>
                                        <td>

                                          <input type="checkbox" name="my-checkbox" id="switch-size" data-size="mini"
                         @if($u->shop_status == 1)
                          checked="checked"
                          @endif
                          />
                                        </td>
                                        <td>
                                          <a style="float:left; margin-right:5px;" title="ดูข้อมูล" class="btn btn-warning btn-xs" href="{{url('admin/shop/'.$u->ids)}}" role="button"><i class="ti-blackboard"></i> </a>
                                          <a style="float:left; margin-right:5px;" title="แก้ไข" class="btn btn-primary btn-xs" href="{{url('admin/shop/'.$u->ids.'/edit')}}" role="button"><i class="fa fa-cog "></i> </a>

                                          <form  action="{{url('admin/shop/'.$u->ids)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                                            <input type="hidden" name="_method" value="DELETE">
                                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" title="ลบหมวดหมู่" class="btn btn-danger btn-xs"><i class="fa fa-times "></i></button>
                                          </form>

                                          </td>
                                      </tr>
                @endforeach
              @endif

                                  </tbody>
                              </table>
                              {{ $objs->links() }}
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
<script src="{{asset('admin/assets/bootstrap-switch-master/js/bootstrap-switch.js')}}"></script>



<script type="text/javascript">
$(document).ready(function(){
  $("[name='my-checkbox']").bootstrapSwitch();
//  $("input:checkbox").change(function() {

$("[name='my-checkbox']").on('switchChange.bootstrapSwitch',function(){
    var product_id = $(this).closest('tr').attr('id');

    $.ajax({
            type:'POST',
            url:'{{secure_asset('api/post_status')}}',
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



              }
            }
        });
    });
});
</script>


@if ($message = Session::get('del_product'))
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


@stop('scripts')