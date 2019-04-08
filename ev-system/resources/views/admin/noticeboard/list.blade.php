@extends('layouts.app')

@section('title')
{{ trans('notice_lang.panel_title') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('notice_lang.panel_title') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              {{ trans('notice_lang.panel_title') }}
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
                                              <h4 class="modal-title">{{ trans('notice_lang.add_class') }}</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'noticeboard/create_noticeboard','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">

                                          
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label"> {{ trans('notice_lang.notice_title') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="" name="title"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                      <label class="col-lg-2 control-label">{{ trans('notice_lang.notice_notice') }}</label>
                                                      <div class="col-lg-9">
                                                      <textarea name='body' class="ckeditor form-control" rows="10"></textarea>
                                                      </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">{{ trans('notice_lang.to') }}
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="for" class="form-control" data-validate="required" required>
                                                    <option value="all">All</option>
                                                    <option value="teachers">Teachers</option>
                                                    <option value="students">Students</option>
                                                    <option value="parents">Parents</option>
                                                  </select>
                                                  </div>
                                              </div>
                                              
                                                      </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'> {{ trans('notice_lang.add_class') }}</button>
                                          
                                          </div>
                                          {!! Form::close() !!}
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                              @if(Auth::user()->permission('add_notice'))
                                <a class="btn btn-success" data-toggle="modal" href="#myModal2" style="margin:5px">
                                    {{ trans('notice_lang.add_class') }}
                                </a>
                              @endif
                    <div id="hide-table">
                        <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer"> 
                                            
                                <thead>
                              <tr>
                                  <th>#</th>
                                  <th>{{ trans('notice_lang.notice_title') }}</th>
                                  <th>{{ trans('notice_lang.notice_notice') }}</th>
                                  <th>{{ trans('notice_lang.to') }}</th>
                                  @if(Auth::user()->permission('add_notice'))
                                    <th>{{ trans('student_lang.action') }}</th>
                                  @endif
                              </tr>
                              </thead>
                              <tbody>
                               
                                @foreach( $notices as $key => $post )
                              <tr>
                                  <td data-title="#"><a href="#">{{ $key+1 }}</a></td>
                                  <td data-title="{{ trans('notice_lang.notice_title') }}">{{ $post->title }}</td>
                                  <td data-title="{{ trans('notice_lang.notice_notice') }}">{{ $post->body }}</td>
                                  <td data-title="{{ trans('notice_lang.to') }}">{{ $post->for }}</td>
                                  @if(Auth::user()->permission('add_notice'))
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
                                                        <h4 class="modal-title">{{ trans('notice_lang.update_class') }}</h4>
                                                    </div>
                                                    {!! Form::open(array('url'=>'noticeboard/update_noticeboard','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                                    <div class="modal-body">

                                                    
                                                        <div class="form-group">
                                                            <label  class="col-lg-2 control-label">{{ trans('notice_lang.notice_title') }}</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control" value="{{ $post->title }}" name="title"required>
                                                                <input type="hidden" class="form-control" value="{{ $post->id }}" name="id"required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="col-lg-2 control-label">{{ trans('notice_lang.notice_notice') }}</label>
                                                                <div class="col-lg-9">
                                                                <textarea name='body' class="ckeditor form-control" rows="10">{{ $post->body }}</textarea>
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-lg-2 control-label">{{ trans('notice_lang.to') }}
                                                            </label>
                                                            <div class="col-lg-9">
                                                            <select name="for" class="form-control" data-validate="required" required>
                                                                <option value="all">All</option>
                                                                <option value="teachers">Teachers</option>
                                                                <option value="students">Students</option>
                                                                <option value="parents">Parents</option>
                                                            </select>
                                                            </div>
                                                        </div>
                                                        
                                                                </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                        <button class="btn btn-warning" type="submit" name='submit'>{{ trans('notice_lang.update_class') }}</button>
                                                    
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
                                                        <a href="{{ url('noticeboard/delete/'.$post->id) }}">
                                                        <button class="btn btn-danger">{{ trans('student_lang.delete') }}</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                              <!-- modal -->
                                  </td>
                                  @endif
                              </tr>
                               @endforeach
                              </tbody>
                          </table>
                        </div>
                      </section>
                  </div>
              </div>
               

@endsection


