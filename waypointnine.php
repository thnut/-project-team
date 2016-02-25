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
        <h1>2 - 10 </h1>
        <p>
                <?php
                function search($node) {
                    $i = 0;
                    while ($i < count($node) ){                    
                        //echo $node[$i]."</br>";
                        $next = array();
                        $next_re = array();
                        $sql = "select * from cost where startstation_id=".$node[$i];
                        $result = mysql_query($sql);
                        while ($row = mysql_fetch_array($result)) {
                            array_push($next, $row['endstation_id']);
                            echo $row["startstation_id"]."=>".$row["endstation_id"];
                            echo "</br>";
//                            $next_re = array(
//                                'startstation_id' => $row['startstation_id'],
//                                'endstation_id' => $row['endstation_id']
//                            );
                        }
                        
                        $i++;
                        echo "</br>";
                    }
                    return $next;
                }
                
                $node = array();
                $sql = "select * from cost where startstation_id=2";
                $result = mysql_query($sql);
                while ($row = mysql_fetch_array($result)) {
                    echo $row["startstation_id"]."=>".$row["endstation_id"];
                    echo "</br>";
                    array_push($node, $row["endstation_id"]);
                }
                //print_r($node);
                echo "</br>";
                $next_r = search($node);
                echo '<pre>';
                print_r($next_r);
                echo '</pre>';
                ?>
        
        </p>
    </body>
</html>