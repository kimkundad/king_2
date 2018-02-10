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
</style>

  <div class="section section-tabs" style="padding: 20px 0;">

      <div class="container">


          <div id="images">

                        <div class="row">
                            <div class="col-4 col-md-3">
                              <div class="avatar">
                                <img src="{{url('assets/img/RUOK__Twitter_400x400_V1-400x400.png')}}" alt="Rounded Image" class="rounded mar-bot">
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



@endsection
