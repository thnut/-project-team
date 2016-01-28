
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
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <title>Isan Software Public :: Test </title>
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/javascript" href="loadstation.js">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>   
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <script type="text/javascript" src="main.js"></script>
    </head>
    <body class="is-loading">
        <style type="text/css">  

            /* css กำหนดความกว้าง ความสูงของแผนที่ */  
            #map_canvas {   
                width:auto;  
                height:400px;  
                clear: both;  
                /*  margin-top:100px;*/  
            }  
        </style>  

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
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-login">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <a href="#" class="active" id="login-form-link">Bus</a>
                                        <div id="showDD" style="margin:auto;padding-top:5px;width:550px;">    

                                        </div> 
                                    </div>
                                    <div class="col-xs-6">
                                        <a href="#" id="register-form-link">Van</a>
                                    </div>
                                </div>
                                <hr/>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="heading-location">
                                        <p><b>บริษัท รถขนส่งสาธารณะ</b></p>
                                    </div>

                                    <!------------------- ส่วนของ รถปรับอากาศ ------------------------------>    
                                    <form id="login-form" action="" method="post" role="form" style="display: block;">
                                        <select class="form-control" name="namePlace" id="namePlace"  >
                                            <?php
                                            mysql_connect('localhost', 'root', '');
                                            mysql_select_db('final_project');
                                            mysql_query('SET NAMES UTF8');
                                            $sql = "select * from bus";
                                            $result = mysql_query($sql);
                                            while ($row = mysql_fetch_array($result)) {
                                                echo "<option value=" . $row['b_name'] . ">" . $row['b_name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <div class="heading-location">
                                            <p><b>สถานีต้นทาง</b></p>
                                        </div>
                                        <select class="form-control" name="data_search" id="data_search" value="<?= $_POST['data_search'] ?>"/>
                                        <?php
                                        mysql_connect('localhost', 'root', '');
                                        mysql_select_db('final_project');
                                        mysql_query('SET NAMES UTF8');
                                        $sql = "select * from station where station_type Like '%bus%' ";
                                        $result = mysql_query($sql);
                                        while ($row = mysql_fetch_array($result)) {
                                            echo "<option value=" . $row['station_name'] . ">" . $row['station_name'] . "</option>";
                                        }
                                        ?>
                                        </select>
                                        <div class="heading-location">
                                            <p><b>สถานีปลายทาง</b></p>
                                        </div>

                                        <select class="form-control" name="toplace" id="toplace" >
                                            <?php
                                            mysql_connect('localhost', 'root', '');
                                            mysql_select_db('final_project');
                                            $sql = "select * from station WHERE station_type LIKE '%bus%' Order by station_id DESC ";
                                            $result = mysql_query($sql);
                                            while ($row = mysql_fetch_array($result)) {
                                                echo "<option value=" . $row['station_name'] . ">" . $row['station_name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <p><b>ราคา</b></p>
                                        <input type="text" class="form-control" placeholder="Price" value="50 $" > 
                                        <ul class="actions">
                                            <input type="submit" name="bt_search" id="bt_search" value="Search" />   
                                        </ul>
                                    </form>

                                    <!----------------------------- ส่วนของ รถตู้ ------------------------------------->

                                    <form id="register-form"  method="post" role="form" style="display: none;">
                                        <div id="showDD" style="margin:auto;padding-top:5px;">    
                                            <select class="form-control" name="namePlace" id="namePlace"  >
                                                <?php
                                                mysql_connect('localhost', 'root', '');
                                                mysql_select_db('final_project');
                                                mysql_query('SET NAMES UTF8');
                                                $sql = "select * from van";
                                                $result = mysql_query($sql);
                                                while ($row = mysql_fetch_array($result)) {
                                                    echo "<option value=" . $row['v_name'] . ">" . $row['v_name'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                            <div id="form_search_data">  
                                                <form id="form_search_map_data" name="form_search_map_data" method="post" action="">  
                                                    <p><b>จุดต้นทาง</b><p>
                                                        <select class="form-control" name="data_search" id="data_search" value="<?= $_POST['data_search'] ?>"/>
                                                        <?php
                                                        mysql_connect('localhost', 'root', '');
                                                        mysql_select_db('final_project');
                                                        mysql_query('SET NAMES UTF8');
                                                        $sql = "select * FROM station WHERE station_type LIKE '%van%' Order by station_id DESC ";
                                                        $result = mysql_query($sql);
                                                        while ($row = mysql_fetch_array($result)) {
                                                            echo "<option value=" . $row['station_name'] . ">" . $row['station_name'] . "</option>";
                                                        }
                                                        ?>
                                                        </select>

                                                    <p><b>จุดระหว่างทาง</b></p>
                                                    <select multiple id="data_search" value="<?= $_POST['data_search'] ?> "/>

                                                    <option value="เซนทรัลขอนแก่น">เซนทรัลขอนแก่น</option>

                                                    <select multiple id="data_search" value="<?= $_POST['data_search'] ?>"/>
                                                    </select>



                                                    <p><b>จุดปลายทาง</b><p>
                                                        <select class="form-control" name="data_search" id="data_search" value="<?= $_POST['data_search'] ?>"/>
                                                        <?php
                                                        mysql_connect('localhost', 'root', '');
                                                        mysql_select_db('final_project');
                                                        mysql_query('SET NAMES UTF8');
                                                        $sql = "select * FROM station WHERE station_type LIKE '%van%' ";
                                                        $result = mysql_query($sql);
                                                        while ($row = mysql_fetch_array($result)) {
                                                            echo "<option value=" . $row['station_name'] . ">" . $row['station_name'] . "</option>";
                                                        }
                                                        ?>
                                                        </select>
                                                        <input type="submit" name="bt_search" id="bt_search" value="Search" />  
                                                </form>  
                                            </div>  
                                        </div> 
                                    </form>
                                    <form id="login-form"  method="post" role="form" style="display: none;">

                                    </form>

                                </div>

                                 
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                <div id="map_canvas"></div> 
        </div>
        

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>      
        <script type="text/javascript">
            var infowindow = []; // กำหนดตัวแปรสำหรับเก็บตัว popup แสดงรายละเอียดสถานที่  
            var infowindowTmp; // กำหนดตัวแปรสำหรับเก็บลำดับของ infowindow ที่เปิดล่าสุด  
            var my_Marker = []; // กำหนดตัวแปรสำหรับเก็บตัว marker เป็นตัวแปร array 
            var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้  
            var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น  
            function initialize() { // ฟังก์ชันแสดงแผนที่  
                GGM = new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM  
                // กำหนดจุดเริ่มต้นของแผนที่  
                var my_Latlng = new GGM.LatLng(13.761728449950002, 100.6527900695800);
                // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas  
                var my_DivObj = $("#map_canvas")[0];
                // กำหนด Option ของแผนที่  
                var myOptions = {
                    zoom: 5, // กำหนดขนาดการ zoom  
                    center: my_Latlng, // กำหนดจุดกึ่งกลาง  
                    mapTypeId: GGM.MapTypeId.ROADMAP, // กำหนดรูปแบบแผนที่  
                    mapTypeControlOptions: {// การจัดรูปแบบส่วนควบคุมประเภทแผนที่  
                        position: GGM.ControlPosition.TOP, // จัดตำแหน่ง  
                        style: GGM.MapTypeControlStyle.DROPDOWN_MENU // จัดรูปแบบ style   
                    }
                };
                map = new GGM.Map(my_DivObj, myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map  

                $.ajax({
                    url: "genMarker.php", // ใช้ ajax ใน jQuery เรียกใช้ไฟล์ xml  
                    type: "GET", // ส่งค่าข้อมูลแบบ POST ไปที่ไฟล์ genMarker.php  
                    data: {data_search: "<?= $_POST['data_search'] ?>"}, //รับค่า จากการ submit ฟอร์ม ส่งไปค้นหาข้อมูล  
                    dataType: "xml",
                    success: function (xml) {
                        $(xml).find('marker').each(function (i) { // วนลูปดึงค่าข้อมูลมาสร้าง marker    
                            var markerID = $(this).find("id").text();// นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน      
                            var markerName = $(this).find("name").text();// นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน      
                            var markerLat = $(this).find("latitude").text();// นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน      
                            var markerLng = $(this).find("longitude").text(); // นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน                  
                            var markerLatLng = new GGM.LatLng(markerLat, markerLng);
                            my_Marker[i] = new GGM.Marker({// สร้างตัว marker เป็นแบบ array  
                                position: markerLatLng, // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง 
                                zoom : 9,
                                map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map  
                                title: markerName // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ  
                            });
                            //  กรณีตัวอย่าง ดึง title ของตัว marker มาแสดง  
                            infowindow[i] = new GGM.InfoWindow({// สร้าง infowindow ของแต่ละ marker เป็นแบบ array  
                                content: my_Marker[i].getTitle() // ดึง title ในตัว marker มาแสดงใน infowindow  
                            });
//              //  กรณีนำไปประยุกต์ ดึงข้อมูลจากฐานข้อมูลมาแสดง  
//              infowindow[i] = new GGM.InfoWindow({     
//                  content:$.ajax({     
//                      url:'placeDetail.php',//ใช้ ajax ใน jQuery ดึงข้อมูล     
//                      data:'placeID='+markerID,// ส่งค่าตัวแปร ไปดึงข้อมูลจากฐานข้อมูล  
//                      async:false     
//                  }).responseText     
//              });               

                            GGM.event.addListener(my_Marker[i], 'click', function () { // เมื่อคลิกตัว marker แต่ละตัว  
                                if (infowindowTmp) { // ให้ตรวจสอบว่ามี infowindow ตัวไหนเปิดอยู่หรือไม่  
                                    infowindow[infowindowTmp].close();  // ถ้ามีให้ปิด infowindow ที่เปิดอยู่  
                                }
                                infowindow[i].open(map, my_Marker[i]); // แสดง infowindow ของตัว marker ที่คลิก  
                                infowindowTmp = i; // เก็บ infowindow ที่เปิดไว้อ้างอิงใช้งาน  
                            });
                        });
                    }
                });

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var pos = new GGM.LatLng(position.coords.latitude, position.coords.longitude);
                        var infowindow = new GGM.InfoWindow({
                            map: map,
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