<?php
include_once('core/init.php');
 if (isset($_GET['username']) === true && empty($_GET['username']) === false) {
  $username = $getFromU->checkInput($_GET['username']);
  $profileId = $getFromU->userIdByUsername($username);
  $profileData = $getFromU->userData($profileId);
  $user_id = $_SESSION['user_id'];
  $user = $getFromU->userData($user_id); 
  
  if (!$profileData) {
    header('Location: index.php');
  }
   
 }else{
 header('Location: index.php');
}
?><!doctype html>
<html>
	<head>
	<title><?php echo $profileData->screenName.' (@'.$profileData->username.')'; ?></title>
	<meta charset="UTF-8" />
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
  	<link rel="stylesheet" href="assets/css/style-complete.css"/>
  	<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
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
                  <li id="messagePopup"><a>Messages<span id="messages"></a></li>
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
		<!-- PROFILE-COVER -->
		<img src="<?php echo $profileData->profileCover; ?>"/>
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
		  <?php $getFromT->countTweets($profileId); ?>
		</div>
		</li>
		<li>
			<a href="<?php $profileData->username; ?>/following">
				<div class="n-head">
					<a href="<?php echo $profileData->username; ?>/following">FOLLOWING</a>
				</div>
				<div class="n-bottom">
					<span class="count-following"><?php echo $profileData->following; ?></span>
				</div>
			</a>
		</li>
		<li>
		 <a href="<?php echo $profileData->username; ?>/followers">
				<div class="n-head">
					FOLLOWERS
				</div>
				<div class="n-bottom">
					<span class="count-followers"><?php echo $profileData->followers; ?></span>
				</div>
			</a>
		</li>
		<li>
			<a href="#">
				<div class="n-head">
					LIKES
				</div>
				<div class="n-bottom">
					<?php $getFromT->countLikes($profileId); ?>
				</div>
			</a>
		</li>
	</ul>
	<div class="edit-button">
		<span>
				<?php echo $getFromF->followBtn($profileId, $user_id, $profileData->user_id); ?>
 		</span>
	</div>
    </div>
</div>
</div><!--Profile Cover End-->
<script type="text/javascript" src="assets/js/follow.js"></script>
<script type="text/javascript" src="assets/js/notification.js"></script>

<!---Inner wrapper-->
<div class="in-wrapper">
 <div class="in-full-wrap">
   <div class="in-left">
     <div class="in-left-wrap">
	<!--PROFILE INFO WRAPPER END-->
	<div class="profile-info-wrap">
	 <div class="profile-info-inner">
	 <!-- PROFILE-IMAGE -->
		<div class="profile-img">
			<img src="<?php echo $profileData->profileImage; ?>"/>
		</div>

		<div class="profile-name-wrap">
			<div class="profile-name">
				<a href="<?php echo $profileData->username; ?>"><?php echo $profileData->screenName; ?></a>
			</div>
			<div class="profile-tname">
				@<span class="username"><?php echo $profileData->username; ?></span>
			</div>
		</div>

		<div class="profile-bio-wrap">
		 <div class="profile-bio-inner">
		    <?php echo $getFromT->getTweetLinks($profileData->bio); ?>
		 </div>
		</div>

<div class="profile-extra-info">
	<div class="profile-extra-inner">
		<ul>
      <?php if(!empty($profileData->country)){ ?>
			<li>
				<div class="profile-ex-location-i">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
				</div>
				<div class="profile-ex-location">
					<?php echo $profileData->country; ?>
				</div>
			</li>
    <?php } ?>

    <?php if(!empty($profileData->website)){ ?>
			<li>
				<div class="profile-ex-location-i">
					<i class="fa fa-link" aria-hidden="true"></i>
				</div>
				<div class="profile-ex-location">
					<a href="<?php echo $profileData->website; ?>" target="_blank"><?php echo $profileData->website; ?></a>
				</div>
			</li>
    <?php } ?>

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
</div>

	 </div>
	<!--PROFILE INFO INNER END-->

	</div>
	<!--PROFILE INFO WRAPPER END-->

	</div>
	<!-- in left wrap-->

  </div>
	<!-- in left end-->

