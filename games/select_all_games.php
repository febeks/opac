<?php
include "../db/connect.php";

if(isset($_GET['game_id'])){

    $game_id = $_GET['game_id'];
    $game = "SELECT * FROM game WHERE game_id=$game_id";
    $result = mysqli_query($conn, $game);
    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $big_icon = $row['big_icon_path'];
    $embed = html_entity_decode($row['embed'],ENT_QUOTES, "UTF-8");
    $width = $row['width'];
    $height = $row['height'];

    echo"
    <div class='panel-heading'>Hry : $name</div>
                <div class='panel-body' id='embedovana-hra'>
                            <div class='col-md-12 row'>
                                <div id='embed' style='width: $width;'>$embed</div>
                            </div>
                </div>
    </div>
        ";
}else{

    ?>
    <div class='panel-heading'>Hry</div>
        <div id="hry" class='panel-body'>
            <div class='col-md-12' align="center">
                <?php
                $game = "SELECT * FROM game";
                $result = mysqli_query($conn, $game);
                $counter=0;

                while($row = mysqli_fetch_assoc($result)) {
                    $counter++;

                    $game_id = $row['game_id'];
                    $name = $row['name'];
                    $big_icon = $row['big_icon_path'];
                    $embed = $row['embed'];

                    echo "
                        <div class='col-sm-3 col-md-3'>
                               <div class='game-hover'>
                                    <a href='game.php?game_id=$game_id'>
                                        <img src='".$big_icon."' class='img-responsive icon border-icon' alt=''/>
                                        <span class='overlay'></span>
                                    </a>
                            </div>    
                        </div>
                    ";
                }
    echo "</div></div>";
}


?>

