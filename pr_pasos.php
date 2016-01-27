<?php
	//include_once 'conexion.php';
include_once 'header.php';
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
      
    </script>
    <html>
	 <body onload="initialize()">
	
<?php

//$sql = "SELECT * FROM usuario ORDER BY id_user ASC";
//$datos = mysqli_query($con, $sql);

?>
<div class="logo">
  <img src="img/logo2.png">
</div>
<div class="primerospasos">
  <h2>Primeros Pasos</h2>
  <p>Bienvenido y muchas gracias por registrarte.</p>
  <p>Antes de empezar con tu agenda personalizada tienes que completar la información de tu perfil.</p>
  </div>

<div class="containermod2">
			<div class="form">		
		<form action="registar_user.php" method="GET">
      <div class="datos">
        <div class="datosder">
          <h3>Nombre: *</h3>
      <input type="text" name="nombre" size="30" maxlength="30" required>
      <br>
      <h3>Teléfono: *</h3>
      <input type="tel" name="telefono" size="30" required>
      <br>
    </div>
      <div class="datosiz">
        <h3>Apellido: *</h3>
      <input type="text" name="apellido" size="30" maxlength="30" required>
        
			
      </div>
      <div class="datoscen">
			<div class="infomap">
<br>
      			<h3>Dirección: * </h3><input id="address" type="textbox" style="width:60%" value="Mare de déu de bellvitge 100">
     			<input type="button" value="Verificar" onclick="codeAddress()" required><br><br>
      			Latitud: <input type="text" id="lat"/><br>
            <br>Longitud:<input type="text" id="lng"/>
    		</div>
        </div>
      </div>
      <br>
        <div class="buttons">
			<input type="submit" value="Enviar">
      <button>
    <a href="usuarios.php">Volver!</a>
    </button>
        </div>

		</form>
    
			</div>
    </div>
    <div id="map_canvas" style="height:40%;top:30px;width:80%"></div>
</body>
<?php  
  include 'footer.php';
?>
</html>