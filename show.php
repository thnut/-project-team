<?php require_once("connect.php");//เรียกใช้ไฟล์การเชื่อมต่อDATABASE SERVERและฐานข้อมูล
$limit=5;//กำหนดข้อมูลที่จะแสดงในหนึ่งหน้า
if (isset($_GET['page'])){
    $page = $_GET['page'];
} else {
    $page = 0;
}
$sql = "SELECT COUNT(*) AS num_rows FROM station";//เรียกข้อมูลจากฐานข้อมูลมาใช้งานและนับข้อมูลในฐานข้อมูล
$re = mysql_query($sql);
$num_rows = mysql_result($re ,0, 'num_rows');
$sum_page = ceil($num_rows/$limit);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แสดงข้อมูล</title>
</head>

<body>
<p>
 <?php 
    if(!$page or $page==1){
        $page=0;
    } else{ 
        $page=($page *$limit)-$limit;
    }
    $link="";
    for($i=1;$i<=$sum_page;$i++) { 
        $link.="[<a href='?page=$i'>".$i."</a>]";
    }//การส่งค่าแบบ GET
    
    echo $link="หน้า : ".$link;
    $sql = "SELECT * FROM test limit $page,$limit";
    $re = mysql_query($sql);//การเรียกใช้ข้อมูลจากฐานข้อมูลมาใช้งานโดยกำหนดค่าการเรียกใช้

?>
</p>
<table width="100%" height="50" border="0.5" align="center" >
  <tr bgcolor="#FF6699">
    
    <td width="82"><div align="center">ชื่อร้าน/สวน</div></td>
    <td width="168"><div align="center">ชื่อร้าน/สวน (ภาษาอังกฤษ)</div></td>
    <td width="210"><div align="center">รายละเอียดเกี่ยวกับร้านหรือสวน</div></td>
    <td width="42"><div align="center">ที่อย</div></td>
    <td width="45"><div align="center">จังหวัด</div></td>
    <td width="60"><div align="center">โทรศัพท์</div></td>
    <td width="25"><div align="center">Fax</div></td>
    <td width="54"><div align="center">Website</div></td>
    <td width="51"><div align="center">ชื่อ-สกุล</div></td>
    <td width="26"><div align="center">เพศ</div></td>
    <td width="47"><div align="center">E-mail</div></td>
    <td width="95"><div align="center">เบอร์โทรศัพท์</div></td>
    <td width="76"><div align="center">เบอร์มือถือ</div></td>
    <td width="91"><div align="center">แก้ไขข้อมูล</div></td>
    <td width="91"><div align="center">ลบข้อมูล</div></td>
  </tr>
 
<?php
    while($row= mysql_fetch_assoc($re))// คำสั่งให้แสดงข้อมูล
    {
        echo"<tr bgcolor='#FFCCCC'>";
        echo "<td>$row[nameth]</td>";
        echo "<td>$row[nameeg]</td>";
        echo "<td>$row[detail]</td>";
        echo "<td>$row[address]</td>";
        echo "<td>$row[province]</td>";
        echo "<td>$row[tel1]</td>";
        echo "<td>$row[fax]</td>";
        echo "<td>$row[webs]</td>";
        echo "<td>$row[name]</td>";
        echo "<td>$row[gender]</td>";
        echo "<td>$row[email]</td>";
        echo "<td>$row[tel2]</td>";
        echo "<td>$row[mobile]</td>";
        echo"<td><center><a href ='edit.php?show_id=$row[Id]'>แก้ไข </a></center></td>";//ลิงค์และส่งค่าเพื่อไปแก้ไขข้อมูล
        echo"<td><center><a href = 'delete.php?delete_id=$row[Id]' onclick=\"return confirm('คุณต้องการลบข้อมูล!!!!')\"> delete</a></center></td>";//ลิงค์และส่งค่าข้อูมูลเพื่อทำการลบข้อมูล
        echo"</tr>";
    }
mysql_close();
?>
</table>
<p>&nbsp;</p>
</body>
</html>