@extends('layouts.template')
@section('stylesheet')
<link rel="stylesheet" href="{{url('assets/magnific-popup/magnific-popup.css')}}">

@stop('stylesheet')
@section('content')


<style>
.mar-bot{
  margin-bottom: 20px;
}
.avatar {

    overflow: hidden;

    margin-right: 5px;
}
.category-1{
  margin-bottom: 5px;
color: #17a2b8;
font-size: 0.9em;
font-weight: 500;
}
.h5-set{
      font-weight: bold;
  color: #848282;
  font-size: 0.9em;
  margin-bottom: 0px;
  margin-top: 5px;
}
.table td, .table th {
    padding: .6rem;

}
.profile-page .gallery {
    margin-top: 45px;
    padding-bottom: 50px;
}
.img-circle {
    border-radius: 50%;
}
.avatar2 {
    width: 30px;
    height: 30px;
    overflow: hidden;
    border-radius: 50%;
    margin-right: 5px;
}
.text-muted {
    font-size: 12px;
}
.author {
    text-align: center;

}
.table td, .table th {
    padding: .45rem;
}
a.ab {
      text-decoration: none;
}
</style>
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
  <div class="section section-tabs" style="padding: 20px 0;">

      <div class="container">


          <div id="images">

                        <div class="row">
                            <div class="col-12">
                              <a class="btn btn-primary btn-round " href="{{url('sub_shop/'.$product->ids)}}" style="color: #FFFFFF;">กลับสู่ shop</a>
                              <br><br>

                              <p class="category" style="color: #2c2c2c;">{{$header}} </p>

                              <div class="author">
                              <img src="{{url('admin/assets/product/'.$product->product_image)}}" alt="{{$product->product_name}}" class="img-raised mar-bot">
                              </div>

                            </div>


                        </div>
                        <div class="row">
                        </div>
                    </div>




      </div>
  </div>



  <div class="section section-basic " style="padding-bottom: 0px;">
                <div class="container">















                    <div class="row">
                      <div class="col-md-10 ml-auto mr-auto">
                        <br>
                        <h6>ข้อมูลสินค้า</h6>
                        <table class="table">

                          <tbody>

                            <tr>
                              <th scope="row">
                                <h5 class="h5-set">รหัสสินค้า </h5>
                                <p class="category-1">#{{$product->product_code}}</p>
                              </th>
                            </tr>

                            <tr>
                              <th scope="row">
                                <h5 class="h5-set">หมวดหมู่ </h5>
                                <p class="category-1">{{$product->cat_name}}</p>
                              </th>
                            </tr>



                            <tr>
                              <th scope="row">
                                <h5 class="h5-set">วันที่สร้าง</h5>
                                <p class="category-1"><?php echo DateThai($product->created); ?></p>
                              </th>
                            </tr>
                            <tr>
                              <th scope="row">
                                <h5 class="h5-set">รายละเอียด</h5>
                                <p class="category-1">{{$product->product_detail}}</p>
                              </th>
                            </tr>
                          </tbody>
                          </table>
                      </div>

                        <!-- Tab panes -->
                        <div class="col-md-12">

                        </div>

                    </div>






                </div>
            </div>



            <div class="text-center">
            <img src="{{url('assets/img/app-banner_2.png')}}" class="img-responsive ">
            </div>




            <div class="section section-basic " style="padding-bottom: 150px;">
                          <div class="container">

                            <br><br>

                            <div class="row">

                              <div class="col-md-10 ml-auto mr-auto">

                                <button class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal">
                                    เพิ่มรายการ
                                </button>


                                <div class="modal fade modal-primary" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header justify-content-center">
                                                <div class="modal-profile">
                                                    <h6>ใส่ข้อมูลเพื่อตัดสินค้าในสต็อก</h6>
                                                </div>
                                            </div>

                                            <form class="form-horizontal" action="{{url('add_num_stock')}}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}

                                            <div class="modal-body">
                                              <div class="form-group">
                                                  <input type="number" placeholder="ใส่จำนวน ตัวเลข" name="number_stock" class="form-control" required>
                                                  <input type="hidden" name="product_id" value="{{$product->idp}}" class="form-control">
                                              </div>

                                              <div class="form-group">
                                              <textarea class="form-control" name="detail_stock" placeholder="ใส่รายละเอียด ที่นี่" rows="3"></textarea>
                                              </div>

                                              <div class="footer text-center">
                                                  <button class="btn btn-neutral btn-round btn-lg" type="submit">ส่งข้อมูล</button>
                                              </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link btn-neutral"></button>
                                                <button type="button" class="btn btn-link btn-neutral" data-dismiss="modal">Close</button>
                                            </div>

                                          </form>
                                        </div>
                                    </div>
                                </div>








                                <br><br>

                                <div class="content table-responsive table-full-width">



                                  <h6>จำนวนสินค้า <span class="text-primary">{{$product->product_sum}}</span></h6>
                          <table class="table table-striped">
                            <tr>
                                <th>วันที่</th>

                                <th>จำหน่าย</th>

                                <th>ผู้ใช้งาน</th>
                            </tr>
                              <tbody>

                                @if($objs)
                                    @foreach($objs as $u)
                                                          <tr id="{{$u->st_id}}">

                                                            <td><?php echo DateThai($u->created_stock); ?> </td>

                                                            <td>{{$u->product_total}}</td>

                                                            <td>{{$u->name}}</td>


                                                          </tr>
                                    @endforeach
                                  @endif

                              </tbody>
                          </table>

                      </div>


                                </div>

                                </div>








                                <div class="row magnific-gallery" style="margin-top:20px;">

                                  <div class="col-12">
                                    <h6>รูปภาพประกอบสินค้า</h6>
                                    </div>

                                    @if($img_all)
                                    @foreach($img_all as $img_u)
                                    <div class="col-6 col-md-6">
                                      <a class="example-image-link" href="{{url('admin/assets/gallery_product/'.$img_u->image)}}" >
                                      <img src="{{url('admin/assets/gallery_product/'.$img_u->image)}}" alt="{{$product->product_name}}" class="img-raised mar-bot ">
                                      </a>
                                    </div>
                                    @endforeach
                                    @endif



                                </div>








                                </div>

                                </div>

@endsection

@section('scripts')
<script src="{{url('assets/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{url('admin/assets/js/bootstrap-notify.js')}}"></script>

@if ($message = Session::get('success_stock'))
<script type="text/javascript">
type = ['success'];
$.notify({
    icon: "ti-gift",
    message: "ทำการเพิ่มข้อมูล สำเร็จเรียบร้อย"

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

@if ($message = Session::get('error_stock'))
<script type="text/javascript">
type = ['danger'];

$.notify({
    icon: "ti-face-sad",
    message: "จำนวนสินค้าของคุณไม่เพียงพอ ต่อการทำรายการ"

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


<script>
$(document).ready(function() {
  $('.magnific-gallery').each(function() {
$(this).magnificPopup({
    delegate: 'a',
    type: 'image',
    gallery:{enabled:true}
});
});
});
</script>





@stop('scripts')
