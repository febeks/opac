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

$search_term = isset($_POST['search_term'])
    ? $_POST['search_term']
    : '';

//list of selected libraries from checkbox at search

if(empty($selected_libraries = $_POST['selected_libs'])){
    echo "Nevybral si ziadnu kniznicu na vyhladavanie :(";
}else{
    $num_of_libs = count($selected_libraries);
    //echo $num_of_libs;

    for($i=0; $i < $num_of_libs; $i++){
        //echo $selected_libraries[$i];
        $library = "SELECT * FROM library WHERE id=$selected_libraries[$i]";
        $result = mysqli_query($conn, $library);

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
            "kw" => "1=21",//keywords
            "auth" => "1=1004"
        );
        yaz_ccl_conf($z, $fields);
        $ccl_query = "kw = " . $search_term;

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
                for ($p = 1; $p <= 20; $p++) {
                    $rec = yaz_record($z, $p, "string");
                    if (empty($rec)) {
                        break;
                    }

                    $parsedRec = parse_usmarc_string($rec);

                    if(empty($parsedRec['isbn'])){
                        continue;
                    }

                    $isbn = $parsedRec['isbn'];
                    $title = $parsedRec['title'];
                    $author = $parsedRec['author'];

                    if(empty($subtitle)){
                        $subtitle="";
                    }else{
                        $subtitle = " : ".$parsedRec['subtitle'];
                    }

                    echo "<br/>----- {$p} -----<br/><br/>";
                    echo "<strong>".$title.$subtitle."</strong><br/>";
                    echo $author."<br/>";
                    echo $isbn."<br/>";

                    $url ='http://cache.obalkyknih.cz/api/cover?multi={"isbn":"'.$isbn.'"}&type=medium&keywords='.$search_term;
                    echo "<img src=$url onerror=\"this.onerror=null;this.src='../images/book_cover.png';\" alt='' class='obalka'/>";
                    //print_r($parsedRec);
                }
            }
            echo "<br/><br/>";
        }

    }//koniec for cyklu
}//koniec if else

?>

<a href="./search.php">Nove hladanie</a>
