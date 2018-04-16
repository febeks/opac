<?php
include '../db/connect.php';
?>

    <div class="panel panel-danger">
        <div class='panel-heading'>Zaujimave Youtube kanaly</div>
        <div class='panel-body'>
            <div class='col-xs-12 col-sm-12 col-md-12' align="center">
<?php
$channel = "SELECT * FROM video_channels";
$result = mysqli_query($conn, $channel);

while ($row = mysqli_fetch_assoc($result)) {
    $ch_id = $row['id'];
    $title = $row['video_title'];
    $banner_path = $row['banner_path'];

    echo "<div class='col-xs-12 col-sm-12 col-md-12'>
                <a href='index.php?channel=$ch_id'>
                    <img src=$banner_path class='img-responsive' alt='' title=$title/>
                </a>
          </div>";
}
echo "</div></div></div>";