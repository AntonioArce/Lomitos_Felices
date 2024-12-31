<?php
	require("../conexion.php");
	$con=conectar();

	$SQL= "SELECT rfc_adm, nombre, paterno, materno, correo 
	       FROM administradores 
		   ORDER BY nombre";
	$contador= 0;
    $registro= mysqli_query($con,$SQL);
?>
    <form method="post">
        <input type="submit"  name="agregarbtn" value="Agregar">
    </form>
<?php
    echo "<hr>";		
    echo "<table border=1 align=center width=90%>";
    echo "<tr>";
    echo "<th> # REGISTRO";
    echo "<th> RFC";
    echo "<th> NOMBRE";
    echo "<th> APELLIDO PATERNO";
    echo "<th> APELLIDO MATERNO";
    echo "<th> CORREO";
    echo "</tr>";
    while($fila= mysqli_fetch_array($registro))
    {
        $contador++;
        echo "<tr>";
        echo "<td align=center>".$contador;
        echo "<td>".$fila['rfc_adm'];
        echo "<td>".$fila['nombre'];
        echo "<td>".$fila['paterno'];
        echo "<td>".$fila['materno'];
        echo "<td>".$fila['correo'];
        echo "</tr>";
    } 
    echo "</table>";
    if(@$_REQUEST['agregarbtn'])
    {
        header("Location: reg_admins.php");
    }
    mysqli_free_result($registro);
    mysqli_close($con);
?>