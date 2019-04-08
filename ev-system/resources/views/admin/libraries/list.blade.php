@extends('layouts.app')

@section('title')
{{ trans('lmember_lang.lmember') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('lmember_lang.lmember') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             {{ trans('book_lang.panel_title') }}
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
                                              <h4 class="modal-title">{{ trans('book_lang.add_book') }}</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'library/create_library','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">

                                          
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('book_lang.book_name') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="" name="book_name"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('book_lang.book_author') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="" name="author" required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('book_lang.book_price') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="" name="price"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">{{ trans('lmember_lang.lmember_classes') }}
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="class" class="form-control" data-validate="required" id="class_id" 
                                                                      data-message-required="this is required"
                                                                        onchange="return get_class_sections(this.value)" required>
                                                    <option value="">Choose..</option>
                                                    @foreach( $classes as $class )
                                                    <option value="{{ $class->id }}">{{ $class->title }}</option>
                                                    @endforeach
                                                  </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('book_lang.book_quantity') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="address" class="form-control" id="f-name" value="" name="description"required>
                                                  </div>
                                              </div>
                                                      </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'>{{ trans('book_lang.add_book') }}</button>
                                          
                                          </div>
                                          {!! Form::close() !!}
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                              @if(Auth::user()->permission('add_library'))
                                <a class="btn btn-success" data-toggle="modal" href="#myModal2" style="margin:5px">
                                    {{ trans('book_lang.add_book') }}
                                </a>
                              @endif
                             
                                <div id="hide-table">
                                <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                                        
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ trans('book_lang.book_author') }}</th>
                                                <th>{{ trans('book_lang.book_name') }}</th>
                                                <th>{{ trans('book_lang.book_quantity') }}</th>
                                                <th>{{ trans('book_lang.book_price') }}</th>
                                                <th>{{ trans('lmember_lang.lmember_classes') }}</th>
                                                @if(Auth::user()->permission('add_library'))
                                                <th>{{ trans('student_lang.action') }}</th>
                                                @endif
                                            </tr>
                                            </thead>
                                            <tbody>
                                            
                                            @foreach( $libraries as $key => $post )
                                            <tr>
                                                <td data-title="#"><a href="#">{{ $key+1 }}</a></td>
                                                <td data-title="{{ trans('book_lang.book_author') }}">{{ $post->author }}</td>
                                                <td data-title="{{ trans('book_lang.book_name') }}">{{ $post->book_name }}</td>
                                                <td data-title="{{ trans('book_lang.book_quantity') }}">{{ $post->description }}</td>
                                                <td data-title="{{ trans('book_lang.book_price') }}">{{ $post->price }}</td>
                                                <td data-title="{{ trans('lmember_lang.lmember_classes') }}">{{ $cl->where('id',$post->class)->first()->title }}</td>
                                                @if(Auth::user()->permission('add_library'))
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
                                                                        <h4 class="modal-title">{{ trans('book_lang.update_book') }}</h4>
                                                                    </div>
                                                                    {!! Form::open(array('url'=>'library/update_library','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                                                    <div class="modal-body">

                                                                    
                                                                        <div class="form-group">
                                                                            <label  class="col-lg-2 control-label">{{ trans('book_lang.book_name') }}</label>
                                                                            <div class="col-lg-9">
                                                                                <input type="text" class="form-control" id="f-name" value="{{ $post->book_name }}" name="book_name"required>
                                                                                <input type="hidden" class="form-control" id="f-name" value="{{ $post->id }}" name="id"required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label  class="col-lg-2 control-label">{{ trans('book_lang.book_author') }}</label>
                                                                            <div class="col-lg-9">
                                                                                <input type="text" class="form-control" id="f-name" value="{{ $post->author }}" name="author" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label  class="col-lg-2 control-label">{{ trans('book_lang.book_price') }}</label>
                                                                            <div class="col-lg-9">
                                                                                <input type="text" class="form-control" id="f-name" value="{{ $post->price }}" name="price"required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                        <label  class="col-lg-2 control-label">{{ trans('lmember_lang.lmember_classes') }}
                                                                        </label>
                                                                        <div class="col-lg-9">
                                                                            <select name="class" class="form-control" data-validate="required" id="class_id" 
                                                                                                data-message-required="this is required"
                                                                                                onchange="return get_class_sections(this.value)" required>
                                                                            <option value="">Choose..</option>
                                                                            @foreach( $classes as $class )
                                                                            <option value="{{ $class->id }}" <?php if($class->id == $post->class){echo 'selected';}?>>{{ $class->title }}</option>
                                                                            @endforeach
                                                                            </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label  class="col-lg-2 control-label">{{ trans('book_lang.book_quantity') }}</label>
                                                                            <div class="col-lg-9">
                                                                                <input type="address" class="form-control" id="f-name" value="{{ $post->description }}" name="description"required>
                                                                            </div>
                                                                        </div>
                                                                                </div>
                                                                    <div class="modal-footer">
                                                                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                                        <button class="btn btn-warning" type="submit" name='submit'>{{ trans('book_lang.update_book') }}</button>
                                                                    
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
                                                                    <a href="{{ url('library/delete/'.$post->id) }}">
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


