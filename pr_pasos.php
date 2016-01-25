<?php
	//include_once 'conexion.php';
?>
<html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<meta charset="utf-8"/>
		<title></title>
	</head>
	<body>
<?php

//$sql = "SELECT * FROM usuario ORDER BY id_user ASC";
//$datos = mysqli_query($con, $sql);

?>

<div class="containermod2">
					
		<form action="registar_user.php" method="GET">
			Mail:<br>
			<input type="mail" name="mail" maxlength="50" size="30"><br>
			Nombre:
			<input type="text" name="nombre" size="30" maxlength="30">
			Apellido:
			<input type="text" name="apellido" size="30" maxlength="30">
			Dirección:
			<input type="text" name="direccion" size="30" maxlength="30">
			teléfono:
			<input type="tel" name="telefono" size="30">
			latitud:<br>
			<input type="number" name="num" min="0" max="99999" size="30">
			longitud:
			<input type="number" name="num" min="0" max="99999" size="30">
		    <br/>
			<input type="submit" value="Enviar">

		</form>
		<a href="usuarios.php">volver!</a>
			</div>
		