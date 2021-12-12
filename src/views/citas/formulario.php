<?php

use Peluqueria\App\Models\Servicio;

$servicios = Servicio::all();
?>

<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
  <?php require(PATH . '/components/head.php'); ?>

  <title>Pedir cita</title>
</head>

<body class="d-flex flex-column h-100 min-vh-100">
  <?php require(PATH . '/components/header.php'); ?>

  <div class="py-5 container">
    <div class="bg-light p-5 rounded-lg">
      <?php require(PATH . '/components/breadcrumb.php'); ?>

      <h2 class="mb-4">Pedir cita:</h2>

      <form id="form-cita">
        <div class="form-group row mb-4">
          <label for="servicio" class="col-sm-2 col-form-label">Servicio</label>
          <div class="col-sm-10">
            <select class="form-control" id="servicio" name="servicio" required>
              <?php if (!empty($servicios)) : ?>
                <option value="">Seleccione un servicio</option>
                <?php foreach ($servicios as $servicio) : ?>
                  <?php if (isset($_GET['servicio']) && $_GET['servicio'] == $servicio->id) : ?>
                    <option value="<?= $servicio->id ?>" selected><?= "$servicio->nombre - Duración $servicio->duracion minutos" ?></option>
                  <?php else : ?>
                    <option value="<?= $servicio->id ?>"><?= "$servicio->nombre - Duración $servicio->duracion minutos" ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php else : ?>
                <option value="">No hay servicios disponibles</option>
              <?php endif; ?>
            </select>
          </div>
        </div>

        <div class="form-group row mb-4" id="t-wrapper" style="display: none;">
          <label for="trabajador" class="col-sm-2 col-form-label">Trabajadores</label>
          <div class="col-sm-10">
            <select class="form-control" id="trabajador" name="trabajador" required></select>
          </div>
        </div>

        <div class="form-group row mb-4" id="f-wrapper" style="display: none;">
          <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
          <div class="col-sm-10">
            <select class="form-control" id="fecha" name="fecha" required></select>
          </div>
        </div>

        <div class="form-group row mb-4" id="h-wrapper" style="display: none;">
          <label for="hora" class="col-sm-2 col-form-label">Hora</label>
          <div class="col-sm-10">
            <select class="form-control" id="hora" name="hora" required></select>
          </div>
        </div>

        <div class="form-group row mb-4" id="n-wrapper" style="display: none;">
          <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>
        </div>

        <div class="form-group row mb-4" id="a-wrapper" style="display: none;">
          <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
          </div>
        </div>

        <div class="form-group row mb-4" id="e-wrapper" style="display: none;">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
        </div>

        <div class="form-group row mb-4" id="o-wrapper" style="display: none;">
          <label for="observaciones" class="col-sm-2 col-form-label">Observaciones</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="observaciones" name="observaciones" required></textarea>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Pedir cita</button>
          </div>
        </div>
    </div>
  </div>

  <!-- Footer -->
  <?php require(PATH . '/components/footer.php'); ?>

  <!-- Scripts -->
  <?php require(PATH . '/components/scripts.php') ?>
  <script>
    <?php if (isset($_SESSION["usuario"])) { ?>
      const usuario = <?= json_encode($_SESSION["usuario"]) ?>;
    <?php } ?>
  </script>
  <script src="../../assets/js/citas/formulario.js"></script>
  <!-- Fin - Scripts -->
</body>

</html>