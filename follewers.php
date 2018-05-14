<?php 
 	if(isset($_GET['username']) === true && empty($_GET['username']) === false){
		include 'core/init.php';
		$username    = $getFromU->checkInput($_GET['username']);
		$profileId   = $getFromU->userIdByUsername($username);
		$profileData = $getFromU->userData($profileId);
		$user_id 	 = $_SESSION['user_id'];
		$user 		 = $getFromU->userData($user_id);

 		if($getFromU->loggedIn() === false){
			header('Location:index.php');
		}

		if(!$profileData){
			header('Location: index.php');
		}

	}else{
		header('Location: index.php');
	}
?>

<!doctype html>
<html>
	<head>
		<title>People following <?php echo $profileData->screenName. ' (@'.$profileData->username.')';?></title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
		<link rel="stylesheet" href="assets/css/style-complete.css"/>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
   </head>
<!--Helvetica Neue-->
<body>
<div class="wrapper">
<!-- header wrapper -->
<div class="header-wrapper">	
	<div class="nav-container">
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
                  <li id="messagePopup"><a>Messages<span id="messages"><?php if($notify->totalM > 0){echo '<span class="span-i">'.$notify->totalM.'</span>';}?></span></a></li>
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
 </div><!-- header wrapper end -->
 <!--Profile cover-->
<div class="profile-cover-wrap"> 
<div class="profile-cover-inner">
	<div class="profile-cover-img">
		<img src="<?php echo $profileData->profileCover;?>"/>
	</div>
</div>
<div class="profile-nav">
 <div class="profile-navigation">
	<ul>
		<li>
		<div class="n-head">
			TWEETS
		</div>
		<div class="n-bottom">
		  <?php $getFromT->countTweets($profileId);?>
		</div>
		</li>
		<li>
			<a href="<?php echo $profileData->username;?>/following">
				<div class="n-head">
					<a href="<?php echo $profileData->username;?>/following">FOLLOWING</a>
				</div>
				<div class="n-bottom">
					<span class="count-following"><?php echo $profileData->following;?></span>
				</div>
			</a>
		</li>
		<li>
		 <a href="<?php echo $profileData->username;?>/followers">
				<div class="n-head">
					FOLLOWERS
				</div>
				<div class="n-bottom">
					<span class="count-followers"><?php echo $profileData->followers;?></span>
				</div>
			</a>
		</li>
		<li>
			<a href="#">
				<div class="n-head">
					LIKES
				</div>
				<div class="n-bottom">
					<?php $getFromT->countLikes($profileId);?>
				</div>
			</a>
		</li>
	</ul>
	<div class="edit-button">
		<span>
			<?php echo $getFromF->followBtn($profileId, $user_id, $profileData->user_id);?>
 		</span>
	</div>
    </div>
</div>
</div><!--Profile Cover End-->

<!---Inner wrapper-->
<div class="in-wrapper"> 
 <div class="in-full-wrap">
   <div class="in-left">
     <div class="in-left-wrap">
	<!--PROFILE INFO WRAPPER END-->
	<div class="profile-info-wrap">
	 <div class="profile-info-inner">

		<div class="profile-img">
		$profileData->profileImage;?>"/>
		</div>	

		<div class="profile-name-wrap">
			<div class="profile-name">
				<a href="<?php echo $profileData->username;?>"><?php echo $profileData->screenName;?></a>
			</div>
			<div class="profile-tname">
				@<span class="username"><?php echo $profileData->username;?></span>
			</div>
		</div>

		<div class="profile-bio-wrap">
		 <div class="profile-bio-inner">
		    <?php echo $profileData->bio;?>
		 </div>
		</div>

<div class="profile-extra-info">
	<div class="profile-extra-inner">
		<ul>
			<li>
				<div class="profile-ex-location-i">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
				</div>
				<div class="profile-ex-location">
					<?php echo $profileData->country;?>
				</div>
			</li>
			<li>
				<div class="profile-ex-location-i">
					<i class="fa fa-link" aria-hidden="true"></i>
				</div>
				<div class="profile-ex-location">
					<a href="#"><?php echo $profileData->website;?></a>
				</div>
			</li>
			<li>
				<div class="profile-ex-location-i">
					<!-- <i class="fa fa-calendar-o" aria-hidden="true"></i> -->
				</div>
				<div class="profile-ex-location">
 				</div>
			</li>
			<li>
				<div class="profile-ex-location-i">
					<!-- <i class="fa fa-tint" aria-hidden="true"></i> -->
				</div>
				<div class="profile-ex-location">
				</div>
			</li>
		</ul>						
	</div>
</div>

<div class="profile-extra-footer">
	<div class="profile-extra-footer-head">
		<div class="profile-extra-info">
			<ul>
				<li>
					<div class="profile-ex-location-i">
						<i class="fa fa-camera" aria-hidden="true"></i>
					</div>
					<div class="profile-ex-location">
						<a href="#">0 Photos and videos </a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="profile-extra-footer-body">
		<ul>
			 <!-- <li><img src="#"/></li> -->
		</ul>		
	</div>
	<!-- whoToFollow -->

	<!-- trends -->
</div>

	 </div>
	<!--PROFILE INFO INNER END-->

	</div>
	<!--PROFILE INFO WRAPPER END-->

	</div>
	<!-- in left wrap-->
	<div class="popupTweet"></div>
  </div>
	<!-- in left end-->
		<!--FOLLOWING OR FOLLOWER FULL WRAPPER-->
		<div class="wrapper-following">
			<div class="wrap-follow-inner">
               <?php $getFromF->followersList($profileId, $user_id, $profileData->user_id);?>
			</div>
		<!-- wrap follo inner end-->
		</div>
		<script type="text/javascript" src="assets/js/follow.js"></script>
		<script type="text/javascript" src="assets/js/notification.js"></script>
		<script type="text/javascript" src="assets/js/hashtag.js"></script>
		<script type="text/javascript" src="assets/js/search.js"></script>
		<script type="text/javascript" src="assets/js/messages.js"></script>
		<script type="text/javascript" src="assets/js/popupForm.js"></script>
		<script type="text/javascript" src="assets/js/postMessage.js"></script>
 		<!--FOLLOWING OR FOLLOWER FULL WRAPPER END-->	
	</div><!--in full wrap end-->
</div>
<!-- in wrappper ends-->
</div><!-- ends wrapper -->
</body>

</html>
