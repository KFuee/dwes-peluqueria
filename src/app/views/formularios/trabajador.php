<!DOCTYPE html>
<html lang="en">

<head>
  <?php require('app/views/parts/head.php'); ?>

  <title>Nuevo trabajador</title>
</head>

<body>
  <?php require('app/views/parts/header.php'); ?>

  <div class="contenido">
    <?php
    $breadItems = [
      '/home' => 'Home',
      '/formulario/alta/trabajador' => 'Nuevo trabajador',
    ];

    require('app/views/parts/breadcrumb.php');
    ?>

    <h2 class="mb-4">Formulario - Dar de alta trabajador</h2>

    <form action="/formulario/insertar/trabajador" method="post">
      <label for="dni">DNI: </label>
      <input type="text" name="dni" id="dni"><br>

      <br>

      <label for="nombre">Nombre: </label>
      <input type="text" name="nombre" id="nombre"><br>

      <br>

      <label for="apellidos">Apellidos: </label>
      <input type="text" name="apellidos" id="apellidos"><br>

      <br>

      <label for="email">Email: </label>
      <input type="text" name="email" id="email"><br>

      <br>

      <label for="categoria">Categoría: </label>
      <input type="text" name="categoria" id="categoria"><br>

      <br>

      <input type="submit" value="Dar de alta">
    </form>
  </div>

  <?php require("app/views/parts/scripts.php") ?>
</body>

</html>
