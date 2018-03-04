<?php

include '../db/connect.php';

    $stmt = $conn->prepare("INSERT INTO game (title, category_id, embed) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $title, $category_id, $embed);

    $title = isset($_POST['title'])
        ? $_POST['title']
        : '';
    $category_id = isset($_POST['category_id'])
        ? $_POST['category_id']
        : '';
    $embed = isset($_POST['embed'])
        ? $_POST['embed']
        : '';

    $stmt->execute();
    printf("%d row inserted.\n", $stmt->affected_rows);
    $stmt->close();
    $conn->close();

?>