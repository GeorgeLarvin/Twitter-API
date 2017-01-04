<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" href="style3.css"></link>
	<title>Twitter client</title>

</head>
<body>
			<h1>Check out some tweets here !</h1>

<?php

	require "twitteroauth/autoload.php";
	use Abraham\TwitterOAuth\TwitterOAuth;

	$consumerKey = "xQoK2GhjAdqLiLq594A3NHQLN";
	$consumerSecret = "y5RoRB6T1LnD8pOcEjVzq2SBkDjCtBS0Cm4hXFgpUQiFdiTyY7";
	$accessToken = "20822132-mCBIfLAoWjQcQFMHmimGk2TbCo5gltl2Hd3WAvwg4";
	$accessSecret = "n3fEbZ99OGioSzYLVkdds44I43xau6fz1j9lJaxy7cdcQ";
	
	$connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessSecret);
	$content = $connection-> get("account/verify_credentials");
	
	$statuses = $connection->get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);
	
	
	foreach($statuses as $tweet){
		
		if($tweet -> favorite_count >= 2) {	
		
			$status = $connection->get("statuses/oembed", ["id" => $tweet -> id]);
			echo ($status -> html);
		
		}
		
	}

	
	
?>






</body>
</html>
