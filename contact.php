
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
        <div id='cssmenu'>
            <ul>
                <li class=""><a href='index.php'><span>Home</span></a></li>
                <li><a href='from.php'><span>Cars</span></a></li>
                <li><a href='maps.php'><span>Station</span></a></li>
                <li class='active'><a href='contact.php'><span>Contact</span></a></li>
            </ul>
        </div>
        <!-- Wrapper -->
        <div id="wrapper">
            <section id="main">
                <div class="container">
                    <div class="row-fluid">
                        <div class="span8">
                            <iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2%E0%B8%A8%E0%B8%B2%E0%B8%AA%E0%B8%95%E0%B8%A3%E0%B9%8C%20%E0%B8%AA%E0%B8%B2%E0%B8%82%E0%B8%B2%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%84%E0%B8%AD%E0%B8%A1%E0%B8%9E%E0%B8%B4%E0%B8%A7%E0%B9%80%E0%B8%95%E0%B8%AD%E0%B8%A3%E0%B9%8C&key=AIzaSyDKJ_TnYg-UDU-HED3pYynqkT5zXdmqp-Q" allowfullscreen></iframe>
                        </div>

                        <div class="span4">
                            <h2>มหาวิทยาลัยขอนแก่น</h2>
                            <address>
                                <strong>คณะวิทยาศาสตร์</strong><br>
                                ภาควิชาวิทยาการคอมพิวเตอร์<br>
                                มหาวิทยาลัยขอนแก่น<br>
                                123 ถ.มิตรภาพ ต.ในเมือง อ.เมือง จ.ขอนแก่น 40002 <br>
                                <abbr title="Phone">โทรศัพท์ :</abbr>  0-4336-2188-90 ต่อ 101-103 โทรสาร. 0-4334-2910


                            </address>
                        </div>
                    </div>
                </div>
            </section>



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