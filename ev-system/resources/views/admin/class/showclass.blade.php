@extends('layouts.app')

@section('title')
{{ trans('topbar_menu_lang.menu_student') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('topbar_menu_lang.menu_student') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             {{ trans('topbar_menu_lang.menu_student') }}
                          </header>
                            <div class="white-box">
                              <h4>VIEW BY SCHOOL</h4>

                              @foreach(App\School::where("status", 1)->orderBy("created_at", "asc")->paginate() as $var)
                                <a href="{{ url('classes/'.$slug.'/'.$var->id) }}"><button class="btn btn-primary btn-xs">{{ $var->name }}</button></a> 
                              @endforeach
                            </div>
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
                            
                            @if ( !$students->count() )
                            <div style="padding: 10px">0 student found...</div>
                            @else 
                          
                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>{{ trans('student_lang.student_photo') }}</th>
                                  <th>Reg No</th>
                                  <th>{{ trans('student_lang.student_name') }}</th>
                                  <th>{{ trans('student_lang.student_email') }}</th>
                                  <th>{{ trans('student_lang.student_address') }}</th>
                                  <th>{{ trans('student_lang.student_phone') }}</th>
                                  <th>{{ trans('parentes_lang.panel_title') }}</th>
                                  <th>{{ trans('others.school') }}</th>
                                  <th>{{ trans('student_lang.action') }}</th>
                              </tr>
                              </thead>
                              <tbody>

                                @foreach($students as $key => $post)
                              <tr>
                                  <td data-title="#"><a href="#">{{ $key+1 }}</a></td>
                                  <td data-title="{{ trans('student_lang.student_photo') }}"> <img src="{{ asset('ev-assets/uploads/avatars/'.$post->image) }}" alt="..." class="img-circle profile_img" width="50px" height="50px"> </td>
                                  <td data-title="Reg No">{{ $post->reg_no }}</td>
                                  <td data-title="{{ trans('student_lang.student_name') }}"><a href="#">{{ $post->name }}</a></td>
                                  <td data-title="{{ trans('student_lang.student_email') }}">{{ $post->email }}</td>
                                  <td data-title="{{ trans('student_lang.student_address') }}">{{ $post->address }}</td>
                                  <td data-title="{{ trans('student_lang.student_phone') }}">{{ $post->phone }}</td>
                                  <td data-title="{{ trans('parentes_lang.panel_title') }}">{{ App\User::where('role','parent')->where('id',$post->parent_id)->first() ? App\User::where('role','parent')->where('id',$post->parent_id)->first()->name: null }}</td>
                                  <td data-title="{{ trans('others.school') }}">{{ App\School::find($post->school_id)->name }}</td>
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
                                              <h4 class="modal-title">{{ trans('student_lang.update_student') }}</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'classes/update_student','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('student_lang.student_name') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="{{ $post->name }}" name="name" required>
                                                      <input type="hidden" class="form-control" value="{{ $post->id }}" name="student_id" required>
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('student_lang.student_email') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="{{ $post->email }}" name="email" required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('student_lang.student_address') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="{{ $post->address }}" name="address" required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('student_lang.student_phone') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="{{ $post->phone }}" name="phone" required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('parentes_lang.panel_title') }}</label>
                                                  <div class="col-lg-9"> 
                                                    <select class="form-control" name="parent_id">
                                                      @foreach(App\User::where('role','parent')->get() as $par)
                                                        <option value="{{ $par->id }}" @if($par->id == $post->parent_id) selected @endif >{{ $par->name }}</option>
                                                      @endforeach
                                                    </select>
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
                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'>{{ trans('student_lang.update_student') }}</button>
                                          
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
                                              <a href="{{ url('classes/delete/'.$post->id) }}" class="btn btn-danger">{{ trans('student_lang.delete') }}</a>
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
                              @endif
                      </section>
                  </div>
      
<script type="text/javascript">
  $("#makeSelect").attr("selected","selected");
</script>
@endsection

