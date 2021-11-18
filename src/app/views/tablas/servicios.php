<?php
$servicios = Servicio::all();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Consultar servicios</title>
</head>

<body>
  <h1>Listado de servicios:</h1>

  <?php
  if (count($servicios) > 0) {
    for ($i = 0; $i < count($servicios); $i++) {
      $servicio = $servicios[$i];
      $idServicio = $servicio->id;

      echo ($i + 1) . '. ' . $servicio->nombre . ' | ';
      echo "<a href='/formulario/eliminar/servicio/$idServicio'>Eliminar item</a><br>";
    }
  } else echo 'No se han encontrado servicios.';
  ?>
</body>

</html>
