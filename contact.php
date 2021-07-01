<?php session_start(); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Contact us &mdash; YUG MOVIES</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<link rel="stylesheet" href="css/style.css">
	<!-- Favicon -->
	<link rel="icon" href="images/titile_logo.png" type="image/png">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<?php include 'partials/header.php' ?>
		<div id="fh5co-intro-section">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 animate-box text-center">
						<h2 class="intro-heading">Contact Us</h2>
						<p><span>NEED ANSWERS OF YOUR QUERIES? DON'T WORRY WE'VE GOT YOUR BACK.</span></p>
					</div>
				</div>
			</div>
		</div>
		
		<div id="fh5co-contact-section">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-md-push-1 animate-box">
						<h3>Our Address</h3>
						<ul class="contact-info">
							<hr>
							<li><i class="icon-location-pin"></i>210, Yug Movie, 2<sup>nd</sup> floor, Jalmin Shopping Center, Paliyad Road, Botad-364710, Gujarat(INDIA)</li>
							<hr>
							<!-- <li>Anil Patel</li> -->
							<li><i class="icon-phone2"></i>+91 999 820 1134</li>
							<hr>
							<li><i class="icon-mail"></i><a href="#">yugmoviesbotad@gmail.com</a></li>
						</ul>
					</div>
					<div class="col-md-7 col-md-push-1 animate-box">
						<div class="row">
							<form action="contact_ins.php" method="POST">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name = "name" class="form-control" placeholder="Name" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name = "email" class="form-control" placeholder="Email" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea name="msg" class="form-control" id="" cols="30" rows="7" placeholder="Message" required></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" name="submit" value="Send Message" class="btn btn-primary">
								</div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End: fh5co-contact-section -->

		<div class="fh5co-counters" style="background-image: url(images/hero.jpg);" data-stellar-background-ratio="0.5" id="counter-animate">
			<div class="fh5co-narrow-content animate-box">
				<div class="row" >
					<div class="col-md-4 text-center">
						<span class="fh5co-counter js-counter" data-from="0" data-to="130" data-speed="5000" data-refresh-interval="50"></span>
						<span class="fh5co-counter-label">Website</span>
					</div>
					<div class="col-md-4 text-center">
						<span class="fh5co-counter js-counter" data-from="0" data-to="1450" data-speed="5000" data-refresh-interval="50"></span>
						<span class="fh5co-counter-label">Branding</span>
					</div>
					<div class="col-md-4 text-center">
						<span class="fh5co-counter js-counter" data-from="0" data-to="7497" data-speed="5000" data-refresh-interval="50"></span>
						<span class="fh5co-counter-label">Product</span>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<div id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<h3 class="section-title">Minimal</h3>
							<p>210, Yug Movie, <br>2<sup>nd</sup> floor, Jalmin Shopping Center,<br>Paliyad Road, <br>Botad-364710,Gujarat(INDIA)</p>
						</div>
						
						<div class="col-md-4 col-md-push-1">
							<h3 class="section-title">Our Services</h3>
							<ul>
								<li><a href="#">Videos</a></li>
								<li><a href="#">Photography</a></li>
								<li><a href="#">Editing Photos</a></li>
								<li><a href="#">Newsletter</a></li>
								<li><a href="#">API</a></li>
								<li><a href="#">FAQ / Contact</a></li>
							</ul>
						</div>

						<div class="col-md-4">
							<h3 class="section-title">Information</h3>
							<ul>
								<li><a href="#">Terms &amp; Condition</a></li>
								<li><a href="#">License</a></li>
								<li><a href="#">Privacy &amp; Policy</a></li>
								<li><a href="#">Contact Us</a></li>
							</ul>
						</div>
					</div>
					<div class="row copy-right">
						<div class="col-md-6 col-md-offset-3 text-center">
							<p class="fh5co-social-icon">
								<a href="#"><i class="icon-twitter2"></i></a>
								<a href="#"><i class="icon-facebook2"></i></a>
								<a href="#"><i class="icon-instagram"></i></a>
								<a href="#"><i class="icon-dribbble2"></i></a>
								<a href="#"><i class="icon-youtube"></i></a>
							</p>
							<p>Copyright 2020 <a href="#">YUG MOVIES</a>. All Rights Reserved. <br>Made by <a href="http://savanpatel.tk">Savan</a></p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>

	<!-- Main JS -->
	<script src="js/main.js"></script>
	<?php
		if(isset($_GET['ins'])){
			if($_GET['ins']==1){
				echo "<script>
						alert('Thank you!');
					</script>";
			}
			else{
				echo "<script>
						alert('Try again!');
					</script>";
			}
		}
	?>
	</body>
</html>

