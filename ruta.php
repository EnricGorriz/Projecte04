<?php
	Session_Start();
	include_once 'header_perfil.php';
		if(isset($_SESSION['mail']))$login=1;
		if(isset($login)){
			$idcontacte = $_REQUEST['id'];
			$direc = $_REQUEST['d'];
			$user= $_SESSION['id'];
		$con = mysqli_connect('localhost', 'root', '', 'bd_contactes');
		$sql=("SELECT * FROM `tbl_Usuari` WHERE usu_id = '$user'");
		//echo $sql;
		$datos = mysqli_query($con, $sql);
			if(mysqli_num_rows($datos) > 0){
				while($send = mysqli_fetch_array($datos)){
					$lat1=$send['usu_latitut'];
					$lng1=$send['usu_longitut'];
					//echo "$lat1,$lng1";
				}
			}else{
				$_SESSION['error'] = 'error';
				header("Location: login.php");
				die();
			}
		$sql2=("SELECT * FROM `tbl_Contactes` WHERE con_id = '$idcontacte' AND usu_id='$user'");
		//echo $sql2;
		$datos2 = mysqli_query($con, $sql2);
			if(mysqli_num_rows($datos2) > 0){
				while($send2 = mysqli_fetch_array($datos2)){
					if($direc == 'p'){		
						$lat2=$send2['con_latitut_principal'];
						$lng2=$send2['con_longitut_principal'];
						$direciofin = $send2['con_direccio_principal'];
					}else{
						$lat2=$send2['con_latitut_alternativa'];
						$lng2=$send2['con_longitut_alternativa'];
						$direciofin = $send2['con_direccio_alternativa'];
					}
				}
			}else{
				
				$_SESSION['error'] = 'error';
				header("Location: login.php");
				die();
			}
		mysqli_close($con);
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
		<title>Rutas en Google Maps</title>
		<script src=" http://maps.google.com/?file=api&v=2.x&key=AIzaSyAkYEfX5twUxPXMWvnQzXg6VwGLYCXp_bw" type="text/javascript"></script>
	<script type="text/javascript">
	var map;
	var gdir;
	var geocoder = null;
		function load() {
			if (GBrowserIsCompatible()) {
				map = new GMap2(document.getElementById("map"));   
				gdir = new GDirections(map, document.getElementById("direcciones"));
				GEvent.addListener(gdir, "load", onGDirectionsLoad);
				GEvent.addListener(gdir, "error", mostrarError);  
				var direcio1="<?php echo $lat1.','. $lng1?>";
				var direcio2="<?php echo $lat2.','. $lng2?>";
				obtenerRuta(direcio1, direcio2);   
			}
		}
		  
		function obtenerRuta(desde, hasta) {
			var i;
			var tipo;
			//comprobar tipo trayecto seleccionado
			for (i=0;i<document.form_ruta.tipo.length;i++){ 
				if (document.form_ruta.tipo[i].checked){
					break; 
				}
			} 
			tipo = document.form_ruta.tipo[i].value;
			if(tipo==1){
				//a pie
				gdir.load("from: " + desde + " to: " + hasta,
				{ "locale": "es", "travelMode" : G_TRAVEL_MODE_WALKING });
			}else{
				//conduccion
				gdir.load("from: " + desde + " to: " + hasta,
				{ "locale": "es", "travelMode" : G_TRAVEL_MODE_DRIVING });
			}
		}
	   
		function onGDirectionsLoad(){ 
			//resumen de tiempo y distancia
			document.getElementById("getDistance").innerHTML =gdir.getSummaryHtml(); 
		} 
	   
		function mostrarError(){
			if (gdir.getStatus().code == G_GEO_UNKNOWN_ADDRESS)
				alert("No se ha encontrado una ubicación geográfica que se corresponda con la dirección especificada.");
			else if (gdir.getStatus().code == G_GEO_SERVER_ERROR)
				alert("No se ha podido procesar correctamente la solicitud de ruta o de códigos geográficos, sin saberse el motivo exacto del fallo.");
			else if (gdir.getStatus().code == G_GEO_MISSING_QUERY)
				alert("Falta el parámetro HTTP q o no tiene valor alguno. En las solicitudes de códigos 	geográficos, esto significa que se ha especificado una dirección vacía.");
			else if (gdir.getStatus().code == G_GEO_BAD_KEY)
				alert("La clave proporcionada no es válida o no coincide con el dominio para el cual se ha indicado.");
			else if (gdir.getStatus().code == G_GEO_BAD_REQUEST)
				alert("No se ha podido analizar correctamente la solicitud de ruta.");
			else alert("Error desconocido.");
		}
	</script>
</head>
<body>
<div class="tit">
<h2>Rutas en Google Maps</h2>
</div>
<div class="ruta">
<form action="#" name="form_ruta" onsubmit="obtenerRuta(this.desde.value, this.hasta.value); return false">
     <br>
         <strong>Desde:</strong>
         <input type="text" size="25" id="desde" name="desde" value="ubicación actual"readonly />
   
  
         <strong>Hasta:</strong>
         <input type="l" size="25" id="hasta" name="hasta" value="<?php echo $direciofin
		 ?>" readonly />
 
      <div align="center"  style ="visibility: hidden" colspan="2">
         <strong>Tipo trayecto: </strong>
         <input type="radio" name="tipo" id="tipo" value="2" checked/> En coche
         <input type="radio" name="tipo" id="tipo" value="1" /> A pie
      <input name="ruta" type="submit" value="Obtener ruta" />
   </div>
</div>

</form>

         <div id="map" style="width: 60%; height: 430px;margin-top: 1%;"></div>

<div class="inforuta">
         <strong>Direcciones de la ruta</strong>
         <div id="direcciones" style="width: 30%;max-height: 400px;overflow: scroll;"></div>
</div>

   </body>
</html>
<script>
   window.onload=load;
   window.onunload=GUnload;
</script>
<?php
include 'footer.php';
	}else{
		$_SESSION['validarse'] = 'error';
		header("Location: login.php");
		die();
	}
?>