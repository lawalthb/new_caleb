@extends('layouts.app')

@section('title')
{{ trans('routine_lang.add_routine') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">Exam List</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Exam List
                          </header>

                          <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Add Exam</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'admin/exam/create_exam','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Exam Name</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="" name="name"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Exam Date</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="" name="date"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Comment</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" value="" name="comment"required>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'> Add Exam</button>
                                          
                                          </div>
                                          {!! Form::close() !!}
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                           <a class="btn btn-success" data-toggle="modal" href="#myModal2" style="margin:5px">
                                  Add Exam
                              </a>
                          <table class="table table-striped table-advance table-hover">
                            @if ( !$exams->count() )
                                <div style="padding:20px">There are no exam available...</div>
                            @else 
                            
                                <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Exam Name</th>
                                  <th>Exam Date</th>
                                  <th>Comment</th>
                                  <th>{{ trans('student_lang.action') }}</th>
                              </tr>
                              </thead>
                              <tbody>
                               
                                @foreach( $exams as $post )
                              <tr>
                                  <td data-title=""><a href="#">{{ $post->id }}</a></td>
                                  <td data-title="">{{ $post->name }}</td>
                                  <td data-title="">{{ $post->date }}</td>
                                  <td data-title="">{{ $post->comment }}</td>
                                  <td data-title="">
                                      <a class="active" href="#">
                                       <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                       </a>
                                      <a class="active" href="{{ url('admin/exam/delete/'.$post->id) }}">
                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                      </a>
                                  </td>
                              </tr>
                               @endforeach
                              {!! $exams->render() !!}
                              @endif
                              </tbody>
                          </table>
                      </section>
                  </div>
              </div>
               

@endsection