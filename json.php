<?php

include './db/connect.php';

$game_list_url = 'https://webmasters.miniclip.com/api/genre/432/en.json';
$data = file_get_contents($game_list_url);
$json = json_decode($data,true);

$stmt = $conn->prepare("INSERT INTO game     (game_id, name, 
                                                    width, height, embed,
                                                    big_icon_path
                                                    ) 
                                                    VALUES (?, ?, ?, ?, ?, ?)");

foreach ($json as $row){
    //decode json vars to php vars
    $game_id            = $row['game_id'];

    //parse game by game_id to check if it is possible to get embed code of the game
    $get_game_by_url = 'https://webmasters.miniclip.com/api/games/'.$game_id.'/en.json';

    $data2 = file_get_contents($get_game_by_url);
    $json2 = json_decode($data2,true);

    foreach ($json2 as $row2){
        $big_icon_path      = $row2['big_icon'];
        $name               = $row2['name'];
        $width              = $row2['width'];
        $height             = $row2['height'];
        $embed              = $row2['embed'];
        if($embed==NULL)
            break;

        $stmt->bind_param("isiiss",  $game_id, $name,
                                            $width, $height, $embed,
                                            $big_icon_path
        );
        $stmt->execute();
    }
}

//script done, close all connections
$stmt->close();
$conn->close();
?>