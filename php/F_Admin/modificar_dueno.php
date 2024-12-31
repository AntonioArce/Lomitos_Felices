<?php
    //require("sesionAD.php");
    session_start();
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
        $rfcd=$_GET["rfc"];
        
        if($rfcd!="")
        {
            $sqlconsulta="SELECT * FROM dueno_albergue WHERE rfc_dueno like '$rfcd'";
            $registro=mysqli_query($con,$sqlconsulta);
            if($fila = mysqli_fetch_array($registro))
            {
                $rfc=strtoupper($fila['rfc_dueno']);
                $nombre=strtoupper($fila['nombre']);
                $paterno=strtoupper($fila['paterno']);
                $materno=strtoupper($fila['materno']);
                $correo=strtolower($fila['correo']);
                $cont=md5($fila['password']);
                $calle=strtoupper($fila['calle']);
                $nint=$fila['nint'];
                $next=strtoupper($fila['next']);
                $col=strtoupper($fila['colonia']);
                $edo=strtoupper($fila['estado']);
                $alc=strtoupper($fila['alcaldia']);
                $cp=$fila['cp'];
                ?>
                <form action="" method="post">
    	           <label for="username">RFC</label>
                    <input type="text" placeholder="RFC" name="RFC" value="<?php echo $rfc?>"required="true">
                    <br>
                    <label for="username">Nombre</label>
                    <input type="text" placeholder="Nombre" name="nom" value="<?php echo $nombre?>"required="true">
                    <br>
                    <label for="username">Apellido Paterno</label>
                    <input type="text" placeholder="Apellido Paterno" name="pat" value="<?php echo $paterno?>"required="true">
                    <br>
                    <label for="username">Apellido Materno</label>
                    <input type="text" placeholder="Apellido Materno" name="mat" value="<?php echo $materno?>"required="true">
                    <br>
                    <label for="username">Correo</label>
                    <input type="email" placeholder="Ej: tu@correo.com" name="correo" value="<?php echo $correo?>" required="true">
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
                    <input type="submit"  name="mod" value="Actualizar">
                </form>
                <?php
            }
            else
            {
                echo "No existe el registro";
            }
            mysqli_free_result($registro);
            if($_POST)
                {

                    $rfc1=strtoupper($_REQUEST['RFC']);
                    $nombre1=strtoupper($_REQUEST['nom']);
                    $paterno1=strtoupper($_REQUEST['pat']);
                    $materno1=strtoupper($_REQUEST['mat']);
                    $correo1=strtolower($_REQUEST['correo']);
                    $calle1=strtoupper($_REQUEST['calle']);
                    $nint1=$_REQUEST['nint'];
                    $next1=strtoupper($_REQUEST['next']);
                    $col1=strtoupper($_REQUEST['col']);
                    $edo1=strtoupper($_REQUEST['edo']);
                    $alc1=strtoupper($_REQUEST['alc']);
                    $cp1=$_REQUEST['cp'];

                    

                    $SQLModificacion = "UPDATE dueno_albergue SET nombre='$nombre1',
                                                paterno='$paterno1',
                                                materno='$materno1', 
                                                correo='$correo1',
                                                calle='$calle1',
                                                nint='$nint1',
                                                next='$next1', 
                                                colonia='$col1',
                                                estado='$edo1',
                                                alcaldia='$alc1',
                                                cp='$cp1'
                            WHERE rfc_dueno LIKE '$rfcd'";

                    if(mysqli_query($con,$SQLModificacion))
                    {
                        echo "<script>alert('Datos Modificados con éxito');
                            window.location='duenos.php';
                        </script>";

                    }
                    else
                    {
                        echo "<script>alert('Error');
                        </script>";
                    }
                }
        }
        else
        {
            header("Location: duenos.php");
        }



    ?>
</body>
</html>