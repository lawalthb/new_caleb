@extends('layouts.app')

@section('title')
{{ trans('section_lang.panel_title') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('section_lang.panel_title') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             {{ trans('section_lang.panel_title') }}
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
                          <header class="panel-heading">
                          <a class="btn btn-success" data-toggle="modal" href="#myModal2" style="margin:5px">
                                  {{ trans('section_lang.add_class') }}
                              </a>
                            </header>
                           <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">{{ trans('section_lang.add_class') }}</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'class/create_section','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">

                                          
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('section_lang.section_name') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="" name="title">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">{{ trans('section_lang.section_teacher_name') }}
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="teacher_id" class="form-control" data-validate="required" id="class_id" 
                                                                      data-message-required="this is required"
                                                                        onchange="return get_class_sections(this.value)">
                                                    <option value="">Choose..</option>
                                                    @foreach( $teacher as $teachers )
                                                    <option value="{{ $teachers->id }}">{{ $teachers->name }}</option>
                                                    @endforeach
                                                  </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">{{ trans('section_lang.section_classes') }}
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="class_id" class="form-control" data-validate="required" id="class_id" 
                                                                      data-message-required="this is required"
                                                                        onchange="return get_class_sections(this.value)">
                                                    <option value="">Choose..</option>
                                                    @foreach( $classes as $cla )
                                                    <option value="{{ $cla->id }}">{{ $cla->title }}</option>
                                                    @endforeach
                                                  </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                  </div>
                                              </div>
                                                      </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'> {{ trans('section_lang.add_class') }}</button>
                                          
                                          </div>
                                          {!! Form::close() !!}
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                              <!-- Custom Tabs -->
                              <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                  @foreach( $classes as $class )
                                  <li class="<?php 
                          if ($class->id == $classes->first()->id) {
                            echo 'active';
                          }?>">
                                      <a href="{{ url('class/section_list/'.$class->id) }}"><i class="fa fa-signal"></i> {{ $class->title}} </a>
                                  </li>
                                  @endforeach<!-- 
                                  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> -->
                                </ul>
                                <div class="tab-content">
                                  <div class="tab-pane active" id="tab_1">

                                  <div id="hide-table">
                                      <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                                  <thead>
                                                  <tr>
                                                      <th>{{ trans('section_lang.slno') }}</th>
                                                      <th>{{ trans('section_lang.section_name') }}</th>
                                                      <th>{{ trans('section_lang.section_teacher_name') }}</th>
                                                      <th>{{ trans('section_lang.section_classes') }}</th>
                                                      <th>{{ trans('student_lang.action') }}</th>
                                                  </tr>
                                                  </thead>
                                                  <tbody>
                                                    @if ( !$classes->count() )
                                                    <div style="padding: 10px">There is no class available</div>
                                                    @else 

                                                    @foreach( $sections as $key => $section )
                                                  <tr>
                                                      <td data-title="{{ trans('section_lang.slno') }}">{{ $key+1 }}</td>
                                                      <td data-title="{{ trans('section_lang.section_name') }}">{{ $section->title }}</td>
                                                      <td data-title="{{ trans('section_lang.section_teacher_name') }}">{{ $section->teacher($section->teacher_id) ? $section->teacher($section->teacher_id)->name : null }}</td>
                                                      <td data-title="{{ trans('section_lang.section_classes') }}">{{ $section->isclass($section->class_id) ? $section->isclass($section->class_id)->title : null }}</td>
                                                      <td data-title="{{ trans('student_lang.action') }}">
                                                          <a class="active" data-toggle="modal" href="#myModal2{{ $section->id }}">
                                                           <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                           </a>
                                                           <!-- Modal -->
                                                  <div class="modal fade" id="myModal2{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                  <h4 class="modal-title">{{ trans('section_lang.update_class') }}</h4>
                                                              </div>
                                                              {!! Form::open(array('url'=>'class/update_section','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                                              <div class="modal-body">

                                                              
                                                                  <div class="form-group">
                                                                      <label  class="col-lg-2 control-label">{{ trans('section_lang.section_name') }}</label>
                                                                      <div class="col-lg-9">
                                                                          <input type="text" class="form-control" id="f-name" value="{{ $section->title }}" name="title">
                                                                          <input type="hidden" class="form-control" id="f-name" value="{{ $section->id }}" name="id">
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group">
                                                                     <label  class="col-lg-2 control-label">{{ trans('section_lang.section_teacher_name') }}
                                                                    </label>
                                                                    <div class="col-lg-9">
                                                                      <select name="teacher_id" class="form-control" data-validate="required" id="class_id" 
                                                                                          data-message-required="this is required"
                                                                                            onchange="return get_class_sections(this.value)">
                                                                        <option value="">Choose..</option>
                                                                        @foreach( $teacher as $teachers )
                                                                        <option value="{{ $teachers->id }}" <?php if($teachers->id == $section->teacher_id){echo 'selected';}?>>{{ $teachers->name }}</option>
                                                                        @endforeach
                                                                      </select>
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group">
                                                                     <label  class="col-lg-2 control-label">{{ trans('section_lang.section_classes') }}
                                                                    </label>
                                                                    <div class="col-lg-9">
                                                                      <select name="class_id" class="form-control" data-validate="required" id="class_id" 
                                                                                          data-message-required="this is required"
                                                                                            onchange="return get_class_sections(this.value)">
                                                                        <option value="">Choose..</option>
                                                                        @foreach( $classes as $cla )
                                                                        <option value="{{ $cla->id }}" <?php if($cla->id == $section->class_id){echo 'selected';}?>>{{ $cla->title }}</option>
                                                                        @endforeach
                                                                      </select>
                                                                      </div>
                                                                  </div>
                                                                  <div class="form-group">
                                                                      <div class="col-lg-offset-2 col-lg-10">
                                                                      </div>
                                                                  </div>
                                                                          </div>
                                                              <div class="modal-footer">
                                                                  <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                                  <button class="btn btn-warning" type="submit" name='submit'>{{ trans('section_lang.update_class') }}</button>
                                                              
                                                              </div>
                                                              {!! Form::close() !!}
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <!-- modal -->

                                                  <a class="active"  data-toggle="modal" href="#myModaldel{{ $section->id }}">
                                                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                                          </a>
                                                          <!-- Delete Modal -->
                                                  <div class="modal fade" id="myModaldel{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                          <div class="modal-content">
                                                              <div class="modal-body">
                                                                  
                                                              </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                                              <div class="modal-footer">
                                                                  <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                                  <a href="{{ url('section/delete/'.$section->id) }}">
                                                                  <button class="btn btn-danger">{{ trans('student_lang.delete') }}</button>
                                                                  </a>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <!-- modal -->
                                                      </td>
                                                  </tr>
                                                   @endforeach
                                                  {!! $sections->render() !!}
                                                  @endif
                                                  </tbody>
                                              </table>
                                            </div>
                                  </div>
                                </div>
                                <!-- /.tab-content -->
                              </div>
          <!-- nav-tabs-custom -->
        <!-- /.col -->
          </section>
      </div>
  </div>
               

@endsection