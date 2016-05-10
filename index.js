
// Initialise some variables
var directionsService = new google.maps.DirectionsService();
var num, map, data;
var requestArray = [], renderArray = [];

// 16 Standard Colours for navigation polylines
var colourArray = ['#1e90ff', '#8B8682', '#8B8682', 'fuchsia', 'white', 'lime', 'maroon', 'purple', 'aqua', 'red', 'green', 'silver', 'olive', 'blue', 'yellow', 'teal'];

// Let's make an array of requests which will become individual polylines on the map.
function generateRequests(jsonArray, data_js) {
  requestArray = [];
  for (var route in jsonArray) {
    // This now deals with one of the people / routes
    // Somewhere to store the wayoints
    var waypts = [];
    // 'start' and 'finish' will be the routes origin and destination
    var start, finish
    // lastpoint is used to ensure that duplicate waypoints are stripped
    var lastpoint
    data = jsonArray[route]
    limit = data.length
    for (var waypoint = 0; waypoint < limit; waypoint++) {
      if (data[waypoint] === lastpoint) {
        // Duplicate of of the last waypoint - don't bother
        continue;
      }
      // Prepare the lastpoint for the next loop
      lastpoint = data[waypoint]
      // Add this to waypoint to the array for making the request
      waypts.push({
        location: data[waypoint],
        stopover: true
      });
    }

    // Grab the first waypoint for the 'start' location
    start = (waypts.shift()).location;
    // Grab the last waypoint for use as a 'finish' location
    finish = waypts.pop();

    if (finish === undefined) {
      // Unless there was no finish location for some reason?
      finish = start;
    } else {
      finish = finish.location;
    }

    // Let's create the Google Maps request object
    var request = {
      origin: start,
      destination: finish,
      waypoints: waypts,
      travelMode: google.maps.TravelMode.DRIVING
    };

    // and save it in our requestArray
    requestArray.push({"route": route, "request": request});

  }
  processRequests(data_js);
}

function processRequests(data_js) {
  // Counter to track request submission and process one at a time;
  var i = 0;
  // Used to submit the request 'i'
  function submitRequest() {
    directionsService.route(requestArray[i].request, directionResults);
    // console.log(directionResults);
  }
  // Used as callback for the above request for current 'i'
  function directionResults(result, status) {
    if (status == google.maps.DirectionsStatus.OK) {

      // Create a unique DirectionsRenderer 'i'
      renderArray[i] = new google.maps.DirectionsRenderer(); // สร้างตัวเส้นทางทัพกับไเปเรื่อยๆ
      renderArray[i].setMap(map);

      // console.log(result);
      // Some unique options from the colorArray so we can see the routes
      renderArray[i].setOptions({
        preserveViewport: true,
        polylineOptions: { // ตั้งค่า polylines สีน้ำหนัก ความหนา เส้นทั่วไป
          strokeWeight: 10,
          strokeOpacity: 0.8,
          strokeColor: colourArray[i]
        },
        markerOptions: {
        }
      });

      if (i == 0) {
        renderArray[i].setOptions({  // ตั้งค่า polylines สีน้ำหนักเส้น main route
          preserveViewport: true,
          polylineOptions: {
            strokeWeight: 11,
            strokeOpacity: 20,
            strokeColor: colourArray[i]
          },
          markerOptions: {
          }
        });
      }

      var route = result.routes[0]; //เรียกตัวแปลสร้างเส้นทาง
      var legs = route['legs']; // ตัวแปล api ของ google
      var stations = data_js[i]['step']; // คือการเรียกข้อมูลสถานีแบบ jason
      startLocation = new Object();
      endLocation = new Object();
      for (var index = 0; index < legs.length; index++) {
        legs[index].start_address = "<strong>"+stations[index][1]+"</strong>";  // echo Infowindows
        legs[index].end_address = "<strong>"+stations[index+1][1]+"</strong>"; // echo Infowindows
      }

      // Use this new renderer with the result

      renderArray[i].setDirections(result);
      // and start the next request
      nextRequest();
    }

  }

  function nextRequest() {
    // Increase the counter
    i++;
    // Make sure we are still waiting for a request
    if (i >= requestArray.length) {
      // No more to do
      return;
    }
    // Submit another request
    submitRequest();
  }

  // This request is just to kick start the whole process
  submitRequest();
}

