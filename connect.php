<?php 
$host ="localhost";//ชื่อโฮส
$user ="root";//ชื่อผู้ใช้
$pass ="";//รหัสผ่าน
$db ="final_project";//ชื่อฐานข้อมูลที่เราสร้างไว้
mysql_connect ($host,$user,$pass) or die ("ติดต่อเครื่อง Database Server ไม่สำเร็จ");//ติดต่อ Database Server
mysql_select_db($db) or die ("ติดต่อฐานข้อมูลไม่สำเร็จ");//ติอต่อฐานข้อมูล
mysql_query("SET NAMES utf8")//ตั้งค่าภาษา
?>