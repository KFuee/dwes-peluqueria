<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <script src="../../assets/javascript/rellenarTabla.js"></script>

  <title>Consultar servicios</title>
</head>

<body>
  <h1>Listado de servicios:</h1>

  <?php
  if (isset($_SESSION['servicios']) && count($_SESSION['servicios']) > 0) {
    $servicios = $_SESSION['servicios'];
    for ($i = 0; $i < count($servicios); $i++) {
      $servicio = $servicios[$i];
      $idServicio = $servicio->getId();

      echo ($i + 1) . '. ' . $servicio . ' | ';
      echo "<a href='?method=eliminar&tipo=servicio&id=$idServicio'>Eliminar item</a><br>";
    }
  } else echo 'No se han encontrado servicios.';
  ?>
</body>

</html>
