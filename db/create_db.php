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

$drop = "DROP TABLE IF EXISTS location, book_filter, video_category, videos, games_category, game, book_cat, books, library, video_channels, users, visit, type";


$table1 =  "CREATE TABLE users (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            browser VARCHAR(50) NOT NULL,
            system VARCHAR(50) NOT NULL,
            time DATETIME NOT NULL,
            visit_id INT UNSIGNED,
            FOREIGN KEY (visit_id) REFERENCES visit(id)
            )";

$table2 = "CREATE TABLE visit (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            city VARCHAR(100),
            type_id INT UNSIGNED,
            FOREIGN KEY (type_id) REFERENCES type(id)
          )";

$table3 = "CREATE TABLE type(
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            game_id INT,
            library_id INT UNSIGNED,
            video_id INT UNSIGNED,
            book_cat_id INT UNSIGNED,
            book_id INT UNSIGNED,
            channel_id INT UNSIGNED,
            FOREIGN KEY (game_id) REFERENCES game(game_id),
            FOREIGN KEY (library_id) REFERENCES library(id),
            FOREIGN KEY (video_id) REFERENCES videos(id),
            FOREIGN KEY (book_cat_id) REFERENCES book_cat(id),
            FOREIGN KEY (book_id) REFERENCES books(id),
            FOREIGN KEY (channel_id) REFERENCES video_channels(id)
            )";

$table4 = "CREATE TABLE location(
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            latitude VARCHAR(50),
            longitude VARCHAR(50)
)";

$table5 = "CREATE TABLE books( 
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255),
            isbn VARCHAR(255),
            category_id INT UNSIGNED,
            FOREIGN KEY (category_id) REFERENCES book_cat(id)
          )";


$table6 =  "CREATE TABLE video_category (
            id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            image_path VARCHAR (300) NOT NULL
            )";

$table7 =  "CREATE TABLE games_category (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL
            )";

$table8 =  "CREATE TABLE videos (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            ytb_id VARCHAR(100) NOT NULL,
            category INT(3) NOT NULL
            )";

$table9 =  "CREATE TABLE game (
            name VARCHAR(50) NOT NULL,
            game_id INT PRIMARY KEY ,
            big_icon_path VARCHAR(100) NOT NULL,
            height INT,
            width INT,
            embed VARCHAR(600)
            )";

$table10 =  "CREATE TABLE book_cat (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            keywords VARCHAR(300) NOT NULL,
            image_path VARCHAR(300) NOT NULL
            )";

$table11 = "CREATE TABLE book_filter (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            filter_name VARCHAR(50) NOT NULL
            
            )";

$table12 = "CREATE TABLE library (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            lib_name VARCHAR(200) NOT NULL,
            ip VARCHAR(100) NOT NULL,
            format VARCHAR(50) NOT NULL,
            db_name VARCHAR(100) NOT NULL,
            port INT NOT NULL,
            location_id INT UNSIGNED,
            FOREIGN KEY (location_id) REFERENCES location(id)
            )";

$table13 =  "CREATE TABLE video_channels (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            ytb_id VARCHAR(200) ,
            video_title VARCHAR(200),
            banner_path VARCHAR(300) NOT NULL
            )";

$tables = [$drop, $table4, $table10, $table11, $table6, $table7, $table8, $table9, $table13, $table12, $table5, $table3, $table2, $table1];
//$tables = [$table4];
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