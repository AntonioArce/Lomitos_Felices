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
		<label for="username">Introduzca el id del Albergue: </label>
    	<input type="text" placeholder="ID" name="idA" required="true">
    	<input type="submit"  name="eliminarbtn" value="Eliminar">
    	<input type="submit"  name="modificarbtn" value="Modificar">
	</form>
</body>
</html>
<?php
	require("../conexion.php");
	$con=conectar();
	$rfc_d=$_SESSION['rfc_dueno'];
	$SQL= "SELECT * FROM albergue WHERE rfc_dueno LIKE '$rfc_d' ORDER BY id_alb";
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
    echo "<th> CLAVE";
    echo "<th> NOMBRE";
    echo "<th> CALLE";
    echo "<th> NUM INT";
    echo "<th> NUM EXT";
    echo "<th> COLONIA";
    echo "<th> ESTADO";
    echo "<th> ALCALDIA";
    echo "<th> CANTIDAD DE PERRITOS";
    echo "<th> CP";
    echo "</tr>";
    while($fila= mysqli_fetch_array($registro))
    {
        $contador++;
        echo "<tr>";
        echo "<td align=center>".$contador;
        echo "<td>".$fila['id_alb'];
        echo "<td>".$fila['nombre'];
        echo "<td>".$fila['calle'];
        echo "<td>".$fila['nint'];
        echo "<td>".$fila['next'];
        echo "<td>".$fila['colonia'];
        echo "<td>".$fila['estado'];
        echo "<td>".$fila['alcaldia'];
        echo "<td>".$fila['num_perros'];
        echo "<td>".$fila['cp'];
        echo "</tr>";
    } 
    echo "</table>";
    
    if(@$_REQUEST['agregarbtn'])
    {
        header("Location: reg-alb.php");
    }
	if(@$_REQUEST['eliminarbtn']!="")
	{
		$id=strtoupper($_REQUEST['idA']);
		$sql="DELETE FROM albergue WHERE id_alb like '$id' and rfc_dueno like '$rfc_d'";

		if(mysqli_query($con,$sql))
		{
			echo "<script>alert('Albergue eliminado con exito eliminado con exito');
                window.location='albergue.php';
            </script>";

		}
		else
			echo "<script>alert('Error :c');</script>";

	}
	if(@$_REQUEST['modificarbtn']!="")
	{
        $rfc=strtoupper($_REQUEST['idA']);
		header("Location: modificar-alb.php?rfc=".$rfc);
	}

	mysqli_close($con);


?>