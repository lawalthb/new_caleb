@extends('layouts.app')

@section('title')
Terms
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">Terms</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Terms
                          </header>
                          <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">New Term</h4>
                                          </div>
                                        {!! Form::open(array('url'=>'add-term','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                            <div class="modal-body">
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">Name</label>
                                                  <div class="col-lg-9">
                                                    <input type="text" class="form-control" required  name="name">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">Academic Session</label>
                                                  <div class="col-lg-9">
                                                    <select  name="session" class="form-control" required>
                                                        <option value="">Choose..</option>
                                                        @foreach(App\AcademicSession::all() as $session)
                                                            <option value="{{ $session->id }}">{{ $session->name }}</option>
                                                        @endforeach
                                                    </select>
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
                                  New Term
                              </a>
                        <div id="hide-table">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer"> 
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Academic Session</th>
                                  <th>{{ trans('student_lang.action') }}</th>
                              </tr>
                              </thead>
                              <tbody>

                                @foreach( $terms as $key => $term )
                                    <tr>
                                        <td data-title="#"><a href="#">{{ $key+1 }}</a></td>
                                        <td data-title="Name"> {{ $term->name }} </td>
                                        <td data-title="Academic Session">{{ $term->session ? $term->session->name : $term->session_id }}</td>
                                        <td data-title="{{ trans('student_lang.action') }}">
                                            <a class="active" data-toggle="modal" href="#myModal2{{ $term->id }}">
                                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                            </a>
                                            <!-- Modal -->
                                                <div class="modal fade" id="myModal2{{ $term->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title">Update Session</h4>
                                                            </div>
                                                            {!! Form::open(array('url'=>'update-term','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id" value="{{ $term->id }}">
                                                                <div class="form-group">
                                                                    <label  class="col-lg-3 control-label">Name</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="text" class="form-control" required value="{{ $term->name }}"  name="name">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label  class="col-lg-3 control-label">Academic Session</label>
                                                                    <div class="col-lg-9">
                                                                        <select  name="session" class="form-control" required>
                                                                            <option value="">Choose..</option>
                                                                            @foreach(App\AcademicSession::all() as $session)
                                                                            <option value="{{ $session->id }}" <?php if($session->id == $term->session_id){echo 'selected';}?>>{{ $session->name }}</option>
                                                                            @endforeach
                                                                        </select>
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
                                            <a class="active"  data-toggle="modal" href="#myModaldel{{ $term->id }}">
                                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                            </a>
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="myModaldel{{ $term->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            
                                                        </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                                        <div class="modal-footer">
                                                            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                            <a href="{{ url('term/delete/'.$term->id) }}">
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

