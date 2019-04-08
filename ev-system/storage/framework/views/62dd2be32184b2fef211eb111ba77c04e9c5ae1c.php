<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="<?php echo e(asset('ev-assets/images/ico.gif')); ?>">

    <title>Install - Eduvella</title>

    <!-- Bootstrap core CSS -->
<link href="<?php echo e(asset('ev-assets/backend/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
<!-- animation CSS -->
<link href="<?php echo e(asset('ev-assets/backend/css/animate.css')); ?>" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?php echo e(asset('ev-assets/backend/css/style.css')); ?>" rel="stylesheet">
<!-- color CSS -->
<link href="<?php echo e(asset('ev-assets/backend/css/colors/default.css')); ?>" id="theme"  rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo e(asset('ev-assets/backend/js/respond.min.js')); ?>"></script>
    <script src="<?php echo e(asset('ev-assets/backend/js/html5shiv.js')); ?>"></script>

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
      <img src="<?php echo e(asset('ev-assets/images/logo50.png')); ?>" alt="..." style="margin-top:40px;margin-bottom:20px" height="100px" width="100px">
    </div>
    <div class="tab-content">
      <div class="col-lg-2"></div>
    <div id="admin" class="col-lg-8">

        <!--widget start-->
                              <section class="panel">
                                  <header class="panel-heading tab-bg-dark-navy-blue">
                                      <ul class="nav nav-tabs nav-justified ">
                                          <li class="active">
                                              <a href="#popular" data-toggle="tab">
                                                 Server Check
                                              </a>
                                          </li>
                                          <li>
                                              <a href="#">
                                                  Purchase Code
                                              </a>
                                          </li>
                                          <li class="">
                                              <a href="#recent">
                                                  Configure Database
                                              </a>
                                          </li>
                                          <li class="">
                                              <a href="#recent">
                                                  Site Information
                                              </a>
                                          </li>
                                          <li class="">
                                              <a href="#recent">
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
                                                      <?php  
                                                        foreach ($success as $succ) {
                                                          echo "<div class=\"alert alert-success\"><span class=\"fa fa-check-circle\"></span> ". $succ ."</div>"; 
                                                        }

                                                        foreach ($errors as $er) {
                                                          echo "<div class=\"alert alert-danger\"><span class=\"fa fa-exclamation-circle\"></span> ". $er ."</div>";
                                                        }
                                                      ?>
                                                  </div>
                                              </article>
                                              
                                          </div>
                                          
                                      </div>
                                  <div class="col-sm-12"><a href="<?php echo e(url('purchase_code')); ?>" class="btn btn-success pull-right">Next Step</a></div>
                                  </div>
                              </section>
                              <!--widget end-->
        
    </div>
    <div class="col-lg-2"></div>

    
</div>

     <!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo e(asset('ev-assets/backend/plugins/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo e(asset('ev-assets/backend/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?php echo e(asset('ev-assets/backend/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')); ?>"></script>

<!--slimscroll JavaScript -->
<script src="<?php echo e(asset('ev-assets/backend/js/jquery.slimscroll.js')); ?>"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo e(asset('ev-assets/backend/js/custom.min.js')); ?>"></script>
<!--Style Switcher -->
<script src="<?php echo e(asset('ev-assets/backend/plugins/bower_components/styleswitcher/jQuery.style.switcher.js')); ?>"></script>
  </body>
</html>

