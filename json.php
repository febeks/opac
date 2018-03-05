<?php

include './db/connect.php';

$url = 'https://webmasters.miniclip.com/api/games/en.json';
$data = file_get_contents($url);
$json = json_decode($data,true);

$stmt = $conn->prepare("INSERT INTO game (short_name, name, game_id, url_key, 
                                                    big_icon_path, big_icon_name, 
                                                    small_icon_path, small_icon_name,
                                                    mini_icon_path, mini_icon_name) 
                                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

foreach ($json as $row){
    $url_key            = $row['game_url_key'];
    $mini_icon_path     = $row['mini_icon']['path'];
    $mini_icon_name     = $row['mini_icon']['name'];
    $small_icon_path    = $row['small_icon']['path'];
    $small_icon_name    = $row['small_icon']['name'];
    $big_icon_path      = $row['big_icon']['path'];
    $big_icon_name      = $row['big_icon']['name'];
    $short_name         = $row['short_name'];
    $name               = $row['name'];
    $game_id            = $row['game_id'];


    $stmt->bind_param("ssisssssss", $short_name, $name, $game_id, $url_key,
                                            $big_icon_path, $big_icon_name,
                                            $small_icon_path, $small_icon_name,
                                            $mini_icon_path, $mini_icon_name
                                            );
    $stmt->execute();
}
$stmt->close();
$conn->close();
?>