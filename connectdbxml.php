<?php
header("Content-type:text/xml; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
mysql_connect("localhost", "root", "") or die("Cannot connect the Server");
mysql_select_db("final_project") or die("Cannot select database");
mysql_query("set character set utf8");
echo '<?xml version="1.0" encoding="utf-8"?>';
?>  
<markers>  
    <?php
    $q = "SELECT * FROM bus ";
    $qr = mysql_query($q);
    while ($rs = mysql_fetch_array($qr)) {
        ?>  
        <marker id="<?= $rs['b_id'] ?>">  
            <name><?= $rs['b_name'] ?></name>  
            <latitude><?= $rs['bus_lat'] ?></latitude>  
            <longitude><?= $rs['bus_lon'] ?></longitude>  
        </marker>  
    <?php } ?>  

    <?php
    $q = "SELECT * FROM van ";
    $qr = mysql_query($q);
    while ($rs = mysql_fetch_array($qr)) {
        ?>  
        <marker id="<?= $rs['v_id'] ?>">  
            <name><?= $rs['v_name'] ?></name>  
            <latitude><?= $rs['van_lat'] ?></latitude>  
            <longitude><?= $rs['van_lon'] ?></longitude>  
        </marker>  
    <?php } ?>  
</markers>

