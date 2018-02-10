@extends('layouts.template')

@section('content')


<style>
.mar-bot{
  margin-bottom: 20px;
}
</style>

  <div class="section section-basic">
    <div class="space-50"></div>
      <div class="container">


          <div id="images">

                        <div class="row">
                            <div class="col-4 col-md-3">
                                <img src="{{url('assets/img/RUOK__Twitter_400x400_V1-400x400.png')}}" alt="Rounded Image" class="rounded mar-bot">
                            </div>
                            <div class="col-8 col-md-3">
                              <h4>บริษัท แมคไทย จำกัด</h4>

                              <p class="text-muted">
                                +66 (0) 2696 4900
                              </p>
                              <p class="text-muted">
                                97/11 อาคารบิ๊กซี ราชดำริห์ ห้องเลขที่ ออฟฟิศ 1 ชั้นที่ 5 ถนนราชดำริห์ แขวงลุมพินี เขตปทุมวัน กรุงเทพฯ 10330
                              </p>
                              <p class="text-muted">
                                520000.00
                              </p>
                              <p class="text-muted">
                                แขวงลุมพินี เขตปทุมวัน กรุงเทพฯ 10330
                              </p>
                              <p class="text-muted">
                                จันทร์ - ศุกร์ เวลา 08.30 น. - 17.30 น.
                              </p>
                            </div>

                        </div>
                        <div class="row">
                        </div>
                    </div>


          <div class="space-70"></div>
          <div class="row" id="checkRadios">
              <div class="col-sm-6 col-lg-3">


              </div>
              <div class="col-sm-6 col-lg-3">


              </div>
          </div>
      </div>
  </div>



@endsection
