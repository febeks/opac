<?php

include '../db/connect.php';

$id = $_POST['id'];
$query = "DELETE FROM book_filter WHERE id =".$id;

if(mysqli_query($conn, $query)){
    echo "ok";
}else{
    echo "error";
}
?>