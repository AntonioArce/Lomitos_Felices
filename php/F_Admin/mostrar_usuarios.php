<?php
	require("../conexion.php");
	$con=conectar();

	$SQL= "SELECT rfc_us, nombre, paterno, materno, fecha_nac, correo, concat (calle,' ', nint, ' ', next, ' ', colonia, ' ', estado, ' ', alcaldia, ' ', cp) as direccion 
	       FROM usuario
		   ORDER BY nombre";
	$contador= 0;
    $registro= mysqli_query($con,$SQL);
    echo "<hr>";		
    echo "<table border=1 align=center width=90%>";
    echo "<tr>";
    echo "<th> # REGISTRO";
    echo "<th> RFC";
    echo "<th> NOMBRE";
    echo "<th> APELLIDO PATERNO";
    echo "<th> APELLIDO MATERNO";
    echo "<th> FECHA DE NACIMIENTO";
    echo "<th> CORREO";
    echo "<th> DIRECCION";
    echo "</tr>";
    while($fila= mysqli_fetch_array($registro))
    {
        $contador++;
        echo "<tr>";
        echo "<td align=center>".$contador;
        echo "<td>".$fila['rfc_us'];
        echo "<td>".$fila['nombre'];
        echo "<td>".$fila['paterno'];
        echo "<td>".$fila['materno'];
        echo "<td>".$fila['fecha_nac'];
        echo "<td>".$fila['correo'];
        echo "<td>".$fila['direccion'];
        echo "</tr>";
    } 
    echo "</table>";
    mysqli_free_result($registro);
    mysqli_close($con);
?>