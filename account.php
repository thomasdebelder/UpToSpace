<?php 
  include 'core/init.php';
  $user_id = $_SESSION['user_id'];
  $user    = $getFromU->userData($user_id);


  if($getFromU->loggedIn() === false) {
    header('Location: index.php');
  }

  if(isset($_POST['submit'])) {
    $username  = $_POST['username'];
    $email     = $_POST['email'];
 	$error     = array();

    if(!empty($username) && !empty($email)) {
			
      if($user->username != $username and $getFromU->checkUsername($username) === true){
        $error['username'] = "Username is not available";
      }
      if(preg_match("/[^a-zA-Z0-9\!]/", $username)) {
        $error['username']  = "Only characters and numbers allowed";
      }
      else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Invalid email format";
      }
      else if($user->email != $email and $getFromU->checkEmail($email) === true) {
        $error['email'] = "Email is already in use";
      }
      else {
        $getFromU->update('users', $user_id, array('username' => $username, 'email' => $email));
		header('Location: account.php');
      }
    }
    else {
      $error['fields']  = "Please fill all the fields";
    }
  }
?><!DOCTYPE HTML>
 <html>
	<head>
		<title>Account</title>
		  <meta charset="UTF-8" />
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
 	  	  <link rel="stylesheet" href="assets/css/style-complete.css"/>
   		  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	</head>
	<!--Helvetica Neue-->
<body>
<div class="wrapper">
<!-- header wrapper -->
<div class="header-wrapper">

    <div class="nav-container">
        <!-- Nav -->
        <div class="nav">
            <div class="nav-right">
        <ul>
		  <li class="hover"><label class="drop-label" for="drop-wrap1"><img src="<?php echo $user->profileImage; ?>"/></label>
		  <input type="checkbox" id="drop-wrap1">
		    <div class="drop-wrap">
		      <div class="drop-inner">
		        <ul>
		          <li><a href="home.php">Home</a></li>
	              <li><a href="profileEdit.php">Profile</a></li>
                  <li id="messagePopup"><a>Messages<span id="messages"></span></a></li>
                  <li><a href="account.php">Settings</a></li>
				  <li><a href="logout.php">Log out</a></li>
				</ul>
		      </div>
		    </div>
		  </li>
		  <li>
            <input type="text" placeholder="Search" class= "search"/>
		    <div class="search-result"></div>
		  </li>
		  <li>
		    <label class="addTweetBtn">New Post</label></li>
		</ul>
		</div><!-- nav right ends-->
        </div><!-- nav ends -->

    </div><!-- nav container ends -->
	<script type="text/javascript" src="assets/js/popupForm.js"></script>
	<script type="text/javascript" src="assets/js/hashtag.js"></script>
	<script type="text/javascript" src="assets/js/search.js"></script>
	<script type="text/javascript" src="assets/js/notification.js"></script>

</div><!-- header wrapper end -->
		
	<div class="container-wrap">

		<div class="lefter">
			<div class="inner-lefter">

				<div class="acc-info-wrap">
					<div class="acc-info-bg">
						<img src="<?php echo $user->profileCover;?>"/> <!--cover -->
					</div>
					<div class="acc-info-img">
						<img src="<?php echo $user->profileImage;?>"/> <!--profileImage -->
					</div>
					<div class="acc-info-name">
						<h3><?php echo $user->screenName;?></h3>
						<span><a href="<?php echo $user->username;?>">@<?php echo $user->username;?></a></span>
					</div>
				</div><!--Acc info wrap end-->

				<div class="option-box">
					<ul> 
						<li>
							<a href="account.php" class="bold">
							<div>
								Account
								<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
							</div>
							</a>
						</li>
						<li>
							<a href="password.php">
							<div>
								Password
								<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
							</div>
							</a>
						</li>
					</ul>
				</div>

			</div>
		</div><!--LEFTER ENDS-->
		
		<div class="righter">
			<div class="inner-righter">
				<div class="acc">
					<div class="acc-heading">
						<h2>Account</h2>
						<h3>Change your basic account settings.</h3>
					</div>
					<div class="acc-content">
					<form method="POST">
						<div class="acc-wrap">
							<div class="acc-left">
								Username
							</div>
							<div class="acc-right">
								<input type="text" name="username" value="<?php echo $user->username;?>"/>
								<span>
								<?php if(isset($error['username'])){echo $error['username'];}?>
								</span>
							</div>
						</div>

						<div class="acc-wrap">
							<div class="acc-left">
								Email
							</div>
							<div class="acc-right">
								<input type="text" name="email" value="<?php echo $user->email;?>"/>
								<span>
									<?php if(isset($error['email'])){echo $error['email'];}?>
								</span>
							</div>
						</div>
						<div class="acc-wrap">
							<div class="acc-left">
								
							</div>
							<div class="acc-right">
								<input type="Submit" name="submit" value="Save changes"/>
							</div>
							<div class="settings-error">
								<?php if(isset($error['fields'])){echo $error['fields'];}?>
   							</div>	
						</div>
					</form>
					</div>
				</div>
				<div class="content-setting">
					<div class="content-heading">
						
					</div>
					<div class="content-content">
						<div class="content-left">
							
						</div>
						<div class="content-right">
							
						</div>
					</div>
				</div>
			</div>	
		</div>
		<div class="popupTweet"></div>
		<script type="text/javascript" src="assets/js/messages.js"></script>
		
	</div>
	<!--CONTAINER_WRAP ENDS-->

	</div><!-- ends wrapper -->
</body>

</html>

