@extends('layouts.app')

@section('title')
{{ trans('subject_lang.panel_title') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('subject_lang.panel_title') }}
</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                            {{ trans('subject_lang.panel_title') }}

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
                          <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">{{ trans('subject_lang.add_subject') }}</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'subject/create_subject','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">

                                          
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('subject_lang.subject_name') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="" name="title">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">{{ trans('subject_lang.subject_class_name') }}
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="class_id" class="form-control" data-validate="required" id="class_id" 
                                                                      data-message-required="this is required"
                                                                        onchange="return get_class_sections(this.value)">
                                                    <option value="">Choose..</option>
                                                    @foreach( App\Classes::all() as $classes )
                                                    <option value="{{ $classes->id }}">{{ $classes->title }}</option>
                                                    @endforeach
                                                  </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">{{ trans('subject_lang.subject_teacher_name') }}
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
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                  </div>
                                              </div>
                                                      </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'>{{ trans('subject_lang.add_subject') }}</button>
                                          
                                          </div>
                                          {!! Form::close() !!}
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                          <a class="btn btn-success" data-toggle="modal" href="#myModal2" style="margin:5px">
                                  {{ trans('subject_lang.add_subject') }}
                              </a>
                          <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                <thead>
                              <tr>
                                  <th>#</th>
                                  <th>{{ trans('subject_lang.subject_name') }}</th>
                                  <th>{{ trans('subject_lang.subject_class_name') }}</th>
                                  <th>{{ trans('subject_lang.subject_teacher_name') }}</th>
                                  <th>{{ trans('student_lang.action') }}</th>
                              </tr>
                              </thead>
                              <tbody>
                               
                                @foreach( $subjects as $key => $post )
                              <tr>
                                  <td data-title=""><a href="#">{{ $key+1 }}</a></td>
                                  <td data-title="">{{ $post->title }}</td>
                                  <td data-title="">{{ $post->class_name ? $post->class_name->title : '-' }}</td>
                                  <td data-title="">{{ $post->teacher ? $post->teacher->name : '-' }}</td>
                                  <td data-title="">
                                      <a class="active" data-toggle="modal" href="#myModal2{{ $post->id }}">
                                       <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                       </a>
                                      <!-- Modal -->
                              <div class="modal fade" id="myModal2{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">{{ trans('subject_lang.update_subject') }}</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'subject/update_subject','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">

                                          
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('subject_lang.subject_name') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="{{ $post->title }}" name="title">
                                                      <input type="hidden" class="form-control" id="f-name" value="{{ $post->id }}" name="id">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">{{ trans('subject_lang.subject_class_name') }}
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="class_id" class="form-control" data-validate="required" id="class_id" 
                                                                      data-message-required="this is required"
                                                                        onchange="return get_class_sections(this.value)">
                                                    <option value="">Choose..</option>
                                                    @foreach( App\Classes::all() as $classes )
                                                    <option value="{{ $classes->id }}" <?php if($classes->id == $post->class_id){echo 'selected';}?>>{{ $classes->title }}</option>
                                                    @endforeach
                                                  </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">{{ trans('subject_lang.subject_teacher_name') }}
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="teacher_id" class="form-control" data-validate="required" id="class_id" 
                                                                      data-message-required="this is required"
                                                                        onchange="return get_class_sections(this.value)">
                                                    <option value="">Choose..</option>
                                                    @foreach( $teacher as $teachers )
                                                    <option value="{{ $teachers->id }}"<?php if($teachers->id == $post->teacher_id){echo 'selected';}?>>{{ $teachers->name }}</option>
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
                                              <button class="btn btn-warning" type="submit" name='submit'>{{ trans('subject_lang.update_subject') }}</button>
                                          
                                          </div>
                                          {!! Form::close() !!}
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                                      <a class="active"  data-toggle="modal" href="#myModaldel{{ $post->id }}">
                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                      </a>
                                      <!-- Delete Modal -->
                              <div class="modal fade" id="myModaldel{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-body">
                                              
                                          </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <a href="{{ url('subject/delete/'.$post->id) }}">
                                              <button class="btn btn-danger">{{ trans('student_lang.delete') }}</button>
                                              </a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                                  </td>
                              </tr>
                               @endforeach
                              </tbody>
                          </table>
                        </div>
                      </section>
                  </div>
              </div>
               

@endsection



