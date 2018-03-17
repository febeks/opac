<?php

include '../db/connect.php';

$library_list = "SELECT * FROM library";
$result = mysqli_query($conn, $library_list);

?>

<form class="form-horizontal" action="library.php" method="post">

    <div class="form-group">
        <label class="control-label col-sm-3" for="search_term">Zadaj hladany vyraz:</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="search_term" placeholder="Hladany vyraz">
        </div>
    </div>

    <div class="control-label">Vyhladat v kniznici:</div>

<?php

while($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $lib_name = $row['lib_name'];
    $ip = $row['ip'];
    $format = $row['format'];
    $db_name = $row['db_name'];
    $port = $row['port'];

    ?>

    <div class="form-group">
        <div class="col-sm-3">
            <label>
                <input type="checkbox"  name="selected_libs[]" value="<?php echo $id; ?>">
                <?php echo $lib_name.$id; ?>
            </label>
        </div>
    </div>
<?php
    }
?>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-10">
            <button type="submit" class="btn btn-success">Hladat</button>
        </div>
    </div>
</form>

