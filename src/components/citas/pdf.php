<?php

use Peluqueria\App\Models\Trabajador;
use Peluqueria\App\Models\Servicio;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require(PATH . '/components/head.php'); ?>

  <title>Listado de citas</title>

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
  <h2 class="mb-4">Listado de citas:</h2>

  <table class="table" id="tabla">
    <tr>
      <th>#</th>
      <th>Trabajador</th>
      <th>Servicio</th>
      <th>Fecha</th>
      <th>Nombre completo</th>
      <th>Email</th>
      <th>Observaciones</th>
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
        echo "<td>$id</td>";
        echo "<td>$tNombreCompleto</td>";
        echo "<td>$servicio->nombre</td>";
        echo "<td>$fecha</td>";
        echo "<td>$cNombreCompleto</td>";
        echo "<td>$email</td>";
        echo "<td>$observaciones</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='7'>No hay citas</td></tr>";
    }
    ?>
  </table>
</body>

</html>