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
		<div id="titulo">Lomitos Felices :: Panel de Administrador.</div>
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

			<li><a href="mostrar_admins.php" target="frame">Administradores</a></li>
			<li><a href="duenos.php" target="frame">Dueños de Albergues</a></li>
			<li><a href="mostrar_usuarios.php" target="frame">Usuarios</a></li>
		</ul>
				
	</aside>
</body>
</html>
<?php
//en cada opcion de li, muestro los demas php con el frame
//registrar dueños es donde vas a mandar a llamar el php de registro
//
?>