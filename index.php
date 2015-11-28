<?php require_once('Connections/project.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {

    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
        if (PHP_VERSION < 6) {
            $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        }

        $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

        switch ($theType) {
            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                break;
            case "double":
                $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
                break;
            case "date":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "defined":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return $theValue;
    }

}

mysql_query("SET NAMES utf8");
if (!function_exists("GetSQLValueString")) {

    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
        if (PHP_VERSION < 6) {
            $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        }

        $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

        switch ($theType) {
            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                break;
            case "double":
                $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
                break;
            case "date":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "defined":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return $theValue;
    }

}

mysql_select_db($database_project, $project);
$query_Bus = "SELECT b_name FROM bus";
$Bus = mysql_query($query_Bus, $project) or die(mysql_error());
$row_Bus = mysql_fetch_assoc($Bus);
$totalRows_Bus = mysql_num_rows($Bus);

mysql_select_db($database_project, $project);
$query_van = "SELECT v_name FROM van";
$van = mysql_query($query_van, $project) or die(mysql_error());
$row_van = mysql_fetch_assoc($van);
$totalRows_van = mysql_num_rows($van);
?> 


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta http-equiv=Content-Type content="text/html; charset=utf-8">
        <title>Isan Software Public</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
    </head>
    <body>





        <div class="container marketing">

            <hr class="featurette-divider">
            <div class="col-md-push-3">
                <center>
                    <img  src="img/bus-ticket-icon.png" alt="ticket-logo" width="250px" height="250px" >
                    <h2 class="featurette-heading">
                        แนะนำเส้นทางการเดินทาง
                        <span class="text-muted"></span></h2>
                    <p class="lead">แนะนำเส้นทางการเดินทางของคุณด้วยรถทัวร์และรถตู้</p>
                </center>

            </div>
            
            <section class="row featurette">
                <div class="col-md-6 col-md-push-3">
                    <div class="heading-location">
                        <p>สถานีต้นทาง</p>
                    </div>

                    <select class="form-control">


                        <option><?php echo $row_Bus['b_name']; ?></option>
                        <option><?php echo $row_van['v_name']; ?></option>



                    </select>

                    </select>
                    <div class="heading-location">
                        <p>สถานีปลายทาง</p>
                    </div>
                    <select class="form-control">
                        <option>มหาวิทยาลัยขอนแก่น</option>
                        <option>สถานีขนส่งจังหวัดขอนแก่น</option>
                        <option>สถานีขนส่งอำเภอบ้านไผ่</option>
                        <option>สถานีขนส่งอำเภอเมืองพล</option>
                        <option>สถานีขนส่งนครราชสีมา</option>
                        <option>สถานีขนส่งหมอชิต</option>
                        <option>สถานีขนส่งหนองคาย</option>
                        <option>สถานีขนส่งสกลนคร</option>
                        <option>สถานีขนส่งร้อยเอ็ด</option>
                        <option>สถานีขนส่งสุรินทร์</option>
                        <option>สถานีขนส่งยโสธร</option>
                    </select>
                    <p>Price</p>
                    <input type="text" class="form-control" placeholder="Price" value="50 $" > 
                    <div class="checkbox">
                        <form>
                            <input type="radio" name="sex" value="male" checked>Bus

                            <input type="radio" name="sex" value="female">Van
                        </form>
                    </div>
                    <div class="submit-b">
                        <center><a class="btn btn-lg btn-info" href="#" role="button">Submit</a></center>
                    </div>
                </div>



                
            </section>
            
            
            <div class="col-md-12 ">

                <div id="geo_data"></div>
                <div id="map_canvas"> </div>
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=zCBKVyEhrNx4.k7rAOb02mbyg" width="100%" height="480"></iframe>

                <div id="map"></div>
                <script>
            // Note: This example requires that you consent to location sharing when
            // prompted by your browser. If you see the error "The Geolocation service
            // failed.", it means you probably did not give permission for the browser to
            // locate you.

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
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKJ_TnYg-UDU-HED3pYynqkT5zXdmqp-Q&signed_in=true&callback=initMap"
                        async defer>
                </script>
                
            </div>
            
            




            <!-- START THE FEATURETTES -->


            <hr class="featurette-divider">
            <section class="row featurette">
                <div class="col-md-8">
                    <h2 class="featurette-heading">
                        ค้นหาสถานีที่ใกล้ที่สุด.
                        <span class="text-muted"></span></h2>
                    <p class="lead">คุณสามารถค้นหาสถานีขนส่งสาธารณะที่ใกล้ตัวคุณที่สุด.</p>
                </div>
                <div class="col-md-4">
                    <select class="selectpicker">
                        <option>สถานีขนส่งจังหวัดขอนแก่น</option>
                        <option data-subtext="Heinz">Ketchup</option>
                        <option>สถานีขนส่งจังหวัดขอนแก่น</option>
                    </select>
                </div>
            </section>
            <hr class="featurette-divider">
            <div class="row featurette">
                <div class="col-md-7 col-md-push-5 ">

                    <img class="logo" src="img/Bus-icon.jpg" alt="bus-station" width="250px;" height="250px;">

                    <h2 class="featurette-heading">รายชื่อสถานีขนส่งสาธารณะ. <span class="text-muted"></span></h2>
                    <p class="lead">รายชื่อสถานีขนส่งในเขตภาคตะวันออกเฉียงเหนือ.</p>
                </div>
                <div class="col-md-5 col-md-pull-7">
                    <div class="notice-danger">
                        <div class="heading-location">
                            สถานีต้นทาง - ปลายทาง
                        </div>
                    </div>


                    <select class="form-control " multiple="" style="height: 200px;">
                            <?php do { ?>
                            <option><?php echo $row_Bus['b_name']; ?>
<?php } while ($row_Bus = mysql_fetch_assoc($Bus)); ?>
                        </option>



                    </select>


                </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->


            <!-- FOOTER -->
            <footer>
                <p class="pull-right"><a href="#">Back to top</a></p>
                <p>&copy; 2014 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
            </footer>

        </div><!-- /.container --> 

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="../../assets/js/vendor/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
<?php
mysql_free_result($Bus);

mysql_free_result($van);
?>
