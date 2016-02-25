<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"   
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>Google Map API 3 - 01</title>  
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
    position:relative;  
    width:550px;  
    height:400px;  
    margin:auto;  
}  
/* css สำหรับ div คลุม google map อีกที */  
#contain_map{  
    position:relative;  
    width:550px;  
    height:400px;  
    margin:auto;      
}  
/* css ของส่วนการกำหนดจุดเริ่มต้น และปลายทาง */  
#showDD{  
    position:absolute;  
    bottom:0px;  
    height:30px;  
    padding-top:5px;  
    background-color:#FDF4D7;  
}  
/* css ของส่วนแสดงคำแนะนำเส้นทางการเดินทาง */  
#directionsPanel{  
    width:550px;  
    margin:auto;  
    clear:both;   
/*  background-color:#F1FEE9;*/  
}  
/* css ในส่วนข้อมูลการแนะนำเส้นทาง เพิ่มเติม ถ้าต้องการกำหนด */  
.adp-placemark{  
/*  background-color:#9C3;*/  
}  
.adp-summary{  
      
}  
.adp-directions{  
      
}  
</style>  
  
  
</head>  
  
<body>  
  
<div id="contain_map">  
<div id="map_canvas"></div>  
<div id="showDD">    
<!--textbox กรอกชื่อสถานที่ และปุ่มสำหรับการค้นหา เอาไว้นอกแท็ก <form>-->  
  
<table width="550" border="0" cellspacing="0" cellpadding="0">  
  <tr>  
    <td align="center">  
From :  
<input name="namePlace" type="text" id="namePlace" size="20" />  
To:  
<input name="toPlace" type="text" id="toPlace" size="20" />  
<input type="button" name="SearchPlace" id="SearchPlace" value="สร้างเส้นทาง" />  
<input type="button" name="iClear" id="iClear" value="ล้างค่า" />      
    </td>  
  </tr>  
</table>  
</div>     
</div>  
<div id="directionsPanel"></div>  
  
  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>  // แก้
<script type="text/javascript">  
var directionShow; // กำหนดตัวแปรสำหรับใช้งาน กับการสร้างเส้นทาง  
var directionsService; // กำหนดตัวแปรสำหรับไว้เรียกใช้ข้อมูลเกี่ยวกับเส้นทาง  
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้  
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น  
var my_Latlng; // กำหนดตัวแปรสำหรับเก็บจุดเริ่มต้นของแผนที่เมื่อโหลดครั้งแรก  
var searchRoute; // กำหนดตัวแปร ไว้เก็บฃื่อฟังก์ชั้น ให้สามารถใช้งานจากส่วนอื่นๆ ได้ 

var origin = null; // กำหนดตัวแปร สำหรับเก็บ จุดเริ่มต้น ของเส้นทาง  
var destination = null; // กำหนดตัวแปร สำหรับเก็บจุดหมาย ปลายทาง ของเส้นทาง  

var waypoints = []; // กำหนดตัวแปร array สำหรับเก็บจุดของเส้นทางที่ผ่าน  
var markers = []; // กำหนดตัวแปร array สำหรับเก็บตัว marker ที่สร้างจากการคลิกที่แผนที่  

var addMarker; // กำหนดตัวแปร สำหรับเก็บฟังก์ชัน เพิ่มตัว marker จากการคลิกที่แผนที่  
  
