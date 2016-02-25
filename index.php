
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
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>   
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" type="text/javascript" href="loadstation.js">
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <script type="text/javascript" src="main.js"></script>
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
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Bus</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">Van</a>
                            </div>
                        </div>
                        <div class="heading-location">
                            <p>บริษัท รถขนส่งสาธารณะ </p>
                        </div>
                        <form id="login-form" action="" method="post" role="form" style="display: block;">
                            <select class="form-control" name="namePlace" id="namePlace"  >

                                <?php
                                mysql_connect('localhost', 'root', '');
                                mysql_select_db('final_project');
                                mysql_query('SET NAMES UTF8');
                                $sql = "select * from bus";
                                $result = mysql_query($sql);
                                while ($row = mysql_fetch_array($result)) {
                                    echo "<option value='>" . $row['b_name'] . "'>" . $row['b_name'] . "</option>";
                                }
                                ?>
                            </select>
                            <div class="heading-location">
                                <p>สถานีต้นทาง</p>
                            </div>
                            <select class="form-control" name="startplace" id="fromplace" >
                                <?php
                                mysql_connect('localhost', 'root', '');
                                mysql_select_db('final_project');
                                mysql_query('SET NAMES UTF8');
                                $sql = "select * from station ";
                                $result = mysql_query($sql);
                                while ($row = mysql_fetch_array($result)) {
                                    echo "<option value='>" . $row['station_name'] . "'>" . $row['station_name'] . "</option>";
                                }
                                ?>
                            </select>
                            <div class="heading-location">
                                <p>สถานีปลายทาง</p>
                            </div>
                            <select class="form-control" name="toplace" id="toplace" >
                                <?php
                                mysql_connect('localhost', 'root', '');
                                mysql_select_db('final_project');
                                $sql = "select * from station WHERE station_name LIKE '%bus%' ";
                                $result = mysql_query($sql);
                                while ($row = mysql_fetch_array($result)) {
                                    echo "<option value='>" . $row['station_name'] . "</option>";
                                }
                                ?>
                            </select>
                            <p>ราคา</p>
                            <input type="text" class="form-control" placeholder="Price" value="50 $" > 
                            <ul class="actions">
                                <input type="button" name="SearchPlace" id="searchplace" value="Search" />  
                            </ul>
                        </form>
                        
                        
                        <form id="register-form" action="http://phpoll.com/register/process" method="post" role="form" style="display: none;">
                                            <div class="form-group">
                                                สถานีต้นทาง
                                                <select class="form-control" name="startplace" id="fromplace" >
                                                    <?php
                                                    mysql_connect('localhost', 'root', '');
                                                    mysql_select_db('final_project');
                                                    mysql_query('SET NAMES UTF8');
                                                    $sql = "select * FROM station WHERE station_name LIKE '%van%' ";
                                                    $result = mysql_query($sql);
                                                    while ($row = mysql_fetch_array($result)) {
                                                        echo "<option value='>" . $row['station_name'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            สถานีระหว่างทาง
                                            <select multiple id="waypoints">
                                                
                                                <option value="montreal, quebec">Montreal, QBC</option>
                                                <option value="toronto, ont">Toronto, ONT</option>
                                                <option value="chicago, il">Chicago</option>
                                                <option value="winnipeg, mb">Winnipeg</option>
                                                <option value="fargo, nd">Fargo</option>
                                                <option value="calgary, ab">Calgary</option>
                                                <option value="spokane, wa">Spokane</option>
                                            </select>
                                            <div class="form-group">
                                                สถานีปลายทาง
                                                <select class="form-control" name="startplace" id="fromplace" >
                                                    <?php
                                                    mysql_connect('localhost', 'root', '');
                                                    mysql_select_db('final_project');
                                                    mysql_query('SET NAMES UTF8');
                                                    $sql = "select * FROM station WHERE station_name LIKE '%van%' ";
                                                    $result = mysql_query($sql);
                                                    while ($row = mysql_fetch_array($result)) {
                                                        echo "<option value='>" . $row['station_name'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group text-center">
                                                ราคา
                                                <input type="price" name="price" id="password" tabindex="2" class="form-control" placeholder="Price">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <input type="submit" name="searchplace" id="searchplace" tabindex="4" class="form-control btn btn-login" value="Search">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                    </div>
                </div>      

            </section>
                <script>
                    $(document).ready(function () {
                        $("#searchplace").click(function () {
                            $("#map").show("slow");

                        });
                    });
                </script>



                <style>



                    .adp-placemark{  
                        background-color: #999999;
                        color: white;

                    }  
                    .adp-summary{  

                    }  
                    .adp-directions{  
                        text-align: center;
                        width: 100%;


                    }  
                </style>


                <div id="map"></div>
                <!--
                <div id="directionsPanel"></div> 
                -->
                <--
                <script type="text/javascript">
                    var directionShow; // กำหนดตัวแปรสำหรับใช้งาน กับการสร้างเส้นทาง
                    var directionsService; // กำหนดตัวแปรสำหรับไว้เรียกใช้ข้อมูลเกี่ยวกับเส้นทาง
                    var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
                    var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
                    var my_Latlng; // กำหนดตัวแปรสำหรับเก็บจุดเริ่มต้นของเส้นทางเมื่อโหลดครั้งแรก
                    var initialTo; // กำหนดตัวแปรสำหรับเก็บจุดปลายทาง เมื่อโหลดครั้งแรก
                    var searchRoute; // กำหนดตัวแปร ไว้เก็บฃื่อฟังก์ชั้น ให้สามารถใช้งานจากส่วนอื่นๆ ได้
                    function initialize() { // ฟังก์ชันแสดงแผนที่
                        GGM = new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
                        directionShow = new GGM.DirectionsRenderer();
                        directionsService = new GGM.DirectionsService();
                        // กำหนดจุดเริ่มต้นของแผนที่
                        my_Latlng = new GGM.LatLng(16.439651, 102.833439);
                        // กำหนดตำแหน่งปลายทาง สำหรับการโหลดครั้งแรก
                        initialTo = new GGM.LatLng(17.397467, 102.794539);
                        var my_mapTypeId = GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
                        // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
                        var my_DivObj = $("#map")[0];
                        // กำหนด Option ของแผนที่
                        var myOptions = {
                            zoom: 15, // กำหนดขนาดการ zoom
                            center: my_Latlng, // กำหนดจุดกึ่งกลาง จากตัวแปร my_Latlng
                            mapTypeId: my_mapTypeId // กำหนดรูปแบบแผนที่ จากตัวแปร my_mapTypeId

                        };
                        map = new GGM.Map(my_DivObj, myOptions); // สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map

                        directionShow.setMap(map); // กำหนดว่า จะให้มีการสร้างเส้นทางในแผนที่ที่ชื่อ map
                        // ส่วนสำหรับกำหนดให้แสดงคำแนะนำเส้นทาง
                        directionShow.setPanel($("#directionsPanel")[0]);

                        if (map) { // เงื่่อนไขถ้ามีการสร้างแผนที่แล้ว
                            searchRoute(my_Latlng, initialTo); // ให้เรียกใช้ฟังก์ชัน สร้างเส้นทาง
                        }

                        // กำหนด event ให้กับเส้นทาง กรณีเมื่อมีการเปลี่ยนแปลง 
                        GGM.event.addListener(directionShow, 'directions_changed', function () {
                            var results = directionShow.directions; // เรียกใช้งานข้อมูลเส้นทางใหม่ 
                        });


                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(function (position) {
                                var pos = new GGM.LatLng(position.coords.latitude, position.coords.longitude);
                                var infowindow = new GGM.InfoWindow({
                                    map: map,
                                    zoom: 10,
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

                        $.ajax({
                            url: "connectdbxml.php", // ใช้ ajax ใน jQuery เรียกใช้ไฟล์ xml  
                            type: "GET", // ส่งค่าข้อมูลแบบ POST ไปที่ไฟล์ genMarker.php  
                            data : {data_search :,//รับค่า จากการ submit ฟอร์ม ส่งไปค้นหาข้อมูล  
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
                        // ส่วนของฟังก์ชัน สำหรับการสร้างเส้นทาง
                        searchRoute = function (FromPlace, ToPlace) { // ฟังก์ชัน สำหรับการสร้างเส้นทาง
                            if (!FromPlace && !ToPlace) { // ถ้าไม่ได้ส่งค่าเริ่มต้นมา ให้ใฃ้ค่าจากการค้นหา
                                var FromPlace = $("#fromplace").val();// รับค่าชื่อสถานที่เริ่มต้น
                                var ToPlace = $("#toplace").val(); // รับค่าชื่อสถานที่ปลายทาง
                            }
                            // กำหนด option สำหรับส่งค่าไปให้ google ค้นหาข้อมูล
                            var request = {
                                origin: FromPlace, // สถานที่เริ่มต้น
                                destination: ToPlace, // สถานที่ปลายทาง
                                travelMode: GGM.DirectionsTravelMode.DRIVING // กรณีการเดินทางโดยรถยนต์
                            };
                            // ส่งคำร้องขอ จะคืนค่ามาเป็นสถานะ และผลลัพธ์
                            directionsService.route(request, function (results, status) {
                                if (status == GGM.DirectionsStatus.OK) { // ถ้าสามารถค้นหา และสร้างเส้นทางได้
                                    directionShow.setDirections(results); // สร้างเส้นทางจากผลลัพธ์
                                } else {
                                    // กรณีไม่พบเส้นทาง หรือไม่สามารถสร้างเส้นทางได้
                                    // โค้ดตามต้องการ ในทีนี้ ปล่อยว่าง
                                }
                            });
                        }


                        function calculateAndDisplayRoute(directionsService, directionShow) {
                            var waypts = [];
                            var checkboxArray = document.getElementById('waypoints');
                            for (var i = 0; i < checkboxArray.length; i++) {
                                if (checkboxArray.options[i].selected) {
                                    waypts.push({
                                        location: checkboxArray[i].value,
                                        stopover: true
                                    });
                                }
                            }

                            directionsService.route({
                                origin: document.getElementById('#fromplace').value,
                                destination: document.getElementById('#toplace').value,
                                waypoints: waypts,
                                optimizeWaypoints: true,
                                travelMode: google.maps.TravelMode.DRIVING
                            }, function (response, status) {
                                if (status === google.maps.DirectionsStatus.OK) {
                                    directionShow.setDirections(response);
                                    var route = response.routes[0];
                                    var summaryPanel = document.getElementById('directions-panel');
                                    summaryPanel.innerHTML = '';
                                    // For each route, display summary information.
                                    for (var i = 0; i < route.legs.length; i++) {
                                        var routeSegment = i + 1;
                                        summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
                                                '</b><br>';
                                        summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
                                        summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
                                        summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
                                    }
                                } else {
                                    window.alert('Directions request failed due to ' + status);
                                }
                            });
                        }

                        // ส่วนควบคุมปุ่มคำสั่งใช้งานฟังก์ชัน
                        $("#searchplace").click(function () { // เมื่อคลิกที่ปุ่ม id=SearchPlace 
                            searchRoute();	// เรียกใช้งานฟังก์ชัน ค้นหาเส้นทาง
                        });




                    });





                    $(function () {
                        // โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว
                        // ค่าตัวแปร ที่ส่งไปในไฟล์ google map api
                        // v=3.2&sensor=false&language=th&callback=initialize
                        //	v เวอร์ชัน่ 3.2
                        //	sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false
                        //	language ภาษา th ,en เป็นต้น
                        //	callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize	
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