<?php 
    $host = "localhost";
    $user = "jw040416";
    $pw = "rlawjddmsvhrvk04#";
    $db = "jw040416";

    $connect = new mysqli($host, $user, $pw, $db);
    $connect -> set_charset("utf8");

    if($connect -> connect_error){
        echo "connect falied" . $connect -> connect_error;
    }
?>