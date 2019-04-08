@extends('layouts.app')

@section('title')
{{ trans('others.schools') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('others.schools') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
                              
                              <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">{{ trans('others.add_schools') }}</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'store-school','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">

                                          <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('others.school_logo') }}</label>
                                                  <div class="col-lg-9">
                                                    <div class="edit-profile-photo" style="margin-top: 60px">
                                                        <img src="" alt="" id="img2">
                                                        <div class="change-photo-btn">
                                                            <div class="photoUpload">
                                                                <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                                <input class="upload" name="file" id="uploadpro2" type="file">
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">School Signature/Stamp</label>
                                                  <div class="col-lg-9">
                                                    <div class="edit-profile-photo" style="margin-top: 60px">
                                                        <img src="" alt="" id="imgstamp">
                                                        <div class="change-photo-btn">
                                                            <div class="photoUpload">
                                                                <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                                <input class="upload" name="stamp" id="uploadstamp" type="file">
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                              </div>
                                          
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('others.school_name') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" name="name">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('others.school_email') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="email" class="form-control" name="email">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('others.school_phone') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" name="phone">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('others.school_address') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" name="address">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                <label  class="col-lg-2 control-label">{{ trans('others.skin_color') }}</label>
                                                <div class="col-lg-9">
                                                  <select name="color" class="form-control">
                                                    <option value="default">Default</option>
                                                    <option value="blue">Blue</option>
                                                    <option value="green">Green</option>
                                                    <option value="purple">Purple</option>
                                                    <option value="yellow">Yellow</option>
                                                    <option value="red">Red</option>
                                                    <option value="cosmic">Cosmic</option>
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
                                              <button class="btn btn-warning" type="submit" name='submit'>{{ trans('others.add_schools') }}</button>
                                          
                                          </div>
                                          {!! Form::close() !!}
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             {{ trans('others.schools') }}
                          </header>
                          <a class="btn btn-success" data-toggle="modal" href="#myModal2" style="margin:5px">
                                  {{ trans('others.add_schools') }}
                              </a>
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
                          <div id="hide-table">
                              <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                <thead>
                              <tr>
                                  <th>#</th>
                                  <th>{{ trans('others.school_logo') }}</th>
                                  <th>{{ trans('others.school_name') }}</th>
                                  <th>{{ trans('others.school_email') }}</th>
                                  <th> {{ trans('others.school_phone') }}</th>
                                  <th>{{ trans('others.school_address') }}</th>
                                  <th>{{ trans('others.skin_color') }}</th>
                                  <th>{{ trans('others.status') }}</th>
                                  <th>{{ trans('others.total_students') }}</th>
                                  <th>{{ trans('student_lang.action') }}</th>
                              </tr>
                              </thead>
                              <tbody>
                               
                                @foreach($schools as $post )
                              <tr>
                                  <td data-title="#"><a href="#">{{ $post->id }}</a></td>
                                  <td data-title="{{ trans('others.school_logo') }}"><img src="{{ asset('ev-assets/uploads/school-images/'.$post->photo) }}" alt="" style="max-width: 200px"></td>
                                  <td data-title="{{ trans('others.school_name') }}">{{ $post->name }}</td>
                                  <td data-title="{{ trans('others.school_email') }}">{{ $post->email}}</td>
                                  <td data-title="{{ trans('others.school_phone') }}">{{ $post->phone }}</td>
                                  <td data-title="{{ trans('others.school_address') }}">{{ $post->address }}</td>
                                  <td data-title="{{ trans('others.skin_color') }}">{{ $post->color }}</td>
                                  <td data-title="{{ trans('others.status') }}"> @if($post->status == 1) <button class="btn btn-primary btn-xs">Active</button> @else <button class="btn btn-danger btn-xs">Inactive</button> @endif</td>
                                  <td data-title="{{ trans('others.total_students') }}">{{ App\User::where('school_id', $post->id)->where('role', 'student')->count() }}</td>
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
                                                          <h4 class="modal-title">{{ trans('others.update_schools') }}</h4>
                                                      </div>
                                                      {!! Form::open(array('url'=>'update-school','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                                      <div class="modal-body">
                                                          <div class="form-group">
                                                              <label  class="col-lg-2 control-label">{{ trans('others.school_logo') }}</label>
                                                              <div class="col-lg-9">
                                                                <div class="edit-profile-photo">
                                                                    <img src="{{ asset('ev-assets/uploads/school-images/'.$post->photo) }}" alt="" id="img">
                                                                    <div class="change-photo-btn">
                                                                        <div class="photoUpload">
                                                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                                            <input class="upload" name="file" id="uploadpro" type="file">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                          </div>
                                                          <div class="form-group">
                                                              <label  class="col-lg-2 control-label">{{ trans('others.school_logo') }}</label>
                                                              <div class="col-lg-9">
                                                                <div class="edit-profile-photo">
                                                                    <img src="{{ asset('ev-assets/uploads/school-images/'.$post->stamp) }}" alt="" id="img">
                                                                    <div class="change-photo-btn">
                                                                        <div class="photoUpload">
                                                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                                            <input class="upload" name="stamp" id="uploadstamp" type="file">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                          </div>
                                                          <div class="form-group">
                                                              <label  class="col-lg-2 control-label">{{ trans('others.school_name') }}</label>
                                                              <div class="col-lg-9">
                                                                  <input type="text" class="form-control" value="{{ $post->name }}" name="name"required>
                                                                  <input type="hidden" class="form-control" value="{{ $post->id }}" name="id"required>
                                                              </div>
                                                          </div>
                                                          <div class="form-group">
                                                              <label  class="col-lg-2 control-label">{{ trans('others.school_email') }}</label>
                                                              <div class="col-lg-9">
                                                                  <input type="email" class="form-control" value="{{ $post->email }}" name="email" required>
                                                              </div>
                                                          </div>
                                                          <div class="form-group">
                                                              <label  class="col-lg-2 control-label">{{ trans('others.school_phone') }}</label>
                                                              <div class="col-lg-9">
                                                                  <input type="text" class="form-control" value="{{ $post->phone }}" name="phone" required>
                                                              </div>
                                                          </div>
                                                          <div class="form-group">
                                                              <label  class="col-lg-2 control-label">{{ trans('others.school_address') }}</label>
                                                              <div class="col-lg-9">
                                                                  <input type="text" class="form-control" value="{{ $post->address }}" name="address" required>
                                                              </div>
                                                          </div>
                                                            <div class="form-group">
                                                              <label  class="col-lg-2 control-label">{{ trans('others.skin_color') }}</label>
                                                              <div class="col-lg-9">
                                                                <select name="color" class="form-control">
                                                                  <option value="default" @if($post->color == 'default') selected='selected' @endif>Default</option>
                                                                  <option value="blue" @if($post->color == 'blue') selected='selected' @endif>Blue</option>
                                                                  <option value="green" @if($post->color == 'green') selected='selected' @endif>Green</option>
                                                                  <option value="purple" @if($post->color == 'purple') selected='selected' @endif>Purple</option>
                                                                  <option value="yellow" @if($post->color == 'yellow') selected='selected' @endif>Yellow</option>
                                                                  <option value="red" @if($post->color == 'red') selected='selected' @endif>Red</option>
                                                                  <option value="cosmic" @if($post->color == 'cosmic') selected='selected' @endif>Cosmic</option>
                                                                </select>
                                                              </div>  
                                                            </div>
                                                            <div class="form-group">
                                                              <label  class="col-lg-2 control-label">{{ trans('others.status') }}</label>
                                                              <div class="col-lg-9">
                                                                <select name="status" class="form-control">
                                                                  <option value="1" @if($post->status == 1) selected='selected' @endif>Active</option>
                                                                  <option value="0" @if($post->status == 0) selected='selected' @endif>Inactive</option>
                                                                </select>
                                                              </div>  
                                                            </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                          <button class="btn btn-warning" type="submit" name='submit'>{{ trans('others.update_schools') }}</button>
                                                      
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
                                              <a href="{{ url('school/delete/'.$post->id) }}">
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
               

  <script type="text/javascript">
      $(function(){
      $('#uploadpro2').change(function(){
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
         {
            var reader = new FileReader();

            reader.onload = function (e) {
               $('#img2').attr('src', e.target.result);
            }
           reader.readAsDataURL(input.files[0]);
        }
        else
        {
        }
      });
      $('#uploadstamp').change(function(){
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
         {
            var reader = new FileReader();

            reader.onload = function (e) {
               $('#imgstamp').attr('src', e.target.result);
            }
           reader.readAsDataURL(input.files[0]);
        }
        else
        {
        }
      });
    });
  </script>
@endsection


