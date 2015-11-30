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
<markers>  
<?php  
$q_search=""; // กำหนดตัวแปร เพื่อรอรับการ ส่งคำสั่งตามเงื่อนไข การค้นหา  
$q_limit=""; // กำหนดตัวแปร เพื่อรอรับการ เลือกจำกัดข้อมูลที่ต้องการแสดง  
if(isset($_GET['data_search']) && $_GET['data_search']!=""){ // ถ้า มีการส่งค่า คำค้นหามา และค่านั้นไม่ใช่ค่าว่าง  
    // กำหนด รูปแบบคำสั่ง sql ในตัวแปรที่สร้างไว้ตอนต้น  
    $q_search=" AND province_name like '%".$_GET['data_search']."%' ";  
}else{  
    // ถ้าไม่มีการส่งค่า ไม่ให้แสดง ตำแหน่งในแผนที่ ให้กำหนด LIMIT 0  
    //  แต่ถ้า ต้องการแสดงเริ่มต้น ให้กำหนดจำนวนตามต้องการ เช่น LIMIT 10      
    $q_limit=" LIMIT 0 ";  
}  
// ชุดคำสั่ง sql ในการดึงข้อมูล จากฐานข้อมูลมาแสดง  
$q="SELECT * FROM province_th WHERE 1 $q_search ORDER BY province_id  $q_limit ";  
$qr=mysql_query($q);  
while($rs=mysql_fetch_array($qr)){  
?>  
    <marker id="<?=$rs['province_id']?>">  
        <name><?=$rs['province_name']?></name>  
        <latitude><?=$rs['province_lat']?></latitude>  
        <longitude><?=$rs['province_lon']?></longitude>  
    </marker>  
<?php } ?>  
</markers> 
 