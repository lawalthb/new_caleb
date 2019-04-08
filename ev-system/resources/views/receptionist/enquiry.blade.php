@extends('layouts.app')

@section('title')
Admission Enquiry
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">Admission Enquiry</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Admission Enquiry
                          </header>
                          <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">New Admission Enquiry</h4>
                                          </div>
                                        {!! Form::open(array('url'=>'receptionist/create-enquiries','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">Name</label>
                                                  <div class="col-lg-9">
                                                    <input type="text" class="form-control" required  name="name">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">Discussion</label>
                                                  <div class="col-lg-9">
                                                      <textarea name="discussion" class="form-control" required></textarea>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">Email</label>
                                                  <div class="col-lg-9">
                                                      <input type="email" class="form-control" required  name="email">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">Phone</label>
                                                  <div class="col-lg-9">
                                                      <input type="phone" class="form-control"  name="phone">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">Address</label>
                                                  <div class="col-lg-9">
                                                      <textarea name="address" class="form-control" required></textarea>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-3 control-label">Status</label>
                                                  <div class="col-lg-9">
                                                        <select name="status" id="" class="form-control">
                                                            <option value="pending">Pending</option>
                                                            <option value="done">Done</option>
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
                                  New Admission Enquiry
                              </a>
                        <div id="hide-table">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer"> 
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Discussion</th>
                                  <th>Email</th>
                                  <th>Phone</th>
                                  <th>Address</th>
                                  <th>Status</th>
                                  <th>Date</th>
                                  <th>{{ trans('student_lang.action') }}</th>
                              </tr>
                              </thead>
                              <tbody>

                                @foreach( $enquiries as $key => $enquiry )
                              <tr>
                                  <td data-title="#"><a href="#">{{ $key+1 }}</a></td>
                                  <td data-title="Name"> {{ $enquiry->name }} </td>
                                  <td data-title="Discussion">{{ $enquiry->discussion }}</td>
                                  <td data-title="Email">{{ $enquiry->email }}</td>
                                  <td data-title="Phone">{{ $enquiry->phone }}</td>
                                  <td data-title="Address">{{ $enquiry->address }}</td>
                                  <td data-title="Status"><span class="btn @if($enquiry->status == 'pending') btn-warning @else btn-success @endif  btn-xs">{{ $enquiry->status }}</span></td>
                                  <td data-title="Date">{{ $enquiry->created_at->format('d, M Y \a\t h:i a') }}</td>
                                  <td data-title="{{ trans('student_lang.action') }}">
                                      <a class="active" data-toggle="modal" href="#myModal2{{ $enquiry->id }}">
                                       <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                       </a>
                                       <!-- Modal -->
                                        <div class="modal fade" id="myModal2{{ $enquiry->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title">Update Visitor</h4>
                                                    </div>
                                                    {!! Form::open(array('url'=>'receptionist/update-enquiries','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="{{ $enquiry->id }}">
                                                        <div class="form-group">
                                                            <label  class="col-lg-3 control-label">Name</label>
                                                            <div class="col-lg-9">
                                                                <textarea name="name" class="form-control" required>{{ $enquiry->name }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-lg-3 control-label">Discussion</label>
                                                            <div class="col-lg-9">
                                                                <textarea name="discussion" class="form-control" required>{{ $enquiry->discussion }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-lg-3 control-label">Email</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control" required  value="{{ $enquiry->email }}" name="email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-lg-3 control-label">Phone</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control"  value="{{ $enquiry->phone }}" name="phone">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-lg-3 control-label">Address</label>
                                                            <div class="col-lg-9">
                                                                <textarea name="address" class="form-control" required>{{ $enquiry->address }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label  class="col-lg-3 control-label">Status</label>
                                                            <div class="col-lg-9">
                                                                <select name="status" id="" class="form-control">
                                                                    <option @if($enquiry->status == 'pending') selected @endif value="pending">Pending</option>
                                                                    <option @if($enquiry->status == 'done') selected @endif value="done">Done</option>
                                                                </select>
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
                                       <a class="active"  data-toggle="modal" href="#myModaldel{{ $enquiry->id }}">
                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                      </a>
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="myModaldel{{ $enquiry->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    
                                                </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                                <div class="modal-footer">
                                                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                    <a href="{{ url('enquiries/delete/'.$enquiry->id) }}">
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

