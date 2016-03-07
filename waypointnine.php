<?php
    mysql_connect('localhost', 'root', '');
    mysql_select_db('final_project');
    mysql_query('SET NAMES UTF8');
?>
<html>
    <head>
        <title>Query Database</title>
    </head>
    <body>
        <h1>2 => 10 </h1>
        <p>
                <?php
                function search($node) {
                    $i = 0;
                    $next = array();
                    while ($i < count($node) ){                    
                        //echo $node[$i]."</br>";
                        
                        $next_re = array();
                        $sql = "select * from cost where endstation_id=".$node[$i];
                        $result = mysql_query($sql);
                        while ($row = mysql_fetch_array($result)) {
                            array_push($next, $row['startstation_id']);
//                            echo $row["endstation_id"]."<=".$row["startstation_id"];
//                            echo "</br>";
//                            $next_re = array(
//                                'start' => $row['startstation_id'],
//                                'end' => $row['endstation_id']
//                            );
//                            array_push($next, $next_re);
                        }
                        
                        $i++;
                        echo "</br>";
                    }
                    return $next;
                }
//                ----------------------------------------------------------------------------------
                $node = array();
                $sql = "select * from cost where endstation_id=10";
                $result = mysql_query($sql);
                while ($row = mysql_fetch_array($result)) {
                    echo $row["endstation_id"]."<=".$row["startstation_id"];
                    echo "</br>";
                    array_push($node, $row["startstation_id"]);
                }
                print_r($node);
                echo "</br>";
                $next_r = search($node);
                
                echo '<pre>';
                    print_r($next_r);
                echo '</pre>';
                ?>
        
        </p>
    </body>
</html>