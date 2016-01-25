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

<div class="containermod">
					
		<form action="registar_user.php" method="GET">
			Mail:<br>
			<input type="mail" name="mail" maxlength="50"><br>
			Contraseña:<br>
        	<input type="password" name="pass" class="form-input" required/><br>
        	Repite la Contraseña:<br>
        	<input type="password" name="pass2" class="form-input" required/><br>
		    <br/>
			<input type="submit" value="Enviar">

		</form>
		<a href="usuarios.php">volver!</a>
			</div>
		
	</body>
