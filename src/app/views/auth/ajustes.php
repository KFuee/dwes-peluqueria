<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
  <?php require('app/views/parts/head.php'); ?>

  <title>Datos del usuario</title>
</head>

<body class="d-flex flex-column h-100">
  <?php require('app/views/parts/header.php'); ?>

  <div class="py-5 container">
    <div class="bg-light p-5 rounded-lg">
      <?php require('app/views/parts/breadcrumb.php'); ?>

      <h2 class="mb-4">Usuario - Datos</h2>

      <?php
      echo "<b>ID</b>: " . $usuario['id'] . "<br>";
      echo "<b>Nombre completo</b>: " . $usuario['nombre'] . " "
        . $usuario['apellidos'] . "<br>";
      echo "<b>Correo electrónico</b>: " . $usuario['email'] . "<br>";
      echo "<b>Rol</b>: " . $usuario['rol'];
      ?>
    </div>
  </div>

  <?php require('app/views/parts/footer.php'); ?>

  <?php require("app/views/parts/scripts.php") ?>
</body>

</html>
