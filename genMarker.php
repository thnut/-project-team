    <?php  
    header("Content-type:application/json; charset=UTF-8");          
    header("Cache-Control: no-store, no-cache, must-revalidate");         
    header("Cache-Control: post-check=0, pre-check=0", false);    
    // ส่วนติดต่อกับฐานข้อมูล  
    mysql_connect("localhost","root","") or die("Cannot connect the Server");       
    mysql_select_db("final_project") or die("Cannot select database");       
    mysql_query("set character set utf8");     
    ?>  
    <?php  
    $q="SELECT * FROM station WHERE 1 ORDER BY station_id";  
    $qr=mysql_query($q);  
    while($rs=mysql_fetch_array($qr)){  
        $json_data[]=array(  
            "station_id"=>$rs['station_id'],  
            "station_name"=>$rs['station_name'],  
            "latitude"=>$rs['station_lat'],  
            "longitude"=>$rs['station_lon'],  
            "zoom"=>$rs['station_zoom']  
        );    
    }  
    $json= json_encode($json_data);  
    echo $json;  
    ?>  