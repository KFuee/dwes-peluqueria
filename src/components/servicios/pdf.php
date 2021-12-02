<!DOCTYPE html>
<html lang="en">

<head>
  <?php require(PATH . '/components/head.php'); ?>

  <title>Listado de servicios</title>

  <style>
    h2 {
      margin-bottom: 1.5rem;
    }

    .table {
      width: 100%;
      max-width: 100%;
      margin-bottom: 1rem;
      text-align: center;

    }

    .table th,
    .table td {
      padding: 0.75rem;
      vertical-align: top;
      border-top: 1px solid #eceeef;
    }
  </style>
</head>

<body>
  <h2 class="mb-4">Listado de servicios:</h2>

  <table class="table" id="tabla">
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Duración</th>
    </tr>

    <?php
    if (count($servicios) > 0) {
      for ($i = 0; $i < count($servicios); $i++) {
        $servicio = $servicios[$i];
        $idServicio = $servicio->id;
        $nombre = $servicio->nombre;
        $precio = $servicio->precio;
        $duracion = $servicio->duracion;

        echo "<tr>";
        echo "<td>" . ($i + 1) . "</td>";
        echo "<td>" . $servicio->nombre . "</td>";
        echo "<td>" . $precio . " euros" . "</td>";
        echo "<td>" . $duracion . " min</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='4'>No hay servicios</td></tr>";
    }
    ?>
  </table>
</body>

</html>