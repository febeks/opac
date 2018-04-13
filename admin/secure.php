<?php

$user = $_POST['user'];
$pass = $_POST['pass'];

if($user == "admin" && $pass == "admin1")
{
    include 'header.php';
}
else
{
    include 'index.php';
}
?>