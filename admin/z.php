<?php


function scan_titles($id, $startterm)
{
    yaz_scan($id, "rpn", "@attr 1=4 " . $startterm);
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

$a = yaz_connect("ipac.kvkli.cz[:8887][/li_us_cat]");
$b = yaz_connect("svk7.svkkl.cz[:8887][/kl_us_cat]");
yaz_wait();

scan_titles($a, "okno");


?>