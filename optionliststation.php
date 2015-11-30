<?php

include_once ('./Connections/project.php');

function  loadstation (){
    $db = new dbconnect();
    $data = array();
    $sql = "SELECT * FROM bus";
    $qry = mysql_query($sql) or die( $db->showError('',__FILE__,__LINE__));
    while ($row = mysql_fetch_assoc($qry)){
        $data[] = $row;
    }
    $json = array(
        'list' => $data
    );
    echo json_encode($json);
    
}