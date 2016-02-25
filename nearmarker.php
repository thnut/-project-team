<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <title>Google map near marker</title>  
    <style type="text/css">  
    html { height: 100% }  
    body {   
        height:100%;  
        margin:0;padding:0;  
        font-family:tahoma, "Microsoft Sans Serif", sans-serif, Verdana;  
        font-size:12px;  
    }  
    /* css กำหนดความกว้าง ความสูงของแผนที่ */  
    #map_canvas {   
        width:450px;    
        height:500px;    
        margin:auto;  
    /*  margin-top:100px;*/  
    }  
    </style>  
</head>  
<body>  
   
  <div id="map_canvas"></div>  
 <div id="showDD" style="margin:auto;padding-top:5px;width:550px;">    
  <form id="form_get_detailMap" name="form_get_detailMap" method="post" action="">    
    Latitude    
    <input name="lat_value" type="text" id="lat_value" value="0" />  <br />  
    Longitude    
    <input name="lon_value" type="text" id="lon_value" value="0" />  <br />  
  Zoom    
  <input name="zoom_value" type="text" id="zoom_value" value="0" size="5" />    
  <br />
  Near by 
  <input name="near" type="text" id="near" value=""  />   
  </br>
  <input type="submit" name="button" id="button" value="บันทึก" />    
  </form>    
</div>   
    
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>      
<script type="text/javascript" src="nearmarker.js"></script>   
</body>  
</html>