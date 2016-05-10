<?php

class Dijkstra {

  protected $graph;

  public function __construct($graph) {
    $this->graph = $graph;
  }

  public function shortestPath($source, $target) {
    // array of best estimates of shortest path to each
    // vertex
    $d = array();
    // array of predecessors for each vertex
    $pi = array();
    // queue of all unoptimized vertices
    $Q = new SplPriorityQueue();

    foreach ($this->graph as $v => $adj) {
      $d[$v] = INF; // set initial distance to "infinity"
      $pi[$v] = null; // no known predecessors yet
      foreach ($adj as $w => $cost) {
        // use the edge cost as the priority
        //                echo 'w:'.$w.', cost:'.$cost.'</br>';
        $Q->insert($w, $cost);
      }
    }

    // initial distance at source is 0
    $d[$source] = 0;

    while (!$Q->isEmpty()) {
      // extract min cost
      $u = $Q->extract();

      if (!empty($this->graph[$u])) {
        // "relax" each adjacent vertex
        foreach ($this->graph[$u] as $v => $cost) {
          // alternate route length to adjacent neighbor
          $alt = $d[$u] + $cost;

          // if alternate route is shorter
          //                    echo $cost.'</br>';
          //                    echo $alt.'<'.$d[$v];
          //                    echo $alt < $d[$v] ? ':yes' : ':no';
          //                    echo '</br>';
          if ($alt < $d[$v]) {
            $d[$v] = $alt; // update minimum length to vertex
            $pi[$v] = $u;  // add neighbor to predecessors
            //  for vertex
          }
        }
      }
    }

    // we can now find the shortest path using reverse
    // iteration
    $S = new SplStack(); // shortest path with a stack
    $u = $target;
    $dist = 0;
    // traverse from target to source
    //        echo $u.":".$pi[$u]."</br>";
    while (isset($pi[$u]) && $pi[$u]) {
      //            echo $u."</br>";
      $S->push($u);
      $u = $pi[$u];
      //            echo $u."</br>";
    }

    // stack will be empty if there is no route back
    if ($S->isEmpty()) {
      //            echo "No route from $source to $target";
      return NULL;
    } else {
      // add the source node and print the path in reverse
      // (LIFO) order
      $S->push($source);
      //            echo "$dist:";
      $sep = '';
      $aws = array();
      foreach ($S as $v) {
        array_push($aws, getStation($v));
      }
      //            echo '<pre>';
      //                print_r($aws);
      //            echo '</pre>';

      return $aws;
    }
  }

}

mysql_connect('localhost', 'root', '');
mysql_select_db('final_project');
mysql_query('SET NAMES UTF8');

function way($id) {
  $sql = "SELECT * FROM `waypoints` WHERE `startstation_id` =" . $id;
  $result = mysql_query($sql);

  $way = array();
  while ($row = mysql_fetch_array($result)) {
    $key = $row['endstation_id'];
    $value = $row['distance'];
    $way[$key] = $value;
    //$way[] = $key;
    //        array_push($way, $key);
  }
  return $way;
}

function getStation($id) {
  $sql = "SELECT * FROM `station` WHERE `station_id` =" . $id;
  $result = mysql_query($sql);
  $result_sta = array();
  while ($row = mysql_fetch_array($result)) {
    $result_sta = $row;
  }
  return $result_sta;
}

function GetWP($str, $end)
{
  $sql = "SELECT * FROM `waypoints` WHERE `startstation_id` = ". $str ." AND `endstation_id` = ". $end;
  $result = mysql_query($sql);
  $waypoint = array();
  while ($row = mysql_fetch_array($result)) {
    $waypoint = $row;
  }
  return $waypoint;
}


// ----------- main program --------------------
$allway =array();
$sql = "SELECT * FROM `waypoints`";
$result = mysql_query($sql);

$point = array();
while ($row = mysql_fetch_array($result)) {
  $key = $row['startstation_id'];
  $value = way($row['startstation_id']);

  $point[$key] = $value;
}


// หาระยะทาง
$graph = new Dijkstra($point);
$waypath = $graph->shortestPath($_GET['start'], $_GET['end']);

// ดึงข้อมูล waypoint มาแสดง
$detail = array();
for ($i=0; $i < sizeof($waypath)-1; $i++) {
  $detail[] = GetWP($waypath[$i][0], $waypath[$i+1][0]);
}

// แพ็กข้อมูล 1 เส้นทาง
$result_ = array(
  'step'  => $waypath,
  'detail'=> $detail
);

$allway[] = $result_;

///////////////////////// $Z จำนวนเส้นทางที่ปรากฏ บนแผนที่
for ($Z=0; $Z < 2; $Z++) {
  //ลบ waypoint ที่ใช้แล้ว
  for ($i=0; $i < count($waypath); $i++) {
      if(empty($waypath[$i+1])){
        break;
      }else {
        // print_r($waypath[$i+1]);
        $strt = $waypath[$i][0];
        $des = $waypath[$i+1][0];
        unset($point[$strt][$des]); //ลบข้อมูลใน $row ที่ index = [$strt][$des]
      }
  }

  // หาระยะทาง
  $graph = new Dijkstra($point);
  $waypath = $graph->shortestPath($_GET['start'], $_GET['end']);

  // ดึงข้อมูล waypoint มาแสดง
  $detail = array();
  for ($i=0; $i < sizeof($waypath)-1; $i++) {
    if(empty($waypath[$i+1])){
      break;
    }else {
      $detail[] = GetWP($waypath[$i][0], $waypath[$i+1][0]);
    }
  }

  // แพ็กข้อมูล 1 เส้นทาง 3
  $result_ = array(
    'step'  => $waypath,
    'detail'=> $detail
  );

  $allway[] = $result_;
  // รวมข้อมูลทุกเส้นทางที่หาได้
}

// แสดงผล
echo json_encode($allway);
