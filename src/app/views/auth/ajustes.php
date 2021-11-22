<!DOCTYPE html>
<html lang="es">

<head>
  <?php require('app/views/parts/head.php'); ?>

  <title>Datos del usuario</title>
</head>

<body>
  <?php require('app/views/parts/header.php'); ?>

  <div class="contenido">
    <?php
    $breadItems = [
      '/home' => 'Home',
      '/formulario/alta/servicio' => 'Datos del usuario',
    ];

    require('app/views/parts/breadcrumb.php');
    ?>

    <h2 class="mb-4">Usuario - Datos</h2>

    <?php
    echo "<b>ID</b>: " . $usuario['id'] . "<br>";
    echo "<b>Nombre completo</b>: " . $usuario['nombre'] . " "
      . $usuario['apellidos'] . "<br>";
    echo "<b>Correo electrónico</b>: " . $usuario['email'] . "<br>";
    echo "<b>Rol</b>: " . $usuario['rol'];
    ?>
  </div>

  <?php require("app/views/parts/scripts.php") ?>
</body>

</html>
