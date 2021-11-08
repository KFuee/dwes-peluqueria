<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Trabajadores</title>
</head>

<body>
  <h1>Listado de trabajadores:</h1>
  <?php
  if (isset($_SESSION['trabajadores'])) {
    $trabajadores = $_SESSION['trabajadores'];
    for ($i = 0; $i < count($trabajadores); $i++) {
      $trabajador = $trabajadores[$i];
      echo ($i + 1) . '. ' . $trabajador . '<br>';
    }
  } else echo 'No se han encontrado trabajadores.';
  ?>
</body>

</html>
