<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="{{ asset('ev-assets/images/ico.gif') }}">

    <title>Done - Eduvella</title>

    <!-- Bootstrap core CSS -->
<link href="{{ asset('ev-assets/backend/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- animation CSS -->
<link href="{{ asset('ev-assets/backend/css/animate.css') }}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ asset('ev-assets/backend/css/style.css') }}" rel="stylesheet">
<!-- color CSS -->
<link href="{{ asset('ev-assets/backend/css/colors/default.css') }}" id="theme"  rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('ev-assets/backend/js/respond.min.js') }}"></script>
    <script src="{{ asset('ev-assets/backend/js/html5shiv.js') }}"></script>

    <![endif]-->
    <style type="text/css">
        .col-lg-8{margin: auto;}
        .pull-right a {color: #15445c}
        /*general page*/

        .progress-xs {
            height: 8px;
        }

        .progress-sm {
            height: 12px;
        }

        .panel-heading .nav {
            border: medium none;
            font-size: 13px;
            margin: -10px -15px -11px;
        }

        .tab-bg-dark-navy-blue {
            background: #7087A3;
            border-radius: 5px 5px 0 0;
            -webkit-border-radius: 5px 5px 0 0;
            border-bottom: none;
        }

        .panel-heading .nav > li > a,
        .panel-heading .nav > li.active > a, .panel-heading .nav > li.active > a:hover, .panel-heading .nav > li.active > a:focus {
            border-width: 0;
            border-radius: 0;
        }

        .panel-heading .nav > li > a {
            color: #fff;
        }

        .panel-heading .nav > li.active > a, .panel-heading .nav > li > a:hover {
            color: #47596f;
            background: #fff;
        }

        .panel-heading .nav > li:first-child.active > a, .panel-heading .nav > li:first-child > a:hover {
            border-radius: 4px 0 0 0;
            -webkit-border-radius: 4px 0 0 0;
        }


        .tab-right {
            height: 38px;
        }

        .panel-heading.tab-right .nav > li:first-child.active > a, .tab-right.panel-heading .nav > li:first-child > a:hover {
            border-radius:  0 ;
            -webkit-border-radius: 0 ;
        }

        .panel-heading.tab-right .nav > li:last-child.active > a, .tab-right.panel-heading .nav > li:last-child > a:hover {
            border-radius:  0 4px 0 0;
            -webkit-border-radius: 0 4px 0 0;
        }

        .panel-heading.tab-right .nav-tabs > li > a {
            margin-left: 1px;
            margin-right: 0px;
        }
    </style>
</head>

  <body class="login-body">
    
      <div style="margin:auto;width:100%;" align='center'>
      <img src="{{ asset('ev-assets/images/logo50.png') }}" alt="..." style="margin-top:40px;margin-bottom:20px" height="100px" width="100px">
    </div>
    <div class="tab-content">
      <div class="col-lg-2"></div>
    <div id="admin" class="col-lg-8">

        <!--widget start-->
        <section class="panel">
            <header class="panel-heading tab-bg-dark-navy-blue">
                <ul class="nav nav-tabs nav-justified ">
                    <li>
                        <a href="{{ url('install') }}" data-toggle="tab">
                            Server Check
                        </a>
                    </li>
                    <li class="">
                        <a href="#">
                            Purchase Code
                        </a>
                    </li>
                    <li class="">
                        <a href="#">
                            Configure Database
                        </a>
                    </li>
                    <li class="">
                        <a href="#">
                            Site Information
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            Done!
                        </a>
                    </li>
                </ul>
            </header>
            <div class="panel-body">
                <div class="tab-content tasi-tab">
                    <div class="tab-pane active" id="popular">
                        <article class="media">
                            <div class="media-body">
                                <h4><span class="fa fa-check"></span> Installation completed!</h4>

                                <div class="alert alert-info">
                                <h5><span class="fa fa-info-circle"></span> You can login now using the following credential:</h5>

                                <p style="margin-top:25px;">
                                    <?php 
                                    $user = App\User::find(1);
                                    $password = bcrypt($user->password);
                                    ?>
                                <h5>Admin Name: <b>{{ $user->name }}</b></h5>
                                <h5>Password: <b>@if(Session::has('pass')) {{ Session::get('pass') }} @else your entered password @endif</b></h5>
                                <h5>Email: <b>{{ $user->email }}</b></h5> </p>
                                </div>

                                <div class="alert alert-warning">
                                <h5><span class="fa fa-exclamation-triangle"></span> Please click go to login then finish your job.</h5>
                                </div>
                                <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4 col-sm-offset-1">
                                        </div>
                                        <div class="col-sm-4 col-sm-offset-3">
                                            <a href="{{ url('dashboard') }}" class="btn btn-success">Go to Login</a>
                                        </div>
                                </div>
                                    </div>
                            </div>
                        </article>
                        
                    </div>
                    
                </div>
            </div>
        </section>
        <!--widget end-->
    
    </div>
    <div class="col-lg-2"></div>

    
</div>

<script src="{{ asset('ev-assets/backend/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('ev-assets/backend/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{ asset('ev-assets/backend/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>

<!--slimscroll JavaScript -->
<script src="{{ asset('ev-assets/backend/js/jquery.slimscroll.js') }}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ asset('ev-assets/backend/js/custom.min.js') }}"></script>
<!--Style Switcher -->
<script src="{{ asset('ev-assets/backend/plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>

  </body>
</html>

