@extends('layouts.app')

@section('title')
{{ trans('student_lang.add_student') }} ({{ trans('mailandsms_lang.mailandsms_bulk') }})
@endsection

@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="#"><i class="fa fa-home"></i> {{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li><a href="#">{{ trans('topbar_menu_lang.menu_student') }}</a></li>
                          <li class="active">{{ trans('student_lang.add_student') }} ({{ trans('mailandsms_lang.mailandsms_bulk') }})</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>




            <div class="row">
              <div class="col-lg-12">
                  
                      <section class="panel">
                          <header class="panel-heading">
                              {{ trans('student_lang.add_student') }} ({{ trans('mailandsms_lang.mailandsms_bulk') }})

                          </header>
                          <header class="panel-heading">
                          <a class="btn btn-primary" href="{{ url('ev-assets\uploads\sample-import\students.csv') }}" style="margin:5px">
                                  Download Sample
                              </a>
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
                          <div class="panel-body">
                          {!! Form::open(array('url'=>'students/create_bulk_student','id'=>'demo-form2','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                          <div class="col-lg-9">
                              <div class="form-group">
                                  <label  class="col-lg-2 control-label">{{ trans('topbar_menu_lang.menu_classes') }}
                                </label>
                                <div class="col-lg-9">
                                  <select name="class_id" class="form-control" data-validate="required" id="class_id" 
                                                      data-message-required="this is required"
                                                        onchange="return get_class_sections(this.value)" required>
                                    <option value="">Choose..</option>
                                    @foreach( $class as $classes )
                                    <option value="{{ $classes->id }}">{{ $classes->title }}</option>
                                    @endforeach
                                  </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                <label  class="col-lg-2 control-label">{{ trans('mailandsms_lang.mailandsms_bulk') }}
                                                        </label>
                                <div class="col-lg-9">
                                <input type="file" name="import_file" required="required" class="form-control" >
                                </div>
                              </div>
                              
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    {!! Form::submit(trans('student_lang.add_student').' ('.trans('mailandsms_lang.mailandsms_bulk').')', array('class'=>'btn btn-primary')) !!}
                                </div>
                              </div>
                        {!! Form::close() !!}
                      </div>
                      </section>
                  </div> 
                  </div> 
      

      




@endsection
