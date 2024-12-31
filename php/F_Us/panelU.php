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
		<div id="titulo">Lomitos Felices :: Panel de Usuario.</div>
		<div id="sesion">
		<span>
			<?php
				$nombre=$_SESSION['nombre'];
				echo "Bienvenido(a) $nombre <br>";
			?>	
		</span>
		<a href="cerrar.php?cerrar=yes"><img id="cerrarsesion" src="../../images/cerrarsesion.png"> Cerrar Sesión</a>
		</div>
	</header>
	<article>
		<iframe name= "frame" scrolling="auto">
				
		</iframe>
	</article>
	<aside>
		<ul>
			<li><a href="mostrar_usuarios.php" target="frame">Datos Personales</a></li>
			<li><a href="#">Diario</a></li>
			<li><a href="perros_disponibles.php" target="frame">Mascotas Disponibles</a></li>
		</ul>
		<img id="adoptame" src="../../images/adoptame.png">		
	</aside>
</body>
</html>