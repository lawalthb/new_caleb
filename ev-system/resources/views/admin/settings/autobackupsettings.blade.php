@extends('layouts.app')

@section('title')
Autobackup Settings
@endsection

@section('content')      

  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
              <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">Auto Backup Settings</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>




            <div class="row">
              <div class="col-lg-12">
                  
                      <section class="panel">
                          <header class="panel-heading">
                              Auto Backup Settings
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
                    {!! Form::open(array('url'=>'autobackup_settings','id'=>'demo-form2','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label for="first-name">Name
                        </label>
                          <input type="text" id="first-name" value="" required="required" name="system_name" class="form-control col-md-7 col-xs-12">
                      
                      </div>
                      
                      <div class="form-group">
                        <label>Allow Autobackup
                        </label>
                            <select name="skin_color" class="form-control">
                            <option value="default">yes</option>
                            <option value="blue">no</option>
                          </select>
                        </div>
                        <div class="form-group">
                        <label>Interval
                        </label>
                            <select name="skin_color" class="form-control">
                            <option value="default">Every Minutes</option>
                            <option value="blue">Every Hour</option>
                            <option value="blue">Every Day</option>
                            <option value="blue">Every Month</option>
                            <option value="blue">Every Year</option>
                          </select>
                        </div>
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          {!! Form::submit('Update', array('class'=>'btn btn-primary', 'name'=>'publish')) !!}
                        </div>
                      </div>
                    {!! Form::close() !!}
                  </div>
                   
                              </section>
                          </div>
                      </section>
                  </div> 
                  </div> 
                </div>
  

@endsection



