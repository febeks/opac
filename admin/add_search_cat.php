<?php

include '../db/connect.php';

if(!empty($_POST['name']) || !empty($_POST['keywords']) || !empty($_FILES['image_path'])) {
    $path = "img/";
    $path = $path . basename( $_FILES['image_path']['name']);
    if(move_uploaded_file($_FILES['image_path']['tmp_name'], $path)) {
        //echo "The file ".  basename( $_FILES['image_path']['name'])." has been uploaded";
    } else{
        //echo "There was an error uploading the file, please try again!";
    }

    $stmt = $conn->prepare("INSERT INTO book_cat (name, keywords, image_path) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $keywords, $image_path);

    $name = isset($_POST['name'])
        ? $_POST['name']
        : '';

    $keywords = isset($_POST['keywords'])
        ? $_POST['keywords']
        : '';
    $image_path = $path;

    $insert = $stmt->execute();
    //printf("%d row inserted.\n", $stmt->affected_rows);
    $stmt->close();
    $conn->close();

    echo $insert?'ok':'err';
}
?>