@extends('layouts.app')

@section('title')
{{ trans('hostel_lang.update_hostel') }}
@endsection

@section('content')
       
              <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('hostel_lang.update_hostel') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>




            <div class="row">
              <div class="col-lg-12">
                  
                      <section class="panel">
                          <header class="panel-heading">
                              {{ trans('hostel_lang.update_hostel') }}
                          </header>
                          <div class="panel-body">
                            {!! Form::open(array('url'=>'editdormitory','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('hostel_lang.hostel_name') }}</label>
                                                  <div class="col-lg-4">
                                                      <input type="text" class="form-control" id="f-name" value="{{ $dorm->name}}" name="name">
                                                      <input type="hidden" class="form-control" id="f-name" value="{{ $dorm->id}}" name="id">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Room Number</label>
                                                  <div class="col-lg-4">
                                                      <input type="text" class="form-control" id="f-name" value="{{ $dorm->room_number}}" name="room_no">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('hostel_lang.hostel_note') }}</label>
                                                  <div class="col-lg-4">
                                                      <input type="text" class="form-control" id="f-name" value="{{ $dorm->description}}" name="desc">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                  </div>
                                              </div>
                                                      </div>
                                          <div class="modal-footer col-lg-6">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-success" type="submit" name='submit'>{{ trans('hostel_lang.update_hostel') }}</button>
                                          
                                          </div>
                                          {!! Form::close() !!}
                  </div>
                      </section>
                  </div> 
                  </div> 
                </div>
      
          </section>
      </section>



@endsection
