<?php
    //require("sesionAD.php");
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <form action="reg_duenos.php" method="post">
    	<label for="username">RFC</label>
        <input type="text" placeholder="RFC" name="RFC" required="true">
        <br>
        <label for="username">Nombre</label>
        <input type="text" placeholder="Nombre" name="nom" required="true">
        <br>
        <label for="username">Apellido Paterno</label>
        <input type="text" placeholder="Apellido Paterno" name="pat" required="true">
        <br>
        <label for="username">Apellido Materno</label>
        <input type="text" placeholder="Apellido Materno" name="mat" required="true">
        <br>
        <label for="username">Correo</label>
        <input type="email" placeholder="Ej: tu@correo.com" name="correo" required="true">
        <br>
        <label for="username">Contraseña</label>
        <input type="password" placeholder="Contraseña" name="cont" required="true" minlength="8">
        <br>
        <label for="username">Calle</label>
        <input type="text" placeholder="Calle" name="calle" required="true">
        <br>
        <label for="username">Numero interior</label>
        <input type="number" placeholder="Num int" name="nint" required="true">
        <br>
        <label for="username">Numero exterior</label>
        <input type="text" placeholder="Num ext" name="next" required="true">
        <br>
        <label for="username">Colonia</label>
        <input type="text" placeholder="Colonia" name="col" required="true"
        <br>
        <label for="username">Estado</label>
        <input type="text" placeholder="Estado" name="edo" required="true">
        <br>
        <label for="username">Alcaldia</label>
        <input type="text" placeholder="Alcaldia" name="alc" required="true">
        <br>
        <label for="username">Codigo Postal</label>
        <input type="number" placeholder="Codigo Postal" name="cp" required="true">
        <br>
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
        $rfc=strtoupper($_REQUEST['RFC']);
        $nombre=strtoupper($_REQUEST['nom']);
        $paterno=strtoupper($_REQUEST['pat']);
        $materno=strtoupper($_REQUEST['mat']);
        $correo=strtolower($_REQUEST['correo']);
        $cont=md5($_REQUEST['cont']);
        $calle=strtoupper($_REQUEST['calle']);
        $nint=$_REQUEST['nint'];
        $next=strtoupper($_REQUEST['next']);
        $col=strtoupper($_REQUEST['col']);
        $edo=strtoupper($_REQUEST['edo']);
        $alc=strtoupper($_REQUEST['alc']);
        $cp=$_REQUEST['cp'];
        $ref=strtoupper($_SESSION['rfc_adm']); //Igual no rescata ningun dato, marca undefined index


        //realizamos el insert
        $SQL="INSERT INTO dueno_albergue
            VALUES('$rfc','$nombre','$paterno','$materno','$correo','$cont','$calle',$nint,'$next','$col','$edo','$alc',$cp,'$ref',3);";

        //buscar usuario repetido
        $verificar=mysqli_query($con,"SELECT * FROM dueno_albergue WHERE correo LIKE '$correo'");
        $verificar1=mysqli_query($con,"SELECT * FROM usuario WHERE correo LIKE '$correo'");

        //verificamos si el correo ya existe en la tabla dueño y usuario estandar
        if (mysqli_num_rows($verificar)>0 || mysqli_num_rows($verificar1)>0)
        {
            echo "<script>alert('Ya existe un usuario con ese correo');</script>";
            exit;
        }
        $res=mysqli_query($con,$SQL);
        echo "$res";
        if($res)
        {
            echo "<script>alert('Usuario registrado con exito');</script>";
        }
        else
        {
            echo "<script>alert('Error: ".mysqli_error($con)."');</script>";
        }
        header("Location: duenos.php");
        mysqli_close($con);

    }

    ?>
</body>
</html>

