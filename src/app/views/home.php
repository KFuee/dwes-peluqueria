<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
  <?php require('app/views/parts/head.php'); ?>

  <title>Home</title>
</head>

<body class="d-flex flex-column h-100">
  <?php require('app/views/parts/header.php'); ?>

  <div class="py-5 container">
    <div class="bg-light p-5 rounded-lg">
      <?php require('app/views/parts/breadcrumb.php'); ?>

      <h1>Bienvenid@ a la App de peluquería</h1>

      <?php
      // Comprueba si el usuario está logueado
      if ($usuario) {
        // Muestra los datos del usuario
        echo "<p>Iniciada sesión como: <b>" . $usuario['email'] . "</b>, eres <b>"
          . $usuario['rol'] . "</b></p>";
      } else echo "Inicia sesión para realizar cambios"
      ?>
    </div>
  </div>

  <?php require('app/views/parts/footer.php'); ?>

  <?php require("app/views/parts/scripts.php") ?>
</body>

</html>
