@extends('layouts.app')

@section('title')
{{ trans('subject_lang.panel_title') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
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
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Test Name</th>
                                  <th>Score</th>
                              </tr>
                              </thead>
                              <tbody>

                                @foreach( $results as $key => $res )
                              <tr>
                                  <td data-title="">{{ $key+1 }}</td>
                                  <td data-title="">{{ $res->test_id($res->test_id) }}</td>
                                  <td data-title="">{{ $res->score }}</td>
                              </tr>
                               @endforeach
                              {!! $results->render() !!}
                              </tbody>
                          </table>
                      </section>
                  </div>
              </div>
               

@endsection
