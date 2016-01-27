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

		<div class="form">			
		<form action="registar_user.php" method="GET">
			Mail:<br>
			<input type="mail" name="mail" maxlength="50"><br>
			Contraseña:<br>
        	<input type="password" name="pass" class="form-input" required/><br><br>
        	<div class="buttons">
			<input type="submit" value="Enviar">
		</div>
				

		</form>
		</div>
</div>
<div class="logoi">
  				<img src="img/logo2.png">
				</div>
		
	</body>