<?php
	session_start();
		if(isset($_SESSION['error'])) $error = $_SESSION['error'];
		if(isset($_SESSION['validarse'])) $validarse = $_SESSION['validarse'];
	session_destroy();
?>
<html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<meta charset="utf-8"/>
		<title></title>
	</head>
	<body>
		<div class="containermod">
			<?php
				if(isset($error)){
					echo "Usuario o Contrasenya Incorrecto<br/><br/><br/>";
				}
				if(isset($validarse)){
					echo "Antes de entrar debes validarte<br/><br/><br/>";
				}
			?>
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
</html>