
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
    var trafficLayer = new google.maps.TrafficLayer();
    trafficLayer.setMap(map);
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
    }
    // ส่วนของฟังก์ชัน สำหรับการสร้างเส้นทาง  
    searchRoute = function (FromPlace, ToPlace, my2waypoint, infoData) { // ฟังก์ชัน สำหรับการสร้างเส้นทาง  
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
                for (i = 0; i < legs.length; i++) {
                    legs[i].start_address = infoData[i];  //�?ำห�?ด windows info
                    legs[i].end_address = infoData[i];
                }
            } else {
                // กรณีไม่พบเส้นทาง หรือไม่สามารถสร้างเส้นทางได้  
                window.alert('Directions request failed due to ' + status);
            }
        });
    }

    function makeInfo(id, data) { /// สร้างฟังก์ชั่น  info windows
        data = data[id];
        var name = data['station_name'];
        var txt = "<strong>" + name + "<strong></br>";
        return txt;
    }

    // ส่วนควบคุมปุ่มคำสั่งใช้งานฟังก์ชัน  
    $("#SearchPlace").click(function () { // เมื่อคลิกที่ปุ่ม id=SearchPlace   
        $.ajax({
            url: "gd.php", // ใช้ Ajax ดึงค่าจาก file gd.php
            type: "GET",
            data: ({
                start: $('#namePlace').val(),
                end: $('#toplace').val(),
            }),
            datatype: "json",
        }).success(function (result) {
            var data = jQuery.parseJSON(result);
            var my2waypoint = [];
            var info = [];
            var htmlPanel = '';
            var size = data.length;
            for (var index in data) {
                if (index == 0) {
                    var place = data[index];
                    var place_name = place['station_name'];
                    var place_Lat = place['station_lat'];
                    var place_Lng = place['station_lon'];
                    var place_type = place['station_type'];
                    origin = new GGM.LatLng(place_Lat, place_Lng);
                    info[index] = makeInfo(index, data); // ข้อมูล Info
                    htmlPanel = htmlPanel.concat("<h2>" + place_name + "</h2>" + place_type); // รายละเอียดแสดง name and type and km
                } else if (index == size - 1) {
                    var place = data[index];
                    var place_name = place['station_name'];
                    var place_Lat = place['station_lat'];
                    var place_Lng = place['station_lon'];
                    var place_type = place['station_type'];
                    destination = new GGM.LatLng(place_Lat, place_Lng);
                    info[index] = makeInfo(index, data); // ข้อมูล Info
                    htmlPanel = htmlPanel.concat("<h2>" + place_name + "</h2>" + place_type); // รายละเอียดแสดง name and type and km
                } else {
                    var place = data[index];
                    var place_name = place['station_name'];
                    var place_lat = place['station_lat'];
                    var place_lng = place['station_lon'];
                    var place_type = place['station_type'];
                    var latlng = [place_lat, place_lng];
                    info[index] = makeInfo(index, data); // ข้อมูล Info
                    my2waypoint.push(latlng); 
                    htmlPanel = htmlPanel.concat("<h2>" + place_name + "</h2>" + place_type); // รายละเอียดแสดง name and type and km
                }
            }
            $("#directionsPanel").html(htmlPanel);
            searchRoute(origin, destination, my2waypoint, info);
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
                        directionShow.htmlPanel($("#directionsPanel")[0]);
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
