
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
        <title>Isan Software Public</title>
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <!--<script type="text/javascript" src="main.js"></script>-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 


    </head>
    <body class="is-loading">

        <!-- Wrapper -->
        <div id="wrapper">
            <!-- Main -->
            <style>
                nav a {
                    font-family: sans-serif;
                    color: black;
                    margin-left: 20px;
                }

                #map {     
                    width:800px;    
                    height:400px;    
                    margin:auto;    
                    margin-top:50px;    
                }   
                #directionsPanel{  
                    width:550px;  
                    margin:auto;  
                    clear:both;   
                    /*  background-color:#F1FEE9;*/  
                }  
            </style>


            <section id="main">
                <header>
                    <span class="avatar"><img src="img/Bus-icon.jpg" alt="bus-icon" width="200" height="200" /></span>
                    <h2>Isan Software Map</h2>
                    <p>แผนที่ขนส่งสาธารณะภาคอีสาน</p>
                </header>
                <hr />
                <div class="content">
                    <div class="col-md-6 col-md-push-3">
                        <form id="login-form" action="" method="post" role="form" style="display: block;">
                            <div class="heading-location">
                                <p>สถานีต้นทาง</p>
                            </div>
                            <select class="form-control" name="namePlace" id="namePlace" >
                                //<?php
                                mysql_connect('localhost', 'root', '');
                                mysql_select_db('final_project');
                                mysql_query('SET NAMES UTF8');
                                $sql = "select * from station ";
                                $result = mysql_query($sql);
                                while ($row = mysql_fetch_array($result)) {
                                    echo "<option value='" . $row['station_id'] . "'>" . $row['station_name'] . "</option>";
                                }
                                ?>
                            </select>
                            <div class="heading-location">
                                <p>สถานีปลายทาง</p>
                            </div>
                            <select class="form-control" name="toplace" id="toplace" >
                                //<?php
                                mysql_connect('localhost', 'root', '');
                                mysql_select_db('final_project');
                                mysql_query('SET NAMES UTF8');
                                $sql = "select * from station ";
                                $result = mysql_query($sql);
                                while ($row = mysql_fetch_array($result)) {
                                    echo "<option value='" . $row['station_id'] . "'>" . $row['station_name'] . "</option>";
                                }
                                ?>
                            </select>

                            <ul class="actions">
                                <input type="button" name="SearchPlace" id="SearchPlace" value="Search" style="margin-top: 20px;"/>  
                                <!--<input type="button" name="SearchPlace" id="SearchPlace" value="สร้างเส้นทาง" />-->  
                                <input type="button" name="iClear" id="iClear" value="ล้างค่า" />  
                            </ul>
                        </form>
                    </div>
                </div>      

                <div id="map"></div>    
                <div id="directionsPanel" style="margin-top: 60px;"></div> 
            </section>
            
            <section id="one">
                
                
            </section>





            <script type="text/javascript">
                var directionShow; // กำหนดตัวแปรสำหรับใช้งาน กับการสร้างเส้นทาง  
                var directionsService; // กำหนดตัวแปรสำหรับไว้เรียกใช้ข้อมูลเกี่ยวกับเส้นทาง  
                var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้  
                var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น  
                var my_Latlng; // กำหนดตัวแปรสำหรับเก็บจุดเริ่มต้นของแผนที่เมื่อโหลดครั้งแรก  
                var searchRoute; // กำหนดตัวแปร ไว้เก็บฃื่อฟังก์ชั้น ให้สามารถใช้งานจากส่วนอื่นๆ ได้ 

                var origin = null; // กำหนดตัวแปร สำหรับเก็บ จุดเริ่มต้น ของเส้นทาง  
                var destination = null; // กำหนดตัวแปร สำหรับเก็บจุดหมาย ปลายทาง ของเส้นทาง  

                var waypoints = []; // กำหนดตัวแปร array สำหรับเก็บจุดของเส้นทางที่ผ่าน  
                var markers = []; // กำหนดตัวแปร array สำหรับเก็บตัว marker ที่สร้างจากการคลิกที่แผนที่  

                var addMarker; // กำหนดตัวแปร สำหรับเก็บฟังก์ชัน เพิ่มตัว marker จากการคลิกที่แผนที่  

                function initialize() { // ฟังก์ชันแสดงแผนที่  
                    GGM = new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM  
                    directionShow = new GGM.DirectionsRenderer({draggable: true});
                    directionsService = new GGM.DirectionsService();
                    // กำหนดจุดเริ่มต้นของแผนที่  
                    my_Latlng = new GGM.LatLng(13.761728449950002, 100.6527900695800);
                    // กำหนดตำแหน่งปลายทาง สำหรับการโหลดครั้งแรก  
                    var my_mapTypeId = GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง  
                    // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas  
                    var my_DivObj = $("#map")[0];
                    // กำหนด Option ของแผนที่  
                    var myOptions = {
                        zoom: 5, // กำหนดขนาดการ zoom  
                        center: my_Latlng, // กำหนดจุดกึ่งกลาง จากตัวแปร my_Latlng  
                        mapTypeId: my_mapTypeId // กำหนดรูปแบบแผนที่ จากตัวแปร my_mapTypeId  
                    };
                    map = new GGM.Map(my_DivObj, myOptions); // สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map  

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

                    directionShow.setMap(map); // กำหนดว่า จะให้มีการสร้างเส้นทางในแผนที่ที่ชื่อ map  
                    // ส่วนสำหรับกำหนดให้แสดงคำแนะนำเส้นทาง  
                    directionShow.setPanel($("#directionsPanel")[0]);

                    // กำหนด event ให้กับเส้นทาง กรณีเมื่อมีการเปลี่ยนแปลง   
                    GGM.event.addListener(directionShow, 'directions_changed', function () {
                        var results = directionShow.directions; // เรียกใช้งานข้อมูลเส้นทางใหม่  
                    });



                }

                $(function () {
                    // ส่วนของฟังก์ชันเพิ่มตัว marker  
                    addMarker = function (latlng) {
                        markers.push(new GGM.Marker({
                            position: latlng,
                            map: map,
                            icon: "http://maps.google.com/mapfiles/marker" + String.fromCharCode(markers.length + 65) + ".png"
                        }));
                        markers.push(new GGM.InfoWindow({// สร้าง infowindow ของแต่ละ marker เป็นแบบ array  
                            content: "55555" // ดึง title ในตัว marker มาแสดงใน infowindow  
                        }));
//                    console.log(markers);
                    }
                    // ส่วนของฟังก์ชัน สำหรับการสร้างเส้นทาง  
                    searchRoute = function (FromPlace, ToPlace, my2waypoint) { // ฟังก์ชัน สำหรับการสร้างเส้นทาง  
                        if (origin == null || destination == null) { //   
                            return false;
                        }
                        if (!FromPlace && !ToPlace) { // ถ้าไม่ได้ส่งค่าเริ่มต้นมา ให้ใฃ้ค่าจากการค้นหา  
                            if ($("#namePlace").val() == "" && $("#toPlace").val() == "") { // ถ้าค่าค้นหาเป็นว่าง  
                                if (origin == null || destination == null) { // ถ้าไม่มีจุดเริ่มต้น และจุดปลายทาง  
                                    return false;
                                } else { // มีการกำหนดจุดเริ่มต้นเส้นทาง และ จุดปลายทาง  
                                    var FromPlace = origin;// รับค่าจากจุดเริ่มต้นเส้นทาง  
                                    var ToPlace = destination; // รับค่าจากจุดปลายทาง               
                                }
                            } else {
                                var FromPlace = $("#namePlace").val();// รับค่าชื่อสถานที่เริ่มต้น  
                                var ToPlace = $("#toPlace").val(); // รับค่าชื่อสถานที่ปลายทาง                  
                            }
                        }
//                  
                        if (waypoints.length < 9) { // กำหนดเงื่อนไขห้ามเกิน 9 จุด เพื่อไม่ให้ทำงานช้าเกินไป  
//                        waypoints.push({location: my_waypoint, stopover: true}); // กำหนดจุดผ่านเส้นทาง  

                            for (var i = 0; i < my2waypoint.length; i++) {
                                var point = new GGM.LatLng(my2waypoint[i][0], my2waypoint[i][1]);
                                //alert(point);
                                waypoints.push({location: point, stopover: true});
                            }
                            destination = event.latLng; // เพิ่มปลายทาง   
                            addMarker(destination); // เพิ่มตัว marker ที่ตำแหน่งนี้  
                        } else {
                            alert("จุดผ่านเส้นทางมากสุด ไม่เกิน 9 จุด");
                        }
//                  
                        // กำหนด option สำหรับส่งค่าไปให้ google ค้นหาข้อมูล      
                        var request = {
                            origin: FromPlace, // สถานที่เริ่มต้น  
                            destination: ToPlace, // สถานที่ปลายทาง  
                            waypoints: waypoints, // // ส่งค่าจุดผ่านเส้นทาง
                            optimizeWaypoints: true,
                            travelMode: GGM.DirectionsTravelMode.DRIVING // กรณีการเดินทางโดยรถยนต์  
                        };

                        // ส่งคำร้องขอ จะคืนค่ามาเป็นสถานะ และผลลัพธ์  
                        directionsService.route(request, function (response, status) {
                            if (status == GGM.DirectionsStatus.OK) { // ถ้าสามารถค้นหา และสร้างเส้นทางได้  
                                directionShow.setDirections(response); // สร้างเส้นทางจากผลลัพธ์ 
                                var legs = response['routes'][0]['legs'];
                                console.log(legs);
//                            for(i=0;i<legs.length;i++){
//                                legs[i].
//                            }
//                            var summaryPanel = document.getElementById('directions-panel');
//                            for (var i = 0; i < markers.length; i++) { // วนลูปล้างค่าตัว marker  
//                                var routeSegment = i + 1;
//                                summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
//                                        '</b><br>';
//                                summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
//                                summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
//                                summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
//                            }
//                            markers = []; // ล้างค่าตัวแปร array ตัว marker               
                            } else {
                                // กรณีไม่พบเส้นทาง หรือไม่สามารถสร้างเส้นทางได้  
                                window.alert('Directions request failed due to ' + status);
                            }
                        });
                    }

                    // ส่วนควบคุมปุ่มคำสั่งใช้งานฟังก์ชัน  
                    $("#SearchPlace").click(function () { // เมื่อคลิกที่ปุ่ม id=SearchPlace   
//                    searchRoute();  // เรียกใช้งานฟังก์ชัน ค้นหาเส้นทาง  
//                    console.log('data');
                        $.ajax({
                            url: "gd.php",
                            type: "GET",
                            data: ({
                                start: $('#namePlace').val(),
                                end: $('#toplace').val(),
                            }),
                            datatype: "json",
                        }).success(function (result) {
                            var data = jQuery.parseJSON(result);
                            var my2waypoint = [];
//                        console.log(data);
                            var size = data.length;
                            for (var index in data) {
//                            console.log(data[index]);
                                if (index == 0) {
                                    var place = data[index];
                                    var place_Lat = place['station_lat'];
                                    var place_Lng = place['station_lon'];
//                                console.log(place_Lat+":"+place_Lng);
                                    origin = new GGM.LatLng(place_Lat, place_Lng);
                                } else if (index == size - 1) {
                                    var place = data[index];
                                    var place_Lat = place['station_lat'];
                                    var place_Lng = place['station_lon'];
                                    destination = new GGM.LatLng(place_Lat, place_Lng);
                                } else {
                                    var place = data[index];
                                    var place_lat = place['station_lat'];
                                    var place_lng = place['station_lon'];
                                    var latlng = [place_lat, place_lng];
                                    my2waypoint.push(latlng);
                                }
                            }
//                        console.log(my2waypoint);
                            searchRoute(origin, destination, my2waypoint);
                        });

                    });

                    $("#namePlace,#toPlace").keyup(function (event) { // เมื่อพิมพ์คำค้นหาในกล่องค้นหา  
                        if (event.keyCode == 13 && $(this).val() != "") { //  ตรวจสอบปุ่มถ้ากด ถ้าเป็นปุ่ม Enter   
                            searchRoute();      // เรียกใช้งานฟังก์ชัน ค้นหาเส้นทาง  
                        }
                    });

                    $("#iClear").click(function () {
                        for (var i = 0; i < markers.length; i++) { // วนลูปล้างค่าตัว marker  
                            markers[i].setMap(null);
                        }
                        markers = []; // ล้างค่าตัวแปร array ตัว marker  
                        origin = null; // กำหนดเป็นค่าว่าง เพื่อเริ่มต้นใหม่  
                        destination = null; /// กำหนดเป็นค่าว่าง เพื่อเริ่มต้นใหม่  
                        waypoints = []; // ล้างค่าตัวแปร array ตัว waypoints          
                        $("#namePlace,#toPlace").val(""); // ล้างค่าข้อมูล สำหรับพิมพ์คำค้นหาใหม่  
                        directionShow.setMap(null); // ล้างค่าเส้นทางออกจากแผนที่  
                        directionShow.setPanel(null);    // ล้างค่าส่วนแนะนำเส้นทาง   
                        // กำหนดส่วนสำหรับใช้กับแผนที่ ใหม่อีกครั้ง  
                        directionShow = new GGM.DirectionsRenderer({draggable: true});
                        directionShow.setMap(map); // กำหนดว่า จะให้มีการสร้างเส้นทางในแผนที่ที่ชื่อ map  
                        // ส่วนสำหรับกำหนดให้แสดงคำแนะนำเส้นทาง  
                        directionShow.setPanel($("#directionsPanel")[0]);
                    });

                });
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