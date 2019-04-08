@extends('layouts.app')

@section('title')
{{ trans('routine_lang.panel_title') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('student') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
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
                          <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                          {{ $class->title }} #{{ $class->id }}
                              </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
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
                                    @foreach( $class->class_id->where('day_id', 1)->where('class_id',$class->id) as $classe )
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary">{{ $classe->subject->title }} [{{ $classe->starts }} - {{ $classe->ends }}]</button>
                                      
                                    </div>
                                    @endforeach
                                  </td>
                                </tr>
                                <tr>
                                  <th scope="row">{{ trans('routine_lang.monday') }}</th>
                                  <td data-title="">@foreach( $class->class_id->where('day_id', 2) as $classe )
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary">{{ $classe->subject->title }} [{{ $classe->starts }} - {{ $classe->ends }}]</button>
                                     
                                    </div>
                                      @endforeach
                                  </td>

                                </tr>
                                <tr>
                                  <th scope="row">{{ trans('routine_lang.tuesday') }}</th>
                                  <td data-title="">@foreach( $class->class_id->where('day_id', 3) as $classe )
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary">{{ $classe->subject->title }} [{{ $classe->starts }} - {{ $classe->ends }}]</button>
                                      
                                    </div>
                                      @endforeach</td>
                                </tr>
                                <tr>
                                  <th scope="row">{{ trans('routine_lang.wednesday') }}</th>
                                  <td data-title="">@foreach( $class->class_id->where('day_id', 4) as $classe )
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary">{{ $classe->subject->title }} [{{ $classe->starts }} - {{ $classe->ends }}]</button>
                                      
                                    </div>
                                      @endforeach</td>
                                </tr>
                                <tr>
                                  <th scope="row">{{ trans('routine_lang.thursday') }}</th>
                                  <td data-title="">@foreach( $class->class_id->where('day_id', 5) as $classe )
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary">{{ $classe->subject->title }} [{{ $classe->starts }} - {{ $classe->ends }}]</button>
                                      
                                    </div>
                                      @endforeach</td>
                                </tr>
                                <tr>
                                  <th scope="row">{{ trans('routine_lang.friday') }}</th>
                                  <td data-title="">@foreach( $class->class_id->where('day_id', 6) as $classe )
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary">{{ $classe->subject->title }} [{{ $classe->starts }} - {{ $classe->ends }}]</button>
                                      </div>
                                      @endforeach</td>
                                </tr>
                                <tr>
                                  <th scope="row">{{ trans('routine_lang.saturday') }}</th>
                                  <td data-title="">@foreach( $class->class_id->where('day_id', 7) as $classe )
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary">{{ $classe->subject->title }} [{{ $classe->starts }} - {{ $classe->ends }}]</button>
                                      </div>
                                      @endforeach
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end of accordion -->
                      </section>
                  </div>
              </div>
               

@endsection

