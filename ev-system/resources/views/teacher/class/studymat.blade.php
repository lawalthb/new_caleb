@extends('layouts.app')

@section('title')
Study Material
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="#"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">Study Material</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Study Material
                          </header>
                           <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Add Study Material</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'teacher/class/study_material','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Title</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="" name="title">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Description</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="" name="description">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">Class
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="class_id" class="form-control">
                                                    <option value="">Choose..</option>
                                                    @foreach( $classes as $class )
                                                    <option value="{{ $class->id }}">{{ $class->title }}</option>
                                                    @endforeach
                                                  </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Date</label>
                                                  <div class="col-lg-9">
                                                      <input type="date" class="form-control" id="f-name" value="" name="date">
                                                      <input type="hidden" class="form-control" id="f-name" value="{{ Auth::user()->id }}" name="teacher_id">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">File</label>
                                                  <div class="col-lg-9">
                                                      <input type="file" name="import_file" required="required">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                  </div>
                                              </div>
                                                      </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'> Add Study Material</button>
                                          
                                          </div>
                                          {!! Form::close() !!}
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                           <a class="btn btn-success" data-toggle="modal" href="#myModal2" style="margin:5px">
                                  Add Study Material
                              </a>   
                          <div id="hide-table">
                              <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer"> 
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Title</th>
                                  <th> Description</th>
                                  <th> Date</th>
                                  <th> Class</th>
                                  <th> Download</th>
                                  <th>{{ trans('student_lang.action') }}</th>
                              </tr>
                              </thead>
                              <tbody>
                                

                                @foreach( $materials as $key => $mat )
                              <tr>
                                  <td data-title="#">{{ $key+1 }}</td>
                                  <td data-title="Title">{{ $mat->title }}</td>
                                  <td data-title="Description">{{ $mat->description }}</td>
                                  <td data-title="Date">{{ $mat->date }}</td>
                                  <td data-title="Class">{{ $mat->classes($mat->class_id)->title }}</td>
                                  <td data-title="Download">
                                    <a class="active" href="{{ url('ev-assets/uploads/study-materials/'.$mat->file_name) }}" target="_blank">
                                        <button class="btn btn-success btn-xs"><i class="fa fa-download "></i> Download</button>
                                      </a></td>

                                  <td data-title="{{ trans('student_lang.action') }}">
                                      <a class="active" data-toggle="modal" href="#myModal2{{ $mat->id }}">
                                       <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                       </a>
                                      <!-- Modal -->
                              <div class="modal fade" id="myModal2{{ $mat->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Edit Study Material</h4>
                                          </div>
                                          {!! Form::open(array('url'=>'teacher/class/update_study_material','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Title</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="{{ $mat->title }}" name="title">
                                                      <input type="hidden" class="form-control" id="f-name" value="{{ $mat->id }}" name="id">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Description</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="{{ $mat->description }}" name="description">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">Class
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="class_id" class="form-control">
                                                    <option value="">Choose..</option>
                                                    @foreach( $classes as $class )
                                                    <option value="{{ $class->id }}" <?php if($class->id == $mat->class_id){echo 'selected';}?>>{{ $class->title }}</option>
                                                    @endforeach
                                                  </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Date</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="{{ $mat->date }}" name="date">
                                                      <input type="hidden" class="form-control" id="f-name" value="{{ Auth::user()->id }}" name="teacher_id">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                  </div>
                                              </div>
                                                      </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'> Edit Study Material</button>
                                          
                                          </div>
                                          {!! Form::close() !!}
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                            <a class="active"  data-toggle="modal" href="#myModaldel{{ $mat->id }}">
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                            </a>
                            <!-- Delete Modal -->
                              <div class="modal fade" id="myModaldel{{ $mat->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-body">
                                              
                                          </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <a href="{{ url('teacher/class/study_material/delete/'.$mat->id) }}">
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