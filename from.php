
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
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <link rel="stylesheet" href="assets/css/main.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/javascript" href="loadstation.js">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
  <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
  <script type="text/javascript" src="main.js"></script>
</head>
<body class="is-loading">
  <div id='cssmenu'>
    <ul>
      <li class=""><a href='index.php'><span>Home</span></a></li>
      <li class="active"><a href='from.php'><span>Cars</span></a></li>
      <li><a href='maps.php'><span>Station</span></a></li>
      <li class='last'><a href='contact.php'><span>Contact</span></a></li>
    </ul>
  </div>

  <!-- Wrapper -->
 <div id="wrapper">
    <section id="main">
      <header>
        <span class="avatar"><img src="img/Bus-icon.jpg" alt="bus-icon" width="200" height="200" /></span>
        <h1>Isan Software Map</h1>
        <p>แผนที่ขนส่งสาธารณะภาคอีสาน</p>
      </header>
      <hr />
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-login">
            <div class="row">
              <div class="col-md-6 ">
                <!-- <a href="#" class="active" >Bus</a> -->
                <div class="list-group-item" id="login-form-link"  class="round-button active">Bus</a></div>
              </div>
              <div class="col-md-6">
              <div class="list-group-item" id="register-form-link"  class="round-button active">Van</a></div>
              </div>
            </div>
            <hr/>



            <div class="panel-body">
              <div class="row">
                <div class="heading-location">
                  <p><b>บริษัท รถขนส่งสาธารณะ</b></p>
                </div>
                <div class="col-md-12">
                  <form id="login-form" action="" method="post" role="form" style=" display: block;">
                    <select class="form-control" name="namePlace" id="namePlace" onchange="showUser(this.value)" >
                      <?php
                      mysql_connect('localhost', 'root', '');
                      mysql_select_db('final_project');
                      mysql_query('SET NAMES UTF8');
                      $sql = "select * from tbl_car WHERE `type` LIKE 'Bus'";
                      $result = mysql_query($sql);
                      while ($row = mysql_fetch_array($result)) {
                        echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                      }
                      ?>
                    </select><br>

                    <div class="row">
                      <div class="col-md-12">
                        <div id="bus-box"></div>
                      </div>
                    </div>
                  </form>


                  <form id="register-form"  method="post" role="form" style="display: none;">
                    <div id="showDD" style="margin:auto;padding-top:5px;">
                      <select class="form-control" name="namePlace" id="namePlace" onchange="showVas(this.value)"  >
                        <?php
                        mysql_connect('localhost', 'root', '');
                        mysql_select_db('final_project');
                        mysql_query('SET NAMES UTF8');
                        $sql = "select * from tbl_car WHERE `type` LIKE 'Van'";
                        $result = mysql_query($sql);
                        while ($row = mysql_fetch_array($result)) {
                          echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                        }
                        ?>
                      </select><br>
                      <div class="row">
                        <div class="col-md-12">
                          <div id="van-box"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <script>
    function showUser(str) {
      if (str == "") {
        document.getElementById("bus-box").innerHTML = "";
        return;
      } else {
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("bus-box").innerHTML = xmlhttp.responseText;
          }
        };
        xmlhttp.open("GET", "getData.php?id=" + str, true);
        xmlhttp.send();
      }
    }

    function showVas(val) {
      if (val == "") {
        document.getElementById("van-box").innerHTML = "";
        return;
      } else {
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("van-box").innerHTML = xmlhttp.responseText;
          }
        };
        xmlhttp.open("GET", "getData.php?id=" + val, true);
        xmlhttp.send();
      }
    }
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
    <!-- Footer -->
    <footer id="footer">
      <li style="list-style: none;"><a link="backend/web/index.php">Administartor</a></li>
      <ul class="copyright">
        <li>&copy; </li>
        <li>Design: </li>
      </ul>
    </footer>
  </body>
  </html>
