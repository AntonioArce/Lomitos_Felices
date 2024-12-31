<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
		<label for="username">Introduzca el RFC: </label>
    	<input type="text" placeholder="RFC" name="RFC" required="true">
    	<input type="submit"  name="eliminarbtn" value="Eliminar">
    	<input type="submit"  name="modificarbtn" value="Modificar">
	</form>
</body>
</html>
<?php
	require("../conexion.php");
	$con=conectar();
	$rfc_adm=$_SESSION['rfc_adm'];
	$SQL= "SELECT rfc_dueno, nombre, paterno, materno, correo, calle, nint, next, colonia, estado, alcaldia, cp
     FROM dueno_albergue WHERE adm_rfc_adm LIKE '$rfc_adm' ORDER BY nombre";
	$contador= 0;
    $registro= mysqli_query($con,$SQL);
    echo "<hr>";
?>
    <form method="post">
        <input type="submit"  name="agregarbtn" value="Agregar">
    </form>
<?php
    echo "<table border=1 align=center width=90%>";
    echo "<tr>";
    echo "<th> # REGISTRO";
    echo "<th> RFC";
    echo "<th> NOMBRE";
    echo "<th> APELLIDO PATERNO";
    echo "<th> APELLIDO MATERNO";
    echo "<th> CORREO";
    echo "<th> CALLE";
    echo "<th> N. INT";
    echo "<th> N. EXT";
    echo "<th> COLONIA";
    echo "<th> ESTADO";
    echo "<th> ALCALDIA";
    echo "<th> CP";
    echo "</tr>";
    while($fila= mysqli_fetch_array($registro))
    {
        $contador++;
        echo "<tr>";
        echo "<td align=center>".$contador;
        echo "<td>".$fila['rfc_dueno'];
        echo "<td>".$fila['nombre'];
        echo "<td>".$fila['paterno'];
        echo "<td>".$fila['materno'];
        echo "<td>".$fila['correo'];
        echo "<td>".$fila['calle'];
        echo "<td>".$fila['nint'];
        echo "<td>".$fila['next'];
        echo "<td>".$fila['colonia'];
        echo "<td>".$fila['estado'];
        echo "<td>".$fila['alcaldia'];
        echo "<td>".$fila['cp'];
        echo "</tr>";
    } 
    echo "</table>";
    
    if(@$_REQUEST['agregarbtn'])
    {
        header("Location: reg_duenos.php");
    }
	if(@$_REQUEST['eliminarbtn']!="")
	{
		$rfc=strtoupper($_REQUEST['RFC']);
		$sql="DELETE FROM dueno_albergue WHERE rfc_dueno like '$rfc' and adm_rfc_adm like '$rfc_adm'";

		if(mysqli_query($con,$sql))
		{
			echo "<script>alert('Usuario eliminado con exito');
                window.location='duenos.php';
            </script>";

		}
		else
			echo "<script>alert('Error');</script>";



	}
	if(@$_REQUEST['modificarbtn']!="")
	{
        $rfc=strtoupper($_REQUEST['RFC']);
		header("Location: modificar_dueno.php?rfc=".$rfc);
	}

	mysqli_close($con);


?>