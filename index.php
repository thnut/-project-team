 
<?php
$servername = "localhost";
$username = "root";
$password = "";
mysql_query("set character set utf8");
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>



<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv=Content-Type content="text/html; charset=utf-8">
        <title>Isan Software Public</title>

        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" type="text/javascript" href="loadstation.js">
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    </head>
    <body class="is-loading">

        <!-- Wrapper -->
        <div id="wrapper">

            <!-- Main -->
            <section id="main">
                <header>
                    <span class="avatar"><img src="img/Bus-icon.jpg" alt="bus-icon" width="200" height="200" /></span>
                    <h1>Isan Software Map</h1>
                    <p>แผนที่ขนส่งสาธารณะภาคอีสาน</p>
                </header>

                <hr />
                <div class="content">
                    <div class="col-md-6 col-md-push-3">
                        <div class="heading-location">
                            <p>ประเภทรถโดยสาร</p>
                        </div>





                        <div class="field">

                            <input type = "radio" id = "robot_yes" name = "robot" /><label for = "robot_yes">Bus</label>

                            <input type = "radio" id = "robot_no" name = "robot" /><label for = "robot_no">Van</label>



                        </div>
                        <div class="heading-location">
                            <p>สถานีต้นทาง</p>
                        </div>
                        <select class="form-control" name="from" id="form" >
                            <?php
                            mysql_query("set names 'utf8'");
                            mysql_connect('localhost', 'root', '');
                            mysql_select_db('final_project');
                            $sql = "select * from bus";
                            $result = mysql_query($sql);
                            while ($row = mysql_fetch_array($result)) {
                                echo "<option value='>" . $row['b_name'] . "</option>";
                            }
                            ?>
                        </select>
                        <div class="heading-location">
                            <p>สถานีปลายทาง</p>
                        </div>
                        <select class="form-control"name="from" id="form" >
                            <?php
                            mysql_connect('localhost', 'root', '');
                            mysql_select_db('final_project');
                            $sql = "select b_name from bus";
                            $result = mysql_query($sql);
                            while ($row = mysql_fetch_array($result)) {
                                echo "<option value='>" . $row['b_name'] . "</option>";
                            }
                            ?>
                        </select>

                        <p>ราคา</p>
                        <input type="text" class="form-control" placeholder="Price" value="$" > 
                        </br>
                        <ul class="actions">
                            <li><a href="#" class="button">Get Started</a></li>
                        </ul>
                    </div>
                </div>      

                <script>
                    $(document).ready(function () {
                        $("a").click(function () {
                            $("#map").fadeToggle();

                        });
                    });
                </script>
                <style>

                    #map {
                        height: 300px;
                        width: 100%;
                    }
                </style>


                <div id="map"></div>

                <script type="text/javascript">
                    var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้  
                    var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น  
                    function initialize() { // ฟังก์ชันแสดงแผนที่  
                        GGM = new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM  
                        // กำหนดจุดเริ่มต้นของแผนที่  
                        var my_Latlng = new GGM.LatLng(13.761728449950002, 100.6527900695800);
                        // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas  
                        var my_DivObj = $("#map")[0];
                        // กำหนด Option ของแผนที่  
                        var myOptions = {
                            zoom: 10, // กำหนดขนาดการ zoom  
                            center: my_Latlng, // กำหนดจุดกึ่งกลาง  
                            mapTypeId: GGM.MapTypeId.ROADMAP, // กำหนดรูปแบบแผนที่  
                            mapTypeControlOptions: {// การจัดรูปแบบส่วนควบคุมประเภทแผนที่  
                                position: GGM.ControlPosition.TOP, // จัดตำแหน่ง  
                                style: GGM.MapTypeControlStyle.DROPDOWN_MENU // จัดรูปแบบ style   
                            }
                        };
                        map = new GGM.Map(my_DivObj, myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map  

                        //Geo-location

                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(function (position) {
                                var pos = new GGM.LatLng(position.coords.latitude, position.coords.longitude);
                                var infowindow = new GGM.InfoWindow({
                                    map: map,
                                    zoom:10,
                                    position: pos,
                                    content: 'คุณอยู่ที่นี่.'
                                });

                                var my_Point = infowindow.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย  
                                map.panTo(my_Point);  // ให้แผนที่แสดงไปที่ตัว marker         
                                $("#lat_value").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value  
                                $("#lon_value").val(my_Point.lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value   
                                $("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value                
                                map.setCenter(pos);
                            }, function () {
                                // คำสั่งทำงาน ถ้า ระบบระบุตำแหน่ง geolocation ผิดพลาด หรือไม่ทำงาน  
                            });
                        } else {
                            // คำสั่งทำงาน ถ้า บราวเซอร์ ไม่สนับสนุน ระบุตำแหน่ง  
                        }

                        // กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom  
                        GGM.event.addListener(map, 'zoom_changed', function () {
                            $("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value    
                        });

                        $.ajax({
                            url: "connectdbxml.php", // ใช้ ajax ใน jQuery เรียกใช้ไฟล์ xml  
                            type: "GET", // ส่งค่าข้อมูลแบบ POST ไปที่ไฟล์ genMarker.php  
                            //รับค่า จากการ submit ฟอร์ม ส่งไปค้นหาข้อมูล  
                            dataType: "xml",
                            success: function (xml) {
                                //          console.log(xml);  
                                $(xml).find('marker').each(function () { // วนลูปดึงค่าข้อมูลมาสร้าง marker  
                                    var markerID = $(this).attr("id");// นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน      
                                    var markerName = $(this).find("name").text(); // นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน      
                                    var markerLat = $(this).find("latitude").text(); // นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน   
                                    var markerLng = $(this).find("longitude").text(); // นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน              
                                    var markerLatLng = new GGM.LatLng(markerLat, markerLng);
                                    var my_Marker = new GGM.Marker({// สร้างตัว marker  
                                        position: markerLatLng, // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง  
                                        map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map  
                                        title: markerName // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ  
                                    });
                                    //                  console.log($(this).find("id").text());  
                                });
                            }
                        });

                    }
                    $(function () {
                        // โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว  
                        // ค่าตัวแปร ที่ส่งไปในไฟล์ google map api  
                        // v=3.2&sensor=false&language=th&callback=initialize  
                        //  v เวอร์ชัน่ 3.2  
                        //  sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false  
                        //  language ภาษา th ,en เป็นต้น  
                        //  callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize  
                        $("<script/>", {
                            "type": "text/javascript",
                            src: "http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=th&callback=initialize"
                        }).appendTo("body");
                    });
                </script>    





            </section>

            <!-- Footer -->
            <footer id="footer">
                <ul class="copyright">
                    <li>&copy; </li>
                    <li>Design: </li>
                </ul>
            </footer>

        </div>

        <!-- Scripts -->
        <!--[if lte IE 8]><script src="assets/js/respond.min.js"></script><![endif]-->
        <script>
            if ('addEventListener' in window) {
                window.addEventListener('load', function () {
                    document.body.className = document.body.className.replace(/\bis-loading\b/, '');
                });
                document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
            }
        </script>

    </body>
</html>