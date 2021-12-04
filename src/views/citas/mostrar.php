<?php

use Peluqueria\App\Models\Cita;
use Peluqueria\App\Models\Trabajador;
use Peluqueria\App\Models\Servicio;

$citas = Cita::all();
?>

<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
  <?php require(PATH . '/components/head.php'); ?>

  <title>Consultar servicios</title>
</head>

<body class="d-flex flex-column h-100">
  <?php require(PATH . '/components/header.php'); ?>

  <div class="py-5 container">
    <div class="bg-light p-5 rounded-lg">
      <?php require(PATH . '/components/breadcrumb.php'); ?>

      <a class="btn btn-primary mb-4" href="/cita/pdf" target="_blank">Generar PDF</a>

      <h2 class="mb-4">Listado de citas:</h2>

      <div class="table-responsive">
        <table class="table" id="tabla">
          <tr>
            <th>#</th>
            <th>Nombre completo</th>
            <th>Fecha</th>
            <th>Servicio</th>
            <th>Opciones</th>
          </tr>

          <?php
          if (count($citas) > 0) {
            for ($i = 0; $i < count($citas); $i++) {
              $cita = $citas[$i];
              $id = $cita->id;
              $trabajador = Trabajador::find($cita->trabajador);
              $tNombreCompleto = $trabajador->nombre . ' ' . $trabajador->apellidos;
              $servicio = Servicio::find($cita->servicio);
              $fecha = $cita->fecha . ' - ' . $cita->hora;
              $cNombreCompleto = $cita->nombre . ' ' . $cita->apellidos;
              $email = $cita->email;
              $observaciones = $cita->observaciones;

              echo "<tr>";
              echo "<td>" . $id . "</td>";
              echo "<td>" . $cNombreCompleto . "</td>";
              echo "<td>" . $fecha . "</td>";
              echo "<td>" . $servicio->nombre . "</td>";
              echo "<td>
                    <button type='button' class='btn btn-primary'
                            data-bs-toggle='modal'
                            data-bs-target='#mostrarModal'
                            data-bs-id='$id'
                            data-bs-trabajador='$tNombreCompleto'
                            data-bs-servicio='$servicio->nombre'
                            data-bs-fecha='$fecha'
                            data-bs-nombre='$cNombreCompleto'
                            data-bs-email='$email'
                            data-bs-observaciones='$observaciones'>
                      Mostrar
                    </button>
                    <a class='btn btn-danger'
                       href='/cita/eliminar/$id'>Eliminar
                    </a>
                  </td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='5'>No hay citas</td></tr>";
          }
          ?>
        </table>
      </div>
    </div>
  </div>

  <!-- Modals -->
  <?php require(PATH . '/components/citas/mostrarCita.php'); ?>

  <!-- Footer -->
  <?php require(PATH . '/components/footer.php'); ?>

  <!-- Scripts -->
  <?php require(PATH . '/components/scripts.php') ?>
</body>

</html>