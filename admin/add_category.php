<?php

include '../db/connect.php';

$stmt = $conn->prepare("INSERT INTO games_category (name) VALUES (?)");
$stmt->bind_param("s", $name);

$name = isset($_POST['name'])
    ? $_POST['name']
    : '';

$stmt->execute();
printf("%d row inserted.\n", $stmt->affected_rows);
$stmt->close();
$conn->close();

?>