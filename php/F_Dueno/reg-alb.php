<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <form action="" method="post">
    	<label for="username">Id Albergue</label>
        <input type="text" placeholder="ID" name="id" required="true">
        <br>
        <label for="username">Nombre</label>
        <input type="text" placeholder="Nombre" name="nom" required="true">
        <br>
        <label for="username">Calle</label>
        <input type="text" placeholder="Calle" name="calle" required="true">
        <br>
        <label for="username">Num Int</label>
        <input type="number" placeholder="Num Int" name="nint" required="true">
        <br>
        <label for="username">Num Ext</label>
        <input type="text" placeholder="Num ext" name="next" required="true">
        <br>
        <label for="username">Colonia</label>
        <input type="text" placeholder="Colonia" name="col" required="true">
        <br>
        <label for="username">Estado</label>
        <input type="text" placeholder="Estado" name="edo" required="true">
        <br>
        <label for="username">Alcaldia</label>
        <input type="text" placeholder="Alcaldia" name="alc" required="true">
        <br>
        <label for="username">Perros en este albergue</label>
        <input type="number" placeholder="Numero" name="num" required="true">
        <br>
        <label for="username">Codigo Postal</label>
        <input type="number" placeholder="Codigo Postal" name="cp" required="true">
        <input type="submit"  name="enviar">
    </form>
    <?php
    //mandamos a llamar sesionAD porque se supone que ahi ya se guardaron los datos, pero manda error de undefined index
   // require("sesionAD.php");
    require("../conexion.php");
    if(@$_REQUEST['enviar']!="")
    {
        //segun lo imprimo mi dato del php sesionAD pero no se imprime nada
        
        $con=conectar();
        $idA=strtoupper($_REQUEST['id']);
        $nombre=strtoupper($_REQUEST['nom']);
        $calle=strtoupper($_REQUEST['calle']);
        $nint=$_REQUEST['nint'];
        $next=strtoupper($_REQUEST['next']);
        $col=strtoupper($_REQUEST['col']);
        $edo=strtoupper($_REQUEST['edo']);
        $alc=strtoupper($_REQUEST['alc']);
        $numero=strtoupper($_REQUEST['num']);
        $cp=$_REQUEST['cp'];
        $ref=strtoupper($_SESSION['rfc_dueno']); //Igual no rescata ningun dato, marca undefined index


        //realizamos el insert
        $SQL="INSERT INTO albergue
            VALUES('$idA','$nombre','$calle',$nint,'$next','$col','$edo','$alc',$numero,$cp,'$ref');";

        //buscar usuario repetido
        $verificar=mysqli_query($con,"SELECT * FROM albergue WHERE id_alb LIKE '$idA'");


        //verificamos si el correo ya existe en la tabla dueño y usuario estandar
        if (mysqli_num_rows($verificar)>0)
        {
            echo "<script>alert('Ya existe un albergue con ese id');</script>";
            exit;
        }
        $res=mysqli_query($con,$SQL);
        echo "$res";
        if($res)
        {
            echo "<script>alert('Albergue registrado con exito');</script>";
        }
        else
        {
            echo "<script>alert('Error: ".mysqli_error($con)."');</script>";
        }
        header("Location: albergue.php");
        mysqli_close($con);

    }

    ?>
</body>
</html>

