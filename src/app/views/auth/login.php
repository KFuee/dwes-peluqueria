<!DOCTYPE html>
<html lang="es">

<head>
  <?php require('app/views/parts/head.php'); ?>

  <title>Iniciar sesión</title>
</head>

<body>
  <?php require('app/views/parts/header.php'); ?>

  <div class="contenido">
    <h2 class="mb-4">Formulario - Iniciar sesión</h2>

    <form action="/usuario/login_post" method="post">
      <label for="email">Email: </label>
      <input type="text" name="email" id="email"><br>

      <br>

      <label for="password">Contraseña: </label>
      <input type="password" name="password" id="password"><br>

      <br>

      <input type="submit" value="Iniciar sesión">
    </form>
  </div>

  <?php require("app/views/parts/scripts.php") ?>
</body>

</html>
