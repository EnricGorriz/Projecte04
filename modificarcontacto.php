<?php
	Session_Start();
		if(isset($_SESSION['mail']))$login=1;
		if(isset($login)){
		include_once 'header_perfil.php';
		$id= $_REQUEST['id'];
		$con = mysqli_connect('localhost', 'root', '', 'bd_contactes');
			$user= $_SESSION['id'];
			$sql=("SELECT * FROM `tbl_Contactes` WHERE usu_id = '$user' and con_id='$id'");
			//echo $sql;
			$datos = mysqli_query($con, $sql);
			if(mysqli_num_rows($datos) > 0){
				while($send = mysqli_fetch_array($datos)){
          $id=$send['con_id'];
					$nom = $send['con_nom'];
					$cognom = $send['con_cognom'];
					$direccio = $send['con_direccio_principal'];
					$latitut = $send['con_latitut_principal'];
					$longitut = $send['con_longitut_principal'];
					$telefon = $send['con_telefon'];
					$mail = $send['con_email'];
				}
			}
			mysqli_close($con);
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
  <h2>Modificar contacto</h2>
  <p>En esta sección puedes modificar o eliminar la ficha de este usuario</p>
  </div>

<div class="containermod2">
			<div class="form">		
		<form action="modificarcontacto.proc.php" method="POST">
		<input type="hidden" name="login" value="<?php echo $id ; ?>"/>
		
		<div class="datos">
			<div class="datosder">
			  <h3>Nombre: *</h3>
			  <input type="text" name="nombre" size="30" maxlength="30" value="<?php echo $nom ; ?>"required>
			  <br>
			  <h3>Teléfono: *</h3>
			  <input type="tel" name="telefono" size="30" pattern="[0-9]{9}" value="<?php echo $telefon; ?>" required>
			  <br>
		</div>
		<div class="datosiz">
			<h3>Apellido: *</h3>
			<input type="text" name="apellido" size="30" maxlength="30" value="<?php echo $cognom; ?>" required>
			<h3>Correo Electronico: *</h3>
			<input type="mail" name="mail" size="30" maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php echo $mail; ?>" required/><br>
			
		</div>
		<div class="datoscen">
			<div class="infomap"><br>
      			<h3>Dirección: * </h3><input id="address" name="address" type="textbox" style="width:60%" value="<?php echo $direccio; ?>">
     			<input type="button" value="Verificar" onclick="codeAddress()" required><br><br>
      			Latitud: <input type="text" id="lat" name="<?php echo $latitut; ?>"/><br>
            <br>Longitud:<input type="text" id="lng" name="<?php echo $longitut; ?>"/>
    		</div>
        </div>
      </div>
      <br>
        <div class="buttons">
      <a class="active" href="eliminarcontacto.proc.php?$id=<?php echo $id?>"><img src ='img/delete.png'width='35' heigth='35'/></a>
			<input type="submit" value="Actualizar">


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