<?php
	session_start();
	if($_SESSION['nombre']==NULL)
		header("Location: ../../index.html");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Panel de Control.</title>
	<link href="../../css/panel.css" rel="stylesheet">
</head>
<body>
	<header>
		<img id="logo" src="../../images/logo.png">
		<div id="titulo">Lomitos Felices :: Panel de Control.</div>
		<div id="sesion"> <span>
			<?php
				$nombre=$_SESSION['nombre'];
				$rfc=$_SESSION['rfc_dueno'];
				//Aqui jalamos los datos de sesionAD.php y los imprimimos (aqui si los usa bien)
				echo "Bienvenido(a) $nombre <br>";
			?>	
		</span> <a href="cerrar.php?cerrar=yes"><img id="cerrarsesion" src="../../images/cerrarsesion.png"> Cerrar Sesión</a></div>
	</header>
	<article>
		<iframe name= "frame" scrolling="auto">
				
		</iframe>
	</article>
	<aside>
		<ul>
			<li><a href="albergue.php" target="frame">Albergues</a></li>
			<li><a href="perros.php" target="frame">Perros</a></li>
		</ul>
		<img id="adoptame" src="../../images/adoptame.png">		
	</aside>
</body>
</html>