@extends('layouts.app')

@section('title')
{{ Auth::user()->name }}'s {{ trans('topbar_menu_lang.profile') }}
@endsection
@section('content')
<?php 
      //determines the authenticated user
      $authe = Auth::user();
    ?>
     <style type="text/css">
    .des{background-color:#5F9EA0;color:white}
    </style>
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('parent') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">Parent's {{ trans('topbar_menu_lang.profile') }}</li>
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
                              <li class="active"><a href="{{ url('parent/profile/'.$authe->id) }}"> <i class="fa fa-user"></i> {{ trans('topbar_menu_lang.profile') }}</a></li>
                              <li><a href="{{ url('parent/editprofile/'.$authe->id) }}"> <i class="fa fa-edit"></i> Edit profile</a></li>
                          </ul>

                      </section>
                  </aside>
                  <aside class="profile-info col-lg-7">
                      <section class="panel">
                          <div class="bio-graph-heading">
                              Eduvella School Management System
                          </div>
                          <div class="panel-body bio-graph-info">
                              <h1>Bio Graph</h1>
                              <div class="row">
                                  <div class="bio-row">
                                      <p><span>{{ trans('student_lang.student_name') }}</span>: {{ Auth::user()->name }}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>{{ trans('student_lang.student_email') }}</span>: {{ Auth::user()->email }}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Phone </span>: {{ Auth::user()->phone }}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Address</span>: {{ Auth::user()->address }}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Profession </span>: {{ Auth::user()->profession }}</p>
                                  </div>
                                  </div>
                              </div>
                          </div>
                      </section>
                      
                  </aside>
              </div>

               

@endsection