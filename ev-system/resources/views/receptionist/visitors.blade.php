@extends('layouts.app')

@section('title')
Visitors Log
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">Visitors Log</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Visitors Log
                          </header>
                          <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">New Visitor Log</h4>
                                          </div>
                                        {!! Form::open(array('url'=>'receptionist/create-visitor','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">Purpose of Visit</label>
                                                  <div class="col-lg-9">
                                                      <textarea name="purpose" class="form-control" required></textarea>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">Visitors Detail</label>
                                                  <div class="col-lg-9">
                                                      <textarea name="details" class="form-control" required></textarea>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">Checks in</label>
                                                  <div class="col-lg-9">
                                                      <input type="time" class="form-control" required  name="check_in">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">Checks out</label>
                                                  <div class="col-lg-9">
                                                      <input type="time" class="form-control"  name="check_out">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">No of visitors</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" required name="counts">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">Whom to Meet</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" required name="whom_to_meet">
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
                                  New Visitor Log
                              </a>
                        <div id="hide-table">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer"> 
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Purpose of Visit</th>
                                  <th>Detail</th>
                                  <th>Checks in</th>
                                  <th>Checks out</th>
                                  <th>Count</th>
                                  <th>Whom to Visit</th>
                                  <th>Date</th>
                                  <th>{{ trans('student_lang.action') }}</th>
                              </tr>
                              </thead>
                              <tbody>

                                @foreach( $visitors as $key => $visitor )
                              <tr>
                                  <td data-title="#"><a href="#">{{ $key+1 }}</a></td>
                                  <td data-title="Purpose of Visit"> {{ $visitor->purpose }} </td>
                                  <td data-title="Detail">{{ $visitor->details }}</td>
                                  <td data-title="Checks in">{{ $visitor->check_in }}</td>
                                  <td data-title="Checks out">{{ $visitor->check_out }}</td>
                                  <td data-title="Count">{{ $visitor->counts }}</td>
                                  <td data-title="Whom to Visit">{{ $visitor->whom_to_meet }}</td>
                                  <td data-title="Date">{{ $visitor->created_at->format('d, M Y \a\t h:i a') }}</td>
                                  <td data-title="{{ trans('student_lang.action') }}">
                                      <a class="active" data-toggle="modal" href="#myModal2{{ $visitor->id }}">
                                       <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                       </a>
                                       <!-- Modal -->
                                        <div class="modal fade" id="myModal2{{ $visitor->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title">Update Visitor</h4>
                                                    </div>
                                                    {!! Form::open(array('url'=>'receptionist/update-visitor','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="{{ $visitor->id }}">
                                                        <div class="form-group">
                                                            <label  class="col-lg-3 control-label">Purpose of Visit</label>
                                                            <div class="col-lg-9">
                                                                <textarea name="purpose" class="form-control" required>{{ $visitor->purpose }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-lg-3 control-label">Visitors Detail</label>
                                                            <div class="col-lg-9">
                                                                <textarea name="details" class="form-control" required>{{ $visitor->details }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-lg-3 control-label">Checks in</label>
                                                            <div class="col-lg-9">
                                                                <input type="time" class="form-control" required  value="{{ $visitor->check_in }}" name="check_in">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-lg-3 control-label">Checks out</label>
                                                            <div class="col-lg-9">
                                                                <input type="time" class="form-control"  value="{{ $visitor->check_out }}" name="check_out">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-lg-3 control-label">No of visitors</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control" value="{{ $visitor->counts }}" required name="counts">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-lg-3 control-label">Whom to Meet</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control" value="{{ $visitor->whom_to_meet }}" required name="whom_to_meet">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                        <button class="btn btn-warning" type="submit" name='submit'>Update Visitor</button>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal -->
                                       <a class="active"  data-toggle="modal" href="#myModaldel{{ $visitor->id }}">
                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                      </a>
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="myModaldel{{ $visitor->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    
                                                </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                                <div class="modal-footer">
                                                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                    <a href="{{ url('visitor/delete/'.$visitor->id) }}">
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

