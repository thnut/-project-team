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
                            <a class="navbar-brand" href="#">Maps</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="index.php">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Bus</a></li>
                                <li><a href="#">Van</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Table Times <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li class="dropdown-header">Nav header</li>
                                        <li><a href="#">Separated link</a></li>
                                        <li><a href="#">One more separated link</a></li>
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
                    <img class="first-slide" src="img/IMG_0556.jpg" alt="First slide" style="height: 550px;" >
                    <div class="container">
                        <div class="carousel-caption">


                        </div>
                    </div>
                </div>
                <div class="item">
                    <img class="second-slide" src="img/IMG_0556.jpg" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Another example headline.</h1>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
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
                    <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="160" height="140">
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





            <!-- START THE FEATURETTES -->
            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 col-md-push-5">
                    <h2 class="featurette-heading">ค้นหาตำแหน่งปัจจุบันของคุณ. <span class="text-muted">See for yourself.</span></h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                </div>
                <div class="col-md-5 col-md-pull-7">
                    ตำแหน่งของฉัน:
                    <div id="geo_data"></div>
                    <div id="map_canvas" style="background: #f5f5f5; height:250px; width: 450px;"> </div>

                    <script type="text/javascript">
                        var initialLocation;
                        var bangkok = new google.maps.LatLng(13.755716, 100.501589);
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
                <div class="col-md-7">
                    <h2 class="featurette-heading">ค้นหาสถานีที่ใกล้ที่สุด. <span class="text-muted">ด้วยตัวคุณเอง.</span></h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image">


                    <select class="selectpicker">
                        <option>สถานีขนส่งจังหวัดขอนแก่น</option>
                        <option data-subtext="Heinz">Ketchup</option>
                        <option>สถานีขนส่งจังหวัดขอนแก่น</option>
                    </select>
                </div>
            </section>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 col-md-push-5">
                    <h2 class="featurette-heading">เช็คราคาตั๋วเดินทาง. <span class="text-muted">See for yourself.</span></h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                </div>
                <div class="col-md-5 col-md-pull-7">
                    <div class="heading-location">
                        สถานีต้นทาง
                    </div>
                    <select class="form-control">
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
                    <input type="text" class="form-control" placeholder="Price">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 ">
                    <h2 class="featurette-heading">รายชื่อสถานีส่งสาธารณะ. <span class="text-muted"><br>ภาคตะวันออกเฉียงเหนือ.</span></h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                </div>
                <div class="col-md-5 ">
                    <div class="heading-location">
                        สถานีต้นทาง - ปลายทาง
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