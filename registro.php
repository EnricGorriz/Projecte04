<?php
	session_start();
		if(isset($_SESSION['errormail'])) $error = $_SESSION['errormail'];
	session_destroy();
	include_once 'header.php';
?>
<html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<meta charset="utf-8"/>
		<title></title>
		<script>
			function comprobarClave(){ 
				pass = document.f1.pass.value 
				pass2 = document.f1.pass2.value 

				if (pass == pass2) {
					return true;
				}else {
					document.getElementById("texterror").innerHTML = "Las dos contraseñas deben ser iguales";
					return false;
				}
			} 
		</script>
	</head>
	<body>
		
		<div class="containermod">
			<form action="registro.proc.php" method="POST">
				<input type="hidden" name="login"/>
				Mail:<br>
				<input type="mail" name="mail" maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/><br>
				Contraseña:<br>
				<input type="password" name="pass" class="form-input" required/><br>
				Repite la Contraseña:<br>
				<input type="password" name="pass2" class="form-input" required/><br>
				<br/>
				<div class="buttons">
					<input type="submit" value="Enviar">
					<a href="login.php">volver!</a>	
				</div>	
			</form>
		
		</div>
		<div class="logoin">
			<img src="img/logo2.png">
		</div>
		<div class="error">
			<?php
				if(isset($error)){
					echo "<h1>Este correo electronico ya esta en uso</h1>";
				}
			?>
		</div>
	</body>
	<?php  
		include 'footer.php';
	?>
</html>