<!DOCTYPE html>  
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" href="{{ asset('ev-assets/backend/plugins/images/icon.png') }}">
<title>@yield('title')</title>
<link href="{{ asset('ev-assets/backend/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- Menu CSS -->
<link href="{{ asset('ev-assets/backend/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
<!-- vector map CSS -->
<link href="{{ asset('ev-assets/backend/plugins/bower_components/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
<link href="{{ asset('ev-assets/backend/plugins/bower_components/css-chart/css-chart.css') }}" rel="stylesheet">
<!-- Morris CSS -->
<link href="{{ asset('ev-assets/backend/plugins/bower_components/morrisjs/morris.css') }}" rel="stylesheet">
<!-- animation CSS -->
<link href="{{ asset('ev-assets/backend/css/animate.css') }}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ asset('ev-assets/backend/css/style.css') }}" rel="stylesheet">
<!-- color CSS -->
<script src="{{ asset('ev-assets/backend/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>

<script src="{{ asset('ev-assets/backend/plugins/bower_components/Chart.js/Chart.min.js') }}"></script>
<style>
  .test-grid {
      padding: 15px;
      background-color:white;
      overflow: hidden;
      margin-top:8px;
      border-radius: 14px;  
  }
  .test-grid:hover{
    padding: 15px;
  }
  .sm-side {
    height: 100vh !important
  }
  .menu-top-title{
    padding:10px;
    font-weight: bold;
    color: #a6a6a6;
    text-align:center;
  }
  
</style>
  <?php 
      //its shows the list of all classes on sidebar
      $classli = App\Classes::orderBy('created_at','asc')->paginate(4);
      $studentli = App\User::where('role', 'student')->get();

      //determines the authenticated user
      $get_school_admin = App\School::find(Auth::user()->school_id);
      $authe = Auth::user();

      $count = App\Message::where('active','0')->where('to_role',$authe->role)->where('to', $authe->id)->count();
      $countli = App\Message::orderBy('created_at','desc')->paginate(5);
      $count2 = App\Notice::where('active',1)->orderBy('created_at','desc')->paginate(5);
      // site config using database
      $settings = App\Settings::find(1);
    ?>

    @if(isset($_COOKIE['skin']))
    <link href="{{ asset('ev-assets/backend/css/colors/'.$_COOKIE['skin'].'.css') }}" id="theme"  rel="stylesheet">
    @elseif($get_school_admin &&  $get_school_admin->color)
    <link href="{{ asset('ev-assets/backend/css/colors/'.$get_school_admin->color .'.css') }}" id="theme"  rel="stylesheet">
    @else
    <link href="{{ asset('ev-assets/backend/css/colors/'.$settings->skin_color .'.css') }}" id="theme"  rel="stylesheet">
    @endif
    <style type="text/css" title="currentStyle">
      @import "{{ asset('ev-assets/backend/datatable/media/css/demo_page.css') }}";
      @import "{{ asset('ev-assets/backend/datatable/media/css/demo_table.css') }}";
    </style>
    
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script>
          window.Laravel = <?php echo json_encode([
              'csrfToken' => csrf_token(),
          ]); ?>
  </script>

  <?php $value = config('lang.locale'); ?>
  @if($value == "ar")
    <link href="{{ asset('ev-assets/backend/css/rtl.css') }}" rel="stylesheet">
  @endif

