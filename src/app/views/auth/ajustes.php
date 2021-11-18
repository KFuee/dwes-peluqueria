<?php
$usuario = null;
if (isset($_SESSION['usuario']))
  $usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Datos del usuario</title>
</head>

<body>
  <h2>Usuario - Datos</h2>

  <?php
  echo "ID: " . $usuario['id'] . "<br>";
  echo "Nombre completo: " . $usuario['nombre'] . " "
    . $usuario['apellidos'] . "<br>";
  echo "Correo electrónico: " . $usuario['email'];
  ?>
</body>

</html>
