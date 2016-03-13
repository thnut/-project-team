
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
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <script type="text/javascript" src="main.js"></script>
        <script type="text/javascript" src="nav.js"></script>
    </head>

    <style type="text/css">  
        #map_canvas {   
            width:700px;  
            height:500px;  
            margin:auto;  
            margin-top:50px;  
        }  
    </style>  
    <body class="is-loading">

        <!--NAVBAR-->
<nav class="navbar navbar-default navbar-static">
    <!--Mobile Menu-->
    <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <!--Desktop/Tablet Menu-->
    <div class="collapse navbar-collapse js-navbar-collapse">
        <div class="container">
            <div class="row">
                <div class="btn-group btn-group-justified">
                    <!--Home-->
                    <div class="btn-group">
                        <button type="button" class="btn btn-nav">
                            <span class="glyphicon glyphicon-home"></span>
                            <p id="home">Home</p>
                        </button>
                    </div>
                    <!--Wiki-->
                    <div class="btn-group">
                        <button type="button" class="btn btn-nav" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-book"></span>
                            <p id="wiki">Wiki <span class="caret"></span></p>
                        </button>
                        <ul class="dropdown-menu multi-column columns-4">
                            <li class="col-md-3 hidden-xs">
                                <ul class="multi-column-dropdown">
                                    <li class="dropdown-header">Header</li>
                                    <li><a href="#">placeholder</a></li>
                                    <li><a href="#">placeholder</a></li>
                                    <li><a href="#">placeholder</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Header</li>
                                    <li><a href="#">placeholder</a></li>
                                    <li><a href="#">placeholder</a></li>
                                    <li><a href="#">placeholder</a></li>
                                    <li><a href="#">placeholder</a></li>
                                </ul>
                            </li>
                            <li class="col-md-3 hidden-xs">
                                <ul class="multi-column-dropdown">
                                    <li class="dropdown-header">Header</li>
                                    <li><a href="#">placeholder</a></li>
                                    <li><a href="#">placeholder</a></li>
                                    <li><a href="#">placeholder</a></li>
                                    <li><a href="#">placeholder</a></li>
                                    <li><a href="#">placeholder</a></a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Header</li>
                                    <li><a href="#">placeholder</a></li>
                                </ul>
                            </li>
                            <li class="col-md-3 hidden-xs">
                                <ul class="multi-column-dropdown">
                                    <li class="dropdown-header">Header</li>
                                    <li><a href="#">placeholder</a></li>
                                    <li><a href="#">placeholder</a></li>
                                    <li><a href="#">placeholder</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Header</li>
                                    <li><a href="#">placeholder</a></li>
                                    <li><a href="#">placeholder</a></li>
                                    <li><a href="#">placeholder</a></li>
                                </ul>
                            </li>
                            <li class="col-md-3 hidden-xs">
                                <ul class="multi-column-dropdown">
                                    <li class="dropdown-header">Header</li>
                                    <li><a href="#">placeholder</a></li>
                                    <li><a href="#">placeholder</a></li>
                                    <li><a href="#">placeholder</a></li>
                                    <li><a href="#">placeholder</a></li>
                                    <li><a href="#">placeholder</a></li>
                                    <li><a href="#">placeholder</a></li>
                                    <li><a href="#">placeholder</a></li>
                                </ul>
                                <a href="#" style="float:right;padding-right:25px">See All</a>
                            </li>
                        </ul>
                    </div>
                    <!--TechTicket-->
                    <div class="btn-group">
                        <button type="button" class="btn btn-nav">
                            <span class="glyphicon glyphicon-ok-sign"></span>
                            <p id="techtickets">TechTicket</p>
                        </button>
                    </div>
                    <!--Reports-->
                    <div class="btn-group">
                        <button type="button" class="btn btn-nav">
                            <span class="glyphicon glyphicon-stats"></span>
                            <p id="reports">Reports</p>
                        </button>
                    </div>
                    <!--News-->
                    <div class="btn-group">
                        <button type="button" class="btn btn-nav">
                            <span class="glyphicon glyphicon-bell"></span>
                            <p id="news">News</p>
                        </button>
                    </div>
                    <!--Calendar-->
                    <div class="btn-group">
                        <button type="button" class="btn btn-nav">
                            <span class="glyphicon glyphicon-calendar"></span>
                            <p id="calendar">Calendar</p>
                        </button>
                    </div>
                    <!--Profile-->
                    <div class="btn-group">
                        <button type="button" class="btn btn-nav">
                            <span class="glyphicon glyphicon-user"></span>
                            <p id="profile">Profile</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
        
        
        
        
        
        
        
        <!-- Wrapper -->
        <div id="wrapper">
            <!-- Main -->

            <section id="main">
                <nav style="margin-bottom: 20px;">
                    <a href="index.php">Home</a>
                    <a href="#">Type</a>
                    <a href="maps.php">Maps</a>
                    <a href="contact.php">Contact</a>
                </nav>
                <hr />
                <div id="map_canvas"></div>  
                <!-- Footer -->
                <footer id="footer">
                    <ul class="copyright">
                        <li>&copy; </li>
                        <li>Design: </li>
                    </ul>
                </footer>

        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>        
        <script type="text/javascript">
            var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้    
            var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น    
            var my_Marker = []; // สำหรับปักหมุด  
            var obj_marker;  // สำหรับเก็บค่าพิกัดและข้อมูลจากฐานข้อมูล  
            var limit_show = 10; // กำหนดแสดงรายการไม่เกิน  
            var infowindow = []; // กำหนดตัวแปรสำหรับเก็บตัว popup แสดงรายละเอียดสถานที่    
            var infowindowTmp; // กำหนดตัวแปรสำหรับเก็บลำดับของ infowindow ที่เปิดล่าสุด        
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

                // ดึงข้อมูลจากฐานข้อมูลที่สร้างมาในรูปแบบไฟล์ json  
                $.getJSON("genMarker.php", function (data) {
                    obj_marker = data; // เก็บค่าไว้ในตัวแปร ไว้ใช้งาน  
                    var m = 0;
                    $.each(obj_marker, function (i, k) {  // วนลูปแสดงการปักหมุด  
                        if (m < limit_show) { // ปักหมดได้ไม่เกิน limit_show  
                            var markerLatLng = new GGM.LatLng(obj_marker[i].latitude, obj_marker[i].longitude);
                            my_Marker[i] = new GGM.Marker({// สร้างตัว marker    
                                position: markerLatLng, // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง    
                                map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map    
                                title: obj_marker[i].station_name // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ    
                            });

                            // ส่วนของ infowindow สำหรับทดสอบ ดึงจากชื่อ titile  
                            infowindow[i] = new GGM.InfoWindow({// สร้าง infowindow ของแต่ละ marker เป็นแบบ array    
                                content: my_Marker[i].getTitle() // ดึง title ในตัว marker มาแสดงใน infowindow    
                            });

                            //  กรณีนำไปประยุกต์ ดึงข้อมูลจากฐานข้อมูลมาแสดง    
                            //                        infowindow[i] = new GGM.InfoWindow({       
                            //                          content:$.ajax({       
                            //                              url:'placeDetail.php',//ใช้ ajax ใน jQuery ดึงข้อมูล       
                            //                              data:'placeID='+obj_marker[i].province_id,  // ส่งค่าตัวแปร ไปดึงข้อมูลจากฐานข้อมูล    
                            //                              async:false       
                            //                          }).responseText       
                            //                        });                             


                            // ส่วนของการกำหนด ให้เมื่อคลิกแต่ละ marker  
                            GGM.event.addListener(my_Marker[i], "click", function () { // เมื่อคลิกตัว marker แต่ละตัว    
                                if (infowindowTmp) { // ให้ตรวจสอบว่ามี infowindow ตัวไหนเปิดอยู่หรือไม่    
                                    infowindow[infowindowTmp].close();  // ถ้ามีให้ปิด infowindow ที่เปิดอยู่    
                                }
                                infowindow[i].open(map, my_Marker[i]); // แสดง infowindow ของตัว marker ที่คลิก    
                                infowindowTmp = i; // เก็บ infowindow ที่เปิดไว้อ้างอิงใช้งาน    
                            });
                            m++;
                        }

                    });
                });


                // กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom    
                GGM.event.addListener(map, 'zoom_changed', function () {
                    // วนลูปล้างค่าเก่า ก่อนสร้างปักหมุดใหม่  
                    if (my_Marker.length > 0) {
                        for (i = 0; i < my_Marker.length; i++) {
                            my_Marker[i].setMap(null);
                        }
                    }
                    var m = 0;
                    var map_zoom = map.getZoom();
                    // zoom เท่าไหร่ แสดงเท่าไหร่ เงื่อนไขกำหนดตามต้องการ  
                    if (map_zoom <= 6) {
                        limit_show = 10;
                    } else if (map_zoom <= 7) {
                        limit_show = 30;
                    } else if (map_zoom <= 8) {
                        limit_show = 40;
                    } else if (map_zoom <= 20) {
                        limit_show = 100;
                    } else {
                        limit_show = 10;
                    }
                    $.each(obj_marker, function (i, k) {  // วนลูปแสดงการปักหมุด  
                        if (m < limit_show) { // ปักหมดได้ไม่เกิน limit_show  

                            var markerLatLng = new GGM.LatLng(obj_marker[i].latitude, obj_marker[i].longitude);
                            my_Marker[i] = new GGM.Marker({// สร้างตัว marker    
                                position: markerLatLng, // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง    
                                map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map    
                                title: obj_marker[i].station_name // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ    
                            });

                            // ส่วนของ infowindow สำหรับทดสอบ ดึงจากชื่อ titile  
                            infowindow[i] = new GGM.InfoWindow({// สร้าง infowindow ของแต่ละ marker เป็นแบบ array    
                                content: my_Marker[i].getTitle() // ดึง title ในตัว marker มาแสดงใน infowindow    
                            });
                            //  กรณีนำไปประยุกต์ ดึงข้อมูลจากฐานข้อมูลมาแสดง    
                            //                        infowindow[i] = new GGM.InfoWindow({       
                            //                          content:$.ajax({       
                            //                              url:'placeDetail.php',//ใช้ ajax ใน jQuery ดึงข้อมูล       
                            //                              data:'placeID='+obj_marker[i].province_id,  // ส่งค่าตัวแปร ไปดึงข้อมูลจากฐานข้อมูล    
                            //                              async:false       
                            //                          }).responseText       
                            //                        });                             

                            // ส่วนของการกำหนด ให้เมื่อคลิกแต่ละ marker  
                            GGM.event.addListener(my_Marker[i], "click", function () { // เมื่อคลิกตัว marker แต่ละตัว    
                                if (infowindowTmp) { // ให้ตรวจสอบว่ามี infowindow ตัวไหนเปิดอยู่หรือไม่    
                                    infowindow[infowindowTmp].close();  // ถ้ามีให้ปิด infowindow ที่เปิดอยู่    
                                }
                                infowindow[i].open(map, my_Marker[i]); // แสดง infowindow ของตัว marker ที่คลิก    
                                infowindowTmp = i; // เก็บ infowindow ที่เปิดไว้อ้างอิงใช้งาน    
                            });
                            m++;
                        }
                    });

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