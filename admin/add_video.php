<?php

include '../db/connect.php';
$API_key    = 'AIzaSyA-4HWNVH1CNodc8Ide2DHeHS9iFjEm8GU';

if(!empty($_POST['video_id']) && !empty($_POST['video_kategoria'])) {

    $videoID = isset($_POST['video_id'])
        ? $_POST['video_id']
        : '';

    $video_kategoria = isset($_POST['video_kategoria'])
        ? $_POST['video_kategoria']
        : '';

    $stmt = $conn->prepare("INSERT INTO videos (ytb_id, category) VALUES (?,?)");
    $stmt->bind_param("si", $videoID, $video_kategoria);

    $insert = $stmt->execute();
    //printf("%d row inserted.\n", $stmt->affected_rows);
    $stmt->close();
    $conn->close();

    echo $insert?'ok':'err';
}
?>