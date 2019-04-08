@extends('layouts.app')

@section('title')
Data Import
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">Data Import</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Data Import
                          </header>
                          <div class="panel-body">
                          {!! Form::open(array('url'=>'import_data','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="col-lg-6">
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">Excel File:
                                                </label>
                                                <div class="col-lg-9">
                                                  <input type="file" name="import_file" required="required">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">Import to:
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="import_to" class="form-control" required>
                                                    <option value="">Choose..</option>
                                                    <option value="student">All Students</option>
                                                    <option value="teacher">All Teachers</option>
                                                    <option value="parent">All Parents</option>
                                                    <option value="library">Library</option>
                                                    <option value="classes">Classes</option>
                                                  </select>
                                                  </div>
                                              </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'> Import Data</button>
                                          
                                          </div>
                                        </div>
                                          {!! Form::close() !!}
                                        </div>
                      </section>
                  </div>
              </div>
               

@endsection


