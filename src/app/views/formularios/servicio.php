<!DOCTYPE html>
<html lang="es">

<head>
  <?php require('app/views/parts/head.php'); ?>

  <title>Nuevo servicio</title>
</head>

<body>
  <?php require('app/views/parts/header.php'); ?>

  <div class="contenido">
    <?php
    $breadItems = [
      '/home' => 'Home',
      '/servicio/formulario' => 'Nuevo servicio',
    ];

    require('app/views/parts/breadcrumb.php');
    ?>

    <h2 class="mb-4">Formulario - Dar de alta servicio</h2>

    <form action="/servicio/insertar" method="post">
      <label for="nombre">Nombre: </label>
      <input type="text" name="nombre" id="nombre"><br>

      <br>

      <label for="precio">Precio: </label>
      <input type="text" name="precio" id="precio"><br>

      <br>

      <label for="duracion">Duración (en minutos): </label>
      <input type="text" name="duracion" id="duracion"><br>

      <br>

      <label for="descripcion">Descripción: </label>
      <textarea name="descripcion" id="descripcion"></textarea><br>

      <br>

      <input type="submit" value="Dar de alta">
    </form>
  </div>

  <?php require("app/views/parts/scripts.php") ?>
</body>

</html>
