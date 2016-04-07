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
            /* css �?ำห�?ด�?วาม�?ว�?า�? �?วามสู�?�?อ�?�?�?�?ที�? */
            #map_canvas {
                position:relative;
                width:550px;
                height:400px;
                margin:auto;
            }
            /* css สำหรั�? div �?ลุม google map อี�?ที */
            #contain_map{
                position:relative;
                width:550px;
                height:400px;
                margin:auto;
            }
            /* css �?อ�?ส�?ว�?�?าร�?ำห�?ด�?ุดเริ�?มต�?�? �?ละ�?ลายทา�? */
            #showDD{
                position:absolute;
                bottom:0px;
                height:30px;
                padding-top:5px;
                background-color:#FDF4D7;
            }
            /* css �?อ�?ส�?ว�?�?สด�?�?ำ�?�?ะ�?ำเส�?�?ทา�?�?ารเดิ�?ทา�? */
            #directionsPanel{
                width:550px;
                margin:auto;
                clear:both;
                /*  background-color:#F1FEE9;*/
            }
            /* css �?�?ส�?ว�?�?�?อมูล�?าร�?�?ะ�?ำเส�?�?ทา�? เ�?ิ�?มเติม ถ�?าต�?อ�?�?าร�?ำห�?ด */
            .adp-placemark{
                /*  background-color:#9C3;*/
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
                <!--textbox �?รอ�?�?ื�?อสถา�?ที�? �?ละ�?ุ�?มสำหรั�?�?าร�?�?�?หา เอา�?ว�?�?อ�?�?ท�?�? <form>-->

                <table width="550" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center">
                            From :

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
                            </select></br>
<!--                            <input name="namePlace" type="text" id="namePlace" size="20" />  </br>-->

                            Destination:
<!--                                    <input name="toPlace" type="text" id="toPlace" size="20" />  -->

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


                            </br>
                            <input type="button" name="SearchPlace" id="SearchPlace" value="สร�?า�?เส�?�?ทา�?" />
                            <input type="button" name="iClear" id="iClear" value="ล�?า�?�?�?า" />
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="directionsPanel" style="margin-top: 60px;"></div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

        <script type="text/javascript">
            var directionShow; // �?ำห�?ดตัว�?�?รสำหรั�?�?�?�?�?า�? �?ั�?�?ารสร�?า�?เส�?�?ทา�?
            var directionsService; // �?ำห�?ดตัว�?�?รสำหรั�?�?ว�?เรีย�?�?�?�?�?�?อมูลเ�?ี�?ยว�?ั�?เส�?�?ทา�?
            var map; // �?ำห�?ดตัว�?�?ร map �?ว�?ด�?า�?�?อ�?�?ั�?�?�?�?ั�? เ�?ื�?อ�?ห�?สามารถเรีย�?�?�?�?�?า�? �?า�?ส�?ว�?อื�?�?�?ด�?
            var GGM; // �?ำห�?ดตัว�?�?ร GGM �?ว�?เ�?�?�? google.maps Object �?ะ�?ด�?เรีย�?�?�?�?�?า�?�?ด�?�?�?าย�?ึ�?�?
            var my_Latlng; // �?ำห�?ดตัว�?�?รสำหรั�?เ�?�?�?�?ุดเริ�?มต�?�?�?อ�?�?�?�?ที�?เมื�?อ�?หลด�?รั�?�?�?ร�?
            var searchRoute; // �?ำห�?ดตัว�?�?ร �?ว�?เ�?�?�?�?ื�?อ�?ั�?�?�?�?ั�?�? �?ห�?สามารถ�?�?�?�?า�?�?า�?ส�?ว�?อื�?�?�? �?ด�?
            var origin = null; // �?ำห�?ดตัว�?�?ร สำหรั�?เ�?�?�? �?ุดเริ�?มต�?�? �?อ�?เส�?�?ทา�?
            var destination = null; // �?ำห�?ดตัว�?�?ร สำหรั�?เ�?�?�?�?ุดหมาย �?ลายทา�? �?อ�?เส�?�?ทา�?
            var waypoints = []; // �?ำห�?ดตัว�?�?ร array สำหรั�?เ�?�?�?�?ุด�?อ�?เส�?�?ทา�?ที�?�?�?า�?
            var markers = []; // �?ำห�?ดตัว�?�?ร array สำหรั�?เ�?�?�?ตัว marker ที�?สร�?า�?�?า�?�?าร�?ลิ�?ที�?�?�?�?ที�?
            var addMarker; // �?ำห�?ดตัว�?�?ร สำหรั�?เ�?�?�?�?ั�?�?�?�?ั�? เ�?ิ�?มตัว marker �?า�?�?าร�?ลิ�?ที�?�?�?�?ที�?
            function initialize() { // �?ั�?�?�?�?ั�?�?สด�?�?�?�?ที�?
                GGM = new Object(google.maps); // เ�?�?�?ตัว�?�?ร google.maps Object �?ว�?�?�?ตัว�?�?ร GGM
                directionShow = new GGM.DirectionsRenderer({draggable: true});
                directionsService = new GGM.DirectionsService();
                // �?ำห�?ด�?ุดเริ�?มต�?�?�?อ�?�?�?�?ที�?
                my_Latlng = new GGM.LatLng(13.761728449950002, 100.6527900695800);
                // �?ำห�?ดตำ�?ห�?�?�?�?ลายทา�? สำหรั�?�?าร�?หลด�?รั�?�?�?ร�?
                var my_mapTypeId = GGM.MapTypeId.ROADMAP; // �?ำห�?ดรู�?�?�?�?�?�?�?ที�?ที�?�?สด�?
                // �?ำห�?ด DOM object ที�?�?ะเอา�?�?�?ที�?�?�?�?สด�? ที�?�?ี�?�?ือ div id=map_canvas
                var my_DivObj = $("#map_canvas")[0];
                // �?ำห�?ด Option �?อ�?�?�?�?ที�?
                var myOptions = {
                    zoom: 5, // �?ำห�?ด�?�?าด�?าร zoom
                    center: my_Latlng, // �?ำห�?ด�?ุด�?ึ�?�?�?ลา�? �?า�?ตัว�?�?ร my_Latlng
                    mapTypeId: my_mapTypeId // �?ำห�?ดรู�?�?�?�?�?�?�?ที�? �?า�?ตัว�?�?ร my_mapTypeId
                };
                map = new GGM.Map(my_DivObj, myOptions); // สร�?า�?�?�?�?ที�?�?ละเ�?�?�?ตัว�?�?ร�?ว�?�?�?�?ื�?อ map


                directionShow.setMap(map); // �?ำห�?ดว�?า �?ะ�?ห�?มี�?ารสร�?า�?เส�?�?ทา�?�?�?�?�?�?ที�?ที�?�?ื�?อ map
                // ส�?ว�?สำหรั�?�?ำห�?ด�?ห�?�?สด�?�?ำ�?�?ะ�?ำเส�?�?ทา�?

                // �?ำห�?ด event �?ห�?�?ั�?เส�?�?ทา�? �?รณีเมื�?อมี�?ารเ�?ลี�?ย�?�?�?ล�?
                GGM.event.addListener(directionShow, 'directions_changed', function () {
                    var results = directionShow.directions; // เรีย�?�?�?�?�?า�?�?�?อมูลเส�?�?ทา�?�?หม�?
                });

            }

            $(function () {
                // ส�?ว�?�?อ�?�?ั�?�?�?�?ั�?เ�?ิ�?มตัว marker
                addMarker = function (latlng) {
                    markers.push(new GGM.Marker({
                        position: latlng,
                        map: map,
                        icon: "http://maps.google.com/mapfiles/marker" + String.fromCharCode(markers.length + 65) + ".png"
                    }));
                    markers.push(new GGM.InfoWindow({// สร�?า�? infowindow �?อ�?�?ต�?ละ marker เ�?�?�?�?�?�? array
                        content: "55555" // ดึ�? title �?�?ตัว marker มา�?สด�?�?�? infowindow
                    }));
//                    console.log(markers);
                }
                // ส�?ว�?�?อ�?�?ั�?�?�?�?ั�? สำหรั�?�?ารสร�?า�?เส�?�?ทา�?
                searchRoute = function (FromPlace, ToPlace, my2waypoint, infoData) { // �?ั�?�?�?�?ั�? สำหรั�?�?ารสร�?า�?เส�?�?ทา�?
                    if (origin == null || destination == null) { //
                        return false;
                    }
                    if (!FromPlace && !ToPlace) { // ถ�?า�?ม�?�?ด�?ส�?�?�?�?าเริ�?มต�?�?มา �?ห�?�?�?�?�?�?า�?า�?�?าร�?�?�?หา
                        if ($("#namePlace").val() == "" && $("#toPlace").val() == "") { // ถ�?า�?�?า�?�?�?หาเ�?�?�?ว�?า�?
                            if (origin == null || destination == null) { // ถ�?า�?ม�?มี�?ุดเริ�?มต�?�? �?ละ�?ุด�?ลายทา�?
                                return false;
                            } else { // มี�?าร�?ำห�?ด�?ุดเริ�?มต�?�?เส�?�?ทา�? �?ละ �?ุด�?ลายทา�?
                                var FromPlace = origin;// รั�?�?�?า�?า�?�?ุดเริ�?มต�?�?เส�?�?ทา�?
                                var ToPlace = destination; // รั�?�?�?า�?า�?�?ุด�?ลายทา�?
                            }
                        } else {
                            var FromPlace = $("#namePlace").val();// รั�?�?�?า�?ื�?อสถา�?ที�?เริ�?มต�?�?
                            var ToPlace = $("#toPlace").val(); // รั�?�?�?า�?ื�?อสถา�?ที�?�?ลายทา�?
                        }
                    }
//
                    if (waypoints.length < 9) { // �?ำห�?ดเ�?ื�?อ�?�?�?ห�?ามเ�?ิ�? 9 �?ุด เ�?ื�?อ�?ม�?�?ห�?ทำ�?า�?�?�?าเ�?ิ�?�?�?
//                        waypoints.push({location: my_waypoint, stopover: true}); // �?ำห�?ด�?ุด�?�?า�?เส�?�?ทา�?

                        for (var i = 0; i < my2waypoint.length; i++) {
                            var point = new GGM.LatLng(my2waypoint[i][0], my2waypoint[i][1]);
                            //alert(point);
                            waypoints.push({location: point, stopover: true});
                        }
                        destination = event.latLng; // เ�?ิ�?ม�?ลายทา�?
                        addMarker(destination); // เ�?ิ�?มตัว marker ที�?ตำ�?ห�?�?�?�?ี�?
                    } else {
                        alert("�?ุด�?�?า�?เส�?�?ทา�?มา�?สุด �?ม�?เ�?ิ�? 9 �?ุด");
                    }
//
                    // �?ำห�?ด option สำหรั�?ส�?�?�?�?า�?�?�?ห�? google �?�?�?หา�?�?อมูล
                    var request = {
                        origin: FromPlace, // สถา�?ที�?เริ�?มต�?�?
                        destination: ToPlace, // สถา�?ที�?�?ลายทา�?
                        waypoints: waypoints, // // ส�?�?�?�?า�?ุด�?�?า�?เส�?�?ทา�?
                        optimizeWaypoints: true,
                        travelMode: GGM.DirectionsTravelMode.DRIVING // �?รณี�?ารเดิ�?ทา�?�?ดยรถย�?ต�?
                    };

                    // ส�?�?�?ำร�?อ�?�?อ �?ะ�?ื�?�?�?ามาเ�?�?�?สถา�?ะ �?ละ�?ลลั�?�?�?
                    directionsService.route(request, function (response, status) {
                        if (status == GGM.DirectionsStatus.OK) { // ถ�?าสามารถ�?�?�?หา �?ละสร�?า�?เส�?�?ทา�?�?ด�?
                            waypts = [];
                            var bounds = new GGM.LatLngBounds();
                            var route = response.routes[0];
                            startLocation = new Object();
                            endLocation = new Object();

//                            directionShow.setDirections(response); // สร�?า�?เส�?�?ทา�?�?า�?�?ลลั�?�?�?
                            var legs = response['routes'][0]['legs'];
//                            console.log(legs);
                            for (i = 0; i < legs.length; i++) {
                                legs[i].start_address = infoData[i];  //�?ำห�?ด windows info
                                legs[i].end_address = infoData[i];
                            }
//                            console.log(legs);
                            response['routes'][0]['legs'] = legs;
                            directionShow.setDirections(response); // สร�?า�?เส�?�?ทา�?�?า�?�?ลลั�?�?�?
//                            var summaryPanel = document.getElementById('directions-panel');
//                            for (var i = 0; i < markers.length; i++) { // ว�?ลู�?ล�?า�?�?�?าตัว marker
//                                var routeSegment = i + 1;
//                                summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment + /control panel �?อ�? google maps
//                                        '</b><br>';
//                                summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
//                                summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
//                                summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
//                            }
//                            markers = []; // ล�?า�?�?�?าตัว�?�?ร array ตัว marker
                        } else {
                            // �?รณี�?ม�?�?�?เส�?�?ทา�? หรือ�?ม�?สามารถสร�?า�?เส�?�?ทา�?�?ด�?
                            window.alert('Directions request failed due to ' + status);
                        }
                    });
                }


                function makeInfo(id, data) { /// �?ั�?�?ั�?�?�?ัดรู�?�?�?�? info windows
                    data = data[id];
                    var name = data['station_name'];
                    var type = data['station_type'];
                    var txt = "<strong>" + name + "<strong></br>" + type;
                    // console.log(txt);
                    return txt;
                }

                // ส�?ว�?�?ว�?�?ุม�?ุ�?ม�?ำสั�?�?�?�?�?�?า�?�?ั�?�?�?�?ั�?
                $("#SearchPlace").click(function () { // เมื�?อ�?ลิ�?ที�?�?ุ�?ม id=SearchPlace
                    //searchRoute();
                    // เรีย�?�?�?�?�?า�?�?ั�?�?�?�?ั�? �?�?�?หาเส�?�?ทา�?
                    //  console.log('data');
                    // direcPanel();
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
                        var info = [];
                        var htmlPanel = '';
                        // console.log(data);
                        var size = data.length;
                        for (var index in data) {
//                            console.log(data[index]);
                            if (index == 0) {
                                var place = data[index];
                                var place_name = place['station_name'];
                                var place_Lat = place['station_lat'];
                                var place_Lng = place['station_lon'];
                                var place_type = place['station_type'];


                                origin = new GGM.LatLng(place_Lat, place_Lng);
                                info[index] = makeInfo(index, data);
                                htmlPanel = htmlPanel.concat("<h2>" + place_name + "</h2>" + place_type); // ����ʴ��Ū��ͧ͢ʶҹ�
                            } else if (index == size - 1) {
                                var place = data[index];
                                var place_name = place['station_name'];
                                var place_Lat = place['station_lat'];
                                var place_Lng = place['station_lon'];
                                var place_type = place['station_type'];

                                destination = new GGM.LatLng(place_Lat, place_Lng);
                                info[index] = makeInfo(index, data); // info ��͵�Ƿ��֧�ҡ�ҹ������
                                htmlPanel = htmlPanel.concat("<h2>" + place_name + "</h2>" + place_type); // ����ʴ��Ū��ͧ͢ʶҹ�
                            } else {
                                var place = data[index];
                                var place_name = place['station_name'];
                                var place_lat = place['station_lat'];
                                var place_lng = place['station_lon'];
                                var place_type = place['station_type'];
                                var latlng = [place_lat, place_lng];
                                info[index] = makeInfo(index, data);
                                my2waypoint.push(latlng);
                                htmlPanel = htmlPanel.concat("<h2>" + place_name + "</h2>" + place_type); // ����ʴ��Ū��ͧ͢ʶҹ�
                            }
                        }
                        // console.log(htmlPanal);
                        $("#directionsPanel").html(htmlPanel);
                        searchRoute(origin, destination, my2waypoint, info);
                    });

                });

                $("#namePlace,#toPlace").keyup(function (event) { // เมื�?อ�?ิม�?�?�?ำ�?�?�?หา�?�?�?ล�?อ�?�?�?�?หา
                    if (event.keyCode == 13 && $(this).val() != "") { //  ตรว�?สอ�?�?ุ�?มถ�?า�?ด ถ�?าเ�?�?�?�?ุ�?ม Enter
                        searchRoute();      // เรีย�?�?�?�?�?า�?�?ั�?�?�?�?ั�? �?�?�?หาเส�?�?ทา�?
                    }
                });

                $("#iClear").click(function () {
                    $("#directionsPanel").html('');
                    for (var i = 0; i < markers.length; i++) { // ว�?ลู�?ล�?า�?�?�?าตัว marker
                        markers[i].setMap(null);
                    }
                    markers = []; // ล�?า�?�?�?าตัว�?�?ร array ตัว marker
                    origin = null; // �?ำห�?ดเ�?�?�?�?�?าว�?า�? เ�?ื�?อเริ�?มต�?�?�?หม�?
                    destination = null; /// �?ำห�?ดเ�?�?�?�?�?าว�?า�? เ�?ื�?อเริ�?มต�?�?�?หม�?
                    waypoints = []; // ล�?า�?�?�?าตัว�?�?ร array ตัว waypoints
                    $("#namePlace,#toPlace").val(""); // ล�?า�?�?�?า�?�?อมูล สำหรั�?�?ิม�?�?�?ำ�?�?�?หา�?หม�?
                    directionShow.setMap(null); // ล�?า�?�?�?าเส�?�?ทา�?ออ�?�?า�?�?�?�?ที�?
                    directionShow.setPanel(null);    // ล�?า�?�?�?าส�?ว�?�?�?ะ�?ำเส�?�?ทา�?
                    // �?ำห�?ดส�?ว�?สำหรั�?�?�?�?�?ั�?�?�?�?ที�? �?หม�?อี�?�?รั�?�?
                    directionShow = new GGM.DirectionsRenderer({draggable: true});
                    directionShow.setMap(map); // �?ำห�?ดว�?า �?ะ�?ห�?มี�?ารสร�?า�?เส�?�?ทา�?�?�?�?�?�?ที�?ที�?�?ื�?อ map
                    // ส�?ว�?สำหรั�?�?ำห�?ด�?ห�?�?สด�?�?ำ�?�?ะ�?ำเส�?�?ทา�?
//                    directionShow.setPanel($("#directionsPanel")[0]);
                });

            });
            $(function () {
                // �?หลด ส�?ริ�? google map api เมื�?อเว�?�?�?หลดเรีย�?ร�?อย�?ล�?ว
                // �?�?าตัว�?�?ร ที�?ส�?�?�?�?�?�?�?�?ล�? google map api
                // v=3.2&sensor=false&language=th&callback=initialize
                //  v เวอร�?�?ั�?�? 3.2
                //  sensor �?ำห�?ด�?ห�?สามารถ�?สด�?ตำ�?ห�?�?�?ทำเ�?ิด�?�?�?ที�?อยู�?�?ด�? เหมาะสำหรั�?มือถือ �?�?ติ�?�?�? false
                //  language ภาษา th ,en เ�?�?�?ต�?�?
                //  callback �?ห�?เรีย�?�?�?�?�?ั�?�?�?�?ั�?�?สด�? �?�?�?ที�? initialize
                $("<script/>", {
                    "type": "text/javascript",
                    src: "http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=th&callback=initialize"
                }).appendTo("body");
            });
        </script>
    </body>
</html>
