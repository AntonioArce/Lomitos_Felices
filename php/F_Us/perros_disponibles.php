<?php
	require("../conexion.php");
	$con=conectar();

	$SQL= "SELECT nombre,raza,foto,color,tamano,edad FROM perros WHERE status=1 ORDER BY nombre";
	$contador= 0;
	$registro= mysqli_query($con,$SQL);
	echo "<hr>";		
	echo "<table border=1 align=center width=90%>";
	echo "<tr>";
	echo "<th> # Numero";
	echo "<th> Nombre";
	echo "<th> Raza";
	echo "<th> Foto";
	echo "<th> Color";
	echo "<th> Tamaño";
	echo "<th> Edad";
	echo "</tr>";
	while($fila= mysqli_fetch_array($registro))
	{
	    $contador++;
	    echo "<tr>";
	    echo "<td align=center>".$contador;
	    echo "<td>".$fila['nombre'];
	    echo "<td>".$fila['raza'];
	    echo "<td>".$fila['foto'];
	    echo "<td>".$fila['color'];
	    echo "<td>".$fila['tamano'];
	    echo "<td>".$fila['edad'];
	    echo "</tr>";
	} 
	echo "</table>";
	mysqli_free_result($registro);
	mysqli_close($con);
?>
