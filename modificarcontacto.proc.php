<?php
Session_Start();

	if(isset($_POST['login'])){	
		if(isset($_POST['nombre']))$nombre = $_POST['nombre'];
		if(isset($_POST['apellido']))$apellido = $_POST['apellido'];
		if(isset($_POST['telefono']))$telefono = $_POST['telefono'];
		if(isset($_POST['address']))$address = $_POST['address'];
		if(isset($_POST['mail']))$mail = $_POST['mail'];
		if(isset($_POST['lat']))$lat = $_POST['lat'];
		if(isset($_POST['lng']))$lng = $_POST['lng'];
		if(isset($_POST['login']))$id = $_POST['login'];
		$idUsuari = $_SESSION['id'];
		
		$con = mysqli_connect('localhost', 'root', '', 'bd_contactes');
		$sql= ("UPDATE `tbl_contactes`(`con_email`='$mail', `con_nom`='$nombre', `con_cognom`='$apellido', `con_direccio_principal`='$address', `con_telefon`='$telefono', `con_latitut_principal`='$lat', `con_longitut_principal`='$lng' WHERE `con_id`='$id'");
		echo $sql;
		mysqli_query($con, $sql);
		header("Location: crearcontacto2.php");
		die();
		mysqli_close($con);
	}
	if(isset($_POST['login2'])){	
		if(isset($_POST['address']))$address = $_POST['address'];
		if(isset($_POST['lat']))$lat = $_POST['lat'];
		if(isset($_POST['lng']))$lng = $_POST['lng'];
		$idUsuari = $_SESSION['id'];
		$mail = $_SESSION['mail'];
		
		$con = mysqli_connect('localhost', 'root', '', 'bd_contactes');
		$sql = ('UPDATE `tbl_contactes` SET `con_direccio_alternativa`="$address", `con_latitut_alternativa`= "$lat", `con_longitut_alternativa`="lng" WHERE `usu_id`= "$idUsuari"') ;
		echo $sql2;
		mysqli_query($con, $sql);
		header("Location: perfil.php");
		die();
		mysqli_close($con);
	}
?>