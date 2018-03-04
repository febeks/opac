<?php

/*
* Returns a MarcXML record when queried with an bibliographic identifier.
*/
// Z39.50 address, eg. host:port/dbname
$host = 'ipac.kvkli.cz:8887/li_us_cat';

function scan_titles($id, $startterm)
{
    yaz_search($id, "rpn", "@attr 1=4 " . $startterm);
    yaz_wait();
    $errno = yaz_errno($id);
    if ($errno == 0) {
        $ar = yaz_scan_result($id, $options);
        echo 'Scan ok; ';
        foreach ($options as $key => $val) {
            echo "$key = $val &nbsp;";
        }
        echo '<br /><table>';
        while (list($key, list($k, $term, $tcount)) = each($ar)) {
            if (empty($k)) continue;
            echo "<tr><td>$term</td><td>$tcount</td></tr>";
        }
        echo '</table>';
    } else {
        echo "Scan failed. Error: " . yaz_error($id) . "<br />";
    }
}

$maxTries = 5;
for ($try = 1; $try <= $maxTries; $try++) {
    $id = yaz_connect($host);
    yaz_syntax($id, "usmarc");
    yaz_range($id, 1, 1);
    $host_options = array("timeout" => "10");
    yaz_search($id, "rpn", "notebook");
    yaz_wait($host_options);
    $error = yaz_error($id);
    if (empty($error)) {
        // Successful Z39.50 Connection
        $rec = yaz_record($id, 1, 'raw');

    } else {
        // Z39.50 errors
        http_response_code(500);
        $errordoc = new DOMDocument();
        $title = $errordoc->createElement('title');
        $title = $errordoc->appendChild($title);
        $text = $errordoc->createTextNode($error);
        $text = $title->appendChild($text);
        $xml_string = $errordoc->saveXML();
        // Give the backend server a few seconds
        sleep(5);
    }
}
echo $rec;
?>