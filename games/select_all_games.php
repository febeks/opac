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


    echo"
    <div class='panel-heading'>Hry : $name</div>
                <div class='panel-body'>
                    <div class='col-md-12'>
                        <div class='container'>
                            <div class='row'>
                                <div class='col-centered col-xs-8'>$embed</div>
                            </div>
                        </div>  
                    </div>
                </div>
        ";

}else{

    ?>
    <div class='panel-heading'>Hry</div>
        <div class='panel-body'>
            <div class='col-md-12'>
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
                        <div class='col-xs-3'>
                               <div class='game-hover'>
                                    <a href='game.php?game_id=$game_id'>
                                    <img src='".$big_icon."' class='img-responsive icon' alt=''/>
                                    <span class='overlay'></span>
                                    </a>
                            </div>    
                        </div>
                    ";
                }
}
?>