<style type="text/css">
.logoicon {display: none;height: 60px; text-align: center;padding-top:5px;padding-left: 5px;padding-right: 5px}
.logoicon i { font-size: 45px}
.site-min-height {
    min-height: 1400px;
}
.breadcrumb {margin-top: 15px;background-color: white;border-radius: 0px;padding: 15px}
@media (max-width: 760px){
  .mail-box .sm-side{
    float: none !important;
    width: 100% !important;
  }
  .mail-box .lg-side{
    float: none !important;
    width: 100% !important;
  }
}
.logoicon {display: block;}
@media (min-width: 1170px){
  .logoicon {display: none;}
}
</style>
</head>
<body>
<div id="wrapper">
  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-static-top m-b-0" id='ev-header'>
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
      <div class="top-left-part">
        <a class="logo" href="<?php echo url('/'); ?>">
          <i class="logoicon">
            <i class="fa fa-dashboard"></i>
          </i>
          <span class="hidden-xs">
            <img src="{{ asset('ev-assets/uploads/school-images/'.$get_school_admin->photo) }}" alt="home" style="max-width: 180px;margin: 8px; max-height:45px">
          </span>
        </a>
      </div>
      <ul class="nav navbar-top-links navbar-left hidden-xs">
        <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
      </ul>
      <ul class="nav navbar-top-links navbar-right pull-right">
        <li class="skin-change">
          <select name="skin_color" class="form-control" onchange="location=this.value">
            @if(isset($_COOKIE['skin']))
              <option value="{{ url('change-skin/default')}}" @if($_COOKIE['skin'] == 'default') selected='selected' @endif>Default</option>
              <option value="{{ url('change-skin/blue')}}" @if($_COOKIE['skin'] == 'blue') selected='selected' @endif>Blue</option>
              <option value="{{ url('change-skin/green')}}" @if($_COOKIE['skin'] == 'green') selected='selected' @endif>Green</option>
              <option value="{{ url('change-skin/purple')}}" @if($_COOKIE['skin'] == 'purple') selected='selected' @endif>Purple</option>
              <option value="{{ url('change-skin/yellow')}}" @if($_COOKIE['skin'] == 'yellow') selected='selected' @endif>Yellow</option>
              <option value="{{ url('change-skin/red')}}" @if($_COOKIE['skin'] == 'red') selected='selected' @endif>Red</option>
              <option value="{{ url('change-skin/cosmic')}}" @if($_COOKIE['skin'] == 'cosmic') selected='selected' @endif>Cosmic</option>
            @else
              <option>Change Skin</option>
              <option value="{{ url('change-skin/default')}}">Default</option>
              <option value="{{ url('change-skin/blue')}}">Blue</option>
              <option value="{{ url('change-skin/green')}}">Green</option>
              <option value="{{ url('change-skin/purple')}}">Purple</option>
              <option value="{{ url('change-skin/yellow')}}">Yellow</option>
              <option value="{{ url('change-skin/red')}}">Red</option>
              <option value="{{ url('change-skin/cosmic')}}">Cosmic</option>
            @endif
            </select>
        </li>

        
        <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-envelope"></i>
          <div class="notify"></div>
          </a>
          <ul class="dropdown-menu mailbox">
            <li>
              <div class="drop-title">You have {{ $count }} new messages</div>
            </li>
            @foreach( $countli->where('to_role',$authe->role)->where('to',$authe->id)->where('active',0) as $countit )
            <li><!-- start message -->
              <?php
                   $sender = App\User::find($countit->from);
                    ?>
              <div class="message-center"> <a href="{{ url('messages/'.$countit->id) }}">
                <div class="user-img"> 
                  <img src="{{ asset('ev-assets/uploads/avatars/'.$sender->image) }}" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                <div class="mail-contnet">
                  
                  <h5>{{ $sender->name }}</h5>
                  <span class="mail-desc">{{ $countit->title }}</span><span class="time">{{ $countit->created_at }}</span>
                
                </div>
                  </a> 
            </li>
            @endforeach
            <li> <a class="text-center" href="{{ url('/messages') }}"> <strong>See all messages</strong> <i class="fa fa-angle-right"></i> </a></li>
          </ul>
          <!-- /.dropdown-messages -->
        </li>

        <!-- /.dropdown -->
        <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="fa fa-bell-o"></i>

          <div class="notify"></div>
          </a>
          <ul class="dropdown-menu dropdown-tasks">
            @foreach( $count2 as $counter )
            <li> <a href="#">
              <div>
                <p> <strong>{{ $counter->title }}</strong> <span class="pull-right text-muted">{{ $counter->created_at }}</span> </p>
              </div>
              </a> 
            </li>
            @endforeach
            <li class="divider"></li>
            <li> <a class="text-center" href="{{ url('noticeboard/noticeboard_list') }}"> <strong>See All Notifications</strong> <i class="fa fa-angle-right"></i> </a> </li>
          </ul>
          <!-- /.dropdown-tasks -->
        </li>
        @if(Auth::user()->role == 'admin')
          <li class="dropdown language">
              <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="#">
                  <img src="{{ asset('ev-assets/backend/img/flags/'.$value.'.png') }}" alt="" width='18' height='13' alt="">
                  <!-- <span class="username">English US</span> -->
                  <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                  <li><a href="{{ url('language/ar') }}"><img src="{{ asset('ev-assets/backend/img/flags/ar.png') }}" width='18' height='13' alt=""> Arabic</a></li>
                  <li><a href="{{ url('language/bl') }}"><img src="{{ asset('ev-assets/backend/img/flags/bl.png') }}" width='18' height='13' alt=""> Bengali</a></li>
                  <li><a href="{{ url('language/ch') }}"><img src="{{ asset('ev-assets/backend/img/flags/ch.png') }}" width='18' height='13' alt=""> Chinese</a></li>
                  <li><a href="{{ url('language/en') }}"><img src="{{ asset('ev-assets/backend/img/flags/en.png') }}" alt=""> English US</a></li>
                  <li><a href="{{ url('language/fr') }}"><img src="{{ asset('ev-assets/backend/img/flags/fr.png') }}" alt=""> French</a></li>
                  <li><a href="{{ url('language/de') }}"><img src="{{ asset('ev-assets/backend/img/flags/de.png') }}" alt=""> German</a></li>
                  <li><a href="{{ url('language/hi') }}"><img src="{{ asset('ev-assets/backend/img/flags/hi.png') }}" width='18' height='13' alt=""> Hindi</a></li>
                  <li><a href="{{ url('language/id') }}"><img src="{{ asset('ev-assets/backend/img/flags/id.png') }}" width='18' height='13' alt=""> Indonesian</a></li>
                  <li><a href="{{ url('language/it') }}"><img src="{{ asset('ev-assets/backend/img/flags/it.png') }}" width='18' height='13' alt=""> Italian</a></li>
                  <li><a href="{{ url('language/ro') }}"><img src="{{ asset('ev-assets/backend/img/flags/ro.png') }}" width='18' height='13' alt=""> Romanian</a></li>
                  <li><a href="{{ url('language/ru') }}"><img src="{{ asset('ev-assets/backend/img/flags/ru.png') }}" alt=""> Russian</a></li>
                  <li><a href="{{ url('language/es') }}"><img src="{{ asset('ev-assets/backend/img/flags/es.png') }}" alt=""> Spanish</a></li>
                  <li><a href="{{ url('language/th') }}"><img src="{{ asset('ev-assets/backend/img/flags/th.png') }}" width='18' height='13' alt=""> Thai</a></li>
                  <li><a href="{{ url('language/tk') }}"><img src="{{ asset('ev-assets/backend/img/flags/tk.png') }}" width='18' height='13' alt=""> Turkish</a></li>
              </ul>
          </li>
        @endif
        <!-- /.dropdown -->
        <li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="{{ asset('ev-assets/uploads/avatars/'.$authe->image) }}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{ Auth::user()->name }}</b> </a>
          <ul class="dropdown-menu dropdown-user log-menu">
            <li><a href="{{ url('profile/'.$authe->id) }}"><i class="fa fa-user"></i> {{ trans('topbar_menu_lang.profile') }}</a></li>
            @if(Auth::user()->role == 'admin')
              <li><a href="{{ url('general_settings') }}"><i class="fa fa-gear"></i> {{ trans('topbar_menu_lang.menu_setting') }}</a></li>
            @endif
            <li><a href="{{ url('noticeboard/noticeboard_list') }}"><i class="fa fa-bullhorn"></i> {{ trans('topbar_menu_lang.menu_notice') }}</a></li>
            <li role="separator" class="divider"></li>
            <li class="dub"><a href="{{ url('logout') }}" class="btn btn-success" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> {{ trans('topbar_menu_lang.logout') }}
                                                     <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                  </a>
            </li>
          </ul>
          <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
      </ul>
    </div>
  </nav>


