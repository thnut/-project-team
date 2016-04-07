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
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <title>Isan Software Public</title>
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <!--<script type="text/javascript" src="main.js"></script>-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
        <script src="index.js" type="text/javascript"></script>
    </head>
    <body class="is-loading">
        <div id='cssmenu'>
            <ul>
                <li class="active"><a href='#'><span>Home</span></a></li>
                <li><a href='from.php'><span>Cars</span></a></li>
                <li><a href='maps.php'><span>Station</span></a></li>
                <li class='last'><a href='contact.php'><span>Contact</span></a></li>
            </ul>
        </div>

        <!-- Wrapper -->
        <div id="wrapper">
            <!-- Main -->

<!--            <style>


                .timeline {
                    width: 800px;
                    list-style: none;
                    padding: 20px 0 20px;
                    position: relative;
                    margin-left: 150px;
                }

                .timeline:before {
                    top: 0;
                    bottom: 0;
                    position: absolute;
                    content: " ";
                    width: 3px;
                    background-color: #eeeeee;
                    left: 25px;
                    margin-right: -1.5px;
                }

                .timeline > li {
                    margin-bottom: 20px;
                    position: relative;
                }

                .timeline > li:before,
                .timeline > li:after {
                    content: " ";
                    display: table;
                }

                .timeline > li:after {
                    clear: both;
                }

                .timeline > li > .timeline-panel {
                    width: calc( 100% - 75px );
                    float: right;
                    border: 1px solid #d4d4d4;
                    border-radius: 2px;
                    padding: 20px;
                    position: relative;
                    -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
                    box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
                }

                .timeline > li > .timeline-panel:before {
                    position: absolute;
                    top: 26px;
                    left: -15px;
                    display: inline-block;
                    border-top: 15px solid transparent;
                    border-right: 15px solid #ccc;
                    border-left: 0 solid #ccc;
                    border-bottom: 15px solid transparent;
                    content: " ";
                }

                .timeline > li > .timeline-panel:after {
                    position: absolute;
                    top: 27px;
                    left: -14px;
                    display: inline-block;
                    border-top: 14px solid transparent;
                    border-right: 14px solid #fff;
                    border-left: 0 solid #fff;
                    border-bottom: 14px solid transparent;
                    content: " ";
                }

                .timeline > li > .timeline-badge {
                    color: #fff;
                    width: 50px;
                    height: 50px;
                    line-height: 50px;
                    font-size: 1.4em;
                    text-align: center;
                    position: absolute;
                    top: 16px;
                    left: 0px;
                    margin-right: -25px;
                    background-color: #999999;
                    z-index: 100;
                    border-top-right-radius: 50%;
                    border-top-left-radius: 50%;
                    border-bottom-right-radius: 50%;
                    border-bottom-left-radius: 50%;
                }

                .timeline-badge.primary {
                    background-color: #2e6da4 !important;
                }

                .timeline-badge.success {
                    background-color: #3f903f !important;
                }

                .timeline-badge.warning {
                    background-color: #f0ad4e !important;
                }

                .timeline-badge.danger {
                    background-color: #d9534f !important;
                }

                .timeline-badge.info {
                    background-color: #5bc0de !important;
                }
            </style>
            <style>
                nav a {
                    font-family: sans-serif;
                    color: black;
                    margin-left: 20px;
                }


            </style>


            <script>
                (function ($) {
                    $(document).ready(function () {
                        $('#cssmenu').prepend('<div id="menu-button">Menu</div>');
                        $('#cssmenu #menu-button').on('click', function () {
                            var menu = $(this).next('ul');
                            if (menu.hasClass('open')) {
                                menu.removeClass('open');
                            } else {
                                menu.addClass('open');
                            }
                        });
                    });
                })(jQuery);

            </script>-->

            <section id="main">

                <header>
                    <span class="avatar"><img src="img/Bus-icon.jpg" alt="bus-icon" width="200" height="200" /></span>
                    <h2>Isan Software Map</h2>
                    <p>แผนที่ขนส่งสาธารณะภาคอีสาน</p>
                </header>
                <hr />
                <div class="content">
                    <div class="col-md-6 col-md-push-3">
                        <form id="login-form" action="" method="post" role="form" style="display: block;">
                            <div class="heading-location">
                                <p>สถานีต้นทาง</p>
                            </div>
                            <select class="form-control" name="namePlace" id="namePlace">
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
                            <div class="heading-location">
                                <p>สถานีปลายทาง</p>
                            </div>

                            <select class="form-control" name="toplace" id="toplace"  >
                                <?php
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

                            <ul class="actions">
                                <input type="button" name="SearchPlace" id="SearchPlace" value="Search" style="margin-top: 20px;"/>  
                                <!--<input type="button" name="SearchPlace" id="SearchPlace" value="สร้างเส้นทาง" />-->  
                                <input type="button" name="iClear" id="iClear" value="Clear" />  
                            </ul>
                        </form>
                    </div>
                </div>      

                <div id="map"></div>    
                <div id="directionsPanel" style="margin-top: 60px;"></div> 


                <!--                <div class="container">
                                    <ul class="timeline">
                                        <li>
                                            <div class="timeline-badge success"><i class="fa "></i></div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">สถานีขนส่งอำเภอกระนวน จังหวัดขอนแก่น</h4>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>type : bus</p>
                                                    <p>62.5 Km</p>
                                                </div>
                                            </div>
                                        </li>
                
                                        <li>
                                            <div class="timeline-badge"><i class="fa "></i></div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">สถานีขนส่งจังหวัดขอนแก่น แห่งที่ 1</h4>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>type : bus,van</p>
                                                    <p>92.2 km</p>
                                                </div>
                                            </div>
                                        </li>
                
                
                                        <li>
                                            <div class="timeline-badge danger"><i class="fa "></i></div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">สถานีขนส่งผู้โดยสารอำเภอภูเขียว จังหวัดขอนแก่น</h4>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>type : bus,van</p>
                                                </div>
                                            </div>
                                        </li>
                
                
                                    </ul>
                                </div>-->
            </section>
            <!-- Footer -->
            <footer id="footer">
                <li style="list-style: none;"><a href="backend/web/index.php">Administartor</a></li>
                <ul class="copyright">
                    <li>&copy; </li>
                    <li>Design: </li>
                </ul>
            </footer>

        </div>

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