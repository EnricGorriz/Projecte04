<?php
Session_Start();
	if(isset($_POST['login']))$login=1;
	if(isset($login)){
		if(isset($_POST['login'])){	
			if(isset($_POST['mail']))$mail = $_POST['mail'];
			if(isset($_POST['pass']))$contraseña = $_POST['pass'];
			$con = mysqli_connect('localhost', 'root', '', 'bd_contactes');
			//echo $contraseña . "<br>";
			$contraseña = md5($contraseña);
			//echo $contraseña . "<br>";
			$sql=("SELECT * FROM `tbl_Usuari` WHERE usu_email = '$mail' && usu_contra = '$contraseña' ");
			//echo $sql;
			$datos = mysqli_query($con, $sql);
			if(mysqli_num_rows($datos) > 0){
				while($send = mysqli_fetch_array($datos)){
					$_SESSION['mail']=$send['usu_email'];
					$_SESSION['id']=$send['usu_id'];
					echo $_SESSION['id'];
					if ($send['usu_validat']=='0'){
						header("Location: pr_pasos.php");
						die();
					}else{
						header("Location: perfil.php");
						die();
					}
				}
			}else{
				$_SESSION['error'] = 'error';
				header("Location: login.php");
				die();
			}
			mysqli_close($con);
		}
	}else{
		$_SESSION['validarse'] = 'error';
		header("Location: login.php");
		die();
	}
?>