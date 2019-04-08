@extends('layouts.app')

@section('title')
{{ trans('classes_lang.panel_title') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="#"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('classes_lang.panel_title') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              {{ trans('classes_lang.panel_title') }}
                          </header>
                            <div id="hide-table">
                              <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer"> 
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>{{ trans('classes_lang.classes_name') }}</th>
                                  <th>{{ trans('classes_lang.teacher_name') }}</th>
                                  <th>{{ trans('exam_lang.exam_note') }}</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach( $classes as $class )
                              <tr>
                                  <td data-title="#">{{ $class->id }}</td>
                                  <td data-title="{{ trans('classes_lang.classes_name') }}"><a href="#">{{ $class->title }}</a></td>
                                  <td data-title="{{ trans('classes_lang.teacher_name') }}" class="hidden-phone">@if($class->teacher){{ $class->teacher->name }}@endif</td>
                                  <td data-title="{{ trans('exam_lang.exam_note') }}">{{ $class->note }}</td>
                              </tr>
                               @endforeach
                              </tbody>
                          </table>
                        </div>
                      </section>
                  </div>
              </div>
               

@endsection