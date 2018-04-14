<?php
include 'connect.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

$errors = [];

$drop = "DROP TABLE IF EXISTS users, video, game, book, video_category, games_category";

$table1 =  "CREATE TABLE users (
            id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL,
            password VARCHAR(30) NOT NULL
            )";

$table2 =  "CREATE TABLE video_category (
            id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL
            )";

$table3 =  "CREATE TABLE games_category (
            id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL
            )";

$table4 =  "CREATE TABLE video (
            id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(50) NOT NULL,
            author VARCHAR(50) NOT NULL,
            published DATE NOT NULL,
            link VARCHAR(200) NOT NULL,
            category_id INT(3) UNSIGNED,
            FOREIGN KEY (category_id) REFERENCES video_category(id)
            )";

$table5 =  "CREATE TABLE game (
            name VARCHAR(50) NOT NULL,
            game_id INT(5) NOT NULL,
            big_icon_path VARCHAR(100) NOT NULL,
            height INT(3),
            width INT(3),
            embed VARCHAR(600),
            PRIMARY KEY (game_id)
            )";

$table6 =  "CREATE TABLE book_cat (
            id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            keywords VARCHAR(300) NOT NULL,
            image_path VARCHAR(300) NOT NULL
            )";

$table7 = "CREATE TABLE book_filter (
            id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            filter_name VARCHAR(50) NOT NULL
            
            )";

$table8 = "CREATE TABLE library (
            id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            lib_name VARCHAR(200) NOT NULL,
            ip VARCHAR(100) NOT NULL,
            format VARCHAR(50) NOT NULL,
            db_name VARCHAR(100) NOT NULL,
            port INT(4) NOT NULL 
            )";

//$tables = [$drop, $table1, $table2, $table3, $table4, $table5, $table6];
$tables = [$table7];
foreach ($tables as $k => $sql){
    $query = @$conn->query($sql);
    if(!$query)
        $errors[] = "Table $k : Creation failed ($conn->error)";
    else
        $errors[] = "Table $k : Creation done";
}

foreach ($errors as $msg){
    echo "$msg <br>";
}

$conn->close();

?>