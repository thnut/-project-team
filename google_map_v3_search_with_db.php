<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"   
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
    <head>  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
        <title>Google Map API 3 - 01</title>  
        <style type="text/css">  
            html { height: 100% }  
            body {   
                height:100%;  
                margin:0;padding:0;  
                font-family:tahoma, "Microsoft Sans Serif", sans-serif, Verdana;  
                font-size:12px;  
            }  
            /* css กำหนดความกว้าง ความสูงของแผนที่ */  
            #map_canvas {   
                width:550px;  
                height:400px;  
                margin:auto;  
                /*  margin-top:100px;*/  
            }  
        </style>  


    </head>  

    <body>  
        <div id="map_canvas"></div>  
        <div id="showDD" style="margin:auto;padding-top:5px;width:550px;">    
            <form id="form_get_detailMap" name="form_get_detailMap" method="post" action="">    
                Latitude    
                <input name="lat_value" type="text" id="lat_value" value="0" />  <br />  
                Longitude    
                <input name="lon_value" type="text" id="lon_value" value="0" />  <br />  
                Zoom    
                <input name="zoom_value" type="text" id="zoom_value" value="0" size="5" />    
                <br />  
                <input type="submit" name="button" id="button" value="บันทึก" />    
            </form>    

            <div id="form_search_data">  
                <form id="form_search_map_data" name="form_search_map_data" method="post" action="">  
                    <input type="text" name="data_search" id="data_search" value="<?= $_POST['data_search'] ?>" style="width:300px;" />  
                    <input type="submit" name="bt_search" id="bt_search" value="Search" />  
                </form>  
            </div>  
        </div>   

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>      
        <script type="text/javascript">
            var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้  
            var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น  
            function initialize() { // ฟังก์ชันแสดงแผนที่  
                GGM = new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM  
                // กำหนดจุดเริ่มต้นของแผนที่  
                var my_Latlng = new GGM.LatLng(13.761728449950002, 100.6527900695800);
                var my_mapTypeId = GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง  
                // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas  
                var my_DivObj = $("#map_canvas")[0];
                // กำหนด Option ของแผนที่  
                var myOptions = {
                    zoom: 6, // กำหนดขนาดการ zoom  
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

                // เรียกใช้คุณสมบัติ ระบุตำแหน่ง ของ html 5 ถ้ามี  
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

                // กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom  
                GGM.event.addListener(map, 'zoom_changed', function () {
                    $("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value    
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
    </body>  
</html>  

-->













<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Google Map API 3 - 01</title>
        <style type="text/css">
            html { height: 100% }
            body { 
                height:100%;
                margin:0;padding:0;
                font-family:tahoma, "Microsoft Sans Serif", sans-serif, Verdana;
                font-size:12px;
            }
            /* css กำหนดความกว้าง ความสูงของแผนที่ */
            #map_canvas { 
                position:relative;
                width:550px;
                height:400px;
                margin:auto;
            }
            /* css สำหรับ div คลุม google map อีกที */
            #contain_map{
                position:relative;
                width:550px;
                height:400px;
                margin:auto;	
            }
            /* css ของส่วนการกำหนดจุดเริ่มต้น และปลายทาง */
            #showDD{
                position:absolute;
                bottom:0px;
                height:30px;
                padding-top:5px;
                background-color:#000;
                color:#FFF;	
            }
            /* css ของส่วนแสดงคำแนะนำเส้นทางการเดินทาง */
            #directionsPanel{
                width:550px;
                margin:auto;
                clear:both;	
                background-color:#F1FEE9;
            }
            /* css ในส่วนข้อมูลการแนะนำเส้นทาง เพิ่มเติม ถ้าต้องการกำหนด */
            .adp-placemark{
                background-color:#9C3;
            }
            .adp-summary{

            }
            .adp-directions{

            }
        </style>


    </head>

    <body>

        <div id="contain_map">
            <div id="map_canvas"></div>
            <div id="showDD">  
                <!--textbox กรอกชื่อสถานที่ และปุ่มสำหรับการค้นหา เอาไว้นอกแท็ก <form>-->

<!--                <table width="550" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center">
                            From :
                            <input name="namePlace" type="text" id="namePlace" size="20" />
                            To:
                            <input name="toPlace" type="text" id="toPlace" size="20" value="" />
                            <input type="button" name="SearchPlace" id="SearchPlace" value="Search" />
                            <input type="button" name="iClear" id="iClear" value="Clear" />    
                        </td>
                    </tr>
                </table>-->
                <input type="button" name="SearchPlace" id="SearchPlace" value="Search" />
                <div class="panel-body">
                    <div class="row">
                        <div class="heading-location">
                            <p><b>บริษัท รถขนส่งสาธารณะ</b></p>
                        </div>

                        <!------------------- ส่วนของ รถปรับอากาศ ------------------------------>    



                        <div class="heading-location">
                            <p><b>สถานีต้นทาง</b></p>
                        </div>

                        <select class="form-control" name="data_search" id="namePlace" value="<?= $_POST['data_search'] ?>"/>
                        <?php
                        mysql_connect('localhost', 'root', '');
                        mysql_select_db('final_project');
                        mysql_query('SET NAMES UTF8');
                        $sql = "select * from station where station_type Like '%bus%' ";
                        $result = mysql_query($sql);
                        while ($row = mysql_fetch_array($result)) {
                            echo "<option value=" . $row['station_name'] . "'>" . $row['station_name'] . "</option>";
                        }
                        ?>
                        </select>

                        <div class="heading-location">
                            <p><b>สถานีปลายทาง</b></p>
                        </div>

                        <select class="form-control" name="data_search" id="toPlace" value="<?= $_POST['data_search'] ?>"/>
                        <?php
                        mysql_connect('localhost', 'root', '');
                        mysql_select_db('final_project');
                        $sql = "select * from station WHERE station_type LIKE '%bus%' Order by station_id DESC ";
                        $result = mysql_query($sql);
                        while ($row = mysql_fetch_array($result)) {
                            echo "<option value=" . $row['station_name'] . "'>" . $row['station_name'] . "</option>";
                        }
                        ?>
                        </select>

                        <ul class="actions">
                            <input type="button" name="SearchPlace" id="searchplace" value="Search" />  
                        </ul>

                    </div>
                </div>   
            </div>



            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
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
                    directionShow = new GGM.DirectionsRenderer({draggable: true});
                    directionsService = new GGM.DirectionsService();
                    // กำหนดจุดเริ่มต้นของแผนที่
                    my_Latlng = new GGM.LatLng(13.761728449950002, 100.6527900695800);
                    // กำหนดตำแหน่งปลายทาง สำหรับการโหลดครั้งแรก
                    initialTo = new GGM.LatLng(13.8129355, 100.7316899);
                    var my_mapTypeId = GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
                    // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
                    var my_DivObj = $("#map_canvas")[0];
                    // กำหนด Option ของแผนที่
                    var myOptions = {
                        zoom: 13, // กำหนดขนาดการ zoom
                        center: my_Latlng, // กำหนดจุดกึ่งกลาง จากตัวแปร my_Latlng
                        mapTypeId: my_mapTypeId.ROADMAP,
                        mapTypeControlOptions: {// การจัดรูปแบบส่วนควบคุมประเภทแผนที่  
                            position: GGM.ControlPosition.TOP, // จัดตำแหน่ง  
                            style: GGM.MapTypeControlStyle.DROPDOWN_MENU // จัดรูปแบบ style   
                        }// กำหนดรูปแบบแผนที่ จากตัวแปร my_mapTypeId
                    };
                    map = new GGM.Map(my_DivObj, myOptions); // สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map

                    directionShow.setMap(map); // กำหนดว่า จะให้มีการสร้างเส้นทางในแผนที่ที่ชื่อ map
                   
                    
                    // กำหนด event ให้กับเส้นทาง กรณีเมื่อมีการเปลี่ยนแปลง 
                    GGM.event.addListener(directionShow, 'directions_changed', function () {
                        var results = directionShow.directions; // เรียกใช้งานข้อมูลเส้นทางใหม่ 
                    });

                }
                $(function () {
                    // ส่วนของฟังก์ชัน สำหรับการสร้างเส้นทาง
                    searchRoute = function (FromPlace, ToPlace) { // ฟังก์ชัน สำหรับการสร้างเส้นทาง
                        if (!FromPlace && !ToPlace) { // ถ้าไม่ได้ส่งค่าเริ่มต้นมา ให้ใฃ้ค่าจากการค้นหา
                            var FromPlace = $("#namePlace").val();// รับค่าชื่อสถานที่เริ่มต้น
                            var ToPlace = $("#toPlace").val(); // รับค่าชื่อสถานที่ปลายทาง
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

                    // ส่วนควบคุมปุ่มคำสั่งใช้งานฟังก์ชัน
                    $("#SearchPlace").click(function () { // เมื่อคลิกที่ปุ่ม id=SearchPlace 
                        searchRoute();	// เรียกใช้งานฟังก์ชัน ค้นหาเส้นทาง
                    });

                    $("#namePlace,#toPlace").keyup(function (event) { // เมื่อพิมพ์คำค้นหาในกล่องค้นหา
                        if (event.keyCode == 13 && $(this).val() != "") {	// 	ตรวจสอบปุ่มถ้ากด ถ้าเป็นปุ่ม Enter 
                            searchRoute();		// เรียกใช้งานฟังก์ชัน ค้นหาเส้นทาง
                        }
                    });

                    $("#iClear").click(function () {
                        $("#namePlace,#toPlace").val(""); // ล้างค่าข้อมูล สำหรับพิมพ์คำค้นหาใหม่
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
    </body>
</html>