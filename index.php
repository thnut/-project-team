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
      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKJ_TnYg-UDU-HED3pYynqkT5zXdmqp-Q&sensor=false"></script>
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

        <div id="wrapper">

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

            </script>

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
                <div id="directionsPanel" style="margin-top: 60px; "></div>
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
