
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv=Content-Type content="text/html; charset=utf-8">
  <title>Isan Software Public</title>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <script src="maps.js"></script>
  <link rel="stylesheet" href="assets/css/main.css" />
  <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>


<style type="text/css">
#map_canvas {
  width:auto;
  height:100%;

}
</style>
<body>
  <div id='cssmenu'>
    <ul>
      <li class=""><a href='index.php'><span>Home</span></a></li>
      <li><a href='from.php'><span>Cars</span></a></li>
      <li class="active"><a href='maps.php'><span>Station</span></a></li>
      <li class='last'><a href='contact.php'><span>Contact</span></a></li>
    </ul>
  </div>
  <!-- Wrapper -->

  <div id="map_canvas"></div>


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
  <footer id="footer">
    <li style="list-style: none;"><a href="backend/web/index.php">Administartor</a></li>
    <ul class="copyright">
      <li>&copy; </li>
      <li>Design: </li>
    </ul>
  </footer>
</body>
</html>
