<!DOCTYPE html>
<html lang="es">

<head>
  <?php require('app/views/parts/head.php'); ?>

  <title>Registro</title>
</head>

<body>
  <?php require('app/views/parts/header.php'); ?>

  <div class="contenido">
    <h2 class="mb-4">Formulario - Registro</h2>

    <form action="/usuario/registro_post" method="post">
      <label for="nombre">Nombre: </label>
      <input type="text" name="nombre" id="nombre"><br>

      <br>

      <label for="apellidos">Apellidos: </label>
      <input type="text" name="apellidos" id="apellidos"><br>

      <br>

      <label for="email">Email: </label>
      <input type="text" name="email" id="email"><br>

      <br>

      <label for="password">Contraseña: </label>
      <input type="password" name="password" id="password"><br>

      <br>

      <input type="submit" value="Registrarse">
    </form>
  </div>

</body>

</html>
