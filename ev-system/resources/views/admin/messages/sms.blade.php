@extends('layouts.app')

@section('title')
{{ trans('mailandsms_lang.mailandsms_sms') }}
@endsection

@section('content')
       
              <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('mailandsms_lang.mailandsms_sms') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>




            <div class="row">
              <div class="col-lg-12">
                  
                      <section class="panel">
                          <header class="panel-heading">
                              {{ trans('mailandsms_lang.mailandsms_sms') }}
                          </header>
                          @if(Session::has('message'))   
                            <div class="white-box">
                              @if(Session::get('message') == trans('topbar_menu_lang.success'))
                              <div class="alert alert-success fade in" id='gritter-notice-wrapper' data-dismiss="alert" aria-label="close">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('message') }}
                              </div>
                              @else
                              <div class="alert alert-warning fade in" id='gritter-notice-wrapper' data-dismiss="alert" aria-label="close">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('message') }}
                              </div>
                              @endif
                            </div>
                            @endif
                            @if(Session::has('data'))   
                            <div class="container">
                              <div class="alert alert-success fade in" id='gritter-notice-wrapper' data-dismiss="alert" aria-label="close">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('data') }}
                              </div>
                            </div>
                            @endif
                          <div class="panel-body">
                    {!! Form::open(array('url'=>'send_sms','id'=>'demo-form2','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                    
                  <div class="col-lg-9">
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">{{ trans('message_lang.to') }}
                                                </label>
                                                <div class="col-lg-10">
                                                  <select name="to" class="form-control" data-validate="required" id="class_id" 
                                                                      data-message-required="this is required"
                                                                        onchange="return get_class_sections(this.value)">
                                                    <option value="">Choose..</option>
                                                    <option value="admin">{{ trans('topbar_menu_lang.Admin') }}</option>
                                                    <option value="student">{{ trans('mailandsms_lang.mailandsms_students') }}</option>
                                                    <option value="teacher">{{ trans('mailandsms_lang.mailandsms_teachers') }}</option>
                                                    <option value="parent">{{ trans('mailandsms_lang.mailandsms_parents') }}</option>
                                                  </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">{{ trans('mailandsms_lang.mailandsms_getway') }}
                                                </label>
                                                <div class="col-lg-10">
                                                  <select name="send_by" class="form-control" data-validate="required">
                                                    <option value="">Choose..</option>
                                                    <option value="twilio">Twilio</option>
                                                    <option value="callfire">Call Fire</option>
                                                    <option value="eztexting">EZTexting</option>
                                                    <option value="flowroute">FlowRoute</option>
                                                    <option value="labsmobile">LabsMobile</option>
                                                    <option value="mozeo">Mozeo</option>
                                                    <option value="nexmo">Nexmo</option>
                                                    <option value="plivo">Plivo</option>
                                                    <option value="zenvia">Zenvia</option>
                                                  </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">{{ trans('message_lang.message_message') }}</label>
                                                  <div class="col-lg-10">
                                                      <textarea name="body" id="" class="form-control" cols="30" rows="10" required></textarea>
                                                  </div>
                                              </div>

                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                      <button type="submit" class="btn btn-send">{{ trans('message_lang.send') }}</button>
                                                  </div>
                                              </div>
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
