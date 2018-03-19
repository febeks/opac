<?php

include '../db/connect.php';

if(!empty($_POST['name']) || !empty($_POST['keywords']) || !empty($_FILES['image_path']['name'])) {
    $uploadedFile = '';
    if (!empty($_FILES["image_path"]["type"])) {
        $fileName = time() . '_' . $_FILES['image_path']['name'];
        $valid_extensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["image_path"]["name"]);
        $file_extension = end($temporary);
        if ((($_FILES["hard_file"]["type"] == "image/png") || ($_FILES["image_path"]["type"] == "image/jpg") || ($_FILES["image_path"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)) {
            $sourcePath = $_FILES['image_path']['tmp_name'];
            $targetPath = "img/" . $fileName;
            if (move_uploaded_file($sourcePath, $targetPath)) {
                $uploadedFile = $fileName;
            }
        }
    }


    $stmt = $conn->prepare("INSERT INTO book_cat (name, keywords, image_path) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $keywords, $image_path);

    $name = isset($_POST['name'])
        ? $_POST['name']
        : '';

    $keywords = isset($_POST['keywords'])
        ? $_POST['keywords']
        : '';
    $image_path = $targetPath;

    $insert = $stmt->execute();
    printf("%d row inserted.\n", $stmt->affected_rows);
    $stmt->close();
    $conn->close();

    echo $insert?'ok':'err';
}

?>