<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script src="../js/loading_spinner.js"></script>
<link rel="stylesheet" href="../css/search.css">

<div class="se-pre-con"></div>
<?php

include '../db/connect.php';

function parse_usmarc_string($record){
    $ret = array();
    // there was a case where angle brackets interfered
    $record = str_replace(array("<", ">"), array("",""), $record);
    //$record = utf8_decode($record);
    // split the returned fields at their separation character (newline)
    $record = explode("\n",$record);
    //examine each line for wanted information (see USMARC spec for details)
    foreach($record as $category){
        // subfield indicators are preceded by a $ sign
        $parts = explode("$", $category);
        // remove leading and trailing spaces
        array_walk($parts, "custom_trim");
        // the first value holds the field id,
        // depending on the desired info a certain subfield value is retrieved
        switch(substr($parts[0],0,3)){
            case "008" : $ret["language"] = substr($parts[0],39,3); break;
            case "010" : $ret["isbn"] = get_subfield_value($parts,"a"); break;
            case "200" : $ret["author"] = get_subfield_value($parts,"f");
            case "200" : $ret["title"] = get_subfield_value($parts,"a");
            case "200" : $ret["subtitle"] = get_subfield_value($parts,"e"); break;
            case "210" : $ret["pub_date"] = get_subfield_value($parts,"d");
                         $ret["pub_place"] = get_subfield_value($parts,"a");
                         $ret["publisher"] = get_subfield_value($parts,"c"); break;
            case "333" : $ret["note"] = get_subfield_value($parts,"a"); break;
        }
    }
    return $ret;
}

// fetches the value of a certain subfield given its label
function get_subfield_value($parts, $subfield_label){
    $ret = "";
    foreach ($parts as $subfield)
        if(substr($subfield,0,1) == $subfield_label)
            $ret = substr($subfield,2);
    return $ret;
}

// wrapper function for trim to pass it to array_walk
function custom_trim($value, $key){
    $value = trim($value);
}


function search($conn, $selected_library, $keywords)
{
    $library = "SELECT * FROM library WHERE id=$selected_library";
    $result = mysqli_query($conn, $library);

    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $lib_name = $row['lib_name'];
        $ip = $row['ip'];
        $format = $row['format'];
        $db_name = $row['db_name'];
        $port = $row['port'];
    }
    //var_dump($lib_name);
    $z = yaz_connect($ip.":".$port."/".$db_name);
    if (yaz_error($z) != ""){
        die("Error: " . yaz_error($z));
    }
    yaz_syntax($z, $format);
    $keyword = explode(",", $keywords);
    $size = count($keyword);
    for ($i = 0; $i < $size; $i++) {
        $fields = array("ayw" => "1=1035",//anywhere
                        "any" => "1=1016"
        );
        yaz_ccl_conf($z, $fields);
        $ccl_query = "(ayw = ".$keyword[$i].") and ((ayw = deti) or (ayw = mladez) or (ayw = riekanky) or (ayw = basnicky) or (ayw = basnicky pre najmensich) or (ayw = leporela))";

        if (!yaz_ccl_parse($z, $ccl_query, $ccl_result)) {
            die("Chyba. Neboli najdene ziadne vysledky.");
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
                //echo "<div class='row'></div>Pocet najdenych knih pre keyword <strong>".$keyword[$i]."</strong>: {$hits}<br/><br/>";
                for ($p = 1; $p <= 20; $p++) {
                    $rec = yaz_record($z, $p, "string");
                    if (empty($rec)) {
                        break;
                    }

                    $parsedRec = parse_usmarc_string($rec);

                    if (empty($parsedRec['isbn'])) {
                        continue;
                    }

                    $isbn = trim($parsedRec['isbn']);
                    $title = $parsedRec['title'];
                    $author = $parsedRec['author'];
                    //date_default_timezone_set('Slovakia/Bratislava');
                    //$datestamp = date('d/m/Y h:i:s a', time());

                    if (empty($subtitle)) {
                        $subtitle = "";
                    } else {
                        $subtitle = " : " . $parsedRec['subtitle'];
                    }
                    $trim_title = (strlen($title) > 20) ? substr($title,0,20).'...' : $title;
                    //$trim_author = substr($author,0,25).'...';
                    $isbn = preg_replace('/[^\\d-]+/', '', $isbn);
                    $url = 'http://cache.obalkyknih.cz/api/cover?multi={"isbn":"' . $isbn . '"}&type=medium&keywords=' . str_replace(' ', '%20', $keyword[$i]);
                    //var_dump($url);
                    list($width, $height) = getimagesize($url);
                    if ($width == 1 && $height == 1) {
                        continue;
                        //echo "<img src='../images/book_cover.png' alt='' class='obalka img-responsive' />";
                    } else {
                        echo "<div class='col-xs-12 col-sm-6 col-md-3 kniha' align='center'>";
                        echo "<img src='../images/mini_sova.png' alt=''/> <strong>" . $trim_title ."</strong><br/>";
                        echo "<img src=$url alt='' class='obalka img-responsive'/>";
                    }

                    echo "</div>";
                }
            }
           // echo "<br/><br/>";
        }//koniec else
    }
    yaz_close($z);
}

?>

