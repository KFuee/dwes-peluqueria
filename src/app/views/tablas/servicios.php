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
    <?php
    $breadItems = [
      '/home' => 'Home',
      '/tabla/mostrar/servicios' => 'Consultar servicios',
    ];

    require('app/views/parts/breadcrumb.php');
    ?>

    <h2 class="mb-4">Listado de servicios:</h2>

    <div class="table-responsive">
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
            $idServicio = $servicio->id;
            $nombre = $servicio->nombre;
            $precio = $servicio->precio;
            $duracion = $servicio->duracion;

            echo "<tr>";

            echo "<td>" . ($i + 1) . "</td>";
            echo "<td>" . $servicio->nombre . "</td>";
            echo "<td>" . $precio . "</td>";
            echo "<td>" . $duracion . " min</td>";
            echo "<td>
                  <button type='button' class='btn btn-primary'
                   data-bs-toggle='modal'
                   data-bs-target='#modificarModal'
                   data-bs-id='$idServicio'
                   data-bs-nombre='$nombre'
                   data-bs-precio='$precio'
                   data-bs-duracion='$duracion'
                   data-bs-descripcion='$servicio->descripcion'>
                    Modificar
                  </button>
                  <a class='btn btn-danger'
                     href='/tabla/eliminar/servicio/$idServicio'>Eliminar
                  </a>
                </td>";

            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='5'>No hay servicios</td></tr>";
        }
        ?>
      </table>
    </div>
  </div>

  <!-- Modals -->
  <?php require('app/views/parts/modals/modificarServicio.php'); ?>

  <?php require("app/views/parts/scripts.php") ?>
</body>

</html>