@include('layouts.site_menu')
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
        <div class="site-min-height">
        @yield('content') 
        </div>
    </div>
    <!-- /.container-fluid -->
    <footer class="footer" id='ev-footer'>Copyright &copy; <?php echo date('Y');?> <a href="http://eduvellapro.com">Eduvella School Management System</a>.</footer>
  </div>
</div>
<div class="preloader">
  <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
  </svg>
</div>
<!-- /#wrapper -->
    <script type="text/javascript" language="javascript" src="{{ asset('ev-assets/backend/datatable/media/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        $('#example1').dataTable();
      });
    </script>


<!-- Bootstrap Core JavaScript -->

<script src="{{ asset('ev-assets/backend/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('ev-assets/backend/js/other.js') }}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{ asset('ev-assets/backend/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
<!--slimscroll JavaScript -->
<script src="{{ asset('ev-assets/backend/js/jquery.slimscroll.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('ev-assets/backend/js/waves.js') }}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ asset('ev-assets/backend/js/custom.min.js') }}"></script>
<!--Style Switcher -->
<script src="{{ asset('ev-assets/backend/plugins/bower_components/Circular-Countdown/circular-countdown.js') }}"></script>


  <script type="text/javascript">
    $(document).ready(function() { 
      $(window).load(function() { 

        if ($(location).attr('href') != "<?php echo url('dashboard'); ?>") {
          $("#dashActive").removeClass("active");
        }
        if ($(location).attr('href') != "<?php echo url('dashboard'); ?>") {
          $("#dashActive").removeClass("active");
        }
        if ($(location).attr('href') != "<?php echo url('dashboard'); ?>") {
          $("#dashActive").removeClass("active");
        }
        if ($(location).attr('href') != "<?php echo url('dashboard'); ?>") {
          $("#dashActive").removeClass("active");
        }
        $('form#permission-form').submit(function () {
            $(this).find('input[type="checkbox"]').each( function () {
                var checkbox = $(this);
                if( checkbox.is(':checked')) {
                    checkbox.attr('value','1');
                } else {
                    checkbox.after().append(checkbox.clone().attr({type:'hidden', value:0}));
                    checkbox.prop('disabled', true);
                }
            })
        });
      });
    });
    
  </script>
  
</body>

</html>

