<?php

include '../db/connect.php';

$library_list = "SELECT * FROM library";
$result = mysqli_query($conn, $library_list);

while($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $lib_name = $row['lib_name'];
    $ip = $row['ip'];
    $format = $row['format'];
    $db_name = $row['db_name'];
    $port = $row['port'];

    $z = yaz_connect($ip . ":" . $port . "/" . $db_name);
    yaz_range($z, 1, 2);
    yaz_search($z, "rpn", "medved");
    yaz_wait();
    $error = yaz_error($z);
    if (!empty($error)) {
        echo "Error: {$error}\n";
    } else {
        $hits = yaz_hits($z);
        echo "<strong>$lib_name $db_name</strong><br/>"." Result count {$hits}\n";
        for ($p = 1; $p <= 2; $p++) {
            $rec = yaz_record($z, $p, "string");
            if (empty($rec)) {
                break;
            }
            echo "----- {$p} -----\n{$rec}";
        }
    }
    echo "<br/><br/>";
}

?>