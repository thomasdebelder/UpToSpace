$(function(){
	$(document).on('click', '.deleteTweet', function(){
		var tweet_id = $(this).data('tweet');

		$.post('http://localhost:8888/twitter/core/ajax/deleteTweet.php', {showpopup:tweet_id}, function(data){
			$('.popupTweet').html(data);
			$('.close-retweet-popup,.cancel-it').click(function(){
				$('.retweet-popup').hide();
			});
		});
	});

	$(document).on('click','.delete-it', function(){
		var tweet_id = $(this).data('tweet');

		$.post('http://localhost:8888/twitter/core/ajax/deleteTweet.php', {deleteTweet:tweet_id}, function(){
			$('.retweet-popup').hide();
			location.reload();
		});
	});

});