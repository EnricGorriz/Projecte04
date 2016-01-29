<?php
Session_Start();
$id=$_REQUEST['$id'];
$con = mysqli_connect('localhost', 'root', '', 'bd_contactes');
		$sql = ("DELETE FROM `tbl_contactes` WHERE con_id='$id'") ;
		echo $sql;
		mysqli_query($con, $sql);
		header("Location: perfil.php");
		die();
		mysqli_close($con);
	
?>