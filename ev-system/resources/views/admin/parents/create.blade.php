@extends('layouts.app')

@section('title')
 {{ trans('parentes_lang.add_parentes') }}
@endsection

@section('content')
                     

 
              <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li><a href="#">{{ trans('parentes_lang.panel_title') }}</a></li>
                          <li class="active"> {{ trans('parentes_lang.add_parentes') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>




            <div class="row">
              <div class="col-lg-12">
                  
                      <section class="panel">
                          <header class="panel-heading">
                               {{ trans('parentes_lang.add_parentes') }}
                          </header>
                          <div class="panel-body">
                    {!! Form::open(array('url'=>'parents/create_parent','id'=>'demo-form2','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                    
                      <div class="col-lg-9">
                      <div class="form-group">
                        <label for="exampleInputFile">{{ trans('student_lang.student_name') }}<span class="required">*</span>
                        </label>
                          <input type="text" id="first-name" value="{{ old('name') }}" required="required" placeholder="" name="name" class="form-control col-md-7 col-xs-12">
                     
                      </div>
                      <div class="form-group">
                        
                        <label for="exampleInputFile">{{ trans('student_lang.student_email') }}<span class="required">*</span>
                        </label>
                          <input type="text" id="last-name" name="email" value="{{ old('email') }}" required="required" class="form-control col-md-7 col-xs-12">
                       
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputFile">{{ trans('student_lang.student_password') }}</label>
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" value="{{ old('password') }}" type="password" name="password">
                     
                      </div>
                      <div class="form-group">
                        
                        <label for="exampleInputFile">{{ trans('student_lang.student_address') }}<span class="required">*</span>
                        </label>
                          <input type="text" id="last-name" name="address" value="" required="required" class="form-control col-md-7 col-xs-12">
                       
                      </div>
                      <div class="form-group">
                        
                        <label for="exampleInputFile">{{ trans('student_lang.student_phone') }}<span class="required">*</span>
                        </label>
                          <input type="text" id="last-name" name="phone" value="" required="required" class="form-control col-md-7 col-xs-12">
                       
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputFile">{{ trans('student_lang.student_photo') }}<span class="required">*</span>
                        </label>
                          <input type="file" name="file" required>
                          
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          {!! Form::submit(trans('parentes_lang.add_parentes'), array('class'=>'btn btn-primary', 'name'=>'publish')) !!}
                      </div>
                      </div>
                    {!! Form::close() !!}
                  </div>
                      </section>
                  </div> 
                  </div> 
                </div>
      



@endsection
