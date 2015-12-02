<script type="text/javascript">
                    var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้  
                    var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น  
                    GGM = new Object(google.maps);
                    function initialize() { // ฟังก์ชันแสดงแผนที่  
                        // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM  

                        // กำหนดจุดเริ่มต้นของแผนที่  
                        var my_Latlng = new GGM.LatLng(13.761728449950002, 100.6527900695800);
                        // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map
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
                    // direction map

                    var directionShow;
                    var directionsService;
                    var initialTo;
                    var searchRoute;
                    // กำหนดตำแหน่งปลายทาง สำหรบการโหลดครั้งแรก
                    directionShow = new GGM.DirectionsRenderer();
                    directionsService = new GGM.DirectionsService();
                    initialTo = new GGM.LatLng(16.389892, 102.804487);
                    directionShow.setMap(map);
                    directionShow.setPanel($("#directionspanel")[0]);

                    initialTo = new GGM.LatLng(13.8129355, 100.7316899);
                    if (map) {
                        searchRoute(my_Latlng, initialTo); //ให้เรียกฟังก์ชั่นสร้างเส้นทาง
                    }

                    // กำหนด event ให้กับเส้นทาง กรณีเมื่อมีการเปลี่ยนแปลง   
                    GGM.event.addListener(directionShow, 'directions_changed', function () {
                        var results = directionShow.directions; // เรียกใช้งานข้อมูลเส้นทางใหม่   
                    });

                    $(function () {
                        directionsService = new GGM.DirectionsService();
                        // ส่วนของฟังก์ชัน สำหรับการสร้างเส้นทาง  
                        searchRoute = function (FromPlace, ToPlace) { // ฟังก์ชัน สำหรับการสร้างเส้นทาง  
                            if (!FromPlace && !ToPlace) { // ถ้าไม่ได้ส่งค่าเริ่มต้นมา ให้ใฃ้ค่าจากการค้นหา  
                                var FromPlace = $("#namePlace").val();// รับค่าชื่อสถานที่เริ่มต้น  
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

                        $("#SearchPlace").click(function () { // เมื่อคลิกที่ปุ่ม id=SearchPlace   
                            searchRoute();  // เรียกใช้งานฟังก์ชัน ค้นหาเส้นทาง  
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
                </script>    <?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

