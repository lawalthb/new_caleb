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
        <!-- breadcrumbs end -->
    </div>
</div>
<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
              View Mark Report
            </header>
            <div class="panel-body">
                @if(Session::get('message'))
                <div class="alert alert-warning fade in" id='gritter-notice-wrapper' data-dismiss="alert" aria-label="close">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  {{ Session::get('message') }}
                </div>
                @endif
                {!! Form::open(array('url'=>'student/ca-test-result/'. Auth::user()->id,'id'=>'demo-form2','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                <div class="col-lg-9">
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">Select Term
                        </label>
                        <div class="col-lg-9">
                        <select name="term_id" class="form-control"   required>
                            <option value="">Choose..</option>
                            @foreach(App\Term::all() as $term)
                                <option value="{{ $term->id }}">{{ $term->name }} - {{ $term->academic_session ? $term->academic_session->name : '-' }} </option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <label  class="col-lg-2 control-label"></label>
                        <div class="col-lg-9">
                            {!! Form::submit('Submit', array('class'=>'btn btn-primary')) !!}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </section>

    </div>
</div>
               

@endsection