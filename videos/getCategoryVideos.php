<?php
include '../db/connect.php';

//Get videos from channel by YouTube Data API
$API_key    = 'AIzaSyA-4HWNVH1CNodc8Ide2DHeHS9iFjEm8GU';
$maxResults = 22;

if(isset($_GET['category'])){
    $category = $_GET['category'];
}

$select_cat = "SELECT * FROM video_category WHERE id=$category";
$res = mysqli_query($conn, $select_cat);

while ($row = mysqli_fetch_assoc($res)) {
    $cat_title = $row['name'];
}

$select_videos = "SELECT * FROM videos WHERE category=$category";
$result = mysqli_query($conn, $select_videos);

echo "
    <div class='panel panel-danger'>
        <div class='panel-heading'>Video kategoria: ".$cat_title."</div>
        <div class='panel-body'>
";

while ($row = mysqli_fetch_assoc($result)) {
    $videoID = $row['ytb_id'];

    echo "<div class='col-xs-12 col-sm-6 col-md-4 text-center'>
              <iframe src='https://www.youtube.com/embed/".$videoID."' frameborder='0' allowfullscreen></iframe>
        </div>";
}
echo "</div></div>";

?>