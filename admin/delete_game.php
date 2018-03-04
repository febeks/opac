<?php

include '../db/connect.php';

$id = $_POST['id'];
$query = "DELETE FROM game WHERE id =".$id;

mysqli_query($conn, $query);

echo 1;

?>