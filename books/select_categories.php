<?php
include "../db/connect.php";
include "library.php";
require '../nusoap.php';

$library_list = "SELECT * FROM library";
$result = mysqli_query($conn, $library_list);


if(isset($_GET['cat_id'])){

    $selected_library = $_GET['sel_lib'];
    $id = $_GET['cat_id'];
    $cat = "SELECT * FROM book_cat WHERE id=$id";
    $result = mysqli_query($conn, $cat);
    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $keywords = $row['keywords'];

    echo"
    <div class='panel panel-success'>
        <div class='panel-heading'>Kategoria : $name</div>
        <div class='panel-body'>
             <div class='col-xs-12 col-sm-12 col-md-12' align='center'>
             ";
                search($conn, $selected_library, $keywords);
            echo"</div></div></div>";

}else if(isset($_GET['sel_lib'])){
        $selected_library = $_GET['sel_lib'];
                     ?>

                    <div class="panel panel-success">
                        <div class='panel-heading'>Kategorie knih [<a href="index.php"> Hladat v inej kniznici </a>]</div>
                        <div class='panel-body'>
                            <div class='col-xs-12 col-sm-12 col-md-12' align="center">
                                <?php
                                $cat = "SELECT * FROM book_cat";
                                $result = mysqli_query($conn, $cat);
                                $counter = 0;

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $counter++;

                                    $cat_id = $row['id'];
                                    $name = $row['name'];
                                    $keywords = $row['keywords'];
                                    $image_path = $row['image_path'];

                                    echo "<div class='col-xs-12 col-sm-6 col-md-3'>
                                    <a href='index.php?sel_lib=$selected_library&cat_id=$cat_id'>
                                        <img src='../admin/" . $image_path . "' class='img-responsive' alt=''/>
                                    </a></div>";
                                }
                                echo "</div></div></div>";
}else{
    $latitude = $_COOKIE["latitude"];
    $longitude = $_COOKIE["longitude"];
    $distance = NULL;
    $closestLibId = NULL;  //closest library to users location

    while($row = mysqli_fetch_assoc($result)) {
        $location_id = $row['location_id'];
        if($location_id == NULL){
            $latitudeTo = '48.377701';
            $longitudeTo = '17.592521';
        }else {
            $location_list = "SELECT * FROM location WHERE id = $location_id";
            $result2 = mysqli_query($conn, $location_list);
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $latitudeTo = $row2['latitude'];
                $longitudeTo = $row2['longitude'];
            }
        }
        $client = new nusoap_client('http://labss2.fiit.stuba.sk/pis/ws/GeoServices/Locations?WSDL', 'wsdl');
        $client->soap_defencoding = 'UTF-8';
        $err    = $client->getError();

        if ($err)
        {
            client_debug_error_message('Constructor error', $err, $client);
            exit;
        }
        $response = $client->call(
            'distanceByGPS',
            array(
                'latitudeFrom' => $latitude,
                'longitudeFrom' => $longitude,
                'latitudeTo' => $latitudeTo,
                'longitudeTo' => $longitudeTo
            )
        );

        $newDistance = round($response['distance'] / 1000, 2);
        if($distance == NULL && $closestLibId == NULL || $newDistance < $distance){
            $distance = $newDistance;
            $closestLibId = $row['id'];
        }
        //echo $closestLibId;
        //var_dump($response);
    }
    if($closestLibId != NULL){
        ?>
            <script>
                var library = "<?php echo $closestLibId; ?>";
                window.location.href = "index.php?sel_lib=" + library;
            </script>
        <?php
    }

    ?>

    <div class="panel panel-success">
        <div class='panel-heading'>Vyber kniznice</div>
        <div class='panel-body'>
            <div class='col-xs-12 col-sm-12 col-md-12' align="center">

                <form>
                <div class='form-group'>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <label for='vyber_kniznice'>Vyber kniznicu, v ktorej chces vyhladavat:</label>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                            <select class="form-control" id="selected_libraryy" onchange="setLibrary()">
                                <option selected disabled>Vybrat jednu z moznosti</option>
                                <?php

                                    while($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id'];
                                        $lib_name = $row['lib_name'];
                                        $ip = $row['ip'];
                                        $format = $row['format'];
                                        $db_name = $row['db_name'];
                                        $port = $row['port'];
                                        echo "<option value='".$id."'>$lib_name</option>";
                                    }
                                    ?>
                            </select>
                        <script>
                            var library;
                            function setLibrary(){
                                library = document.getElementById('selected_libraryy').value;
                                window.location.href = "index.php?sel_lib=" + library;
                            }
                        </script>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>

