<?php
    include '../db/connect.php';
?>

<div class="panel panel-danger">
    <div class='panel-heading'>Video kategorie</div>
    <div class='panel-body'>
        <div class='col-xs-12 col-sm-12 col-md-12' align="center">
            <?php
            $cat = "SELECT * FROM video_category";
            $result = mysqli_query($conn, $cat);
            $counter = 0;

            while ($row = mysqli_fetch_assoc($result)) {
                $counter++;

                $cat_id = $row['id'];
                $name = $row['name'];
                $image_path = $row['image_path'];

                echo "<div class='col-xs-12 col-sm-6 col-md-3 bunka' >
                <a href='index.php?category=$cat_id'>
                    <strong>$name</strong>
                    <img src='../admin/" . $image_path . "' class='img-responsive vcat' alt=''/>
                </a></div>";
            }
            echo "</div></div></div>";