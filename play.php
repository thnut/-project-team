<?php
require 'gd.php';

mysql_connect('localhost', 'root', '');
mysql_select_db('final_project');
mysql_query('SET NAMES UTF8');



function way($id) {
    $sql = "SELECT * FROM `cost` WHERE `startstation_id` =" . $id;
    $result = mysql_query($sql);

    $way = array();
    while ($row = mysql_fetch_array($result)) {
        $key = "S".$row['endstation_id'];
        $value = $row['distance'];
        $way[$key] = $value;
    }
    return $way;
}

$sql = "SELECT * FROM `cost`";
$result = mysql_query($sql);
$point = array();
while ($row = mysql_fetch_array($result)) {
    $key = "S".$row['startstation_id'];
    $value = way($row['startstation_id']);
    $graph->add_vertex( $key, way($row['startstation_id']) );

    $point[$key] = $value;
//    echo $key.','.$value;

//    echo '<pre>';
//    print_r($value);
//    echo '</pre>';
}

$graph = array(
  'A' => array('B', 'F'),
  'B' => array('A', 'D', 'E'),
  'C' => array('F'),
  'D' => array('B', 'E'),
  'E' => array('B', 'D', 'F'),
  'F' => array('A', 'E', 'C'),
);

$g = new Graph($point);

// least number of hops between D and C
$g->breadthFirstSearch('1', '12');