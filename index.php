<!DOCTYPE html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="intro">
        <h1>Now Playing Tweets</h1>
        <p>This page shows live tweets with the #NowPlaying hashtag</p>
    </div>
    <div id="tweetbox">
    	<label for="videos">Video URL:</label>
    	<input type="text" placeholder="http://www.youtube.com" name="videos">
        <label for="comments">Comment:</label>
    	<input type="text" placeholder="#NowPlaying" name="comments">
		<button>Tweet Now!</button>
    </div>
</body>
<?php

error_reporting(E_ALL);
//session_start();
require 'autoload.php';
require_once "src/TwitterOAuth.php";

use Abraham\TwitterOAuth\TwitterOAuth;

$apikey="gEFEbGdkVTDfzVgyiiCbzUImi";
$apisecret="Q4yQ000AiJL110zoNEkBYL0ASl84SUcnaxkCJ01uZzeghqWeXX";
$accesstoken="2834545563-3Gp2kIjsN5fFSiph2560NAJanr3WZ6S8pMjzPVU";
$accesssecret="iESkAmBbHXWaCHLrkXN89CUyigMMZ5QHboNYsczUDQLlg";

$connection = new TwitterOAuth($apikey, $apisecret, $accesstoken, $accesssecret);
/* own tweets */
$response = $connection->get("statuses/home_timeline", array("count" => 20));


//Search Hastag, youtube video & limit number 
$query = array(
  "q" => "#nowplaying, youtu.be\/",
  "count" => 5,
  
);
//loops through and displays tweets
$results = $connection->get('search/tweets', $query);
foreach ($results->statuses as $tweet) {
  echo "<div class='tweets'>".$tweet->user->name . ": ". "</br>". "@" .$tweet->user->screen_name  . "<p>" .$tweet->text . "\n". "</p>";
  echo $tweet->user->location."</div>";
} 
/*foreach ($response as $tweet) {
    // echo $tweet->favorite_count; shows number of favorites in each tweet
    if ($tweet->favorite_count >= 2) {
      //  $embed = $connection->post("statuses/home_timeline.json?count=10" . $tweet->id);
      //  echo $embed->html;
    }
}
*/

echo "<pre />";
//print_r($response);

?>