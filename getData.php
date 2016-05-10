<?php

    mysql_connect('localhost', 'root', '');
    mysql_select_db('final_project');
    mysql_query('SET NAMES UTF8');

    $id = $_GET['id'];

        $query = "SELECT * FROM tbl_car WHERE id = $id";
        $result = mysql_query($query);
        while ($row = mysql_fetch_array($result)) {
             echo "<div class='list-group'><div class=list-group-item><b>รายละเอียด : </b> " . $row['desc'] . "<br/>";
             echo "<br><b>เวลาเปิด-ปิด : </b> " . $row['time'] . "<br/>";
             echo "<b>เบอร์โทรติดต่อ : </b> " . $row['tel'] . "<br/></div></div>";
        }

?>
