<?php
Session_Start();
?>
<html>
	<head>
		<meta charset="utf-8"/>
	</head>
</html>
<?php
	if(isset($_POST['login'])){	
		if(isset($_POST['nombre']))$nombre = $_POST['nombre'];
		if(isset($_POST['apellido']))$apellido = $_POST['apellido'];
		if(isset($_POST['telefono']))$telefono = $_POST['telefono'];
		if(isset($_POST['address']))$address = $_POST['address'];
		if(isset($_POST['lat']))$lat = $_POST['lat'];
		if(isset($_POST['lng']))$lng = $_POST['lng'];
		$idUsuari = $_SESSION['id'];
		$mail = $_SESSION['mail'];
		
		$con = mysqli_connect('localhost', 'root', '', 'bd_contactes');
		$sql= ("INSERT INTO `tbl_contactes`(`con_email`, `con_nom`, `con_cognom`, `con_direccio_principal`, `con_telefon`, `con_latitut_principal`, `con_longitut_principal`, `usu_id`) VALUES ('$mail','$nombre','$apellido','$address','$telefono','$lat','$lng','$idUsuari')");
		echo $sql;
		//mysqli_query($con, $sql);
		$sql2 = ("UPDATE `tbl_usuari` SET `usu_validat`= 1 WHERE `usu_id`= '$idUsuari'") ;
		echo $sql2;
		//mysqli_query($con, $sql2);
		//header("Location: pr_pasos2.php");
		//die();
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