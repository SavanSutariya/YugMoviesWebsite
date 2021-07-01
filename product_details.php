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
	<?php
		if(!empty($_GET['token'])){
			$getid = $_GET['token'];
			$sql = "SELECT * FROM `products` where id = $getid AND available = 1";
			if (isset($_GET['random'])) {
				$sql = "SELECT * FROM `products` where available = 1 ORDER BY RAND() LIMIT 1";
			}
			$pro_results = mysqli_query($conn,$sql);
			if (mysqli_num_rows($pro_results)!=0) {
				$row = mysqli_fetch_assoc($pro_results);
	?>
		<div id="fh5co-intro-section">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 animate-box text-center">
						<?php 
							if (isset($_GET['random'])) {
								echo '<p><a class="btn btn-default" href="product_details.php?token=1&random=1"><i class="icon-refresh"></i> Get another</a></p>';
								
							}
						?>
						<h2 class="intro-heading"><?php echo htmlspecialchars($row['title']) ?></h2>
					</div>
				</div>
			</div>
		</div>
		
		<div id="fh5co-contact-section">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-md-push-1 animate-box">
						<div class="product" style="background-image: url(<?php echo $row['product_img'] ?>);">
						</div>
					</div>
					<div class="col-md-7 col-md-push-1 animate-box">
						<div class="row">
							<div class="col-md-6">
								<h1><?php echo htmlspecialchars($row['price']) ?>&#8377;</h1>
							</div>
							<div class="col-md-1">
								<a href="https://wa.me/?text=Check out this product on YUG MOVIES yugmovie.com/product_details.php?token=<?php echo $getid; ?>"><button class="btn btn-success btn-outline"><i class="icon-whatsapp"></i> Share</button></a>
							</div>
						<div class="row">
							<div class="col-md-12">
								<pre><?php echo htmlspecialchars($row['description']) ?></pre>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6"></div>							
							<div class="col-md-6">
								<a href="https://wa.me/916355962815?text=Hay%20I%27m%20interested%20in%20your%20product%20%0A%2A<?php echo $row['title'] ?>%2A%0A-link%3A%20http%3A%2F%2Flocalhost%2Fwork%2FYug%2520Movies%2Fproduct_details.php%3Ftoken%3D<?php echo $getid ?>"><button class="btn btn-primary">Buy (<?php echo htmlspecialchars($row['price']) ?>&#8377;)</button></a>
							</div>
						</div>
						<div class="col-md-12">
							<p>You will have an option to upload your image, that will be printed.</p>
						</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php 
			}
			else{
				echo '
				<div id="fh5co-intro-section">
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2 animate-box text-center">
								<h2 class="intro-heading">Product Unavailable</h2>
								<p><span>Your entered url is broken or you have made some changes in url</span></p>
								<a href="?token=1&random=1">Get random product</a><br>
								<a href="product.php">Back to store</a>
							</div>
						</div>
					</div>
				</div>
				';
			}
		}
		else{
			echo '
			<div id="fh5co-intro-section">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 animate-box text-center">
						<h2 class="intro-heading">invalid product url</h2>
						<p><span>Your entered url is broken or you have made some changes in url</span></p>
						<a href="?token=1&random=1">Get random product</a><br>
						<a href="product.php">Back to store</a>
					</div>
				</div>
			</div>
		</div>
			';
		}
		?>
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
		<?php include 'partials/footer.php'?>