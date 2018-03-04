<?php

include './db/connect.php';

$game = "SELECT * FROM game";
$result = mysqli_query($conn, $game);
$counter=0;
while($row = mysqli_fetch_assoc($result)) {
    $counter++;
    $id = $row['id'];
    $title = $row['title'];
    $cat_id = $row['category_id'];
    $embed = $row['embed'];
    ?>
    <div class="item <?php if($counter===1) echo "active"; ?> ">
        <div class="col-xs-2"><a href="#1">
                <!-- Place this code where you'd like the game to appear -->
                <div class="miniclip-game-embed" data-game-name="battle-golf-online" data-theme="5" data-width="960" data-height="600" data-language="en"></div>
            </a></div>
    </div>
    <?php
}
?>