// Called Onload
function init() {
  // Some basic map setup (from the API docs)
  var mapOptions = {
    center: new google.maps.LatLng(17, 103),
    zoom: 7,
    mapTypeControl: false,
    streetViewControl: false,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById('map'), mapOptions);

  var infoWindow = new google.maps.InfoWindow({map: map});
  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: 17,
        lng: 103
      };

      infoWindow.setPosition(pos);
      infoWindow.setContent('Location found.');
      map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }






  // Start the request making
  // console.log("data");
  $("#SearchPlace").click(function () {
    map = new google.maps.Map(document.getElementById('map'), mapOptions);
    $.ajax({ // ใ้ช้ฟังก์ชั่น ajax ในการดึงข้อมูล
      url: "gd.php",
      type: "GET",
      data: ({
        start: $('#namePlace').val(),
        end: $('#toplace').val(),
      }),
      datatype: "json",
    }).success(function (result) {
      var data_js = jQuery.parseJSON(result);

      //ดึงเส้นทาง
      ways = [];
      for (var i = 0; i < data_js.length; i++) {
        if(data_js[i]['step'] != null){
          step = data_js[i]['step'];
          way = [];
          for (var j = 0; j < step.length; j++) {
            lat = step[j]['station_lat'];
            lon = step[j]['station_lon'];
            way.push(lat+','+lon);
          }
          ways.push(way);
        }
      }

      ways_all = {
        "way0": ways[0],
        "way1": ways[1],
        "way2": ways[2],
        // "way2": ways[3], เส้นทางที่ 4
      }

      //ลบเส้นทางที่ undefined
      for (var index in ways_all) {
        if (typeof ways_all[index] == 'undefined'){
          delete ways_all[index];
        }
      }

      generateRequests(ways_all, data_js);
      var htmlPanel = '';
      for (var key in data_js){
        var step = data_js[key]['step'];
        var detail = data_js[key]['detail'];
        // console.log(detail);
        if(step === null){
          break;
        }
        var count = Number(key)+1;
        htmlPanel = htmlPanel.concat("<div class='list-group-item'>"+"<u><p><b>เส้นทางที่ "+ count +"</b></p></u>")
        // console.log(data_js[key]);
        var size = detail.length;
        console.log(size);
        for (var index in step) {
          var place = step[index];

          // console.log(place);
          var place_name = place['station_name'];
          var place_type = place['station_type'];
          if (index == 0) {
            var desctiption = detail[index];
            console.log(desctiption);
            htmlPanel = htmlPanel.concat("<p><b>"+"สถานีต้นทาง : "+ place_name+"</b></p>"+
            "<p>"+"สายรถ : "+desctiption['line']+"</p>"+
            "<p>"+"ระยะทาง : "+ desctiption['distance']+"กิโลเมตร"+"</p>" +
            "<p>"+"ประเภทรถ : "+desctiption['type'] +"</p>");
          } else if (index == size) {
            // var desctiption = detail[index];
            htmlPanel = htmlPanel.concat("<p><b>"+"สถานีปลายทาง : "+ place_name+"</b></p>"+"<br></div>");
          } else {
            var desctiption = detail[index];
            htmlPanel = htmlPanel.concat("<p><b>"+"จุดระหว่างทาง : "+ place_name+"</b></p>"+
            "<p>"+"สายรถ : "+desctiption['line']+"</p>"+
            "<p>"+"ระยะทาง : "+ desctiption['distance']+"กิโลเมตร"+"</p>" +
            "<p>"+"ประเภทรถ : "+desctiption['type'] +"</p>");
          }
        }
        // console.log(htmlPanel);
        // htmlPanel = htmlPanel.concat("</br>------------------------------------------------------------")
      }
      // console.log(htmlPanel);
      $("#directionsPanel").html(htmlPanel);
    });
  });


}

// Get the ball rolling and trigger our init() on 'load'
google.maps.event.addDomListener(window, 'load', init);
