@extends('layouts.app')

@section('title')
{{ trans('transport_lang.panel_title') }}
@endsection
@section('content')
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('transport_lang.panel_title') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              {{ trans('transport_lang.panel_title') }}
                          </header>

                          <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">{{ trans('transport_lang.add_transport') }}</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'transport/create_transport','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">

                                          
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('transport_lang.transport_route') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="" name="route_name">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('transport_lang.transport_vehicle') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="" name="no_of_vehicle">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('transport_lang.transport_fare') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="" name="route_fare">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">{{ trans('transport_lang.transport_note') }}</label>
                                                  <div class="col-lg-9">
                                                      <input type="address" class="form-control" id="f-name" value="" name="description">
                                                  </div>
                                              </div>
                                                      </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'>{{ trans('transport_lang.add_transport') }}</button>
                                          
                                          </div>
                                          {!! Form::close() !!}
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                            @if(Auth::user()->permission('add_transport'))
                                <a class="btn btn-success" data-toggle="modal" href="#myModal2" style="margin:5px">
                                  {{ trans('transport_lang.add_transport') }}
                                </a>
                            @endif
                            @if(Session::has('message'))   
                            <div class="container">
                              <div class="alert alert-success fade in" id='gritter-notice-wrapper' data-dismiss="alert" aria-label="close">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('message') }}
                              </div>
                            </div>
                            @endif

      <div id="hide-table">
        <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer"> 
                  <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('transport_lang.transport_route') }}</th>
                    <th>{{ trans('transport_lang.transport_vehicle') }}</th>
                    <th>{{ trans('transport_lang.transport_note') }}</th>
                    <th>{{ trans('transport_lang.transport_fare') }}</th>
                    @if(Auth::user()->permission('add_transport'))
                        <th>{{ trans('student_lang.action') }}</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                 
                  @foreach( $transports as $key => $post )
                <tr>
                    <td data-title="#"><a href="#">{{ $key+1 }}</a></td>
                    <td data-title="{{ trans('transport_lang.transport_route') }}">{{ $post->route_name }}</td>
                    <td data-title="{{ trans('transport_lang.transport_vehicle') }}">{{ $post->number_of_vehicle }}</td>
                    <td data-title="{{ trans('transport_lang.transport_note') }}">{{ $post->description }}</td>
                    <td data-title="{{ trans('transport_lang.transport_fare') }}">{{ $post->route_fare }}</td>
                    @if(Auth::user()->permission('add_transport'))
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
                                            <h4 class="modal-title">{{ trans('transport_lang.update_transport') }}</h4>
                                        </div>
                                        {!! Form::open(array('url'=>'transport/update_transport','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                        <div class="modal-body">

                                        
                                            <div class="form-group">
                                                <label  class="col-lg-2 control-label">{{ trans('transport_lang.transport_route') }}</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" id="f-name" value="{{ $post->route_name }}" name="route_name">
                                                    <input type="hidden" class="form-control" id="f-name" value="{{ $post->id }}" name="id">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-lg-2 control-label">{{ trans('transport_lang.transport_vehicle') }}</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" id="f-name" value="{{ $post->number_of_vehicle }}" name="no_of_vehicle">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-lg-2 control-label">{{ trans('transport_lang.transport_fare') }}</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" id="f-name" value="{{ $post->route_fare }}" name="route_fare">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-lg-2 control-label">{{ trans('transport_lang.transport_note') }}</label>
                                                <div class="col-lg-9">
                                                    <input type="address" class="form-control" id="f-name" value="{{ $post->description }}" name="description">
                                                </div>
                                            </div>
                                                    </div>
                                        <div class="modal-footer">
                                            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                            <button class="btn btn-warning" type="submit" name='submit'>{{ trans('transport_lang.update_transport') }}</button>
                                        
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
                                            <a href="{{ url('transport/delete/'.$post->id) }}">
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
              <!-- page end-->
               

@endsection


