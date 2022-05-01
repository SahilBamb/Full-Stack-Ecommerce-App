<?php

function getGETURL($page) {  
    $_GET['page'] = $page;
    $s = "?";
    $index = 0;
    foreach ($_GET as $key => $value) {
        if ($index==0)
            $s .= $key . "=" . $value;
        else {
            $s .= "&" . $key . "=" . $value;
            
        }
        $index++;
    }
    error_log($s);
    return $s;
}

?>