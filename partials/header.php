<?php include 'includes/connect_db.php' ?>
<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "user") {
		if (isset($_SESSION['user_id'])) {						
		}
		else {
			$email = $_SESSION['userEmail'];
			$sql123 = "SELECT * FROM `users` WHERE email='$email'";
			$result123 = mysqli_query($conn,$sql123);
			$row = mysqli_fetch_assoc($result123);
			$_SESSION['user_id'] = $row['sr_no'];
		}
	}
?>
<nav id="fh5co-main-nav" role="navigation">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle active"><i></i></a>
		<div class="js-fullheight fh5co-table">
			<div class="fh5co-table-cell js-fullheight">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="product.php">EShop</a></li>
					<li><a href="work.php">Our work</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact</a></li>
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "user") {
						echo '<li><a href="account.php">My account</a></li>';
					}
					else{
						echo'<li><a href="login.php">Login</a></li>';
					} ?>
				</ul>
				<p class="fh5co-social-icon">
					<a href="https://twitter.com/Yug_Movie"><i class="icon-twitter2"></i></a>
					<a href="https://www.facebook.com/Yugmovie/"><i class="icon-facebook2"></i></a>
					<a href="https://www.instagram.com/yugmovie/"><i class="icon-instagram"></i></a>
					<a href="https://www.youtube.com/channel/UCe0DF4T3RNW0I73l6xhVBMA"><i class="icon-youtube"></i></a>
				</p>
			</div>
		</div>
	</nav>
	<div id="fh5co-page">
		<header>
			<div class="container">
				<div class="fh5co-navbar-brand">
					<h1 class="text-center"><a class="fh5co-logo" href="/">YUG MOVIES</a></h1>
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
				</div>
			</div>
		</header>