<?php

//Get User Input
$url = $_POST['url'];



/*
  Get Website's Google Rank, Alexa, Social influence data using jsonwhois API
 */

//jsonwhois API Configuration
require_once "/unirest-php/lib/Unirest.php";

$response = Unirest::get("http://jsonwhois.com/api/whois", array("Accept" => "application/json"), array(
            "apiKey" => "53dd405916c2b6fe56149d5e",
            "domain" => "$url"
                )
);

$data = $response->body; 
$google_rank= $data->google->rank;
$alexa_rank=$data->alexa->rank;
$twitter_follow=$data->social->twitter->count;
$twitter_url=$data->social->twitter->url;
$facebook = $data->social->facebook->data;
$facebook_share = $facebook[0]->share_count;
$facebook_like = $facebook[0]->like_count;
$facebook_comment = $facebook[0]->comment_count;
$delicious=$data->social->delicious;
$linkedin=$data->social->linkedIn;

echo "Website URL" . $url . "<br>";
echo "Google Rank" . $google_rank . "<br>";
echo "Alexa rank" . $alexa_rank . "<br>";
echo "Twitter followers" . $twitter_follow . "<br>";
echo "Twitter url" . $twitter_url . "<br>";
echo "facebook share" . $facebook_share . "<br>";
echo "facebook like" . $facebook_like . "<br>";
echo "facebook comment" . $facebook_comment. "<br>";
echo "delicious favorite " . $delicious. "<br>";
echo "Linkedin ".$linkedin. "<br>";

