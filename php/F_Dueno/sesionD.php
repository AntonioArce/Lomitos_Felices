<?php
	//usamos iniciar sesion para guardar datos con session[]
	require("../conexion.php");
	$con=conectar();
	$user=$_REQUEST['correo'];
	$cont=$_REQUEST['pass'];
		
	$instruccion=sprintf(
		"SELECT * FROM dueno_albergue WHERE correo LIKE '%s' AND password LIKE '%s'", $user, md5($cont)
	);

	$consulta=mysqli_query($con, $instruccion);
	$datos= mysqli_fetch_assoc($consulta);
	$cantidad=mysqli_num_rows($consulta);

	if($cantidad==1)
	{
		session_start();
		$_SESSION['nombre']= $datos['nombre'];
		$_SESSION['rfc_dueno']= $datos['rfc_dueno'];
		header("Location: panelD.php?".SID);
	}
	else
		header("Location: login-dueno.php");
	
	mysqli_close($con);
	mysqli_free_result($consulta);			
?>