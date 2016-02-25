<?php  
header("Content-type:text/xml; charset=UTF-8");                
header("Cache-Control: no-store, no-cache, must-revalidate");               
header("Cache-Control: post-check=0, pre-check=0", false);     
mysql_connect("localhost","root","") or die("Cannot connect the Server");  
mysql_select_db("final_project") or die("Cannot select database");  
mysql_query("set character set utf8");  
echo '<?xml version="1.0" encoding="utf-8"?>';  
// 6-7 บรรทัดแรกด้านบน เป็นการกำหนด ให้ไฟล์นี้ส่งออกเป็นไฟล์ แบบ xml  
// และการกำหนดการเชิ่อมต่อกับฐานข้อมูล  
?>  
<waypont>  
<?php  
$q_search=""; // กำหนดตัวแปร เพื่อรอรับการ ส่งคำสั่งตามเงื่อนไข การค้นหา  
$q_limit=""; // กำหนดตัวแปร เพื่อรอรับการ เลือกจำกัดข้อมูลที่ต้องการแสดง  
if(isset($_GET['namePlace']) && $_GET['namePlace']!=""){ // ถ้า มีการส่งค่า คำค้นหามา และค่านั้นไม่ใช่ค่าว่าง  
    // กำหนด รูปแบบคำสั่ง sql ในตัวแปรที่สร้างไว้ตอนต้น  
    $q_search=" AND station_id = ".$_GET['namePlace']." ";  //แก้ไข station_name
}else{  
    // ถ้าไม่มีการส่งค่า ไม่ให้แสดง ตำแหน่งในแผนที่ ให้กำหนด LIMIT 0  
    //  แต่ถ้า ต้องการแสดงเริ่มต้น ให้กำหนดจำนวนตามต้องการ เช่น LIMIT 10      
    $q_limit=" LIMIT 0 ";  
}  
// ชุดคำสั่ง sql ในการดึงข้อมูล จากฐานข้อมูลมาแสดง  

$q="SELECT * FROM station WHERE 1 $q_search ORDER BY station_id  $q_limit "; //ทำให้ตรงกับตัวgenmarker 
$qr=mysql_query($q);  
while($rs=mysql_fetch_array($qr)){  
?>  
        <origin>
            <marker id="<?=$rs['station_id']?>">  
                <name><?=$rs['station_name']?></name>  
                <latitude><?=$rs['station_lat']?></latitude>  
                <longitude><?=$rs['station_lon']?></longitude>  
            </marker>
        </origin>
<?php }
if(isset($_GET['toPlace']) && $_GET['toPlace']!=""){ // ถ้า มีการส่งค่า คำค้นหามา และค่านั้นไม่ใช่ค่าว่าง  
    // กำหนด รูปแบบคำสั่ง sql ในตัวแปรที่สร้างไว้ตอนต้น  
    $q_search=" AND station_id = ".$_GET['toPlace']." ";  //แก้ไข station_name
}else{  
    // ถ้าไม่มีการส่งค่า ไม่ให้แสดง ตำแหน่งในแผนที่ ให้กำหนด LIMIT 0  
    //  แต่ถ้า ต้องการแสดงเริ่มต้น ให้กำหนดจำนวนตามต้องการ เช่น LIMIT 10      
    $q_limit=" LIMIT 0 ";  
}  
// ชุดคำสั่ง sql ในการดึงข้อมูล จากฐานข้อมูลมาแสดง  

$q="SELECT * FROM station WHERE 1 $q_search ORDER BY station_id  $q_limit "; //ทำให้ตรงกับตัวgenmarker 
$qr=mysql_query($q);
while($rs=mysql_fetch_array($qr)){ 
?>
        <destination>
            <marker id="<?=$rs['station_id']?>">  
                <name><?=$rs['station_name']?></name>  
                <latitude><?=$rs['station_lat']?></latitude>  
                <longitude><?=$rs['station_lon']?></longitude>  
            </marker>
        </destination>
<?php } ?>
    <zoom>8</zoom>
</waypont> 
 