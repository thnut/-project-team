<?php

mysql_connect('localhost', 'root', '');
mysql_select_db('final_project');
mysql_query('SET NAMES UTF8');

class PriorityQueue extends SplPriorityQueue {

    public function compare($priority1, $priority2) {
        if ($priority1 === $priority2)
            return 0;
        return $priority1 < $priority2 ? 1 : -1;
    }

}

class Graph {

    private $verticies;

    function __construct() {
        $this->verticies = array();
    }

    public function add_vertex($name, $edges) {
        $this->verticies[$name] = $edges;
    }

    public function shortest_path($start, $finish) {
        $distances = array();
        $previous = array();
        $nodes = new PriorityQueue();
        foreach ($this->verticies AS $vertex => $value) {
            if ($vertex === $start) {
                $distances[$vertex] = 0;
                $nodes->insert($vertex, 0);
            } else {
                $distances[$vertex] = PHP_INT_MAX;
                $nodes->insert($vertex, PHP_INT_MAX);
            }
            $previous[$vertex] = null;
        }
        $nodes->top();
        while ($nodes->valid()) {
            $smallest = $nodes->current();
            if ($smallest === $finish) {
                $path = array();
                while ($previous[$smallest]) {
                    $path[] = $smallest;
                    $smallest = $previous[$smallest];
                }
                $path[] = $start;
                return array_reverse($path);
            }
            if ($smallest === null || $distances[$smallest] === PHP_INT_MAX) {
                break;
            }
            foreach ($this->verticies[$smallest] AS $neighbor => $value) {
                $alt = $distances[$smallest] + $this->verticies[$smallest][$neighbor];
                if ($alt < $distances[$neighbor]) {
                    $distances[$neighbor] = $alt;
                    $previous[$neighbor] = $smallest;
                    $nodes->insert($neighbor, $alt);
                }
            }
            $nodes->next();
        }
        return $distances;
    }

    public function __toString() {
        return print_r($this->verticies, true);
    }

}

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

//function getStation($id) {
//    $sql = "SELECT * FROM `station` WHERE `station_id` = $id";
//    $result = mysql_query($sql);
//    while ($row = mysql_fetch_array($result)) {
//        $key = $row['endstation_id'];
//        return ;
//    }
//}

$graph = new Graph();
//$graph->add_vertex( 1, array( 2 => 7, 3 => 8 ) );
//$graph->add_vertex( 2, array( 1 => 7, 6 => 2 ) );
//$graph->add_vertex( 3, array( 2 => 8, 6 => 6, 7 => 4 ) );
//$graph->add_vertex( 4, array( 6 => 8 ) );
//$graph->add_vertex( 5, array( 8 => 1 ) );
//$graph->add_vertex( 6, array( 2 => 2, 3 => 6, 4 => 8, 7 => 9, 8 => 3 ) );
//$graph->add_vertex( 7, array( 3 => 4, 6 => 9 ) );
//$graph->add_vertex( 8, array( 5 => 1, 6 => 3 ) );

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


echo '<pre>';
print_r($graph->shortest_path('S1', 'S2'));
//print_r($point);
echo '</pre>';


