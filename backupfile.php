echo "Hladany vyraz: " . $search_term . "<br/><br/>";
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$lib_name = $row['lib_name'];
$ip = $row['ip'];
$format = $row['format'];
$db_name = $row['db_name'];
$port = $row['port'];

$z = yaz_connect($ip . ":" . $port . "/" . $db_name);
yaz_syntax($z, $format);

$fields = array("tit" => "1=4",
"isbn" => "1=7",
"year" => "1=31",
"auth" => "1=1004"
);
yaz_ccl_conf($z, $fields);
$ccl_query = "tit = " . $search_term;
yaz_range($z, 1, 2);
if (!yaz_ccl_parse($z, $ccl_query, $ccl_result)) {
die("The query could not be parsed.");
} else {
// fetch RPN result from the parser
$rpn = $ccl_result["rpn"];
yaz_search($z, 'rpn', $rpn);
yaz_wait();
$error = yaz_error($z);
if (!empty($error)) {
echo "Error: {$error}\n";
} else {
$hits = yaz_hits($z);
echo "<strong>$lib_name $db_name</strong><br/>" . " Result count {$hits}\n";
for ($p = 1; $p <= 1; $p++) {
$rec = yaz_record($z, $p, "string");
if (empty($rec)) {
break;
}
echo "<br/>----- {$p} -----<br/>{$rec}<br/><br/>";
$parsedRec = parse_usmarc_string($rec);
print_r($parsedRec);
}
}
echo "<br/><br/>";
}