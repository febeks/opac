<?php

//$ch = curl_init("http://cache.obalkyknih.cz/api/books/?multi=[{%22isbn%22:%229783795432645%22}]");
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://cache.obalkyknih.cz/api/books/?multi=[{%22isbn%22:%229783795432645%22}]");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$out = curl_exec ($ch);

echo '<pre>';
print_r(json_decode($out));
echo '</pre>';

curl_close ($ch);