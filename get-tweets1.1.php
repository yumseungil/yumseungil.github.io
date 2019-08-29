<?php
session_start();
require_once("twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = "yumseungil";
$notweets = 30;
$consumerkey = "yBNwr7J62VirjvAkMBtMyVRJU";
$consumersecret = "xk8AVWx2VJIringfJTPBRThyw2EGZCNtjtTasA2rTpnSS2cjIZ";
$accesstoken = "1164772241755611137-JXtBsrSuoBvTkOg6zypZhQn5mv6Ejl";
$accesstokensecret = "S2OrNn23KYN3RgoQ1LxrO8ZeKLxkOA3TbESQuptqFMa1n";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
echo json_encode($tweets);
?>