<?php
  //Este es el incio de sesion de solo administrador
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="../../css/login.css">
  </head>
  <body>
    <div class="login-box">
      <div id="logo">
        <img src="../../images/logo.png" class="avatar" alt="Avatar Image">
      </div>

      <h1>Inicia Sesion</h1>
      <form action="sesionD.php" method="post">
        <label for="username">Correo</label>
        <input type="email" placeholder="Ej: tu@correo.com" name="correo">
        <label for="password">Contraseña</label>
        <input type="password" placeholder="Contraseña" name="pass">
        <input type="submit" value="Entrar">
        <a href="../../index.html">Menu de la pagina principal</a><br>
      </form>
    </div>
  </body>
</html>

