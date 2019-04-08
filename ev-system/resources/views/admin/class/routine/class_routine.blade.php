@extends('layouts.app')

@section('title')
{{ trans('routine_lang.panel_title') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('routine_lang.panel_title') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             {{ trans('routine_lang.panel_title') }}

                          </header>
                          <a href="{{ url('routine/create_routine') }}" type="button" class="btn btn-primary" style="margin:10px">{{ trans('routine_lang.add_routine') }}</a>
                          <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                      @foreach( $classes as $class )
                      <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $class->id }}">
                                          {{ $class->title }} #{{ $class->id }}
                              </a>
                            </h4>
                        </div>
                        <div id="collapse{{ $class->id }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>{{ trans('routine_lang.routine_day') }}</th>
                                  <th>Subject/Duration</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">{{ trans('routine_lang.sunday') }}</th>
                                  <td data-title="">
                                    @foreach( $class->class_id->where('day_id', 1) as $classe )
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary">{{ $classe->subject ? $classe->subject->title : null }} [{{ $classe->starts }} - {{ $classe->ends }}]</button>
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                      <span class="caret"></span>
                                      <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <ul class="dropdown-menu" role="menu">
                                        <li><a class="active"  data-toggle="modal" href="#myModaldel{{ $classe->id }}">{{ trans('routine_lang.delete') }}
                                      </a>
                                        </li>
                                        <li><a href="{{ url('routine/edit/'.$classe->id) }}">{{ trans('routine_lang.edit') }}</a>
                                        </li>
                                      </ul>
                                    </div>
                                    @endforeach
                                  </td>
                                </tr>
                                <tr>
                                  <th scope="row">{{ trans('routine_lang.monday') }}</th>
                                  <td data-title="">@foreach( $class->class_id->where('day_id', 2) as $classe )
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary">{{ $classe->subject ? $classe->subject->title : null }} [{{ $classe->starts }} - {{ $classe->ends }}]</button>
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                      <span class="caret"></span>
                                      <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <ul class="dropdown-menu" role="menu">
                                        <li>
                                          <a class="active"  data-toggle="modal" href="#myModaldel{{ $classe->id }}">{{ trans('routine_lang.delete') }}
                                      </a>
                                        </li>
                                        <li><a href="{{ url('routine/edit/'.$classe->id) }}">{{ trans('routine_lang.edit') }}</a>
                                        </li>
                                      </ul>
                                    </div>
                                      <!-- Delete Modal -->
                                      <div class="modal fade" id="myModaldel{{ $classe->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                              <div class="modal-content">
                                                  <div class="modal-body">
                                                      
                                                  </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                                  <div class="modal-footer">
                                                      <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                      <a href="{{ url('routine/delete/'.$classe->id) }}">
                                                      <button class="btn btn-danger">{{ trans('student_lang.delete') }}</button>
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- modal -->
                                      @endforeach
                                  </td>

                                </tr>
                                <tr>
                                  <th scope="row">{{ trans('routine_lang.tuesday') }}</th>
                                  <td data-title="">@foreach( $class->class_id->where('day_id', 3) as $classe )
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary">{{ $classe->subject ? $classe->subject->title : null }} [{{ $classe->starts }} - {{ $classe->ends }}]</button>
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                      <span class="caret"></span>
                                      <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <ul class="dropdown-menu" role="menu">
                                        <li><a class="active"  data-toggle="modal" href="#myModaldel{{ $classe->id }}">{{ trans('routine_lang.delete') }}
                                      </a>
                                        </li>
                                        <li><a href="{{ url('routine/edit/'.$classe->id) }}">{{ trans('routine_lang.edit') }}</a>
                                        </li>
                                      </ul>
                                    </div>
                                    <!-- Delete Modal -->
                                      <div class="modal fade" id="myModaldel{{ $classe->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                              <div class="modal-content">
                                                  <div class="modal-body">
                                                      
                                                  </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                                  <div class="modal-footer">
                                                      <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                      <a href="{{ url('routine/delete/'.$classe->id) }}">
                                                      <button class="btn btn-danger">{{ trans('student_lang.delete') }}</button>
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- modal -->
                                      @endforeach</td>
                                </tr>
                                <tr>
                                  <th scope="row">{{ trans('routine_lang.wednesday') }}</th>
                                  <td data-title="">@foreach( $class->class_id->where('day_id', 4) as $classe )
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary">{{ $classe->subject ? $classe->subject->title : null }} [{{ $classe->starts }} - {{ $classe->ends }}]</button>
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                      <span class="caret"></span>
                                      <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <ul class="dropdown-menu" role="menu">
                                        <li><a class="active"  data-toggle="modal" href="#myModaldel{{ $classe->id }}">{{ trans('routine_lang.delete') }}
                                      </a>
                                        </li>
                                        <li><a href="{{ url('routine/edit/'.$classe->id) }}">{{ trans('routine_lang.edit') }}</a>
                                        </li>
                                      </ul>
                                    </div>
                                    <!-- Delete Modal -->
                                      <div class="modal fade" id="myModaldel{{ $classe->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                              <div class="modal-content">
                                                  <div class="modal-body">
                                                      
                                                  </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                                  <div class="modal-footer">
                                                      <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                      <a href="{{ url('routine/delete/'.$classe->id) }}">
                                                      <button class="btn btn-danger">{{ trans('student_lang.delete') }}</button>
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- modal -->
                                      @endforeach</td>
                                </tr>
                                <tr>
                                  <th scope="row">{{ trans('routine_lang.thursday') }}</th>
                                  <td data-title="">@foreach( $class->class_id->where('day_id', 5) as $classe )
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary">{{ $classe->subject ? $classe->subject->title : null }} [{{ $classe->starts }} - {{ $classe->ends }}]</button>
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                      <span class="caret"></span>
                                      <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <ul class="dropdown-menu" role="menu">
                                        <li><a class="active"  data-toggle="modal" href="#myModaldel{{ $classe->id }}">{{ trans('routine_lang.delete') }}
                                      </a>
                                        </li>
                                        <li><a href="{{ url('routine/edit/'.$classe->id) }}">{{ trans('routine_lang.edit') }}</a>
                                        </li>
                                      </ul>
                                    </div>
                                    <!-- Delete Modal -->
                                      <div class="modal fade" id="myModaldel{{ $classe->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                              <div class="modal-content">
                                                  <div class="modal-body">
                                                      
                                                  </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                                  <div class="modal-footer">
                                                      <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                      <a href="{{ url('routine/delete/'.$classe->id) }}">
                                                      <button class="btn btn-danger">{{ trans('student_lang.delete') }}</button>
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- modal -->
                                      @endforeach</td>
                                </tr>
                                <tr>
                                  <th scope="row">{{ trans('routine_lang.friday') }}</th>
                                  <td data-title="">@foreach( $class->class_id->where('day_id', 6) as $classe )
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary">{{ $classe->subject ? $classe->subject->title : null }} [{{ $classe->starts }} - {{ $classe->ends }}]</button>
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                      <span class="caret"></span>
                                      <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <ul class="dropdown-menu" role="menu">
                                        <li><a class="active"  data-toggle="modal" href="#myModaldel{{ $classe->id }}">{{ trans('routine_lang.delete') }}
                                      </a>
                                        </li>
                                        <li><a href="{{ url('routine/edit/'.$classe->id) }}">{{ trans('routine_lang.edit') }}</a>
                                        </li>
                                      </ul>
                                    </div>
                                    <!-- Delete Modal -->
                                      <div class="modal fade" id="myModaldel{{ $classe->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                              <div class="modal-content">
                                                  <div class="modal-body">
                                                      
                                                  </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                                  <div class="modal-footer">
                                                      <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                      <a href="{{ url('routine/delete/'.$classe->id) }}">
                                                      <button class="btn btn-danger">{{ trans('student_lang.delete') }}</button>
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- modal -->
                                      @endforeach</td>
                                </tr>
                                <tr>
                                  <th scope="row">{{ trans('routine_lang.saturday') }}</th>
                                  <td data-title="">@foreach( $class->class_id->where('day_id', 7) as $classe )
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary">{{ $classe->subject ? $classe->subject->title : null }} [{{ $classe->starts }} - {{ $classe->ends }}]</button>
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                      <span class="caret"></span>
                                      <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <ul class="dropdown-menu" role="menu">
                                        <li><a class="active"  data-toggle="modal" href="#myModaldel{{ $classe->id }}">{{ trans('routine_lang.delete') }}
                                      </a>
                                        </li>
                                        <li><a href="{{ url('routine/edit/'.$classe->id) }}">{{ trans('routine_lang.edit') }}</a>
                                        </li>
                                      </ul>
                                    </div>
                                    <!-- Delete Modal -->
                                      <div class="modal fade" id="myModaldel{{ $classe->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                              <div class="modal-content">
                                                  <div class="modal-body">
                                                      
                                                  </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                                  <div class="modal-footer">
                                                      <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                      <a href="{{ url('routine/delete/'.$classe->id) }}">
                                                      <button class="btn btn-danger">{{ trans('student_lang.delete') }}</button>
                                                      </a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- modal -->
                                      @endforeach
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      
                    </div>
                    <!-- end of accordion -->
                      </section>
                  </div>
              </div>
               

@endsection

