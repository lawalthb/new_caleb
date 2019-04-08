@extends('layouts.app')

@section('title')
{{ trans('report_lang.report_mark') }}
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
            <li class="active">View Mark Report</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
</div>
<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
              View Mark Report
            </header>
            <div id="hide-table">
                <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer"> 
                  <thead>
                  <tr>
                      <th>#</th>
                      <th>{{ trans('subject_lang.subject_name') }}</th>
                      <th>First Test</th>
                      <th>Second Test</th>
                      <th>Term</th>
                      <th>Session</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach( $ca_tests as $key => $test )
                  <tr>
                      <td data-title="#">{{ $key+1 }}</td>
                      <td data-title="{{ trans('subject_lang.subject_name') }}">{{ App\Subject::find($test->subject_id) ? App\Subject::find($test->subject_id)->title : '-'  }}</td>
                      <td data-title="Term">{{ $test->first }}</td>
                      <td data-title="Term">{{ $test->second }}</td>
                      <td data-title="Term">{{ App\Term::find($test->term_id) ? App\Term::find($test->term_id)->name : '-'}} </td>
                      <td data-title="Session">{{ App\Term::find($test->term_id)->academic_session ? App\Term::find($test->term_id)->academic_session->name : '-' }}</td>
                  </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
        </section>

    </div>
</div>
               

@endsection