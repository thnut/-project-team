<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    //$(document).ready(function() {
                $.ajax({ 
                    url: "testDis.php" ,
                    type: "GET",
                    data:({
                        start:1,
                        end:15,
                    }),
                    datatype: "json",
                }).success(function(result) { 
                    var obj = jQuery.parseJSON(result);
                    
                    var size = obj.length;
                    var origin_place = obj[0];
                    var origin_place_Lat = origin_place['start']['station_lat'];
                    var origin_place_Lng = origin_place['start']['station_lon'];
                    //console.log(obj[size-1]);
                    var destination_place = obj[size-3];
                    var destination_place_Lat = destination_place['end']['station_lat'];
                    var destination_place_Lng = destination_place['end']['station_lon'];
                    console.log(origin_place_Lat+":"+origin_place_Lng);
//                    origin = new GGM.LatLng(origin_place_Lat,origin_place_Lng);
//                    destination = new GGM.LatLng(destination_place_Lat,destination_place_Lng);
//                    console.log(origin);
		});
    //});
//function getdata(){   
//    $.ajax({ 
//                    url: "testDis.php?start=2&end=10" ,
//                    type: "GET",
//                    datatype: "json",
//                }).success(function(result) { 
//                    var obj = jQuery.parseJSON(result);
//                    //console.log(obj.length);
//                    var size = obj.length;
//                    var origin_place = obj[0];
//                    var origin_place_Lat = origin_place['start']['station_lat'];
//                    var origin_place_Lng = origin_place['start']['station_lon'];
//                    console.log(origin_place_Lat+":"+origin_place_Lng);
//		});
//}
</script>
