/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var initialLocation;
var khonkaen = new google.maps.LatLng(13.755716, 100.501589);
function initialize() {
    var myOptions = {
        zoom: 15,
        //center: latlng,
        mapTypeControl: false,
        navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);

    // detect geolocation lat/lng
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (location) {
            var location = location.coords;
            $("#geo_data").html('lat: ' + location.latitude + '<br />long: ' + location.longitude);
            initialLocation = new google.maps.LatLng(location.latitude, location.longitude);
            map.setCenter(initialLocation);
            setMarker(initialLocation);
        }, function () {
            handleNoGeolocation();
        });
    } else {
        handleNoGeolocation();
    }

    // no geolocation
    function handleNoGeolocation() {
        map.setCenter(bangkok);
        setMarker(bangkok);
        $("#geo_data").html('lat: 13.755716<br />long: 100.501589');
    }

    // set marker
    function setMarker(initialName) {
        var marker = new google.maps.Marker({
            draggable: true,
            position: initialName,
            map: map,
            title: "คุณอยู่ที่นี่."
        });
        google.maps.event.addListener(marker, 'dragend', function (event) {
            $("#geo_data").html('lat: ' + marker.getPosition().lat() + '<br />long: ' + marker.getPosition().lng());
        });
    }
}

$(document).ready(function () {
    initialize();
});

