<?php

include './db/connect.php';

$game = "SELECT * FROM game";
$result = mysqli_query($conn, $game);
$counter=0;

while($row = mysqli_fetch_assoc($result)) {
    $counter++;
    if ($counter == 21)
        break;
    $game_id = $row['game_id'];
    $name = $row['name'];
    $big_icon = $row['big_icon_path'];
    $embed = $row['embed'];

    echo "  
            <div class='item ".(($counter == 1) ? 'active' : '')." '>
                <div class='carousel-col'>
                        <a href='#1'><img src='".$big_icon."' class='img-responsive' alt=''/></a>
                </div>
            </div>
          ";
}
?>