<div class="in-center">
	<div class="in-center-wrap">

  <?php

  $tweets = $getFromT->getUserTweets($profileId);

  foreach ($tweets as $tweet) {
    $likes   = $getFromT->likes($user_id, $tweet->tweetID);
    $retweet = $getFromT->checkRetweet($tweet->tweetID, $user_id);
    $user    = $getFromU->userData($tweet->retweetBy);
    
    echo '<div class="all-tweet">
		    <div class="t-show-wrap">
		     <div class="t-show-inner">
		     '.(($retweet['retweetID'] === $tweet->retweetID OR $tweet->retweetID > 0) ? '
		      <div class="t-show-banner">
		        <div class="t-show-banner-inner">
		          <span><i class="fa fa-retweet" aria-hidden="true"></i></span><span>'.$user->screenName.' Retweeted</span>
		        </div>
		      </div>'
		      : '').'

		      '.((!empty($tweet->retweetMsg) && $tweet->tweetID === $retweet['tweetID'] or $tweet->retweetID > 0) ? '<div class="t-show-head">
		      <div class="t-show-popup" data-tweet="'.$tweet->tweetID.'">
		        <div class="t-show-img">
		          <img src="'.$user->profileImage.'"/>
		        </div>
		        <div class="t-s-head-content">
		          <div class="t-h-c-name">
		            <span><a href="'.$user->username.'">'.$user->screenName.'</a></span>
		            <span>@'.$user->username.'</span>
		            <span>'.$getFromU->timeAgo($tweet->postedOn).'</span>
		          </div>
		          <div class="t-h-c-dis">
		            '.$getFromT->getTweetLinks($tweet->retweetMsg).'
		          </div>
		        </div>
		      </div>
		      <div class="t-s-b-inner">
		        <div class="t-s-b-inner-in">
		          <div class="retweet-t-s-b-inner">
		          '.((!empty($tweet->tweetImage)) ? '
		            <div class="retweet-t-s-b-inner-left">
		              <img src="'.$tweet->tweetImage.'" class="imagePopup" data-tweet="'.$tweet->tweetID.'"/>
		            </div>' : '').'
		            <div>
		              <div class="t-h-c-name">
		                <span><a href="'.$tweet->username.'">'.$tweet->screenName.'</a></span>
		                <span>@'.$tweet->username.'</span>
		                <span>'.$getFromU->timeAgo($tweet->postedOn).'</span>
		              </div>
		              <div class="retweet-t-s-b-inner-right-text">
		                '.$getFromT->getTweetLinks($tweet->status).'
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
		      </div>' : '

		      <div class="t-show-popup" data-tweet="'.$tweet->tweetID.'">
		        <div class="t-show-head">
		          <div class="t-show-img">
		            <img src="'.$tweet->profileImage.'"/>
		          </div>
		          <div class="t-s-head-content">
		            <div class="t-h-c-name">
		              <span><a href="'.$tweet->username.'">'.$tweet->screenName.'</a></span>
		              <span>@'.$tweet->username.'</span>
		              <span>'.$getFromU->timeAgo($tweet->postedOn).'</span>
		            </div>
		            <div class="t-h-c-dis">
		              '.$getFromT->getTweetLinks($tweet->status).'
		            </div>
		          </div>
		        </div>'.
		        ((!empty($tweet->tweetImage)) ?
		         '<!--tweet show head end-->
		              <div class="t-show-body">
		                <div class="t-s-b-inner">
		                 <div class="t-s-b-inner-in">
		                   <img src="'.$tweet->tweetImage.'" class="imagePopup" data-tweet="'.$tweet->tweetID.'"/>
		                 </div>
		                </div>
		              </div>
		              <!--tweet show body end-->
		        ' : '').'

		      </div>').'
		      <div class="t-show-footer">
		        <div class="t-s-f-right">
		          <ul>
		          '.(($getFromU->loggedIn() === true) ? '
		            <li><button><i class="fa fa-share" aria-hidden="true"></i></button></li>
		            <li>'.(($tweet->tweetID === $retweet['retweetID'] OR $user_id == $retweet['retweetBy']) ? 
		            	'<button class="retweeted" data-tweet="'.$tweet->tweetID.'" data-user="'.$tweet->tweetBy.'"><i class="fa fa-retweet" aria-hidden="true"></i><span class="retweetsCount">'.$tweet->retweetCount.'</span></button>' : 
		            	'<button class="retweet" data-tweet="'.$tweet->tweetID.'" data-user="'.$tweet->tweetBy.'"><i class="fa fa-retweet" aria-hidden="true"></i><span class="retweetsCount">'.(($tweet->retweetCount > 0) ? $tweet->retweetCount : '').'</span></button>').'</li>
		           
		            <li>'.(($likes['likeOn'] === $tweet->tweetID) ? 
		            	'<button class="unlike-btn" data-tweet="'.$tweet->tweetID.'" data-user="'.$tweet->tweetBy.'"><i class="fa fa-heart" aria-hidden="true"></i><span class="likesCounter">'.$tweet->likesCount.'</span></button>' : 
		            	'<button class="like-btn" data-tweet="'.$tweet->tweetID.'" data-user="'.$tweet->tweetBy.'"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="likesCounter">'.(($tweet->likesCount > 0) ? $tweet->likesCount : '' ).'</span></button>').'
		            </li>
		            
		            '.(($tweet->tweetBy === $user_id) ? '
		              <li>
			              <a href="#" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
			              <ul>
			                <li><label class="deleteTweet" data-tweet="'.$tweet->tweetID.'">Delete Tweet</label></li>
			              </ul>
		              </li>' : '').'

		           ' : '<li><button><i class="fa fa-share" aria-hidden="true"></i></button></li>
		                <li><button><i class="fa fa-retweet" aria-hidden="true"></i></button></li>
		                <li><button><i class="fa fa-heart" aria-hidden="true"></i></button></li>
		            ').'

		          </ul>
		        </div>
		      </div>
		    </div>
		    </div>
		    </div>';
  }
  ?>
	</div><!-- in left wrap-->
  <div class="popupTweet"></div>
  <script type="text/javascript" src="assets/js/like.js"></script>
  <script type="text/javascript" src="assets/js/retweet.js"></script>
  <script type="text/javascript" src="assets/js/popuptweets.js"></script>
  <script type="text/javascript" src="assets/js/delete.js"></script>
  <script type="text/javascript" src="assets/js/comment.js"></script>
  <script type="text/javascript" src="assets/js/popupForm.js"></script>
  <script type="text/javascript" src="assets/js/fetch.js"></script>
  <script type="text/javascript" src="assets/js/search.js"></script>
  <script type="text/javascript" src="assets/js/hashtag.js"></script>
  <script type="text/javascript" src="assets/js/messages.js"></script>
  <script type="text/javascript" src="assets/js/postMessage.js"></script>

</div>
<!-- in center end -->

<div class="in-right">
	<div class="in-right-wrap">



	</div><!-- in right wrap-->
</div>
 <!-- in right end -->
<script type="text/javascript" src="assets/js/follow.js"></script>

		</div>
		<!--in full wrap end-->
	</div>
	<!-- in wrappper ends-->
 </div>
 <!-- ends wrapper -->
</body>
</html>