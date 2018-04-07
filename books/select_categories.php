<?php
include "../db/connect.php";
include "library.php";

if(isset($_GET['cat_id'])){

    $id = $_GET['cat_id'];
    $cat = "SELECT * FROM book_cat WHERE id=$id";
    $result = mysqli_query($conn, $cat);
    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $keywords = $row['keywords'];
    $keyword = explode(",",$keywords);
    $size = count($keyword);

    echo"
    <div class='panel-heading'>Kategoria : $name</div>
                <div class='panel-body'>
                        <div class='container'>
                            <div class='row'>
                                <div id='embed'>";
                                        search($conn, $keywords);
                            echo"</div>
                            </div>
                        </div>
                </div>
        ";
}else{

    ?>
    <div class='panel-heading'>Kategorie knih</div>
    <div class='panel-body'>
        <div class='col-md-12'>
    <?php
    $cat = "SELECT * FROM book_cat";
    $result = mysqli_query($conn, $cat);
    $counter=0;

    while($row = mysqli_fetch_assoc($result)) {
        $counter++;

        $cat_id = $row['id'];
        $name = $row['name'];
        $keywords = $row['keywords'];
        $image_path = $row['image_path'];

        echo "
                        <div class='col-xs-3'>
                            
                                    <a href='index.php?cat_id=$cat_id'>
                                        <img src='../admin/".$image_path."' class='img-responsive icon border-icon' alt=''/>
                                    </a>
                          
                        </div>
                    ";
    }
}
?>