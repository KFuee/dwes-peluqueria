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
    echo "ID: " . $usuario['id'] . "<br>";
    echo "Nombre completo: " . $usuario['nombre'] . " "
      . $usuario['apellidos'] . "<br>";
    echo "Correo electrónico: " . $usuario['email'];
    ?>
  </div>

  <?php require("app/views/parts/scripts.php") ?>
</body>

</html>
