
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
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <script type="text/javascript" src="main.js"></script>
    </head>
    <body class="is-loading">

        <!-- Wrapper -->
        <div id="wrapper">
            <!-- Main -->
            <style type="text/css">    
                html { height: 100% }    
                body {     
                    height:100%;    
                    margin:0;padding:0;    
                    font-family:tahoma, "Microsoft Sans Serif", sans-serif, Verdana;    
                    font-size:12px;    
                }    
                /* css กำหนดความกว้าง ความสูงของแผนที่ */    
                #map {     
                    width:800px;    
                    height:400px;    
                    margin:auto;    
                    margin-top:50px;    
                }    
            </style> 
            <section id="main">
                <nav style="margin-bottom: 20px;">
                    <a href="index.php">Home</a>
                    <a href="#">Type</a>
                    <a href="maps.php">Maps</a>
                    <a href="contact.php">Contact</a>
                </nav>

                <hr />
                <div class="content">
                    <div>  
                        <div id="map"></div>    

                    </div>   
                </div>      

            </section>




            <script type="text/javascript">
                function initMap() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: -34.397, lng: 150.644},
                        zoom: 6
                    });
                    var infoWindow = new google.maps.InfoWindow({map: map});

                    // Try HTML5 geolocation.
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {
                            var pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude
                            };

                            infoWindow.setPosition(pos);
                            infoWindow.setContent('Location found.');
                            map.setCenter(pos);
                        }, function () {
                            handleLocationError(true, infoWindow, map.getCenter());
                        });
                    } else {
                        // Browser doesn't support Geolocation
                        handleLocationError(false, infoWindow, map.getCenter());
                    }
                }

                function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                    infoWindow.setPosition(pos);
                    infoWindow.setContent(browserHasGeolocation ?
                            'Error: The Geolocation service failed.' :
                            'Error: Your browser doesn\'t support geolocation.');
                }
            </script>

            <!-- Footer -->
            <footer id="footer">
                <ul class="copyright">
                    <li>&copy; </li>
                    <li>Design: </li>
                </ul>
            </footer>

        </div>

        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKJ_TnYg-UDU-HED3pYynqkT5zXdmqp-Q&callback=initMap">
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