<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">

  <title>Consultar trabajadores</title>
</head>

<body>
  <h1>Listado de trabajadores:</h1>

  <?php
  if (isset($_SESSION['trabajadores']) && count($_SESSION['trabajadores']) > 0) {
    $trabajadores = $_SESSION['trabajadores'];
    for ($i = 0; $i < count($trabajadores); $i++) {
      $trabajador = $trabajadores[$i];
      $idTrabajador = $trabajador->getId();

      echo ($i + 1) . '. ' . $trabajador . ' | ';
      echo "<a href='?method=eliminar&tipo=trabajador&id=$idTrabajador'>Eliminar item</a><br>";
    }
  } else echo 'No se han encontrado trabajadores.';
  ?>
</body>

</html>
