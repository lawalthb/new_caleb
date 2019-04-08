@extends('layouts.app')
@section('title')
Edit Profile
@endsection

@section('content')
<?php 
      //determines the authenticated user
      $authe = Auth::user();
    ?>
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">Admin Profile</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <aside class="profile-nav col-lg-5">
                      <section class="panel">
                          <div class="user-heading round">
                              <a href="#">
                                  <img src="{{ asset('ev-assets/uploads/avatars/'.$authe->image) }}" alt="">
                              </a>
                              <h1>{{ Auth::user()->name }}</h1>
                              <p>{{ Auth::user()->email }}</p>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li><a href="{{ url('profile/'.$authe->id) }}"> <i class="fa fa-user"></i> Profile</a></li>
                              <li class="active"><a href="{{ url('editprofile/'.$authe->id) }}"> <i class="fa fa-edit"></i> Edit profile</a></li>
                          </ul>

                      </section>
                  </aside>
                  <aside class="profile-info col-lg-7">
                      <section class="panel">
                          <div class="bio-graph-heading">
                              {{ App\School::find(Auth::user()->school_id)->name }}
                              <p>Academic Session: ({{ App\AcademicSession::where('current', 1)->first()->name }})</p>
                          </div>
                          <div class="panel-body bio-graph-info">
                              <h1> Profile Info</h1>
                              {!! Form::open(array('url'=>'editprofile','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Name</label>
                                      <div class="col-lg-6">
                                          <input type="text" class="form-control" id="f-name" value="{{ Auth::user()->name }}" name="name">
                                          <input type="hidden" class="form-control" id="f-name" value="{{ Auth::user()->id }}" name="id">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">{{ trans('student_lang.student_email') }}</label>
                                      <div class="col-lg-6">
                                          <input type="text" class="form-control" id="email" value="{{ Auth::user()->email }}" name="email">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          {!! Form::submit('Update', array('class'=>'btn btn-primary', 'name'=>'publish')) !!}
                                      </div>
                                  </div>
                              {!! Form::close() !!}
                          </div>
                      </section>
                      <section>
                          <div class="panel panel-primary">
                              <div class="panel-heading"> Sets New Password & Avatar</div>
                              <div class="panel-body">
                                  {!! Form::open(array('url'=>'editprofilepass','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                      <div class="form-group">
                                          <label  class="col-lg-2 control-label">Current Password</label>
                                          <div class="col-lg-6">
                                            <input type="hidden" class="form-control" id="f-name" value="{{ Auth::user()->id }}" name="id">
                                            <input type="hidden" class="form-control" id="f-name" value="{{ Auth::user()->password }}" name="ispass">
                                              <input type="password" class="form-control" id="c-pwd" placeholder=" " name="curpass">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label  class="col-lg-2 control-label">New Password</label>
                                          <div class="col-lg-6">
                                              <input type="password" class="form-control" id="n-pwd" placeholder=" " name="npass">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label  class="col-lg-2 control-label">Re-type New Password</label>
                                          <div class="col-lg-6">
                                              <input type="password" class="form-control" id="rt-pwd" placeholder=" " name="rpass">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label  class="col-lg-2 control-label">Change Avatar</label>
                                          <div class="col-lg-6">
                                              <input type="file" class="file-pos" id="exampleInputFile" name="file">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button type="submit" class="btn btn-info">Save</button>
                                              <button type="button" class="btn btn-default">Cancel</button>
                                          </div>
                                      </div>
                                  {!! Form::close() !!}
                              </div>
                          </div>
                      </section>
                  </aside>
              </div>

               

@endsection