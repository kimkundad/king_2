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
                            <div class="col-8 col-md-9" >
                              <h3>บริษัท แมคไทย จำกัด</h3>

                              <p class="text-muted">
                                +66 (0) 2696 4900
                              </p>

                            </div>

                        </div>
                        <div class="row">
                        </div>
                    </div>




      </div>
  </div>



@endsection
