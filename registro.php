<?php
	//include_once 'conexion.php';
include_once 'header.php';
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
		    <div class="buttons">
			<input type="submit" value="Enviar">
			<a href="usuarios.php">volver!</a>
				
		</div>
			
		</form>
		
			</div>
			<div class="logoin">
  				<img src="img/logo2.png">
				</div>
		
	</body>
<?php  
	include 'footer.php';
?>
</html>