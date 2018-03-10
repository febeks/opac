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
                    <div class='game-hover-mini'>
                        <a href='./games/game.php?game_id=$game_id'>
                            <img src='".$big_icon."' class='img-responsive' id='icon' alt=''/>
                            <span class='overlay'></span>
                        </a>
                    </div>
                </div>
            </div>
          ";
}
?>