function initialize() { // ฟังก์ชันแสดงแผนที่  
    GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM  
    directionShow=new  GGM.DirectionsRenderer({draggable:true});  
    directionsService = new GGM.DirectionsService();  
    // กำหนดจุดเริ่มต้นของแผนที่  
    my_Latlng  = new GGM.LatLng(13.761728449950002,100.6527900695800);  
    // กำหนดตำแหน่งปลายทาง สำหรับการโหลดครั้งแรก  
    var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง  
    // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas  
    var my_DivObj=$("#map_canvas")[0];  
    // กำหนด Option ของแผนที่  
    var myOptions = {  
        zoom: 5, // กำหนดขนาดการ zoom  
        center: my_Latlng , // กำหนดจุดกึ่งกลาง จากตัวแปร my_Latlng  
        mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่ จากตัวแปร my_mapTypeId  
    };  
    map = new GGM.Map(my_DivObj,myOptions); // สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map  
    
        
    directionShow.setMap(map); // กำหนดว่า จะให้มีการสร้างเส้นทางในแผนที่ที่ชื่อ map  
    // ส่วนสำหรับกำหนดให้แสดงคำแนะนำเส้นทาง  
    directionShow.setPanel($("#directionsPanel")[0]);    
      
    // กำหนด event ให้กับเส้นทาง กรณีเมื่อมีการเปลี่ยนแปลง   
    GGM.event.addListener(directionShow, 'directions_changed', function() {  
        var results=directionShow.directions; // เรียกใช้งานข้อมูลเส้นทางใหม่   
    });  
  
    // กำหนด event ให้กับแผนที่ เมื่อมีการคลิกที่แผนที่ให้สร้างตัว marker   
    GGM.event.addListener(map,'click', function(event) {  
      if(origin==null){ // ตรวจสอบถ้ายังไม่ได้กำหนดจุดเริ่มต้นเส้นทาง  
        origin=event.latLng; // ให้ตำแหน่งจุดเริ่มต้น เท่ากับจุดที่คลิกในแผนที่  
        addMarker(origin); // เพิ่มตัว marker ที่ตำแหน่งนี้  
      }else if(destination==null){ // ตรวจสอบว่าถ้ายังไม่กำหนดปลายทาง  
        destination=event.latLng; // ให้ตำแหน่งจุดปลายทาง เท่ากับจุดที่คลิกในแผนที่  
        addMarker(destination); // เพิ่มตัว marker ที่ตำแหน่งนี้  
      }else{ // ถ้ามีการเพิ่มหลายจุด  
        if(waypoints.length < 9){ // กำหนดเงื่อนไขห้ามเกิน 9 จุด เพื่อไม่ให้ทำงานช้าเกินไป  
          waypoints.push({ location: destination, stopover: true }); // กำหนดจุดผ่านเส้นทาง  
          destination = event.latLng; // เพิ่มปลายทาง   
          addMarker(destination); // เพิ่มตัว marker ที่ตำแหน่งนี้  
        }else{  
          alert("จุดผ่านเส้นทางมากสุด ไม่เกิน 9 จุด");  
        }  
      }  
    });  
  
}  
$(function(){  
    // ส่วนของฟังก์ชันเพิ่มตัว marker  
    addMarker=function(latlng){  
        markers.push(new GGM.Marker({  
          position: latlng,   
          map: map,  
          icon: "http://maps.google.com/mapfiles/marker" + String.fromCharCode(markers.length + 65) + ".png"  
        }));      
    }         
    // ส่วนของฟังก์ชัน สำหรับการสร้างเส้นทาง  
    searchRoute=function(FromPlace,ToPlace){ // ฟังก์ชัน สำหรับการสร้างเส้นทาง  
        if(origin==null || destination==null){ //   
          return false;  
        }  
        if(!FromPlace && !ToPlace){ // ถ้าไม่ได้ส่งค่าเริ่มต้นมา ให้ใฃ้ค่าจากการค้นหา  
            if($("#namePlace").val()=="" && $("#toPlace").val()==""){ // ถ้าค่าค้นหาเป็นว่าง  
                if(origin==null || destination==null){ // ถ้าไม่มีจุดเริ่มต้น และจุดปลายทาง  
                    return false;  
                }else{ // มีการกำหนดจุดเริ่มต้นเส้นทาง และ จุดปลายทาง  
                    var FromPlace=origin;// รับค่าจากจุดเริ่มต้นเส้นทาง  
                    var ToPlace=destination; // รับค่าจากจุดปลายทาง               
                }                 
            }else{  
                var FromPlace=$("#namePlace").val();// รับค่าชื่อสถานที่เริ่มต้น  
                var ToPlace=$("#toPlace").val(); // รับค่าชื่อสถานที่ปลายทาง                  
            }  
        }  
        // กำหนด option สำหรับส่งค่าไปให้ google ค้นหาข้อมูล      
        var request={  
            origin:FromPlace, // สถานที่เริ่มต้น  
            destination:ToPlace, // สถานที่ปลายทาง  
            waypoints: waypoints, // // ส่งค่าจุดผ่านเส้นทาง  
            travelMode: GGM.DirectionsTravelMode.DRIVING // กรณีการเดินทางโดยรถยนต์  
        };  
        // ส่งคำร้องขอ จะคืนค่ามาเป็นสถานะ และผลลัพธ์  
        directionsService.route(request, function(results, status){  
            if(status==GGM.DirectionsStatus.OK){ // ถ้าสามารถค้นหา และสร้างเส้นทางได้  
                directionShow.setDirections(results); // สร้างเส้นทางจากผลลัพธ์  
                for (var i = 0; i < markers.length; i++) { // วนลูปล้างค่าตัว marker  
                  markers[i].setMap(null);  
                }         
                markers = []; // ล้างค่าตัวแปร array ตัว marker               
            }else{  
                // กรณีไม่พบเส้นทาง หรือไม่สามารถสร้างเส้นทางได้  
                // โค้ดตามต้องการ ในทีนี้ ปล่อยว่าง  
            }  
        });  
    }  
      
    // ส่วนควบคุมปุ่มคำสั่งใช้งานฟังก์ชัน  
    $("#SearchPlace").click(function(){ // เมื่อคลิกที่ปุ่ม id=SearchPlace   
        searchRoute();  // เรียกใช้งานฟังก์ชัน ค้นหาเส้นทาง  
    });  
  
    $("#namePlace,#toPlace").keyup(function(event){ // เมื่อพิมพ์คำค้นหาในกล่องค้นหา  
        if(event.keyCode==13 && $(this).val()!=""){ //  ตรวจสอบปุ่มถ้ากด ถ้าเป็นปุ่ม Enter   
            searchRoute();      // เรียกใช้งานฟังก์ชัน ค้นหาเส้นทาง  
        }         
    });  
      
    $("#iClear").click(function(){  
        for (var i = 0; i < markers.length; i++) { // วนลูปล้างค่าตัว marker  
          markers[i].setMap(null);  
        }         
        markers = []; // ล้างค่าตัวแปร array ตัว marker  
        origin = null; // กำหนดเป็นค่าว่าง เพื่อเริ่มต้นใหม่  
        destination = null; /// กำหนดเป็นค่าว่าง เพื่อเริ่มต้นใหม่  
        waypoints = []; // ล้างค่าตัวแปร array ตัว waypoints          
        $("#namePlace,#toPlace").val(""); // ล้างค่าข้อมูล สำหรับพิมพ์คำค้นหาใหม่  
        directionShow.setMap(null); // ล้างค่าเส้นทางออกจากแผนที่  
        directionShow.setPanel(null);    // ล้างค่าส่วนแนะนำเส้นทาง   
        // กำหนดส่วนสำหรับใช้กับแผนที่ ใหม่อีกครั้ง  
        directionShow=new  GGM.DirectionsRenderer({draggable:true});  
        directionShow.setMap(map); // กำหนดว่า จะให้มีการสร้างเส้นทางในแผนที่ที่ชื่อ map  
        // ส่วนสำหรับกำหนดให้แสดงคำแนะนำเส้นทาง  
        directionShow.setPanel($("#directionsPanel")[0]);                 
    });  
      
});  
$(function(){  
    // โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว  
    // ค่าตัวแปร ที่ส่งไปในไฟล์ google map api  
    // v=3.2&sensor=false&language=th&callback=initialize  
    //  v เวอร์ชัน่ 3.2  
    //  sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false  
    //  language ภาษา th ,en เป็นต้น  
    //  callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize    
    $("<script/>", {  
      "type": "text/javascript",  
      src: "http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=th&callback=initialize"  
    }).appendTo("body");      
});  
</script>    
</body>  
</html>