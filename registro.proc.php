<?php
Session_Start();
	if(isset($_POST['login'])){	
		if(isset($_POST['mail']))$mail = $_POST['mail'];
		if(isset($_POST['pass']))$contraseña = $_POST['pass'];
		$con = mysqli_connect('localhost', 'root', '', 'bd_contactes');
		//echo $contraseña . "<br>";
		$contraseña = md5($contraseña);
		//echo $contraseña . "<br>";
		$sql=("SELECT * FROM `tbl_Usuari` WHERE usu_email = '$mail'");
		//echo $sql;
		$datos = mysqli_query($con, $sql);
		if(mysqli_num_rows($datos) > 0){
			$_SESSION['errormail'] = 'mail';
			header("Location: registro.php");
			die();
		}else{
			$sql2= ("INSERT INTO `tbl_Usuari` (`usu_email`,`usu_contra`)VALUES ('$mail','$contraseña')");
			echo $sql2;
			mysqli_query($con, $sql2);
			header("Location: login.php");
			die();
		}
		mysqli_close($con);
	}
?>