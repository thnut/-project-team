<?php

    mysql_connect('localhost', 'root', '');
    mysql_select_db('final_project');
    mysql_query('SET NAMES UTF8');

    $id = $_GET['id'];

        $query = "SELECT * FROM tbl_car WHERE id = $id";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
             echo "" . $row['desc'] . "";
        }
    
?>