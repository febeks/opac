<?php

//Get videos from channel by YouTube Data API
$API_key    = 'AIzaSyA-4HWNVH1CNodc8Ide2DHeHS9iFjEm8GU';
$channelID  = 'UCKo69ZqrTI1uz1Kx4V6WTYQ';
$maxResults = 2;


//$getchannelID = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/channels?key='.$API_key.'&forUsername=spievankovo&part=id'));
//$banner = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=brandingSettings&id='.$channelID.'&key='.$API_key.''));

$get_banner = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=brandingSettings&id='.$channelID.'&key='.$API_key.''));

foreach($get_banner->items as $item){
    $banner_path = $item->brandingSettings->image->bannerImageUrl;
}

$get_title = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=snippet&id='.$channelID.'&key='.$API_key.''));
foreach($get_title->items as $item){
    $video_title = $item->snippet->title;
}

echo $video_title;
?>