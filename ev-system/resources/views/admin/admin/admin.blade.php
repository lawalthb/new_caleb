@extends('layouts.app')

@section('title')
{{ trans('topbar_menu_lang.Admin') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('topbar_menu_lang.Admin') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              {{ trans('topbar_menu_lang.Admin') }}
                          </header>
                          <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Add Admin</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'admins/create_admin','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
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
                                                  <label  class="col-lg-2 control-label">{{ trans('student_lang.student_photo') }}</label>
                                                  <div class="col-lg-6">
                                                      <input type="file" class="form-control file-pos" id="exampleInputFile" name="file">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('others.school') }}</label>
                                                  <div class="col-lg-9">
                                                    <select class="form-control" name="school">
                                                      @foreach(App\School::where("status", 1)->orderBy("created_at", "asc")->paginate() as $dt)
                                                          <option value="{{ $dt->id }}">{{ $dt->name }}</option>
                                                      @endforeach
                                                    </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('others.admin_type') }}</label>
                                                  <div class="col-lg-9">
                                                    <select class="form-control" name="admin_type">
                                                        <option value="user">User</option>
                                                        <option value="super">Super Admin</option>
                                                    </select>
                                                  </div>
                                              </div>
                                                      </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'> Add Admin</button>
                                          
                                          </div>
                                          {!! Form::close() !!}
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                           <a class="btn btn-success" data-toggle="modal" href="#myModal2" style="margin:5px">
                                  Add Admin
                              </a>
    <div id="hide-table">
            <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('student_lang.student_photo') }}</th>
                    <th>{{ trans('teacher_lang.teacher_name') }}</th>
                    <th>{{ trans('student_lang.student_email') }}</th>
                    <th>{{ trans('others.school') }}</th>
                    <th>{{ trans('others.admin_type') }}</th>
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
                    <td data-title="{{ trans('others.school') }}">{{ App\School::find($post->school_id)->name }}</td>
                    <td data-title="{{ trans('others.admin_type') }}"> @if($post->admin_type == 'user') <button class="btn btn-primary btn-xs">User</button> @elseif($post->admin_type == 'super') <button class="btn btn-danger btn-xs">Super Admin</button> @endif</td>
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
                                <h4 class="modal-title">Edit Admin</h4>
                            </div>
                            {!! Form::open(array('url'=>'admins/update_admin','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
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
                                    <label  class="col-lg-2 control-label">{{ trans('others.school') }}</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="school">
                                          @foreach(App\School::where("status", 1)->orderBy("created_at", "asc")->paginate() as $var)
                                            <option value="{{ $var->id }}" @if($var->id == $post->school_id) selected="selected" @endif>{{ $var->name }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">{{ trans('others.admin_type') }}</label>
                                    <div class="col-lg-9">
                                      <select class="form-control" name="admin_type">
                                          <option value="user" @if($post->admin_type == 'user') selected='selected' @endif>User</option>
                                          <option value="super" @if($post->admin_type == 'super') selected='selected' @endif>Super Admin</option>
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
                                <button class="btn btn-warning" type="submit" name='submit'> Edit Admin</button>
                            
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
                                <a href="{{ url('admins/delete/'.$post->id) }}">
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

