<?php
$servicios = Servicio::all();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <?php require('app/views/parts/head.php'); ?>

  <title>Consultar servicios</title>
</head>

<body>
  <?php require('app/views/parts/header.php'); ?>

  <div class="contenido">
    <h2 class="mb-4">Listado de servicios:</h2>

    <table class="table">
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Duración</th>
        <th>Opciones</th>
      </tr>

      <?php
      if (count($servicios) > 0) {
        for ($i = 0; $i < count($servicios); $i++) {
          $servicio = $servicios[$i];
          echo "<tr>";
          echo "<td>" . ($i + 1) . "</td>";
          echo "<td>" . $servicio->nombre . "</td>";
          echo "<td>" . $servicio->precio . "</td>";
          echo "<td>" . $servicio->duracion . " min</td>";
          // Botón eliminar
          echo "<td>
              <a class='btn btn-outline-danger'
                 href='/formulario/eliminar/servicio/$servicio->id'>Eliminar</a>
            </td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='5'>No hay servicios</td></tr>";
      }
      ?>
    </table>
  </div>

  <?php require("app/views/parts/scripts.php") ?>
</body>

</html>