@extends('layouts.dashboard')
@section('title')
<?php 
  $students = App\Student::orderBy('created_at','desc')->paginate(8);
      // site config using database
      $settings = App\Settings::find(1);
      $authed = Auth::user();
      if (Auth::user()) {
          $authe = Auth::user();
      }
      elseif (Auth::user()) {
          $authe = Auth::user();
      }
      elseif (Auth::user()) {
          $authe = Auth::user();
      }
      elseif (Auth::user()) {
          $authe = Auth::user();
      }
       $count = App\Message::where('active','0')->where('to_role',$authed->role)->where('to', $authed->id)->count();

?>
{{ $settings->system_title }} | {{ trans('dashboard_lang.panel_title') }}
@endsection
@section('content')
<link href="{{ asset('ev-assets/backend/plugins/bower_components/calendar/dist/fullcalendar.css') }}" rel="stylesheet" />

<script src="{{ asset('ev-assets/backend/plugins/bower_components/calendar/dist/fullcalendar.min.js') }}"></script>
<script src="{{ asset('ev-assets/backend/plugins/bower_components/calendar/dist/jquery.fullcalendar.js') }}"></script>
<script src="{{ asset('ev-assets/backend/plugins/bower_components/moment/moment.js') }}"></script>

<style type="text/css">.white-box .m-b-20{font-family: roboto, corbel, trebuchet ms}</style>
    <!-- .row -->
      <div class="row">

        <div class="col-lg-6 col-sm-12 col-xs-12 teller">
          <h4></h4>
          <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="white-box white-box1">
                <h3 class="box-title">{{ trans('book_lang.panel_title') }}</h3>
                <ul class="list-inline two-part">
                  <li><i class="fa fa-book text-info"></i></li>
                  <li class="text-right"><span class="counter ll"><?php $count = App\Library::count(); echo $count;?></span></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="white-box white-box2">
                <h3 class="box-title">{{ trans('topbar_menu_lang.menu_teacher') }}</h3>
                <ul class="list-inline two-part">
                  <li><i class="fa fa-group text-megna"></i></li>
                  <li class="text-right"><span class="counter ll"><?php $count = App\Teacher::where('active', 1)->count(); echo $count;?></span></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="white-box white-box3">
                <h3 class="box-title">{{ trans('topbar_menu_lang.menu_parent') }}</h3>
                <ul class="list-inline two-part">
                  <li><i class="fa fa-group text-danger"></i></li>
                  <li class="text-right"><span class="counter ll"><?php $count = App\Parents::where('active', 1)->count(); echo $count;?></span></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="white-box white-box4">
                <h3 class="box-title">Materials</h3>
                <ul class="list-inline two-part">
                  <li><i class="fa fa-file text-success"></i></li>
                  <li class="text-right"><span class="counter ll"><?php $count = App\Material::count(); echo $count;?></span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xs-12 chosen-student" style="margin-top:10px;text-align: center;">
          <div class="white-box" style="padding:6px">
            <div id="intro-title-dash">
              <img src="{{ asset('ev-assets/uploads/school-images/'.App\School::find(Auth::user()->school_id)->photo) }}" alt="home" style="max-width: 180px;margin: 8px;">
            </div>
            <h2 style="text-transform: uppercase;font-weight: 600"> {{ App\School::find(Auth::user()->school_id)->name }}</h2>
          </div>
          <div class="white-box">
            <div class="user-bg"> <img src="{{ asset('ev-assets/uploads/avatars/'.$authe->image) }}" alt="user">
              <div class="overlay-box">
                <div class="user-content"> <a href="javascript:void(0)"><img alt="img" class="thumb-lg img-circle" src="{{ asset('ev-assets/uploads/avatars/'.$authe->image) }}"></a>
                  <h4 class="text-white">{{ Auth::user()->name }}</h4>
                  <h5 class="text-white">{{ Auth::user()->email }}</h5>
                </div>
              </div>
            </div>
        </div>
      </div>
      </div>
      <!-- /.row -->
      

          <!-- .row -->
    <div class="row">
      <div class="col-md-12">
          <div class="white-box">
            <div id="calendar"></div>
          </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-3 col-xs-12 col-sm-6"> <img class="img-responsive" alt="user" src="{{ asset('ev-assets/uploads/post-images/'.$post->image) }}">
          <div class="white-box">
            <div class="text-muted"><span class="m-r-10"><i class="fa  fa-calendar-o"></i> {{ $post->created_at->format('d, M Y \a\t h:i a') }}</span>
                      </div>
            <h3 class="m-t-20 m-b-20"><a href="{{ url('teacher/posts/'.$post->slug) }}">{{ $post->title }}</a></h3>
            <p>{!! str_limit($post->body, $limit = 300, $end = '.......') !!}</p>
            <a href="{{ url('teacher/posts/'.$post->slug) }}"><button class="btn btn-success btn-rounded waves-effect waves-light m-t-20">Read more</button></a>
          </div>
        </div>
        @endforeach
      </div>
    

@endsection









