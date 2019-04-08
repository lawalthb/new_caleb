@extends('layouts.app')

@section('title')
{{ trans('subject_lang.panel_title') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('student') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('subject_lang.panel_title') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              {{ trans('subject_lang.panel_title') }}
                          </header>
                          <div id="hide-table">
                              <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer"> 
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>{{ trans('subject_lang.subject_name') }}</th>
                                  <th>{{ trans('subject_lang.subject_teacher_name') }}</th>
                                  <th>{{ trans('subject_lang.subject_class_name') }}</th>
                              </tr>
                              </thead>
                              <tbody>

                                @foreach( $subjects as $subject )
                              <tr>
                                  <td data-title="#">{{ $subject->id }}</td>
                                  <td data-title="{{ trans('subject_lang.subject_name') }}"><a href="#">{{ $subject->title }}</a></td>
                                  <td data-title="{{ trans('subject_lang.subject_teacher_name') }}">{{ $subject->teacher->name }}</td>
                                  <td data-title="{{ trans('subject_lang.subject_class_name') }}">@if($subject->class_name){{ $subject->class_name->title }}@endif</td>
                              </tr>
                               @endforeach
                              </tbody>
                          </table>
                        </div>
                      </section>
                  </div>
              </div>
               

@endsection
