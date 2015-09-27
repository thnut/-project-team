<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Isan Public</title>
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

        <div class="navbar-wrapper">
            <div class="container">           
                <nav class="navbar navbar-inverse navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Isan Maps</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="index.php">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bus <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">407 พัฒนา</a></li>
                                        <li><a href="#">นครชัยแอร์</a></li>
                                        <li><a href="#">รุ่งประเสริฐทัวร์</a></li>
                                        <li><a href="#">ชาญทัวร์</a></li>
                                        <li><a href="#">สหพันธุ์ร้อยเอ็ด</a></li>
                                        <li><a href="#">อีสานทัวร์</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Van<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">บริษัทภูเขียว</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li class="dropdown-header">Nav header</li>
                                        <li><a href="#">Separated link</a></li>
                                        <li><a href="#">One more separated link</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Table Times <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li class="dropdown-header">Nav header</li>
                                        <li><a href="#">Separated link</a></li>
                                        <li><a href="#">One more separated link </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>


        <!-- Carousel
        ================================================== -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img class="first-slide" src="img/dscf6629_tonemapped.jpg" alt="First slide" >
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>สถานีขนส่งจังหวัดขอนแก่น ที่ 3</h3>
                            <p>สถานีขนส่งประจำจังหวัดขอนแก่นที่ 3 เป็นสถานีขนส่งประจำจังหวัดขอนแก่นที่มีรถสายทั่วประเทศที่ผ่านเข้ามาหรือมีผู้โดยสารที่มีจุดมุ่งหมายเดียวกัน</p>
                            <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>-->
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img class="second-slide" src="img/2-copy1.jpg" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>สถานีขนส่งจังหวัดเชียงใหม่</h3>
                            <p>สถานีขนส่งประจำจังหวัดเชียงใหม่ เป็นสถานีขนส่งประจำจังหวัดเขียงใหม่ที่มีรถสายทั่วประเทศที่ผ่านเข้ามาหรือมีผู้โดยสารที่มีจุดมุ่งหมายเดียวกัน</p>
                            <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>-->
                        </div>
                    </div>
                </div>

            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div><!-- /.carousel -->


        <section id="span-text-1">

            แนะนำบริษัทรถทัวร์และรถตู้ขนส่งสาธารณะ
        </section>

        <!-- Marketing messaging and featurettes
         ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

            <!-- Three columns of text below the carousel -->

            <div class="col-lg-12">
                <div class="notice notice-info">
                    Bus 
                </div>
            </div>
            <div class="row">

                <div class="col-lg-4">
                    <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                    <h2>407 พัฒนา</h2>
                    <p>บริษัท 407 พัฒนา คือ บริษัทรถทัวร์ที่ให้บริการในเขตภาคอีสาน</p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="img-circle" src="img/ref25b.jpg" alt="Generic placeholder image" width="160" height="140">
                    <h2>นครชัยแอร์</h2>
                    <p>ให้บริการรถโดยสารประจำทางที่ยอดเยี่ยมมีมาตรฐาน ตรงตามความต้องการของผู้ใช้บริการด้วยระบบการบริหารงานที่มีธรรมาภิบาล</p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="img-circle" src="img/chantour_logo.gif" alt="Generic placeholder image" width="140" height="140">
                    <h2>ชาญทัวร์</h2>
                    <p>รกิจเดินรถโดยสารดั้งเดิมของชาวขอนแก่น ตลอดกว่า 34 ปี ที่ชาญทัวร์เดินรถโดยสารประจำทางขนส่งผู้โดยสารในหลากหลายเส้นทางของจังหวัดภาคอีสาน กับกรุงเทพมหานคร</p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
            </div>
            <div class="row">

                <div class="col-lg-4">
                    <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                    <h2>รุ่งประเสริฐทัวร์</h2>
                    <p>บริษัท 407 พัฒนา คือ บริษัทรถทัวร์ที่ให้บริการในเขตภาคอีสาน</p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                    <h2>สหพันธ์ร้อยเอ็ดทัวร์</h2>
                    <p>ให้บริการรถโดยสารประจำทางที่ยอดเยี่ยมมีมาตรฐาน ตรงตามความต้องการของผู้ใช้บริการด้วยระบบการบริหารงานที่มีธรรมาภิบาล</p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                    <h2>อีสานทัวร์</h2>
                    <p>รกิจเดินรถโดยสารดั้งเดิมของชาวขอนแก่น ตลอดกว่า 34 ปี ที่ชาญทัวร์เดินรถโดยสารประจำทางขนส่งผู้โดยสารในหลากหลายเส้นทางของจังหวัดภาคอีสาน กับกรุงเทพมหานคร</p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->

            <hr class="featurette-divider">

            <div class="notice notice-info">
                Van
            </div>


            <div class="row">
                <div class="col-lg-4">
                    <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                    <h2>บริษัทภูเขียว</h2>
                    <p>บริษัทภูเขียว คือ บริษัทรถตู้ขนส่งสาธารณะที่มีเส้นทางเดิน ขอนแก่น - ภูเขียว ที่ให้บริการในเขตภาคอีสาน</p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                    <h2>สหพันธ์ร้อยเอ็ดทัวร์</h2>
                    <p>ให้บริการรถโดยสารประจำทางที่ยอดเยี่ยมมีมาตรฐาน ตรงตามความต้องการของผู้ใช้บริการด้วยระบบการบริหารงานที่มีธรรมาภิบาล</p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                    <h2>อีสานทัวร์</h2>
                    <p>รกิจเดินรถโดยสารดั้งเดิมของชาวขอนแก่น ตลอดกว่า 34 ปี ที่ชาญทัวร์เดินรถโดยสารประจำทางขนส่งผู้โดยสารในหลากหลายเส้นทางของจังหวัดภาคอีสาน กับกรุงเทพมหานคร</p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
            </div>
        </div>



        <section id="span-text">
            I have 7 Features for you 
        </section>

        <div class="container marketing">

            <hr class="featurette-divider">
            <section class="row featurette">
                <div class="col-md-6">
                    <center>
                        <img  src="img/bus-ticket-icon.png" alt="ticket-logo" width="250px" height="250px" >
                    </center>
                    <h2 class="featurette-heading">
                        แนะนำเส้นทางการเดินทาง
                        <span class="text-muted"></span></h2>
                    <p class="lead">แนะนำเส้นทางการเดินทางของคุณด้วยรถทัวร์และรถตู้</p>

                    <div class="heading-location">
                        <p>สถานีต้นทาง</p>
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
                        <label>
                            <input type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                            Bus
                        </label>
                        <label>
                            <input type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                            Van
                        </label>
                    </div>
                    <div class="submit-b">
                        <center><a class="btn btn-lg btn-info" href="#" role="button">Submit</a></center>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="timeline-centered">
                        <article class="timeline-entry">
                            <div class="timeline-entry-inner">
                                <div class="timeline-icon bg-success">
                                    <i class="entypo-feather"></i>
                                </div>
                                <div class="timeline-label">
                                    <h2><a href="#">ขึ้นท่ารถตู้ที่สวนกัลปพฤกษ์</a></h2>
                                    <p>2 km</p>
                                </div>
                            </div>

                        </article>


                        <article class="timeline-entry">
                            <div class="timeline-entry-inner">
                                <div class="timeline-icon bg-secondary">
                                    <i class="entypo-suitcase"></i>
                                </div>
                                <div class="timeline-label">
                                    <h2><a href="#">ต่อรถตู้ที่เซนทรัลพลาซ่าขอนแก่น เพื่อไปลงสถานีขนส่งที่ 3 จังหวัดขอนแก่น</a></h2>
                                    <p>6 Km</p>
                                </div>
                            </div>
                        </article>


                        <article class="timeline-entry">
                            <div class="timeline-entry-inner">
                                <div class="timeline-icon bg-info">
                                    <i class="entypo-location"></i>
                                </div>
                                <div class="timeline-label">
                                    <h2><a href="#">ขึ้นรถทัวร์สถานีขนส่งที่ 3 จังหวัดขอนแก่น</a></h2>
                                    <p>9 Km.</p>
                                </div>
                            </div>
                        </article>

                        <article class="timeline-entry">
                            <div class="timeline-entry-inner">
                                <div class="timeline-icon bg-warning">
                                    <i class="entypo-camera"></i>
                                </div>
                                <div class="timeline-label">
                                    <h2><a href="#">ถึงสถานีปลายทางของท่าน</a></h2>
                                    <p>44 Km</p>
                                </div>
                            </div>

                        </article>


                        <article class="timeline-entry begin">
                            <div class="timeline-entry-inner">
                                <div class="timeline-icon" style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);">
                                    <i class="entypo-flight"></i> +
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </section>




            <!-- START THE FEATURETTES -->
            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 col-md-push-5">
                    <center> <img class="" src="img/red-marker.png" alt="รายชื่อสถานีขนส่งภาคตะวันออกเฉียงเหนือ" width="110px" height="180px"></center>
                    <h2 class="featurette-heading">ค้นหาตำแหน่งปัจจุบันของคุณอัตโนมัติ. 
                        <span class="text-muted"></span>
                    </h2>
                    <p class="lead">ระบบจะระบุตำแหน่งปัจจุบันของคุณว่าตอนนี้คุณอยู่ที่ไหน</p>
                    <!--<center><a class="btn btn-lg btn-info" onclick="initialLocation" role="button">Searh Me</a></center>-->
                </div>
                <div class="col-md-5 col-md-pull-7">

                    <div id="geo_data"></div>
                    <div id="map_canvas"> </div>

                    <script type="text/javascript">

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


                    </script>
                </div>

            </div>

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