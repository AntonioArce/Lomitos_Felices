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
        $id=$_GET["rfc"];
        
        if($id!="")
        {
            $sqlconsulta="SELECT * FROM albergue WHERE id_alb like '$id'";
            $registro=mysqli_query($con,$sqlconsulta);
            if($fila = mysqli_fetch_array($registro))
            {
                $idA=strtoupper($fila['id_alb']);
                $nombre=strtoupper($fila['nombre']);
                $calle=strtoupper($fila['calle']);
                $nint=$fila['nint'];
                $next=strtoupper($fila['next']);
                $col=strtoupper($fila['colonia']);
                $edo=strtoupper($fila['estado']);
                $alc=strtoupper($fila['alcaldia']);
                $numero=strtoupper($fila['num_perros']);
                $cp=$fila['cp'];
                
                ?>
                <form action="" method="post">
    	           <label for="username">RFC</label>
                    <input type="text" placeholder="RFC" name="id" value="<?php echo $idA?>"required="true">
                    <br>
                    <label for="username">Nombre</label>
                    <input type="text" placeholder="Nombre" name="nom" value="<?php echo $nombre?>"required="true">
                    <br>
                    <label for="username">Calle</label>
                    <input type="text" placeholder="Calle" name="calle" value="<?php echo $calle?>"required="true">
                    <br>
                    <label for="username">Num Int</label>
                    <input type="number" placeholder="Num Int" name="nint" value="<?php echo $nint?>"required="true">
                    <br>
                    <label for="username">Num ext</label>
                    <input type="text" placeholder="Calle" name="next" value="<?php echo $next?>" required="true">
                    <br>
                    <label for="username">Colonia</label>
                    <input type="text" placeholder="Colonia" name="col" value="<?php echo $col?>" required="true">
                    <br>
                    <label for="username">Estado </label>
                    <input type="text" placeholder="Estado" name="edo" value="<?php echo $edo?>" required="true">
                    <br>
                    <label for="username">Alcaldia  </label>
                    <input type="text" placeholder="Alcaldia" name="alc" value="<?php echo $alc?>" required="true">
                    <br>
                    <label for="username">Numero de perros: </label>
                    <input type="number" placeholder="Numero" name="num" value="<?php echo $numero?>"required="true">
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

                    $idA1=strtoupper($_REQUEST['id']);
                    $nombre1=strtoupper($_REQUEST['nom']);
                    $calle1=strtoupper($_REQUEST['calle']);
                    $nint1=$_REQUEST['nint'];
                    $next1=strtoupper($_REQUEST['next']);
                    $col1=strtoupper($_REQUEST['col']);
                    $edo1=strtoupper($_REQUEST['edo']);
                    $alc1=strtoupper($_REQUEST['alc']);
                    $numero1=strtoupper($_REQUEST['num']);
                    $cp1=$_REQUEST['cp'];
                    $r1=$_SESSION['rfc_dueno'];

                    

                    $SQLModificacion = "UPDATE albergue SET nombre='$nombre1', 
                                                calle='$calle1',
                                                nint='$nint1',
                                                next='$next1', 
                                                colonia='$col1',
                                                estado='$edo1',
                                                alcaldia='$alc1',
                                                num_perros='$numero1',
                                                cp='$cp1'
                            WHERE id_alb LIKE '$id'";

                    if(mysqli_query($con,$SQLModificacion))
                    {
                        echo "<script>alert('Datos Modificados con éxito');
                            window.location='albergue.php';
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
            header("Location: albergue.php");
        }



    ?>
</body>
</html>