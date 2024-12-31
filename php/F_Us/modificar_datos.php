<?php
    session_start();
    $rfc_us=$_SESSION['rfc_us'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title></title>
</head>
<body>
    <?php
        require("../conexion.php");
        $con=conectar();
        $sqlconsulta="SELECT * FROM usuario WHERE rfc_us like '$rfc_us'";
        $registro=mysqli_query($con,$sqlconsulta);
        if($fila = mysqli_fetch_array($registro))
        {
            $rfc=strtoupper($fila['rfc_us']);
            $nombre=strtoupper($fila['nombre']);
            $paterno=strtoupper($fila['paterno']);
            $materno=strtoupper($fila['materno']);
            $fecha_nac=$fila['fecha_nac'];
            $correo=strtolower($fila['correo']);
            $calle=strtoupper($fila['calle']);
            $nint=$fila['nint'];
            $next=strtoupper($fila['next']);
            $col=strtoupper($fila['colonia']);
            $edo=strtoupper($fila['estado']);
            $alc=strtoupper($fila['alcaldia']);
            $cp=$fila['cp'];
    ?>
            <form action="" method="post">
            <label for="username">Nombre</label>
            <input type="text" placeholder="Nombre" name="nom" value="<?php echo $nombre?>"required="true">
            <br>
            <label for="username">Apellido Paterno</label>
            <input type="text" placeholder="Apellido Paterno" name="pat" value="<?php echo $paterno?>"required="true">
            <br>
            <label for="username">Apellido Materno</label>
            <input type="text" placeholder="Apellido Materno" name="mat" value="<?php echo $materno?>"required="true">
            <br>
            <label for="f_nac">Fecha de Nacimiento</label>
            <input type="date" name="f_nac" value="<?php echo $fecha_nac?>" required="true">
            <br>
            <label for="username">Correo</label>
            <input type="email" placeholder="Ej: tu@correo.com" name="correo" value="<?php echo $correo?>" required="true">
            <br>
            <label for="password">Contraseña</label>
            <input type="password" placeholder="<Sin Cambios>" name="password">
            <br>
            <label for="username">Calle</label>
            <input type="text" placeholder="Calle" name="calle" value="<?php echo $calle?>" required="true">
            <br>
            <label for="username">Numero interior</label>
            <input type="number" placeholder="Num int" name="nint" value="<?php echo $nint?>" required="true">
            <br>
            <label for="username">Numero exterior</label>
            <input type="text" placeholder="Num ext" name="next" value="<?php echo $next?>" required="true">
            <br>
            <label for="username">Colonia</label>
            <input type="text" placeholder="Colonia" name="col" value="<?php echo $col?>" required="true">
            <br>
            <label for="username">Estado</label>
            <input type="text" placeholder="Estado" name="edo" value="<?php echo $edo?>" required="true">
            <br>
            <label for="username">Alcaldia</label>
            <input type="text" placeholder="Alcaldia" name="alc" value="<?php echo $alc?>" required="true">
            <br>
            <label for="username">Codigo Postal</label>
            <input type="number" placeholder="Codigo Postal" name="cp" value="<?php echo $cp?>" required="true">
            <br>
            <input type="submit"  name="modificarbtn2" value="Actualizar">
            </form>
        <?php
            mysqli_free_result($registro);
            if(@$_REQUEST["modificarbtn2"]!="")
            {

                $nombre1=strtoupper($_REQUEST['nom']);
                $paterno1=strtoupper($_REQUEST['pat']);
                $materno1=strtoupper($_REQUEST['mat']);
                $f_nac1=strtoupper($_REQUEST['f_nac']);
                $correo1=strtolower($_REQUEST['correo']);
                $password1=$_REQUEST['password'];
                $calle1=strtoupper($_REQUEST['calle']);
                $nint1=$_REQUEST['nint'];
                $next1=strtoupper($_REQUEST['next']);
                $col1=strtoupper($_REQUEST['col']);
                $edo1=strtoupper($_REQUEST['edo']);
                $alc1=strtoupper($_REQUEST['alc']);
                $cp1=$_REQUEST['cp'];
                if(strcmp($password1,"")==0)
                {
                    $SQLModificacion = "UPDATE usuario SET nombre='$nombre1',
                                                paterno='$paterno1',
                                                materno='$materno1', 
                                                fecha_nac='$f_nac1',
                                                correo='$correo1',
                                                calle='$calle1',
                                                nint=$nint1,
                                                next='$next1', 
                                                colonia='$col1',
                                                estado='$edo1',
                                                alcaldia='$alc1',
                                                cp=$cp1
                            WHERE rfc_us LIKE '$rfc_us'";
                }
                else
                {
                    $password_enc=md5($password1);
                    $SQLModificacion = "UPDATE usuario SET nombre='$nombre1',
                                            paterno='$paterno1',
                                            materno='$materno1', 
                                            fecha_nac='$f_nac1',
                                            correo='$correo1',
                                            password='$password_enc',
                                            calle='$calle1',
                                            nint=$nint1,
                                            next='$next1', 
                                            colonia='$col1',
                                            estado='$edo1',
                                            alcaldia='$alc1',
                                            cp=$cp1
                        WHERE rfc_us LIKE '$rfc_us'";
                }
                if(mysqli_query($con,$SQLModificacion))
                {
                    echo "<script>alert('Datos Modificados con éxito');
                        window.location='mostrar_usuarios.php';
                    </script>";

                }
                else
                {
                    echo "<script>alert('Error al modificar el dato');</script>";
                }
            }
        }
?>
</body>
</html>