@extends('layouts.template')

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
      color: #9A9A9A;
}
.h5-set{
  font-size: 1.3em;
  margin-bottom: 0px;
  margin-top: 10px;
}
</style>

  <div class="section section-tabs" style="padding: 20px 0;">

      <div class="container">


          <div id="images">

                        <div class="row">
                            <div class="col-4 col-md-3">
                              <div class="avatar">
                                <img src="{{url('assets/img/RUOK__Twitter_400x400_V1-400x400.png')}}" alt="Rounded Image" class="rounded ">
                              </div>

                            </div>
                            <div class="col-8 col-md-9" style="padding-left: 1px;">
                              <h6 style="font-size: 1.2em;">บริษัท แมคไทย จำกัด</h6>

                              <div class="button-container" style="    margin-top: 10px;">
                                  <a href="#button" class="btn btn-primary btn-round btn-sm">Follow</a>
                                  <a href="#button" class="btn btn-default btn-round btn-sm btn-icon" rel="tooltip" title="" data-original-title="Follow me on Twitter">
                                      <i class="fa fa-twitter"></i>
                                  </a>
                                  <a href="#button" class="btn btn-default btn-round btn-sm btn-icon" rel="tooltip" title="" data-original-title="Follow me on Instagram">
                                      <i class="fa fa-instagram"></i>
                                  </a>
                              </div>

                            </div>

                        </div>
                        <div class="row">
                        </div>
                    </div>




      </div>
  </div>



  <div class="section section-basic">
                <div class="container">


                    <div id="buttons">


                      <table class="table">

                        <tbody>
                          <tr>
                            <th scope="row">
                              <h5 class="h5-set">ชื่อ</h5>
                              <p class="category-1">Little Reveurs</p>
                            </th>
                          </tr>
                          <tr>
                            <th scope="row">
                              <h5 class="h5-set">เบอร์โทรศัพ์</h5>
                              <p class="category-1">080-111-3193</p>
                            </th>
                          </tr>
                          <tr>
                            <th scope="row">
                              <h5 class="h5-set">กลุ่มสินค้า</h5>
                              <p class="category-1">กิ๊ฟช็อป</p>
                            </th>
                          </tr>
                          <tr>
                            <th scope="row">
                              <h5 class="h5-set">ร้านค้าประเภท</h5>
                              <p class="category-1">กิ๊ฟช็อป</p>
                            </th>
                          </tr>
                          <tr>
                            <th scope="row">
                              <h5 class="h5-set">ที่อยู่</h5>
                              <p class="category-1">31/99 โพธิ์ทองแมนชั่น ซอยพหลโยธิน34 แขวงเสนานิคม เขตจตุจักร กรุงเทพฯ 10900</p>
                            </th>
                          </tr>

                          <tr>
                            <th scope="row">
                              <h5 class="h5-set">รายละเอียด</h5>
                              <p class="category-1">Little Reveurs ขายตุ๊กตา น่ารัก น่ากอด ขนนุ่ม ขนฟู เหมาะสำหรับเป็นของขวัญในทุกโอกาสพิเศษ</p>
                            </th>
                          </tr>
                        </tbody>
                        </table>








                    </div>





                </div>
            </div>



@endsection
