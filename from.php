
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
        <title>Isan Software Public :: Test </title>
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/javascript" href="loadstation.js">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>   
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <script type="text/javascript" src="main.js"></script>
    </head>
    <body class="is-loading">
        <style type="text/css">  

            /* css กำหนดความกว้าง ความสูงของแผนที่ */  
            #map_canvas {   
                width:auto;  
                height:400px;  
                clear: both;  
                /*  margin-top:100px;*/  
            }  
        </style>  

        <!-- Wrapper -->
        <div id="wrapper">

            <!-- Main -->
            <section id="main">
                <header>
                    <span class="avatar"><img src="img/Bus-icon.jpg" alt="bus-icon" width="200" height="200" /></span>
                    <h1>Isan Software Map</h1>
                    <p>แผนที่ขนส่งสาธารณะภาคอีสาน</p>
                </header>
                <hr />                 
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-login">
                            <div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <a href="#" class="active" id="login-form-link">Bus</a>
                                        <div id="showDD" style="margin:auto;padding-top:5px;width:550px;">    

                                        </div> 
                                    </div>
                                    <div class="col-xs-6">
                                        <a href="#" id="register-form-link">Van</a>
                                    </div>
                                </div>
                                <hr/>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="heading-location">
                                        <p><b>บริษัท รถขนส่งสาธารณะ</b></p>
                                    </div>

                         <script>
                            function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","getData.php?b_id="+str+"&todo=sBus",true);
        xmlhttp.send();
    }
}

function showVas(val){
        if (val == "") {
        document.getElementById("Hidevan").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("Hidevan").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","getData.php?b_id="+val+"&todo=sVan",true);
        xmlhttp.send();
    }
    }
                        </script>
                                    <form id="login-form" action="" method="post" role="form" style="display: block;">
                                        <select class="form-control" name="namePlace" id="namePlace" onchange="showUser(this.value)" >
                                            <?php
                                            mysql_connect('localhost', 'root', '');
                                            mysql_select_db('final_project');
                                            mysql_query('SET NAMES UTF8');
                                            $sql = "select * from bus";
                                            $result = mysql_query($sql);
                                            while ($row = mysql_fetch_array($result)) {
                                                echo "<option value=" . $row['b_id'] . ">" . $row['b_name'] . "</option>";
                                            }
                                            ?>
                                        </select><br>
                                        <div class="heading-location">
                                            <p><b>รายละเอียด</b></p>
                                        </div>

                                        
                                       <textarea id ="txtHint" name="message" rows="20" cols="12">
                                </textarea>
                                        
                                            
                                    
                                        
                                    </form>

                                 

                                    <form id="register-form"  method="post" role="form" style="display: none;">
                                        <div id="showDD" style="margin:auto;padding-top:5px;">    
                                            <select class="form-control" name="namePlace" id="namePlace" onchange="showVas(this.value)"  >
                                                <?php
                                                mysql_connect('localhost', 'root', '');
                                                mysql_select_db('final_project');
                                                mysql_query('SET NAMES UTF8');
                                                $sql = "select * from van";
                                                $result = mysql_query($sql);
                                                while ($row = mysql_fetch_array($result)) {
                                                    echo "<option value=" . $row['v_id'] . ">" . $row['v_name'] . "</option>";
                                                }
                                                ?>
                                            </select><br>
                                            <div class="heading-location">
                                            <p><b>รายละเอียด</b></p>
                                        </div>

                                        
                                       <textarea name="message" rows="15" cols="15" id="Hidevan"></textarea>
                                        
                                            
                                    
                                        
                                    </form>
                                                   


                                                    
                                    </form>

                                </div>

                                 
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                <div id="map_canvas"></div> 
        </div>
        

       
        </script>    
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