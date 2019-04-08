@extends('layouts.app')

@section('title')
Tests Questions
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('other.test') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Tests Questions
                          </header>
                          <header class="panel-heading">
                          <a class="btn btn-success" data-toggle="modal" href="#myModal2" style="margin:5px">
                                {{ trans('other.add_test') }}
                              </a>
                          </header>
                          <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">{{ trans('other.add_test') }}</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'add_test_question','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Question</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="" name="question"required>
                                                      <input type="hidden" class="form-control" value="{{ $test_id }}" name="test_id"required>
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Option A</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="" name="option_a"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Option B</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="" name="option_b"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Option C</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="" name="option_c"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Option D</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="" name="option_d"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">Correct Answer
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="correct_answer" class="form-control" data-validate="required">
                                                    <option value="option_a">Option A</option>
                                                    <option value="option_b">Option B</option>
                                                    <option value="option_c">Option C</option>
                                                    <option value="option_d">Option D</option>
                                                  </select>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'>{{ trans('other.add_test') }}</button>
                                          
                                          </div>
                                          {!! Form::close() !!}
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                          
                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Question</th>
                                  <th>Option A</th>
                                  <th>Option B</th>
                                  <th>Option C</th>
                                  <th>Option D</th>
                                  <th>Correct Answer</th>
                                  <th>Actions</th>
                              </tr>
                              </thead>
                              <tbody>

                                @foreach( $tests as $key => $res )
                              <tr>
                                  <td data-title="">{{ $key+1 }}</td>
                                  <td data-title="">{{ $res->question }}</td>
                                  <td data-title="">{{ $res->option_a }}</td>
                                  <td data-title="">{{ $res->option_b }}</td>
                                  <td data-title="">{{ $res->option_c }}</td>
                                  <td data-title="">{{ $res->option_d }}</td>
                                  <td data-title="">{{ $res->correct_answer }}</td>
                                  <td data-title="">
                                    <a class="active" data-toggle="modal" href="#myModal2{{ $res->id }}">
                                       <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                       </a>

                                    <!-- Modal -->
                              <div class="modal fade" id="myModal2{{ $res->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Edit Question</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'update_test_question','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Question</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="{{ $res->question }}" name="question"required>
                                                      <input type="hidden" class="form-control" value="{{ $res->id }}" name="id"required>
                                                      <input type="hidden" class="form-control" value="{{ $test_id }}" name="test_id"required>
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Option A</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="{{ $res->option_a }}" name="option_a"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Option B</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="{{ $res->option_b }}" name="option_b"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Option C</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="{{ $res->option_c }}" name="option_c"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Option D</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="{{ $res->option_d }}" name="option_d"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">Correct Answer
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="correct_answer" class="form-control" data-validate="required">
                                                    <option value="option_a">Option A</option>
                                                    <option value="option_b">Option B</option>
                                                    <option value="option_c">Option C</option>
                                                    <option value="option_d">Option D</option>
                                                  </select>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'>Edit Question</button>
                                          
                                          </div>
                                          {!! Form::close() !!}
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->


                                    <a class="active"  data-toggle="modal" href="#myModaldel{{ $res->id }}">
                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                      </a>
                                      <!-- Delete Modal -->
                              <div class="modal fade" id="myModaldel{{ $res->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-body">
                                              
                                          </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <a href="{{ url('test_question/delete/'.$res->id) }}">
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
