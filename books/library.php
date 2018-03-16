<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script src="../js/loading_spinner.js"></script>
<link rel="stylesheet" href="../css/search.css">

<div class="se-pre-con"></div>
<?php

include '../db/connect.php';

$search_term = isset($_POST['search_term'])
    ? $_POST['search_term']
    : '';
$query = "@attr 1=4 ".$search_term;
//echo $query;

$library_list = "SELECT * FROM library";
$result = mysqli_query($conn, $library_list);

echo "Hladany vyraz: ".$search_term."<br/><br/>";
while($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $lib_name = $row['lib_name'];
    $ip = $row['ip'];
    $format = $row['format'];
    $db_name = $row['db_name'];
    $port = $row['port'];

    $z = yaz_connect($ip . ":" . $port . "/" . $db_name);
    yaz_syntax($z, 'xml');
    yaz_range($z, 1, 2);
    yaz_search($z, 'rpn', $query);
    yaz_wait();
    $error = yaz_error($z);
    if (!empty($error)) {
        echo "Error: {$error}\n";
    } else {
        $hits = yaz_hits($z);
        echo "<strong>$lib_name $db_name</strong><br/>"." Result count {$hits}\n";
        for ($p = 1; $p <= 1; $p++) {
            $rec = yaz_record($z, $p, "xml");
            if (empty($rec)) {
                break;
            }
            echo "<br/>----- {$p} -----<br/>{$rec}";
        }
    }
    echo "<br/><br/>";
}

?>

<a href="search.php">Nove hladanie</a>
