<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <form method="post" >
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
        <input type="password" placeholder="Contraseña" name="cont" required="true">
        <br>
        <input type="submit"  name="Entrar">
    </form>
</body>
</html>

<?php
    require("../conexion.php");
    if ($_POST)
    {
        $con=conectar();
        $rfc=strtoupper($_REQUEST['RFC']);
        $nombre=strtoupper($_REQUEST['nom']);
        $paterno=strtoupper($_REQUEST['pat']);
        $materno=strtoupper($_REQUEST['mat']);
        $correo=strtolower($_REQUEST['correo']);
        $cont=md5($_REQUEST['cont']);

        $SQL="INSERT INTO administradores VALUES('$rfc','$nombre','$paterno','$materno','$correo','$cont',1)";

        //buscar usuario repetido
        $verificar=mysqli_query($con,"SELECT * FROM administradores WHERE correo='$correo'");
        if (mysqli_num_rows($verificar)>0)
        {
            echo "<script>alert('Ya existe un usuario con ese correo');</script>";
            exit;
        }
        $res=mysqli_query($con,$SQL);
        if($res)
        {
            echo "<script>alert('Usuario registrado con exito');</script>";
        }
        else
        {
            echo "<script>alert('Sucedio un error');</script>";
        }
        header("Location: mostrar_admins.php");
        mysqli_close($con);

    }

?>