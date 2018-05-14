<?php
	include 'core/init.php';
	if($getFromU->loggedIn() === true){
		header('Location: home.php');
	}
?><!DOCTYPE html>
<html lang="en">
	<head>	
		<title>Welcome to Up2Space</title>
		<meta charset="UTF-8"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<link rel="stylesheet" href="assets/css/style-complete.css"/>
	</head>
	<!--Helvetica Neue-->
<body>
<div class="wrapper">
<!-- header wrapper -->
<div class="header-wrapper">
	
	<div class="nav-container">
		<!-- Nav -->
		<nav class="nav">

				<ul>
					<li><a href="home.php">Home</a></li>
					<li><a href="#">About</a></li>
				</ul>

		</nav><!-- nav ends -->

	</div><!-- nav container ends -->

</div><!-- header wrapper end -->
	
<!---Inner wrapper-->
<div class="inner-wrapper">
	<!-- main container -->
	<div class="main-container">
		<!-- content left-->
		<div class="content-left">
			<h1>Welcome to Up2Space.</h1>
			<br/>
            <p>Share the best digital inspiration with a creative network.</p>
           <p> A place to connect with your friends. Simply follow the people you like and get updates when they upload new stuff. Get inspired because Up2Space delivers you the best of graphic, web, ui/ux design work and this platform is completely free to use!</p>
		</div><!-- content left ends -->	

		<!-- content right ends -->
		<div class="content-right">
			<!-- Log In Section -->
			<div class="login-wrapper">
			  <?php include 'includes/login.php';?>
			</div><!-- log in wrapper end -->

			<!-- SignUp Section -->
			<div class="signup-wrapper">
			   <?php include 'includes/signup-form.php';?>
			</div>
			<!-- SIGN UP wrapper end -->

		</div><!-- content right ends -->

	</div><!-- main container end -->

</div><!-- inner wrapper ends-->
</div><!-- ends wrapper -->
</body>
</html>