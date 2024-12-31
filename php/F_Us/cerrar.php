<?php
session_start();
if(isset($_GET["cerrar"]))
{
	//Vaciamos y destruimos las variables de sesión
	$_SESSION["nombre"]= NULL;
	$_SESSION["rfc_us"]=NULL;	
	unset($_SESSION["nombre"]);
	unset($_SESSION["rfc_us"]);
	//Redireccionamos a la pagina index.html
	session_unset();
	if(ini_get("session.use_cookies"))
	{
		$params=session_get_cookie_params();
		setcookie(session_name(),'',time()-42000,
		$params["path"], $params["domain"],
	    $params["secure"], $params["httponly"]);
	}
	session_destroy();
	header("Location: ../../index.html");
}
?>