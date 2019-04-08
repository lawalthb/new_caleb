@extends('layouts.app')

@section('title')
Academic Sessions
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">Academic Sessions</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Academic Sessions
                          </header>
                          <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">New Academic Sessions</h4>
                                          </div>
                                        {!! Form::open(array('url'=>'add-session','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                            <div class="modal-body">
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">Name</label>
                                                  <div class="col-lg-9">
                                                    <input type="text" class="form-control" required  name="name">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">Start Date</label>
                                                  <div class="col-lg-9">
                                                    <input type="date" class="form-control" required  name="start">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">End Date</label>
                                                  <div class="col-lg-9">
                                                    <input type="date" class="form-control" required  name="end">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">Note</label>
                                                  <div class="col-lg-9">
                                                      <textarea name="note" class="form-control" required></textarea>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">Current Session?</label>
                                                  <div class="col-lg-9">
                                                        <input class="form-control" type="checkbox" id="blankCheckbox" value="1" name="current">
                                                  </div>
                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                <button class="btn btn-warning" type="submit" name='submit'>Submit</button>
                                            </div>
                                        {!! Form::close() !!}
                                        </div>
                                  </div>
                              </div>
                              <!-- modal -->
                           <a class="btn btn-success" data-toggle="modal" href="#myModal2" style="margin:5px">
                                  New Academic Sessions
                              </a>
                        <div id="hide-table">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer"> 
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Start Date</th>
                                  <th>End Date</th>
                                  <th>Note</th>
                                  <th>Current Session?</th>
                                  <th>{{ trans('student_lang.action') }}</th>
                              </tr>
                              </thead>
                              <tbody>

                                @foreach( $sessions as $key => $session )
                                    <tr>
                                        <td data-title="#"><a href="#">{{ $key+1 }}</a></td>
                                        <td data-title="Name"> {{ $session->name }} </td>
                                        <td data-title="Start Date">{{date('F d, Y', strtotime($session->start)) }}</td>
                                        <td data-title="End Date">{{ date('F d, Y', strtotime($session->end))  }}</td>
                                        <td data-title="Note">{{ $session->note }}</td>
                                        <td data-title="Current Session?"> @if($session->current == 1) <span class="btn btn-success btn-xs">yes</span> @else <span class="btn btn-warning btn-xs">no</span> @endif </td>
                                        <td data-title="{{ trans('student_lang.action') }}">
                                            <a class="active" data-toggle="modal" href="#myModal2{{ $session->id }}">
                                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                            </a>
                                            <!-- Modal -->
                                                <div class="modal fade" id="myModal2{{ $session->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title">Update Session</h4>
                                                            </div>
                                                            {!! Form::open(array('url'=>'update-sessions','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id" value="{{ $session->id }}">
                                                                <div class="form-group">
                                                                    <label  class="col-lg-3 control-label">Name</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="text" class="form-control" required value="{{ $session->name }}"  name="name">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label  class="col-lg-3 control-label">Start Date</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="date" class="form-control" value="{{ date('Y-m-d', strtotime($session->start)) }}" required  name="start">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label  class="col-lg-3 control-label">End Date</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="date" class="form-control" required  value="{{ date('Y-m-d', strtotime($session->end)) }}" name="end">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label  class="col-lg-3 control-label">Note</label>
                                                                    <div class="col-lg-9">
                                                                        <textarea name="note" class="form-control" required>{{ $session->note }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label  class="col-lg-3 control-label">Current Session?</label>
                                                                    <div class="col-lg-9">
                                                                            <input class="form-control" type="checkbox" {{ $session->current ? 'checked' : null}} id="blankCheckbox" value="1" name="current">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                                <button class="btn btn-warning" type="submit" name='submit'>Update Session</button>
                                                            </div>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- modal -->
                                            <a class="active"  data-toggle="modal" href="#myModaldel{{ $session->id }}">
                                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                            </a>
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="myModaldel{{ $session->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            
                                                        </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                                        <div class="modal-footer">
                                                            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                            <a href="{{ url('sessions/delete/'.$session->id) }}">
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

