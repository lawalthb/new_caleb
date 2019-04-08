@extends('layouts.app')

@section('title')
{{ trans('media_lang.add_class') }}
@endsection

@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('media_lang.add_class') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              {{ trans('media_lang.add_class') }}
                          </header>
                          <div class="panel-body">
                            {!! Form::open(array('url'=>'gallery/create_gallery','id'=>'demo-form2','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                            
                          <div class="col-lg-9">
                                      <div class="form-group col-md-9">
                                          <label>{{ trans('media_lang.media_title') }}</label>
                                              <input type="text" class="form-control" id="n-pwd" placeholder=" " name="title">
                                          
                                      </div>
                                      <div class="form-group col-md-9">
                                          <label class="exampleInputFile">Comment</label><br>
                                          <textarea name='comment' class="ckeditor form-control" rows="10">{{ old('body') }}</textarea>
                                        
                                  </div>
                              
                              <div class="form-group col-md-9">
                                <label for="exampleInputFile">{{ trans('media_lang.file') }}<span class="required">*</span>
                                </label>
                                <input type="file" name="file" required="required">
                                  
                              </div>
                              
                              <div class="ln_solid"></div>
                              <div class="form-group col-md-9">
                                  {!! Form::submit(trans('media_lang.add_class'), array('class'=>'btn btn-primary')) !!}
                              </div>
                              </div>
                            {!! Form::close() !!}
                          </div>

                      </section>
                  </div>
              </div>
               
@endsection
