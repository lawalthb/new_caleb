@extends('layouts.app')

@section('title')
{{ trans('setting_lang.panel_title') }}
@endsection

@section('content')
        <link href="{{ asset('ev-assets/backend/assets/bootstrap-colorpicker/css/colorpicker.css') }}" rel="stylesheet">             
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
              <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('setting_lang.panel_title') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>

            <div class="row">
              <div class="col-lg-12">
                  
                      <section class="panel">
                          <header class="panel-heading">
                              {{ trans('setting_lang.panel_title') }}
                          </header>
                          <div class="panel-body">
                    {!! Form::open(array('url'=>'general_settings','id'=>'demo-form2','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                    <div class="col-lg-9">
                      <div class="form-group">
                        <label for="first-name">System Name
                        </label>
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" id="first-name" required="required" name="id" value="1" class="form-control col-md-7 col-xs-12">
                          <input type="text" id="first-name" value="{{ $settings->system_name }}" required="required" placeholder="Enter title here" name="system_name" class="form-control col-md-7 col-xs-12">
                      
                      </div>
                      <div class="form-group">
                        <label>{{ trans('setting_lang.setting_school_name') }} <span class="required">*</span>
                        </label>
                          <input type="text" id="last-name" name="system_title" value="{{ $settings->system_title }}" required="required" class="form-control col-md-7 col-xs-12">
                        
                      </div>
                      <div class="form-group">
                        <label>{{ trans('setting_lang.setting_school_address') }}</label>
                        
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" value="{{ $settings->address }}" type="text" name="address">
                       
                      </div>
                      <div class="form-group">
                        <label>{{ trans('setting_lang.setting_school_email') }}
                        </label>
                          <input value="{{ $settings->system_email }}" name="system_email" class="date-picker form-control col-md-7 col-xs-12" type="text">
                        </div>
                      <div class="form-group">
                        <label>{{ trans('setting_lang.setting_school_currency_code') }}</label>
                          <input value="{{ $settings->currency }}" name="currency" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      <div class="form-group">
                        <label>Text-align
                        </label>
                          <input value="{{ $settings->text_align }}" name="text_align" class="date-picker form-control col-md-7 col-xs-12" type="text">
                        </div>
                      <div class="form-group">
                        <label>User can change skin??
                        </label>
                          <select name="can_change" class="form-control">
                            <option value="1" @if($settings->can_change == 1) selected="selected" @endif>Yes</option>
                            <option value="0" @if($settings->can_change == 0) selected="selected" @endif>No</option>
                          </select>
                        </div>
                      <div class="form-group">
                        <label>Skin Colour
                        </label>
                          <select name="skin_color" class="form-control">
                            <option value="default" @if($settings->skin_color == 'default') selected='selected' @endif>Default</option>
                            <option value="blue" @if($settings->skin_color == 'blue') selected='selected' @endif>Blue</option>
                            <option value="green" @if($settings->skin_color == 'green') selected='selected' @endif>Green</option>
                            <option value="purple" @if($settings->skin_color == 'purple') selected='selected' @endif>Purple</option>
                            <option value="yellow" @if($settings->skin_color == 'yellow') selected='selected' @endif>Yellow</option>
                            <option value="red" @if($settings->skin_color == 'red') selected='selected' @endif>Red</option>
                          </select>
                        </div>
                      <div class="form-group">
                        <label>Front Page Active?
                        </label>
                          <select name="page" class="form-control">
                            <option value="1" @if($settings->page == 1) selected="selected" @endif>Yes</option>
                            <option value="0" @if($settings->page == 0) selected="selected" @endif>No</option>
                          </select>
                        </div>
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          {!! Form::submit(trans('setting_lang.update_setting'), array('class'=>'btn btn-primary', 'name'=>'publish')) !!}
                        </div>
                      </div>
                    {!! Form::close() !!}
                  </div>
                      </section>
                  </div> 
                  </div> 
                </div>
  
 <script src="{{ asset('ev-assets/backend/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>

@endsection



