
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
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
                color:#000000;
            }
            /* css ของส่วนการกำหนดจุดเริ่มต้น และปลายทาง */
            #showDD{
                position:absolute;
                bottom:0px;
                height:30px;
                padding-top:5px;
                background-color:#CCC;
                /*        color:#FFF;	*/
            }
            /* css ของส่วนแสดงคำแนะนำเส้นทางการเดินทาง */
            #directionsPanel{
                width:550px;
                margin:auto;
                clear:both;	
                /*        background-color:#F1FEE9;*/
            }
            /* css ในส่วนข้อมูลการแนะนำเส้นทาง เพิ่มเติม ถ้าต้องการกำหนด */
            .adp-placemark{
                /*        background-color:#9C3;*/
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

                <table width="550" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center">
                            From :
                            <input name="namePlace" type="text" id="namePlace" value="" size="20" />
                            To:
                            <input name="toPlace" type="text" id="toPlace" value="" size="20" />
                            <input type="button" name="SearchPlace" id="SearchPlace" value="Search" />
                            <input type="button" name="iClear" id="iClear" value="Clear" />    
                        </td>
                    </tr>
                </table>
            </div>   
        </div>
        <div id="directionsPanel"></div>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
        <script src="http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=th&libraries=places" type="text/javascript"></script>
        <script src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/routeboxer/src/RouteBoxer.js" type="text/javascript"></script>

        <script type="text/javascript">
            var directionShow; // กำหนดตัวแปรสำหรับใช้งาน กับการสร้างเส้นทาง
            var directionsService; // กำหนดตัวแปรสำหรับไว้เรียกใช้ข้อมูลเกี่ยวกับเส้นทาง
            var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
            var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
            var my_Latlng; // กำหนดตัวแปรสำหรับเก็บจุดเริ่มต้นของเส้นทางเมื่อโหลดครั้งแรก
            var initialTo; // กำหนดตัวแปรสำหรับเก็บจุดปลายทาง เมื่อโหลดครั้งแรก
            var searchRoute; // กำหนดตัวแปร ไว้เก็บฃื่อฟังก์ชั้น ให้สามารถใช้งานจากส่วนอื่นๆ ได้



            var boxpolys = null;
            var routeBoxer = null;
            var distance_radius = 0.1 * 1.609344; // เปลี่ยน 0.1 เป็นค่าอื่น 0.1 คือ 100 เมตร   
            var drawBoxes;    // กำหนดตัวแปร ไว้เก็บฃื่อฟังก์ชั้น สำหรับสร้าง boxes
            var clearBoxes;   // กำหนดตัวแปร ไว้เก็บฃื่อฟังก์ชั้น สำหรับลบ boxes

            var findPlaces;   // กำหนดตัวแปร ไว้เก็บฃื่อฟังก์ชั้น การค้นหาสถานที่
            var servicePlace; // ตัวแปรสำหรับใช้กับ place service ของ google place
            var createMarker;  // กำหนดตัวแปร ไว้เก็บฃื่อฟังก์ชั้น  สำหรับสร้าง marker
            var clearMarker;  // กำหนดตัวแปร ไว้เก็บฃื่อฟังก์ชั้น  สำหรับลบ marker

            var gmarkers = [];   // กำหนดตัวแปร สำหรับเก็บ array marker
            var infowindow;   //  กำหนดตัวแปร ไว้เก็บ infowindow

            var response;  // กำหนดตัวแปร เก็บค่าข้อมูลตำแหน่งต่งๆ ในตัวอย่าง จะเป็น string
            // สามารถประยุกต์ ดึงข้อมูลจากฐานข้อมูลและจัดรูปแบบตามตัวอย่่างแทนได้

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
                    mapTypeId: my_mapTypeId // กำหนดรูปแบบแผนที่ จากตัวแปร my_mapTypeId
                };
                map = new GGM.Map(my_DivObj, myOptions); // สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map
                servicePlace = new GGM.places.PlacesService(map); // ยังไม่ใช้ตอนนี้ กำหนดไว้ไม่เสียหาย


                routeBoxer = new RouteBoxer(); // สร้าง object

                directionShow.setMap(map); // กำหนดว่า จะให้มีการสร้างเส้นทางในแผนที่ที่ชื่อ map
                // ส่วนสำหรับกำหนดให้แสดงคำแนะนำเส้นทาง
                directionShow.setPanel($("#directionsPanel")[0]);



                if (map) { // เงื่่อนไขถ้ามีการสร้างแผนที่แล้ว
                    searchRoute(my_Latlng, initialTo); // ให้เรียกใช้ฟังก์ชัน สร้างเส้นทาง
                }

                // กำหนด event ให้กับเส้นทาง กรณีเมื่อมีการเปลี่ยนแปลง 
                GGM.event.addListener(directionShow, 'directions_changed', function () {
                    var results = directionShow.directions; // เรียกใช้งานข้อมูลเส้นทางใหม่ 
                    clearBoxes();
                    clearMarker();
                    // Box around the overview path of the first route
                    var path = results.routes[0].overview_path;
                    var boxes = routeBoxer.box(path, distance_radius);
                    drawBoxes(boxes);

                    // ข้อมูลตัวอย่าง สามารถดึงจากฐานข้อมูลได้
                    $.getJSON("placeDetail.php", function (data) {
                        response = data;
                        findPlaces(boxes, 0); // เริ่มค้นหาสถานที่ หลัง 5 วินาที
                    });

                });

            }
            $(function () {



                searchRoute = function (FromPlace, ToPlace) { // ฟังก์ชัน สำหรับการสร้างเส้นทาง
                    clearBoxes(); // ล้างค่า
                    clearMarker();
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
                    clearBoxes();
                    clearMarker();
                    $("#namePlace,#toPlace").val(""); // ล้างค่าข้อมูล สำหรับพิมพ์คำค้นหาใหม่
                });





                // วาดรูปสี่เหลี่ยม จาก array ของ boxes แล้วแสดงในแผนที่
                drawBoxes = function (boxes) {
                    boxpolys = new Array(boxes.length);
                    for (var i = 0; i < boxes.length; i++) {
                        boxpolys[i] = new GGM.Rectangle({
                            bounds: boxes[i],
                            fillOpacity: 0,
                            strokeOpacity: 0, // ถ้าไม่ต้องการให้มองเห็นกำหนดเป็น 0
                            strokeColor: '#000000',
                            strokeWeight: 1,
                            map: map
                        });
                    }
                }



                // ฟังก์ชั่นวนลูปล้างค่า boxes ออกจากแผนที่ 
                clearBoxes = function () {
                    if (boxpolys != null) {
                        for (var i = 0; i < boxpolys.length; i++) {
                            boxpolys[i].setMap(null);
                        }
                    }
                    boxpolys = null;
                }

                // ฟังก์ชั่นวนลูปล้างค่า Marker ออกจากแผนที่ 
                clearMarker = function () {
                    if (gmarkers != null) {
                        for (var i = 0; i < gmarkers.length; i++) {
                            gmarkers[i].setMap(null);
                        }
                    }
                    //   gmarkers = null;
                }


                findPlaces = function (boxes, searchIndex) {

                    // กำหนดพื้นที่บริเวณขอบเขตที่ต้องการ
                    var southWest = boxes[searchIndex].getSouthWest();
                    var northEast = boxes[searchIndex].getNorthEast();
                    var bounds = new GGM.LatLngBounds(southWest, northEast);

                    var places = response; // นำข้อมูลสถานที่ มาค้นหาว่าอยู่ในบริเวณที่ต้องการหรือไม่
                    for (i in places) {
                        var result = new GGM.LatLng(places[i].latitude, places[i].longitude);
                        var placeDetail = places[i];
                        if (bounds.contains(result)) { // ถ้าพบว่าอยู่ในบริเวณที่ตอ้งการให้สร้าง marker
                            var marker = createMarker(result, placeDetail);
                        }
                    }
                    searchIndex++;
                    if (searchIndex < boxes.length) { // วนลูปหาในขอบเขตทั้งหมด
                        console.log(searchIndex);
                        findPlaces(boxes, searchIndex);
                    }
                }


                // สร้าง marker บทแผนที่
                createMarker = function (place, placeDetail) {
                    var placeLoc = place;

                    // หรือกำหนดเอง สามารถโหลดรุปมา หรือเรียกใช้งานจาก path ตรงได้
                    // https://mapicons.mapsmarker.com/ สร้างรุป icon หรือเลือกรูปได้จากที่นี้    
                    //var image="busstop.png";
                    var image = null;

                    var marker = new GGM.Marker({
                        map: map,
                        icon: image,
                        position: placeLoc
                    });

                    GGM.event.addListener(marker, 'click', function () {
                        console.log(place);
                        infowindow = new GGM.InfoWindow();
                        var contentStr = '<h3>' + placeDetail.title + '</h3>';
                        contentStr += '<br>Latitude:' + placeDetail.latitude;
                        contentStr += '<br>Longitude:' + placeDetail.longitude;
                        infowindow.setContent(contentStr);
                        infowindow.open(map, marker);
                    });
                    gmarkers.push(marker);
                }

            });
            $(function () {

                // ทำงานสร้างและใช้งานแผนที่
                initialize();
                // สังเกตว่า เราจะไม่ได้มีการเรียกใช้ ฟังก์ชั่น initialize แบบกำหนด callback เหมืนอตัวอย่าง
                // ก่อนเนื่องจาก RouteBoxer จำเป็นต้องมีการเรียกใช้งาน google.maps objext ไฟล์
                // google map จึงกำหนดในแท็ก script  ด้านบน

            });
        </script>  
    </body>
</html>