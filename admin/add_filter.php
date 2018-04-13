<?php

include '../db/connect.php';

if(!empty($_POST['filter_name'])) {

    $stmt = $conn->prepare("INSERT INTO book_filter (filter_name) VALUES (?)");
    $stmt->bind_param("s", $filter_name);

    $filter_name = isset($_POST['filter_name'])
        ? $_POST['filter_name']
        : '';

    $insert = $stmt->execute();
    //printf("%d row inserted.\n", $stmt->affected_rows);
    $stmt->close();
    $conn->close();

    echo $insert?'ok':'err';
}
?>