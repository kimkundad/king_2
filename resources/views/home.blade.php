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
                          @if($objs)
                      @foreach($objs as $u)
                            <div class="col-6 col-md-3">
                              <a href="{{url('/brander/'.$u->id)}}">
                                <img src="{{url('admin/assets/product/'.$u->branders_image)}}" alt="Rounded Image" class="rounded mar-bot">
                              </a>
                            </div>

                            @endforeach
                      @endif

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


@section('scripts')




@stop('scripts')
