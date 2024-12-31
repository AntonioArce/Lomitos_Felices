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
		<label for="username">Introduzca el id del perrito: </label>
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
	$SQL= "SELECT p.id_perros, p.nombre, p.raza, p.color, p.tamano, p.edad FROM perros as p
        INNER JOIN albergue as a ON p.albergue_id_alb=a.id_alb
        INNER JOIN dueno_albergue as da ON a.rfc_dueno=da.rfc_dueno
        WHERE da.rfc_dueno LIKE '$rfc_d'";
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
    echo "<th> ID PERRO";
    echo "<th> NOMBRE";
    echo "<th> RAZA";
    echo "<th> COLOR";
    echo "<th> TAMAÑO";
    echo "<th> EDAD";
    echo "</tr>";
    while($fila= mysqli_fetch_array($registro))
    {
        $contador++;
        echo "<tr>";
        echo "<td align=center>".$contador;
        echo "<td>".$fila['id_perros'];
        echo "<td>".$fila['nombre'];
        echo "<td>".$fila['raza'];
        echo "<td>".$fila['color'];
        echo "<td>".$fila['tamano'];
        echo "<td>".$fila['edad'];
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