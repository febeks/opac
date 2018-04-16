<?php
//include_once connect.php;
$servername = "localhost";
$username = "opac";
$password = "adminadmin";
$dbname = "opac";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

$errors = [];

$drop = "DROP TABLE IF EXISTS users, videos, game, book, video_category, games_category";

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

$table4 =  "CREATE TABLE videos (
            id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(50) NOT NULL,
            author VARCHAR(50) NOT NULL,
            published DATE NOT NULL,
            link VARCHAR(200) NOT NULL,
            category_id INT(3) UNSIGNED,
            FOREIGN KEY (category_id) REFERENCES video_category(id)
            )";

$table5 =  "CREATE TABLE game (
            id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            short_name VARCHAR(30) NOT NULL,
            name VARCHAR(50) NOT NULL,
            game_id INT(5) NOT NULL,
            url_key VARCHAR(100) NOT NULL,
            big_icon VARCHAR(100) NOT NULL,
            small_icon VARCHAR(100) NOT NULL,
            mini_icon VARCHAR(100) NOT NULL,
            category_id INT(3) UNSIGNED,
            FOREIGN KEY (category_id) REFERENCES games_category(id)
            )";

$table6 =  "CREATE TABLE book (
            id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(50) NOT NULL,
            author VARCHAR(20) NOT NULL,
            cover_path VARCHAR(260) NOT NULL,
            pages INT(5),
            location VARCHAR(50)
            )";

$tables = [$drop, $table1, $table2, $table3, $table4, $table5, $table6];

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