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

$z = yaz_connect(...
    yaz_syntax($z, 'opac');
yaz_search($z, 'rpn', '@attr 1=4 "title%"');
yaz_wait();
$hits = yaz_hits($z);
yaz_range($z, 1, $hits);
yaz_present($z);
for($i = 1; $i <= $hits; $i++)
    my_display(yaz_record($z, $i, 'opac'));
yaz_close($z);

function my_display($s)
{
    $lines = explode("\n", trim($s));
    var_dump($lines);
$xml_string;
    $maxTries = 1;
    for ($try = 1; $try <= $maxTries; $try++) {
        $id = yaz_connect($host);
        yaz_syntax($id, "opac");
        yaz_range($id, 1, 1);

        scan_titles($id, "notebook");

    }

?>