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
                          @foreach( $tests as $test )
                          <div class="col-lg-3 col-sm-6">
                            <!-- small box -->
                            <div class="test-grid">
                              <div class="inner">
                                <h3>Test: {{ $test->subject($test->subject_id)->title }}</h3>

                                <p>Duration: {{ $test->duration }}</p>
                              </div>
                              <a data-toggle="modal" href="{{ url('teacher/test_question/'.$test->id) }}" class="small-box-footer">
                                Add / View Test Questions <i class="fa fa-pencil"></i>
                              </a>
                            </div>
                          </div>
                          
                          @endforeach
                      </section>
                  </div>
              </div>
               

@endsection
