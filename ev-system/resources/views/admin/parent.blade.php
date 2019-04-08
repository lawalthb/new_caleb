@extends('layouts.app')

@section('title')
{{ trans('parentes_lang.panel_title') }}
@endsection
@section('content')

 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> {{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('parentes_lang.panel_title') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             {{ trans('parentes_lang.panel_title') }}
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
                          <a class="btn btn-success" data-toggle="modal" href="{{ url('parents/create_parent') }}" style="margin:5px">
                                  {{ trans('parentes_lang.add_parentes') }}
                              </a>
                          <div id="hide-table">
                          <table id="example1"  class="table table-striped table-bordered table-hover dataTable no-footer form-inline">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>{{ trans('student_lang.student_photo') }}</th>
                                  <th>{{ trans('student_lang.student_name') }}</th>
                                  <th>{{ trans('student_lang.student_email') }}</th>
                                  <th>{{ trans('student_lang.student_address') }}</th>
                                  <th>{{ trans('student_lang.student_phone') }}</th>
                                  <th>{{ trans('student_lang.action') }}</th>
                              </tr>
                              </thead>
                              <tbody>

                                @foreach( $posts as $post )
                              <tr>
                                  <td data-title="#"><a href="#">{{ $post->id }}</a></td>
                                  <td data-title="Photo"> <img src="{{ asset('ev-assets/uploads/avatars/'.$post->image) }}" alt="..." class="img-circle profile_img" width="50px" height="50px"> </td>
                                  <td data-title="Name">{{ $post->name }}</td>
                                  <td data-title="Email">{{ $post->email }}</td>
                                  <td data-title="Address">{{ $post->address }}</td>
                                  <td data-title="Phone">{{ $post->phone }}</td>
                                  <td data-title="Action">
                                      <a class="active" data-toggle="modal" href="#myModal2{{ $post->id }}">
                                       <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                       </a>
                                       <!-- Modal -->
                              <div class="modal fade" id="myModal2{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">{{ trans('parentes_lang.update_parentes') }}</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'parents/update_parent','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">{{ trans('student_lang.student_name') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="{{ $post->name }}" name="name"required>
                                                      <input type="hidden" class="form-control" value="{{ $post->id }}" name="parent_id"required>
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">{{ trans('student_lang.student_email') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="{{ $post->email }}" name="email"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">{{ trans('student_lang.student_address') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="{{ $post->address }}" name="address"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">{{ trans('student_lang.student_phone') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="{{ $post->phone }}" name="phone"required>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'>{{ trans('parentes_lang.update_parentes') }}</button>
                                          
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
                                              <a href="{{ url('parents/delete/'.$post->id) }}">
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