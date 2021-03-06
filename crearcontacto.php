<?php
	Session_Start();
		if(isset($_SESSION['mail']))$login=1;
		if(isset($login)){
		include_once 'header_perfil.php';
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
		<div class="logo">
			<img src="img/logo2.png">
		</div>
<div class="primerospasos">
  <h2>Crear Contacto Nuevo</h2>
  <p>Crear nuevo contacto</p>
  </div>

<div class="containermod2">
			<div class="form">		
		<form action="crearcontacto.proc.php" method="POST">
		<input type="hidden" name="login"/>
		<div class="datos">
			<div class="datosder">
			  <h3>Nombre: *</h3>
			  <input type="text" name="nombre" size="30" maxlength="30" required>
			  <br>
			  <h3>Teléfono: *</h3>
			  <input type="tel" name="telefono" size="30" pattern="[0-9]{9}" required>
			  <br>
		</div>
		<div class="datosiz">
			<h3>Apellido: *</h3>
			<input type="text" name="apellido" size="30" maxlength="30" required>
			<h3>Correo Electronico: *</h3>
			<input type="mail" name="mail" size="30" maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/><br>
			
		</div>
		<div class="datoscen">
			<div class="infomap"><br>
      			<h3>Dirección: * </h3><input id="address" name="address" type="textbox" style="width:60%" value="Mare de déu de bellvitge 100">
     			<input type="button" value="Verificar" onclick="codeAddress()" required><br><br>
      			Latitud: <input type="text" id="lat" name="lat"/><br>
            <br>Longitud:<input type="text" id="lng" name="lng"/>
    		</div>
        </div>
      </div>
      <br>
        <div class="buttons">
			<input type="submit" value="Enviar">

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
<?php
	}else{
		$_SESSION['validarse'] = 'error';
		header("Location: login.php");
		die();
	}
?>