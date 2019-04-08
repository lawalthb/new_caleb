@extends('layouts.app')

@section('title')
{{ trans('teacher_lang.panel_title') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('teacher_lang.panel_title') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              {{ trans('teacher_lang.panel_title') }}
                          </header>
                          <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">{{ trans('teacher_lang.add_teacher') }}</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'teachers/create_teacher','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">

                                          
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('teacher_lang.teacher_name') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="" name="name">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('student_lang.student_email') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="email" class="form-control" id="f-name" value="" name="email">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('teacher_lang.teacher_password') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="password" class="form-control" id="f-name" value="" name="password">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('student_lang.student_address') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="address" class="form-control" id="f-name" value="" name="address">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('student_lang.student_phone') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="phone" class="form-control" id="f-name" value="" name="phone">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('student_lang.student_photo') }}</label>
                                                  <div class="col-lg-6">
                                                      <input type="file" class="file-pos" id="exampleInputFile" name="file">
                                                  </div>
                                              </div>
                                                      </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'>{{ trans('teacher_lang.add_teacher') }}</button>
                                          
                                          </div>
                                          {!! Form::close() !!}
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                           <a class="btn btn-success" data-toggle="modal" href="#myModal2" style="margin:5px">
                                  {{ trans('teacher_lang.add_teacher') }}
                              </a>
       <div id="hide-table">
            <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer"> 
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>{{ trans('student_lang.student_photo') }}</th>
                                  <th>{{ trans('teacher_lang.teacher_name') }}</th>
                                  <th>{{ trans('student_lang.student_email') }}</th>
                                  <th>{{ trans('student_lang.student_sex') }}</th>
                                  <th>{{ trans('student_lang.student_address') }}</th>
                                  <th>{{ trans('student_lang.student_phone') }}</th>
                                  <th>{{ trans('student_lang.action') }}</th>
                              </tr>
                              </thead>
                              <tbody>

                                @foreach( $posts as $key => $post )
                              <tr>
                                  <td data-title="#"><a href="#">{{ $key+1 }}</a></td>
                                  <td data-title="{{ trans('student_lang.student_photo') }}"> <img src="{{ asset('ev-assets/uploads/avatars/'.$post->image) }}" alt="..." class="img-circle profile_img" width="50px" height="50px"> </td>
                                  <td data-title="{{ trans('teacher_lang.teacher_name') }}"><a href="#">{{ $post->name }}</a></td>
                                  <td data-title="{{ trans('student_lang.student_email') }}">{{ $post->email }}</td>
                                  <td data-title="{{ trans('student_lang.student_sex') }}">{{ $post->gender }}</td>
                                  <td data-title="{{ trans('student_lang.student_address') }}">{{ $post->address }}</td>
                                  <td data-title="{{ trans('student_lang.student_phone') }}">{{ $post->phone }}</td>
                                  <td data-title="{{ trans('student_lang.action') }}">
                                      <a class="active" data-toggle="modal" href="#myModal2{{ $post->id }}">
                                       <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                       </a>
                                       <!-- Modal -->
                              <div class="modal fade" id="myModal2{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">{{ trans('teacher_lang.update_teacher') }}</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'teachers/update_teacher','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">

                                          
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('teacher_lang.teacher_name') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="{{ $post->name }}" name="name">
                                                      <input type="hidden" class="form-control" id="f-name" value="{{ $post->id }}" name="id">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('student_lang.student_email') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="email" class="form-control" id="f-name" value="{{ $post->email }}" name="email">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('student_lang.student_address') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="address" class="form-control" id="f-name" value="{{ $post->address }}" name="address">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('student_lang.student_phone') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="phone" class="form-control" id="f-name" value="{{ $post->phone }}" name="phone">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                  </div>
                                              </div>
                                                      </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'>{{ trans('teacher_lang.update_teacher') }}</button>
                                          
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
                                              <a href="{{ url('teachers/delete/'.$post->id) }}">
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
                              </tbody>
                          </table>
                        </div>
                      </section>
                  </div>
              </div>
               

@endsection

