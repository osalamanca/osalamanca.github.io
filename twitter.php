<link href="style.css" rel="stylesheet" type="text/css">
<?php

error_reporting(E_ALL);
session_start();
require 'autoload.php';
require_once "src/TwitterOAuth.php";

use Abraham\TwitterOAuth\TwitterOAuth;

$apikey="gEFEbGdkVTDfzVgyiiCbzUImi";
$apisecret="Q4yQ000AiJL110zoNEkBYL0ASl84SUcnaxkCJ01uZzeghqWeXX";
$accesstoken="2834545563-3Gp2kIjsN5fFSiph2560NAJanr3WZ6S8pMjzPVU";
$accesssecret="iESkAmBbHXWaCHLrkXN89CUyigMMZ5QHboNYsczUDQLlg";

$connection = new TwitterOAuth($apikey, $apisecret, $accesstoken, $accesssecret);
/* own tweets 
$response = $connection->get("statuses/home_timeline", array("count" => 20));
*/

//Search Hastag, youtube video & limit number 
$query = array(
  "q" => "#nowplaying, youtu.be\/",
  "count" => 5,
);

//loops through and displays tweets
$results = $connection->get('search/tweets', $query);
// 	$embed = $connection->get('statuses/oembed.json?id='.$tweet->id);
foreach ($results->statuses as $tweet) {
  echo "<div class='tweets'>".$tweet->user->name . "</br>". "@" .$tweet->user->screen_name . ": " . "<p>" .$tweet->text . "\n". "</p>";
  echo "</br>"."</div>";
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



// The Regular Expression filter
$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

// The Text you want to filter for urls
$text = "";

// Check if there is a url in the text
if(preg_match($reg_exUrl, $text, $url)) {

       // make the urls hyper links
       echo preg_replace($reg_exUrl, '<a href="'.$url[0].'" rel="nofollow">'.$url[0].'</a>', $text);

} else {

       // if no urls in the text just return the text
       echo $text;

}

?>