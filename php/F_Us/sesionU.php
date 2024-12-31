<?php
	//usamos iniciar sesion para guardar datos con session[]
	require("../conexion.php");
	$con=conectar();
	$user=$_REQUEST['correo'];
	$cont=$_REQUEST['pass'];
		
	$instruccion=sprintf(
		"SELECT * FROM usuario WHERE correo LIKE '%s' AND password LIKE '%s'", $user, md5($cont)
	);

	$consulta=mysqli_query($con, $instruccion);
	$datos= mysqli_fetch_assoc($consulta);
	$cantidad=mysqli_num_rows($consulta);

	if($cantidad==1)
	{
		session_start();
		$_SESSION['nombre']= $datos['nombre'];
		$_SESSION['rfc_us']= $datos['rfc_us'];
		header("Location: panelU.php?".SID);
	}
	else
		header("Location: login-usuario.php");
	
	mysqli_close($con);
	mysqli_free_result($consulta);			
?>