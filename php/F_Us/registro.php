<?php
  require("../conexion.php");
  $con=conectar();
  $nombre=strtoupper($_REQUEST['nombre']);
  $paterno=strtoupper($_REQUEST['a_pat']);
  $materno=strtoupper($_REQUEST['a_mat']);
  $fecha=strtoupper($_REQUEST['f_nac']);
  $rfc=strtoupper($_REQUEST['rfc']);

  $correo=strtolower($_REQUEST['correo']);
  $password1=$_REQUEST['password1'];
  $password2=$_REQUEST['password2'];

  $calle=strtoupper($_REQUEST['calle']);
  $nint=$_REQUEST['num_int'];
  $next=strtoupper($_REQUEST['num_ext']);
  $colonia=strtoupper($_REQUEST['num_int']);
  $cp=$_REQUEST['cp'];
  $alcaldia=strtoupper($_REQUEST['alcaldia']);
  $estado=strtoupper($_REQUEST['estado']);
  $tel=$_REQUEST['telefono'];

  if(strcmp($password1,$password2)!=0)
  {
    echo "<script>
            alert('Las contraseñas no coinciden.');
            window.location='../../registro.html';
          </script>";
    exit;
  }

  else
  {
      $sql_dueno=sprintf(
        "SELECT * FROM dueno_albergue WHERE rfc_dueno LIKE '%s' OR correo LIKE '%s'", $rfc, $correo
      );

      $dueno=mysqli_query($con, $sql_dueno);
      $datos= mysqli_fetch_assoc($dueno);
      $cantidad=mysqli_num_rows($dueno);

      if($cantidad==1)
      {
          echo "<script>
               alert('Ese usuario es dueño de un albergue, por favor inicia sesión');
               window.location='../../registro.html';
              </script>";
          exit;
      }
      else
      {
        //buscar usuario repetido
        $verificar=mysqli_query($con,"SELECT * FROM usuario WHERE correo LIKE '$correo'");
        if (mysqli_num_rows($verificar)>0)
        {
            echo "<script>
                 alert('Ya existe un usuario con ese correo');
                 window.location='../../registro.html';
                </script>";
            exit;
        }

        $password=md5($password1);
        $SQL="INSERT INTO usuario (rfc_us, nombre, paterno, materno, fecha_nac, correo, password, calle, nint, next, colonia, estado, alcaldia, cp, tipos_usuarios_id_tipo)
              VALUES('$rfc','$nombre','$paterno','$materno','$fecha','$correo', '$password', '$calle', $nint, '$next', '$colonia', '$estado', '$alcaldia', $cp, 2)";
        $res=mysqli_query($con,$SQL);
        if($res)
        {
          
            echo "<script>
                  alert('Usuario registrado con exito');
                  window.location='../../registro.html';
                </script>";
        }
        else
        {
           echo "<script>
                 alert('Ocurrió un error al dar de alta el usuario');
                 window.location='../../registro.html'
                </script>";
        }
    }
  }
  mysqli_close($con);

?>

</html>