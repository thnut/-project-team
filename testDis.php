<?php
    mysql_connect('localhost', 'root', '');
    mysql_select_db('final_project');
    mysql_query('SET NAMES UTF8');
                
                function getStation($id){
                    $sql = "SELECT * FROM `station` WHERE `station_id` =".$id;
                    $result = mysql_query($sql);
                    $result_sta = array();
                    while ($row = mysql_fetch_array($result)) {
                        $result_sta = $row;
                    }
                    return $result_sta;
                }
                
                
                function chack($n) {
                     $way = array();
                     $sql = "select * from cost where startstation_id=".$n;
                     $result = mysql_query($sql);
                     if( $result != null){
                         
                         while ($row = mysql_fetch_array($result)) {
                                $result_way = array(
                                        'start' => getStation($row["startstation_id"]),
                                        'end' => getStation($row["endstation_id"]),
                                        'distance' => $row["distance"]
                                    );

                                if(empty($way)){
                                    $way = $result_way;
                                }

                                if($way > $row["distance"]){
                                    $way = $result_way;
                                }
                            }
                        return $way;
                     }  else {
                         return null;
                     }
                         
                     
                }
                
                function superway($start, $end){
                    $superway = array();
                    $sub_way = chack($start);                                    
                    array_push($superway, $sub_way);
                    
                    while($end != $sub_way['end']['station_id']){
                        $sub_way = chack($sub_way['end']['station_id']);  
                        if($sub_way == NULL){
                            array_push($superway, array('error'=>'ไม่พบเส้นทาง'));
                            break;
                        }
   
                        array_push($superway, $sub_way);
                    }
                    return $superway;
                }
                
                if(empty($_GET)== false){
                    $superway = superway($_GET['start'], $_GET['end']);
//                    echo "<pre>";
//                            print_r($superway);
//                    echo "</pre>";
                    echo json_encode($superway);
                }else {
                    echo 'Null';
                }
               
                 
                
                ?>
