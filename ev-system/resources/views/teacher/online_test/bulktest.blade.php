@extends('layouts.app')

@section('title')
Add Bulk Questions
@endsection

@section('content')
 
              <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="#"><i class="fa fa-home"></i> {{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">Add Bulk Questions</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>




            <div class="row">
              <div class="col-lg-12">
                  
                      <section class="panel">
                          <header class="panel-heading">
                              Add Bulk Questions
                          </header>
                          <header class="panel-heading">
                          <a class="btn btn-primary" href="{{ realpath('ev-assets/uploads/sample-import/questions.csv') }}" style="margin:5px">
                                  Download Sample
                              </a>
                              </header>
                          @if(Session::has('message'))   
                            <div class="white-box">
                              @if(Session::get('message') == trans('topbar_menu_lang.success'))
                              <div class="alert alert-success fade in" id='gritter-notice-wrapper' data-dismiss="alert" aria-label="close">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('message') }}
                              </div>
                              @else
                              <div class="alert alert-warning fade in" id='gritter-notice-wrapper' data-dismiss="alert" aria-label="close">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('message') }}
                              </div>
                              @endif
                            </div>
                            @endif
                          <div class="panel-body">
                    {!! Form::open(array('url'=>'teacher/store_bulk_test_question','id'=>'demo-form2','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                    
                  <div class="col-lg-9">
                    <div class="form-group">
                       <label  class="col-lg-2 control-label">Select Test
                      </label>
                      <div class="col-lg-10">
                        <select name="test_id" class="form-control" data-validate="required">
                          @foreach($tests as $test)
                          <option value="{{ $test->id }}">{{ $test->subject($test->subject_id)->title }}</option>
                          @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Bulk Questions</label>
                        <div class="col-lg-10">
                            <input type="file" name="import_file" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-send">Add Bulk</button>
                        </div>
                    </div>
                  </div>
                    {!! Form::close() !!}
                  </div>
                      </section>
                  </div> 
                  </div> 
      

      




@endsection
