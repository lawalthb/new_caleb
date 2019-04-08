<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>404</title>

    <!-- Bootstrap core CSS -->
<style type="text/css">

.body-404 {
  font-family: roboto, corbel, trebuchet ms;
    background: #5F9EA0;
    color: #fff;
}

.error-wrapper {
    text-align: center;
    margin-top: 10%;
}

.error-wrapper .icon-404{
    background: url("../img/404_icon.png") no-repeat;
    width: 289px;
    height: 274px;
    display: inline-block;
    margin-left: 30px;
}


.error-wrapper h1 {
    font-size: 90px;
    font-weight: 300;
    margin: -50px 0 0 0;
}

.error-wrapper h2 {
    font-size: 20px;
    font-weight: 300;
    margin: 0 0 30px 0;
}

.error-wrapper p, .error-wrapper p a {
    font-size: 18px;
    font-weight: 300;
}

.error-wrapper p.page-404  {
    color: #7dfff7;
}

.error-wrapper p.page-404 a, .error-wrapper p.page-500 a,  .error-wrapper p.page-404 a:hover, .error-wrapper p.page-500 a:hover {
    color: #fff;
}
</style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>




  <body class="body-404">

    <div class="container">

      <section class="error-wrapper">
          <i class="icon-404"></i>
          <h1>404</h1>
          <h2>page not found</h2>
          <p class="page-404">Something went wrong or that page doesn’t exist yet. <a href="<?php echo e(url('/')); ?>">Return Home</a></p>
      </section>

    </div>


  </body>
</html>
