<?php

include '../db/connect.php';
$API_key    = 'AIzaSyA-4HWNVH1CNodc8Ide2DHeHS9iFjEm8GU';

if( !empty($_POST['channel_name']) && !empty($_POST['ytb_id'])) {

    $channelID = isset($_POST['ytb_id'])
        ? $_POST['ytb_id']
        : '';

    $name = isset($_POST['channel_name'])
        ? $_POST['channel_name']
        : '';

    $get_data = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=brandingSettings&id='.$channelID.'&key='.$API_key.''));
    foreach($get_data->items as $item){
        $banner_path = $item->brandingSettings->image->bannerImageUrl;
    }

    $get_title = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=snippet&id='.$channelID.'&key='.$API_key.''));
    foreach($get_title->items as $item){
        $video_title = $item->snippet->title;
    }

    $stmt = $conn->prepare("INSERT INTO video_channels (name, ytb_id, video_title, banner_path) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $name, $channelID, $video_title, $banner_path);

    $insert = $stmt->execute();
    //printf("%d row inserted.\n", $stmt->affected_rows);
    $stmt->close();
    $conn->close();

    echo $insert?'ok':'err';
}
?>