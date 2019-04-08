@extends('layouts.app')

@section('title')
System Backup
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">System Backup</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              System Backup
                          </header>
                          <div class="panel-body">
                          {!! Form::open(array('url'=>'backup/generate_backup','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                          <div class="col-lg-6">
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">Name</label>
                                                  <div class="col-lg-9">
                                                      <input type="text" class="form-control" id="f-name" value="" name="name"required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">Extension
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="extension" class="form-control" required>
                                                    <option value="">Choose..</option>
                                                    <option value="csv">csv</option>
                                                    <option value="xlsx">xlsx</option>
                                                    <option value="xls">xls</option>
                                                  </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">Backup
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="backup" class="form-control" required>
                                                    <option value="">Choose..</option>
                                                    <option value="student">All Students</option>
                                                    <option value="teacher">All Teachers</option>
                                                    <option value="parent">All Parents</option>
                                                    <option value="library">Library</option>
                                                    <option value="classes">Classes</option>
                                                  </select>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                 <label  class="col-lg-2 control-label">Send to Email
                                                </label>
                                                <div class="col-lg-9">
                                                  <select name="ask" class="form-control" required>
                                                    <option value="yes">yes</option>
                                                    <option value="no">no</option>
                                                  </select>
                                                  </div>
                                              </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-warning" type="submit" name='submit'> Generate Backup</button>
                                          
                                          </div>
                                        </div>
                                          {!! Form::close() !!}
                                        </div>
                      </section>
                  </div>
              </div>
               

@endsection


