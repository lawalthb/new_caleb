<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="{{ asset('ev-themes/default/dist/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('ev-themes/default/dist/custom.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('ev-themes/default/dist/animate.css') }}" rel="stylesheet" type="text/css" media="all" />

    <title>Eduvella School Management Theme</title>
  </head>
  <body>
  	<nav class="navbar fixed-top navbar-expand-lg navbar-light" id="header">
		<div id="header-container" class="container navbar-container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a id="brand" class="navbar-brand" href=""><img src="{{ asset('ev-themes/default/images/logo.png') }}" alt=""> </a>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
				<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
					<li class="nav-item active">
						<a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#about">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#news">News</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link btn btn-default" href="{{ url('dashboard') }}">Login</a>
						<ul>
							<li><a href="{{ url('dashboard') }}">Admin Login</a></li>
							<li><a href="{{ url('dashboard') }}">Teacher Login</a></li>
							<li><a href="{{ url('dashboard') }}">Parent Login</a></li>
							<li><a href="{{ url('dashboard') }}">Student Login</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<header class="header">
		<div class="row">
			<div class="col">
				<!-- carousel code -->
				<div id="carouselExampleIndicators" class="carousel slide">
					<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner skyblue">

					<!-- first slide -->
					<div class="carousel-item active skyblue">
						<div class="carousel-caption d-md-block">
							<p data-animation="animated bounceInRight" class="header-pg">
								Education's purpose is to replace an empty mind with an open one. - Malcolm Forbes
							</p>
							<h3 data-animation="animated bounceInLeft" class="header-title">
								Campus Life
							</h3>
							<button class="btn btn-primary btn-lg" data-animation="animated zoomInUp">Join us</button>
						</div>
					</div>

					<!-- second slide -->
					<div class="carousel-item skyblue">
						<div class="carousel-caption d-md-block">
							<p data-animation="animated bounceInRight" class="header-pg">
							But what is liberty without wisdom, and without virtue? It is the greatest of all possible evils; for it is folly, vice, and madness, without tuition or restraint. - Edmund Burke 
							</p>
							<h3 data-animation="animated bounceInLeft" class="header-title">
								Cost Effective
							</h3>
						<button class="btn btn-primary btn-lg" data-animation="animated zoomInRight">Register</button>
						</div>
					</div>

					<!-- third slide -->
					<div class="carousel-item skyblue">
						<div class="carousel-caption d-md-block">
							<p data-animation="animated bounceInRight" class="header-pg">
								The only fence against the world is a thorough knowledge of it. - John Locke 
							</p>
							<h3 data-animation="animated bounceInLeft" class="header-title">
								Great Lectures
							</h3>
						<button class="btn btn-primary btn-lg" data-animation="animated lightSpeedIn">Register</button>
						</div>
					</div>
					</div>

					<!-- controls -->
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
							<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>

			</div>
		</div>
	</header>
	<section class='about' id='about'>
		<div class="container">

			<div class="row">
				<div class='col-md-7 about-left'>
					<h1>About us</h1>
					<p>The original board of trustees laid the groundwork for what would become today's Williams College on July 9, 1876, when the group gathered to hold the Williams College's inaugural board meeting and drafted the establishment's articles of incorporation. This guiding document outlined elements the founders believed would build an enduring legacy for the College: a commitment to offering a rigorous academic program and an ambition to provide "opportunities for all departments of higher education to persons of both sexes on equal terms." On September 10, 1876, the State of California issued the College's official certificate of incorporation, marking the formal beginning of the College's life.</p>
	
					<p>An initial pledge of $600,000 (roughly $16 million in today's currency) from oil magnate James Williams, along with contributions by the American Baptist Education Society, helped to found the College. The land of the College was donated by Marshall Field, owner of the historic Chicago department store that bore his name.
					</p>
				</div>
				<div class='col-md-5 about-right'>
				</div>
			</div>
		</div>
	</section>
	<section class="review">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<p class="review-content">When you work full-time while studying, you need to sacrifice personal time, which meant that I took my studies seriously. My ambition was to complete my degree successfully.</p>	
					<div class="review-bottom">
						<div class="review-avatar">
							<img src="{{ asset('ev-themes/default/images/user.png') }}" alt="">
						</div>
						<div>
							<p class="review-author">Debra Banks</p>
							<p class="review-from">Diploma for Graduates in Management, USA</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<p class="review-content">When you work full-time while studying, you need to sacrifice personal time, which meant that I took my studies seriously. My ambition was to complete my degree successfully.</p>	
					<div class="review-bottom">
						<div class="review-avatar">
							<img src="{{ asset('ev-themes/default/images/user.jpg') }}" alt="">
						</div>
						<div>
							<p class="review-author">Steven Alvarez</p>
							<p class="review-from">Diploma for Graduates in Programming, USA</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="news" id="news">
		<div class="container">
			<h1>Recent News</h1>
			<div class="row">
				<div class="col-md-3 news-each">
					<div class="news-each-inner">
						<img src="{{ asset('ev-themes/default/images/thirdslide.jpg') }}" alt="">
						<div class="news-each-below">
							<a href="">Campus Opening Convocation</a> 
							<p>Opening Convocation marks the official start of the academic year and mirrors Williams College's Commencement ceremony.</p>		
						</div>
						<div class="news-each-last">
							<div class="news-each-date">
									<span>15</span> 
									<span>June</span> 
									<span>5:00pm</span> 
							</div>
							<div class="news-each-other">
								<span>Ojo Kayode</span> 
								<span>200 comments</span> 
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 news-each">
					<div class="news-each-inner">
						<img src="{{ asset('ev-themes/default/images/fifthslide.jpeg') }}" alt="">
						<div class="news-each-below">
							<a href="">Freshman Matriculation Ceremony in Williams College</a> 
							<p>The annual Matriculation ceremony marks a student's formal enrollment in the College.</p>
						</div>
						<div class="news-each-last">
							<div class="news-each-date">
									<span>15</span> 
									<span>June</span> 
									<span>5:00pm</span> 
							</div>
							<div class="news-each-other">
								<span>Ojo Kayode</span> 
								<span>200 comments</span> 
							</div>
						</div>
					</div>	
				</div>
				<div class="col-md-3 news-each">
					<div class="news-each-inner">
						<img src="{{ asset('ev-themes/default/images/fourthslide.jpg') }}" alt="">
						<div class="news-each-below">
							<a href="">Williams College Leadership Academy</a> 
							<p>Williams College Leadership Academy provides an avenue through which community colleges can prepare their future leaders.</p>
						</div>
						<div class="news-each-last">
							<div class="news-each-date">
									<span>15</span> 
									<span>June</span> 
									<span>5:00pm</span> 
							</div>
							<div class="news-each-other">
								<span>Ojo Kayode</span> 
								<span>200 comments</span> 
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 news-each">
					<div class="news-each-inner">
						<img src="{{ asset('ev-themes/default/images/firstslide.jpg') }}" alt="">
						<div class="news-each-below">
							<a href="">2019 New Student Orientation – Session III</a> 
							<p>New Student Orientation is a series of events, activities, and opportunities developed to assist students, both first-year and transfer.</p>
						</div>
						<div class="news-each-last">
							<div class="news-each-date">
									<span>15</span> 
									<span>June</span> 
									<span>5:00pm</span> 
							</div>
							<div class="news-each-other">
								<span>Ojo Kayode</span> 
								<span>200 comments</span> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="contact">
		
	</section>
	<footer class="footer">
		<p>Eduvella School &copy; <?php echo date('Y')?>  All Rights Reserved</p>
	</footer>
	<script type="text/javascript" src="{{ asset('ev-themes/default/dist/jquery/jquery 3.3.1.js') }}"></script>
	<script type="text/javascript" src="{{ asset('ev-themes/default/dist/bootstrap/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('ev-themes/default/dist/custom.js') }}"></script>
  </body>
</html>






