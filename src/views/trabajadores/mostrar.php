<?php

use Peluqueria\App\Models\Trabajador;

$trabajadores = Trabajador::all();
?>

<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
  <?php require(PATH . '/components/head.php'); ?>

  <title>Consultar trabajadores</title>
</head>

<body class="d-flex flex-column h-100">
  <?php require(PATH . '/components/header.php'); ?>

  <div class="py-5 container">
    <div class="bg-light p-5 rounded-lg">
      <?php require(PATH . '/components/breadcrumb.php'); ?>

      <a class="btn btn-primary mb-4" href="/trabajador/pdf" target="_blank">Generar PDF</a>

      <h2 class="mb-4">Listado de trabajadores:</h2>

      <div class="table-responsive">
        <table class="table">
          <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Categoría</th>
            <th>Opciones</th>
          </tr>

          <?php
          if (count($trabajadores) > 0) {
            for ($i = 0; $i < count($trabajadores); $i++) {
              $trabajador = $trabajadores[$i];
              $dni = $trabajador->dni;
              $nombre = $trabajador->nombre;
              $apellidos = $trabajador->apellidos;
              $email = $trabajador->email;
              $categoria = $trabajador->categoria;

              echo "<tr>";
              echo "<td>" . $dni . "</td>";
              echo "<td>" . $nombre . "</td>";
              echo "<td>" . $apellidos . "</td>";
              echo "<td>" . $email . "</td>";
              echo "<td>" . $categoria . "</td>";
              echo "<td>
                    <button type='button' class='btn btn-primary'
                            data-bs-toggle='modal'
                            data-bs-target='#modificarModal'
                            data-bs-dni='$dni'
                            data-bs-nombre='$nombre'
                            data-bs-apellidos='$apellidos'
                            data-bs-email='$email'
                            data-bs-categoria='$categoria'>
                      Modificar
                    </button>
                    <a class='btn btn-danger'
                     href='/trabajador/eliminar/$dni'>Eliminar
                    </a>
                  </td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='5'>No hay trabajadores</td></tr>";
          }
          ?>
        </table>
      </div>
    </div>
  </div>

  <!-- Modals -->
  <?php require(PATH . '/components/trabajadores/modificarTrabajador.php'); ?>

  <!--- Footer -->
  <?php require(PATH . '/components/footer.php'); ?>

  <!-- Scripts -->
  <?php require(PATH . '/components/scripts.php') ?>
</body>

</html>