<?php

include '../db/connect.php';

$id = $_POST['id'];
$query = "DELETE FROM games_category WHERE id =".$id;

if(mysqli_query($conn, $query)){
    echo "ok";
}else{
    echo "error";
}
?>