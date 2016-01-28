<?php
	Session_Start();
		if(isset($_SESSION['mail']))$login=1;
		if(isset($login)){
?>
<?php
	//include_once 'conexion.php';
include_once 'header_perfil.php';
?>
<html>
	<head>
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
	</head>
	<body onload="initialize()","initialize2()">
		<div class="containermod3">
			<div class="form">		
				<form action="primercontacto.proc.php" method="POST">
					<div class="datos">
						<div class="infomap">
						<input type="hidden" name="login2"/>
      					<h2>Dirección alternativa</h2>
             			 <h3>*Este campo puede ser omitido.</h3>
						
							<input id="address" name="address" type="textbox" style="width:60%" value="Mare de déu de bellvitge 100">
							<input type="button" value="Geocode" onclick="codeAddress()"><br>
							latitud<input type="text" id="lat" name="lat" />
							longitud<input type="text" id="lng" name="lng" />
						</div>
					</div>
					
					<br/>
					  <div class="buttons">
						<input type="submit" value="Enviar">
      						<button>
    							<a href="perfil.php">omitir!</a>
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
<?php
	}else{
		$_SESSION['validarse'] = 'error';
		header("Location: login.php");
		die();
	}
?>