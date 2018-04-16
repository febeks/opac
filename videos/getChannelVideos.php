<?php
include '../db/connect.php';

//Get videos from channel by YouTube Data API
$API_key    = 'AIzaSyA-4HWNVH1CNodc8Ide2DHeHS9iFjEm8GU';
$maxResults = 22;

if(isset($_GET['channel'])){
    $channel = $_GET['channel'];
}

$select_channel = "SELECT * FROM video_channels WHERE id=$channel";
$result = mysqli_query($conn, $select_channel);

while ($row = mysqli_fetch_assoc($result)) {
    $channelID = $row['ytb_id'];
    $title = $row['video_title'];
    $banner_path = $row['banner_path'];
}

$videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maxResults.'&key='.$API_key.''));

echo "
    <div class='panel panel-danger'>
        <div class='panel-heading'>Zaujimave Youtube kanaly: ".$title."</div>
        <div class='panel-body'>
";
            foreach($videoList->items as $item){
                //Embed video
                if(isset($item->id->videoId)){
                    echo "<div class='col-xs-12 col-sm-6 col-md-4 text-center'>
                            <!--<strong>".$item->snippet->title."</strong>-->
                            <iframe src='https://www.youtube.com/embed/".$item->id->videoId."' frameborder='0' allowfullscreen></iframe>
                        </div>";
                }
            }
echo "</div></div>";

?>