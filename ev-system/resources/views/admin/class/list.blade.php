@extends('layouts.app')
@section('title')
    {{ trans('classes_lang.panel_title') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="#"><i class="fa fa-home"></i> {{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('classes_lang.panel_title') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
            </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              {{ trans('classes_lang.panel_title') }}
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
                                              <h4 class="modal-title">{{ trans('classes_lang.add_class') }}</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'class/create_class','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('classes_lang.classes_name') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="" name="title">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">{{ trans('classes_lang.teacher_name') }}
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="teacher_id" class="form-control" data-validate="required" id="class_id" required>
                                                    <option value="">Choose..</option>
                                                    @foreach( $teacherlist as $teachers )
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
                                              <button class="btn btn-warning" type="submit" name='submit'>{{ trans('classes_lang.add_class') }}</button>
                                          </div>
                                          {!! Form::close() !!}
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                           <a class="btn btn-success" data-toggle="modal" href="#myModal2" style="margin:5px">
                                  {{ trans('classes_lang.add_class') }}
                              </a>
                          
                          <div id="hide-table">
                              <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('classes_lang.classes_name') }}</th>
                                    <th>{{ trans('classes_lang.teacher_name') }}</th>
                                    <th>{{ trans('student_lang.panel_title') }}</th>
                                    <th>{{ trans('student_lang.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    
                                    @if ( !$classes->count() )
                                    <div style="padding: 10px">There is no class available</div>
                                    @else 

                                    @foreach( $classes as $key => $class )
                                <tr>
                                    <td data-title="#">{{ $key+1 }}</td>
                                    <td data-title="{{ trans('classes_lang.classes_name') }}">{{ $class->title }}</td>
                                    <td data-title="{{ trans('classes_lang.teacher_name') }}" class="hidden-phone">{{ App\User::find($class->teacher_id) ? App\User::find($class->teacher_id)->name : null }}</td>
                                    <td data-title="{{ trans('student_lang.panel_title') }}">{{ $class->student($class->id)->count() }}</td>
                                    <td data-title="{{ trans('student_lang.action') }}">
                                        <a class="active" data-toggle="modal" href="#myModal2{{ $class->id }}">
                                        <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                        </a>
                                        <!-- Modal -->
                                    <div class="modal fade" id="myModal2{{ $class->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title">{{ trans('classes_lang.update_class') }}</h4>
                                                </div>
                                                {!! Form::open(array('url'=>'class/update_class','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                                <div class="modal-body">

                                                
                                                    <div class="form-group">
                                                        <label  class="col-lg-2 control-label">{{ trans('classes_lang.classes_name') }}</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control" id="f-name" value="{{ $class->title }}" name="title">
                                                            <input type="hidden" class="form-control" id="f-name" value="{{ $class->id }}" name="id">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label  class="col-lg-2 control-label">{{ trans('classes_lang.teacher_name') }}
                                                        </label>
                                                        <div class="col-lg-9">
                                                        <select name="teacher_id" class="form-control" data-validate="required" id="class_id" 
                                                                            data-message-required="this is required"
                                                                                onchange="return get_class_sections(this.value)">
                                                            <option value="">Choose..</option>
                                                            @foreach( $teacherlist as $teachers )
                                                            <option value="{{ $teachers->id }}" <?php if($teachers->id == $class->teacher_id){echo 'selected';}?>>{{ $teachers->name }}</option>
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
                                                    <button class="btn btn-warning" type="submit" name='submit'>{{ trans('classes_lang.update_class') }}</button>
                                                
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal -->
                                <a class="active"  data-toggle="modal" href="#myModaldel{{ $class->id }}">
                                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                        </a>
                                        <!-- Delete Modal -->
                                <div class="modal fade" id="myModaldel{{ $class->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                
                                            </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                            <div class="modal-footer">
                                                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                <a href="{{ url('class/delete/'.$class->id) }}">
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
                                @endif
                                </tbody>
                            </table>
                        </div>
                      </section>
                  </div>
              </div>
               

@endsection