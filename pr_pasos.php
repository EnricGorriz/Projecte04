<?php
	//include_once 'conexion.php';
?>
 	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
 	<link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <title>Google Maps JavaScript API v3 Example: Geocoding Simple</title>
    <link href="https://developers.google.com/maps/documentation/javascript/examples/default.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script>
    ///////////////////mapa1///////////
      var geocoder;
      var map;
      var mapOptions = {
          zoom: 17,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
      var marker;

      function initialize() {
        geocoder = new google.maps.Geocoder();
        map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
        codeAddress();
      }

      function codeAddress() {
        var address = document.getElementById('address').value;
        geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            if(marker)
              marker.setMap(null);
            marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
                draggable: true
            });
            google.maps.event.addListener(marker, "dragend", function() {
              document.getElementById('lat').value = marker.getPosition().lat();
              document.getElementById('lng').value = marker.getPosition().lng();
            });
            document.getElementById('lat').value = marker.getPosition().lat();
            document.getElementById('lng').value = marker.getPosition().lng();
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
      ///////////////////mapa2///////////////////
         var geocoder2;
      var map2;
      var mapOptions2 = {
          zoom: 17,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
      var marker2;

      function initialize2() {
        geocoder2 = new google.maps.Geocoder();
        map2 = new google.maps.Map(document.getElementById('map_canvas2'), mapOptions);
        codeAddress2();
      }

      function codeAddress2() {
        var address2 = document.getElementById('address').value;
        geocoder.geocode( { 'address': address2}, function(results, status2) {
          if (status2 == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            if(marker2)
              marker2.setMap(null);
            marker2 = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
                draggable: true
            });
            google.maps.event.addListener(marker, "dragend", function() {
              document.getElementById('lat2').value = marker.getPosition().lat();
              document.getElementById('lng2').value = marker.getPosition().lng();
            });
            document.getElementById('lat2').value = marker.getPosition().lat();
            document.getElementById('lng2').value = marker.getPosition().lng();
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
    </script>
	 <body onload="initialize()","initialize2()">
	 	<body >
<?php

//$sql = "SELECT * FROM usuario ORDER BY id_user ASC";
//$datos = mysqli_query($con, $sql);

?>

<div class="containermod2">
					
		<form action="registar_user.php" method="GET">
			Mail:
			<input type="mail" name="mail" maxlength="50" size="30">
			Nombre:
			<input type="text" name="nombre" size="30" maxlength="30">
			Apellido:
			<input type="text" name="apellido" size="30" maxlength="30">
			teléfono:
			<input type="tel" name="telefono" size="30">
			<div class="infomap">
      			dirección 1:<input id="address" type="textbox" style="width:60%" value="Mare de déu de bellvitge 100">
     			<input type="button" value="Geocode" onclick="codeAddress()"><br>
      			latitud<input type="text" id="lat"/>
      			longitud<input type="text" id="lng"/>
    		
    		<div id="map_canvas" style="height:60%;top:30px"></div>
		    <br/>
		    </div>
		    <div class="infomap">
      			dirección 2:<input id="address2" type="textbox" style="width:60%" value="barcelona">
     			<input type="button" value="Geocode2" onclick="codeAddress2()"><br>
      			latitud<input type="text" id="lat2"/>
      			longitud<input type="text" id="lng2"/>
    		
    		<div id="map_canvas2" style="height:60%;top:30px"></div>
		    <br/>
		    </div>
		    <br><br>
			<input type="submit" value="Enviar">


		</form>
		<a href="usuarios.php">volver!</a>
			</div>
			