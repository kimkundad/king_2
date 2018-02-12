@extends('admin.layouts.template')
@section('stylesheet')
<link href="{{URL::asset('assets/vendor/jstree/themes/default/style.css')}}" rel="stylesheet">
<style>
.jstree-default .colored {
    color: #0088cc !important;
}
</style>
@stop('stylesheet')

@section('content')



        <div class="content">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6">
                      <div class="card">
                          <div class="header">
                              <h4 class="title">ข้อมูล {{$brander->branders_name}}</h4>

                          </div>


                          <div class="content">
                                          <div class="row">
                                              <div class="col-md-12" >


                                              </div>
                                          </div>
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



                </div>


            </div>
        </div>













@stop

@section('scripts')
<script src="{{URL::asset('assets/vendor/jstree/jstree.js')}}"></script>
<script src="{{URL::asset('assets/js/examples/examples.treeview.js')}}"></script>

@stop('scripts')
