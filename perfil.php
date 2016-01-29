<?php
	Session_Start();
		if(isset($_SESSION['mail']))$login=1;
		if(isset($login)){
		include_once 'header_perfil.php';	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
	<head>
		<meta charset="utf-8">
		 	<link rel="stylesheet" href="css/style.css">
		<title>Perfil My Contacts</title>
		<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&amp;sensor=false" type="text/javascript">
		</script>
		<script type="text/javascript">
			function localize(){
				/* Si se puede obtener la localización */
				if (navigator.geolocation)			{
					navigator.geolocation.getCurrentPosition(mapa,error);
				}/* Si el navegador no soporta la recuperación de la geolocalización */
				else
				{
					alert('¡Oops! Tu navegador no soporta geolocalización.');
				}
			}
			var map;
			var latitud;
			var longitud;
		function mapa(pos){
			/* Obtenemos los parámetros de la API de geolocalización HTML*/
			 latitud = pos.coords.latitude;
			 longitud = pos.coords.longitude;
			 document.getElementById("latubi").value=latitud;
			 document.getElementById("lngubi").value=longitud;
			var precision = pos.coords.accuracy;
			/* A través del DOM obtenemos el div que va a contener el mapa */
			var contenedor = document.getElementById("map")

			/* Posicionamos un punto en el mapa con las coordenadas que nos ha proporcionado la API*/
			var centro = new google.maps.LatLng(latitud,longitud);

			/* Definimos las propiedades del mapa */
			var propiedades =
			{
                zoom: 15,
                center: centro,
                mapTypeId: google.maps.MapTypeId.ROADMAP
			};

			/* Creamos el mapa pasandole el div que lo va a contener y las diferentes propiedades*/
			map = new google.maps.Map(contenedor, propiedades);
			
			/* Un servicio que proporciona la API de GM es colocar marcadores sobre el mapa */
			var marcador = new google.maps.Marker({
                position: centro,
                map: map,
                title: "Tu localizacion"
            });
			
		}

		/* Gestion de errores */
		function error(errorCode){
			if(errorCode.code == 1)
				alert("No has permitido buscar tu localizacion")
			else if (errorCode.code==2)
				alert("Posicion no disponible")
			else
				alert("Ha ocurrido un error")
		}
		/* MARCADORES */
		function marcador(Lat,Lng){
					var myLatlng = new google.maps.LatLng(Lat,Lng)
					var marcador = new google.maps.Marker({
						position: myLatlng,
						map: map,
						title: "casa"
					});						
		}
		</script>
	</head>
	<body onLoad="localize()">
		<div id="map" ></div>
		<?php
			$con = mysqli_connect('localhost', 'root', '', 'bd_contactes');
			$user= $_SESSION['id'];
			$sql=("SELECT * FROM `tbl_Contactes` WHERE usu_id = '$user'");
			//echo $sql;
			$datos = mysqli_query($con, $sql);
			echo "<input type='hidden' id='latubi' value=''/>";
			echo "<input type='hidden' id='lngubi' value=''/>";
			echo "<div class='menucont'>";
			if(mysqli_num_rows($datos) > 0){
				while($send = mysqli_fetch_array($datos)){
					echo "<div class='contactos'><h3><a href='modificarcontacto.php?id=$send[con_id]'><img src ='img/editar.png'width='25' heigth='25'/></a>  ".$send['con_nom']." " .$send['con_cognom']."</h3>";
					echo "<form><a href='ruta.php?id=$send[con_id]&d=p'>Ruta fins a $send[con_direccio_principal]</a><input id='$send[con_direccio_principal]' type='checkbox' value='$send[con_latitut_principal]' name='$send[con_longitut_principal]' onchange='marcador(this.value, this.name)' /><br/>";
					if(isset($send['con_direccio_alternativa']))echo "<a href='ruta.php?id=$send[con_id]&d=a'>Ruta fins a $send[con_direccio_alternativa]</a><input id='$send[con_direccio_alternativa]' type='checkbox' value='$send[con_latitut_alternativa]' name='$send[con_longitut_alternativa]' onchange='marcador(this.value, this.name)' />";
					
					echo "</form>";
					echo "</div>";
				}
			}
			echo "<div class='nuevo'><a href='crearcontacto.php'><img src ='img/add.png'width='50' heigth='50'/></a> ";
				echo "</div>";
				echo "</div>";
			mysqli_close($con);
					$PHPvariable = "hola <script> document.write(latitud) </script>";
					echo $PHPvariable;
			include 'footer.php';
		?>
	</body>
</html>
<?php
			
	}else{
		$_SESSION['validarse'] = 'error';
		header("Location: login.php");
		die();
	}
?>