<?php
$servername = "localhost";
$username = "detsky_opac";
$password = "opac,cap0";
$dbname = "detsky_opac";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>