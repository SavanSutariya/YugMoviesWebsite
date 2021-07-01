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

	
<?php 
		include 'partials/header.php'; 
		if (isset($_SESSION['loggedin'])) {
			$uid = $_SESSION['user_id'];
			$sql = "SELECT * FROM `album_select` WHERE user_id = $uid";
			$album_result = mysqli_query($conn,$sql);
			if ($album_result) {
				if (mysqli_num_rows($album_result)==1) {
					$row = mysqli_fetch_assoc($album_result);
					$link = $row['select_link'];
				}
				else{
					$link = "NO";
				}				
			}
			else{
				$link = "NO";
			}
			if($link == "NO"){
				$width = 12;
			}
			else{
				$width = 6;
			}
?>
		<div id="fh5co-intro-section">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 animate-box text-center">
						<h2 class="intro-heading">Your account</h2>
					</div>
				</div>
			</div>
		</div>
		
		<div id="fh5co-contact-section">
			<div class="container">
				<div class="row">
				
				<?php if ($link != "NO") { ?>

                	<div class="col-md-6 text-center animate-box">
						<div class="services">
                        	<a href="<?php echo $link ?>">
                        		<div class="icon">
					        		<span><i class="icon-camera"></i></span>
				    			</div>
					    		<h3>Album Photo Selection</h3></a>
                        	</a>
						   	<p>Select your best photos to get printed on your album.</p>
						</div>
					</div>

				<?php } ?>
					<div class="col-md-<?php echo $width; ?> text-center animate-box">
						<div class="services">
                        <a href="user_profile.php">
							<div class="icon">
								<span><i class="icon-video"></i></span>
							</div>
							<h3>Manage Account</h3>
                        </a>
							<p>Manage your username, phone and address.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End: fh5co-contact-section -->

		
		<?php include 'partials/footer.php'; ?>
		<?php 
}
else {
	header("location: ../Yug movies");
}
		?>