@extends('layouts.app')

@section('title')
Online Tests
@endsection
@section('content')
  <div class="row">
      <div class="col-lg-12">
          <!--breadcrumbs start -->
          <ul class="breadcrumb">
              <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
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
                  @foreach( $tests as $test )
                  <div class="col-lg-3 col-sm-6">
                    <!-- small box -->
                    <div class="test-grid">
                      <div class="inner">
                        <h3>Test: {{ $test->subject($test->subject_id) ?$test->subject($test->subject_id)->title : null }}</h3>

                        <p>Duration: {{ $test->duration }}</p>
                      </div>
                      <a data-toggle="modal" href="{{ url('test_question/'.$test->id) }}" class="btn btn-danger">
                        Add / View Test Questions <i class="fa fa-pencil"></i>
                      </a>
                    </div>
                  </div>
                  
                  @endforeach
              </section>
          </div>
      </div>
               

@endsection
