@extends('layouts.app')

@section('title')
Online Tests
@endsection
@section('content')
<style type="text/css">
.test-grid {padding: 10px;background-color:white;overflow: hidden;margin-top:8px;border-radius: 14px;border-bottom: 2px solid teal;border-top: 2px solid teal;  }
</style>
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('teacher') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">Online Tests</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Online Tests
                          </header>
                          <header class="panel-heading">
                          <a class="btn btn-success" data-toggle="modal" href="#myModal2" style="margin:5px">
                                  Add Test
                              </a>
                          </header>
                          <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Add Test</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'teacher/store_online_test','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">
                                            <div class="form-group">
                                                 <label  class="col-lg-2 control-label">Can Redo Test?
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="redo" class="form-control" data-validate="required">
                                                    <option value="0">Not Allowed</option>
                                                    <option value="1">One Time</option>
                                                    <option value="2">Two Times</option>
                                                    <option value="3">Three Times</option>
                                                    <option value="4">Four Times</option>
                                                    <option value="5">Five Times</option>
                                                    <option value="6">Anytime</option>
                                                  </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Duration (in seconds)</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="" name="duration"required>
                                                  </div>
                                              </div>
                                               <div class="form-group">
                                                 <label  class="col-lg-2 control-label">Subject
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="subject_id" class="form-control" data-validate="required">
                                                    <option value="">Choose..</option>
                                                    @foreach( $subject as $sub )
                                                    <option value="{{ $sub->id }}">{{ $sub->title }}</option>
                                                    @endforeach
                                                  </select>
                                                  </div>
                                              </div>
                                              
                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'>Add Test</button>
                                          
                                          </div>
                                          {!! Form::close() !!}
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->

                          @foreach( $tests as $test )
                          <div class="col-lg-3 col-sm-6">
                            <!-- small box -->
                            <div class="test-grid">
                              <div class="inner">
                                <h3>Test: {{ $test->subject($test->subject_id)->title }}</h3>

                                <p>Duration: {{ $test->duration }}</p>
                              </div>
                              <a data-toggle="modal" href="#myModal2{{ $test->id }}" class="small-box-footer">
                                Edit Test <i class="fa fa-pencil"></i>
                                <a data-toggle="modal" href="#myModaldel{{ $test->id }}" class=" pull-right">
                                Remove <i class="fa fa-trash-o"></i>
                              </a>
                            </div>
                          </div>
                          <!-- Modal -->
                              <div class="modal fade" id="myModal2{{ $test->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Edit Test</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'teacher/test/update_test','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">
                                            <div class="form-group">
                                                 <label  class="col-lg-2 control-label">Can Redo Test?
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="redo" class="form-control" data-validate="required">
                                                    <option value="0">Not Allowed</option>
                                                    <option value="1">One Time</option>
                                                    <option value="2">Two Times</option>
                                                    <option value="3">Three Times</option>
                                                    <option value="4">Four Times</option>
                                                    <option value="5">Five Times</option>
                                                    <option value="6">Anytime</option>
                                                  </select>
                                                  </div>
                                              </div>
                                            <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Duration (in seconds)</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" name="duration" value="{{ $test->duration }}"required>
                                                      <input type="hidden" class="form-control" name="id" value="{{ $test->id }}" >
                                                  </div>
                                              </div>
                                               <div class="form-group">
                                                 <label  class="col-lg-2 control-label">Subject
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="subject_id" class="form-control" data-validate="required">
                                                    <option value="">Choose..</option>
                                                    @foreach( $subject as $sub )
                                                    <option value="{{ $sub->id }}" @if($sub->id == $test->subject_id) selected @endif">{{ $sub->title }}</option>
                                                    @endforeach
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
                                              <button class="btn btn-warning" type="submit" name='submit'>Edit Test</button>
                                          
                                          </div>
                                          {!! Form::close() !!}
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                              <!-- Delete Modal -->
                              <div class="modal fade" id="myModaldel{{ $test->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-body">
                                              
                                          </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <a href="{{ url('teacher/test/delete/'.$test->id) }}">
                                              <button class="btn btn-danger">{{ trans('student_lang.delete') }}</button>
                                              </a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                          @endforeach
                      </section>
                  </div>
              </div>
               

@endsection
