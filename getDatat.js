$.ajax({ 
                    url: "testDis.php?start=2&end=10" ,
                    type: "GET",
                    datatype: "json",
                }).success(function(result) { 
                    var obj = jQuery.parseJSON(result);
                    //console.log(obj.length);
                    var size = obj.length;
                    var origin_place = obj[0];
                    var origin_place_Lat = origin_place['start']['station_lat'];
                    var origin_place_Lng = origin_place['start']['station_lng'];
                    
                    var destination_place = obj[size];
                    var destination_place_Lat = destination_place['end']['station_lat'];
                    var destination_place_Lng = destination_place['end']['station_lng'];
                    //console.log(origin_place_Lat+":"+origin_place_Lng);
                    origin = new GGM.LatLng(origin_place_Lat,origin_place_Lng);
                    destination = new GGM.LatLng(destination_place_Lat,destination_place_Lng);
                    console.log(origin);
		});