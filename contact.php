
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
                <li class="active"><a href='index.php'><span>Home</span></a></li>
                <li><a href='from.php'><span>Cars</span></a></li>
                <li><a href='maps.php'><span>Station</span></a></li>
                <li class='last'><a href='contact.php'><span>Contact</span></a></li>
            </ul>
        </div>
        <!-- Wrapper -->
        <div id="wrapper">
            <!-- Main -->
            <style>
                nav a {
                    font-family: sans-serif;
                    color: black;
                    margin-left: 20px;
                }
            </style>
            <section id="main">
                <nav style="margin-bottom: 20px;">
                    <a href="#">Home</a>
                    <a href="#">Type</a>
                    <a href="maps.php">Maps</a>
                    <a href="#">Contact</a>
                </nav>



                <div class="container">
                    <div class="row-fluid">
                        <div class="span8">
                            <iframe width="50%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.uk/maps?f=q&source=s_q&hl=en&geocode=&q=15+Springfield+Way,+Hythe,+CT21+5SH&aq=t&sll=52.8382,-2.327815&sspn=8.047465,13.666992&ie=UTF8&hq=&hnear=15+Springfield+Way,+Hythe+CT21+5SH,+United+Kingdom&t=m&z=14&ll=51.077429,1.121722&output=embed"></iframe>
                        </div>

                        <div class="span4">
                            <h2>Snail mail</h2>
                            <address>
                                <strong>Hythe Window Cleaning</strong><br>
                                15 Springfield Way<br>
                                Hythe<br>
                                Kent<br>
                                United Kingdon<br>
                                CT21 5SH<br>
                                <abbr title="Phone">P:</abbr> 01234 567 890
                            </address>
                        </div>
                    </div>
                </div>




                <!-- Footer -->
                <footer id="footer">
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