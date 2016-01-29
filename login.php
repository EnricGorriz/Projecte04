<?php
	session_start();
		if(isset($_SESSION['error'])) $error = $_SESSION['error'];
		if(isset($_SESSION['validarse'])) $validarse = $_SESSION['validarse'];
	session_destroy();
	include_once 'header_login.php';

?>
<html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<meta charset="utf-8"/>
		<title></title>
	</head>
	<body>
		<div class="containermod">
			
			<div class="form">			
				<form action="loginuser.proc.php" method="POST">
					<input type="hidden" name="login"/>
					Mail:<br>
					<input type="mail" name="mail" maxlength="50" required/><br>
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
		<div class="error">
		<?php
				if(isset($error)){
					echo "<h2>Usuario o Contrasenya Incorrecto.</h2>";
				}
				if(isset($validarse)){
					echo "<h2>Antes de entrar debes validarte</h2>";
				}
			?>
		</div>
	</body>
	<?php  
		include 'footer.php';
	?>
</html>