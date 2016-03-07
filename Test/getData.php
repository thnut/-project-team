<?php

    mysql_connect('localhost', 'root', '');
    mysql_select_db('final_project');
    mysql_query('SET NAMES UTF8');

    $b_id = $_GET['b_id'];
    $todo = $_GET['todo'];

    if($todo == "sBus"){
        $query = "SELECT * FROM descriptions WHERE Id = $b_id";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
             echo "" . $row['d_tion'] . "";
        }
    }

    if($todo == "sVan"){
        // echo "string ".$b_id;
        $sql = "SELECT * FROM descriptionvan WHERE Id = $b_id";
        $result = mysql_query($sql);
        while ($row = mysql_fetch_array($result)) {
            echo "" . $row['v_tion'] . "";
        }
    }
    
?>