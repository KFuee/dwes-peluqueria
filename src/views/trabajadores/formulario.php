<?php

use Peluqueria\App\Models\Servicio;

$servicios = Servicio::all();
?>

<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
  <?php require(PATH . '/components/head.php'); ?>

  <title>Nuevo trabajador</title>
</head>

<body class="d-flex flex-column h-100">
  <?php require(PATH . '/components/header.php'); ?>

  <div class="py-5 container">
    <div class="bg-light p-5 rounded-lg">
      <?php require(PATH . '/components/breadcrumb.php'); ?>

      <h2 class="mb-4">Formulario - Dar de alta trabajador</h2>

      <form action="/trabajador/insertar" method="post">
        <div class="form-group row mb-4">
          <label for="dni" class="col-sm-2 col-form-label">DNI</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="dni" name="dni" required />
          </div>
        </div>

        <div class="form-group row mb-4">
          <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nombre" name="nombre" required />
          </div>
        </div>

        <div class="form-group row mb-4">
          <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="apellidos" name="apellidos" required />
          </div>
        </div>

        <div class="form-group row mb-4">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" required />
          </div>
        </div>

        <div class="form-group row mb-4">
          <label for="categoria" class="col-sm-2 col-form-label">Categoría</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="categoria" name="categoria" required />
          </div>
        </div>

        <div class="form-group row mb-4">
          <label for="servicios" class="col-sm-2 col-form-label">Servicios</label>
          <div class="col-sm-10">
            <select multiple class="form-control" id="servicios" name="servicios[]" required>
              <?php if (count($servicios) > 0) : ?>
                <?php foreach ($servicios as $servicio) : ?>
                  <option value="<?= $servicio->id ?>"><?= $servicio->nombre ?></option>
                <?php endforeach; ?>
              <?php else : ?>
                <option value="">No hay servicios</option>
              <?php endif; ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Dar de alta</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Footer -->
  <?php require(PATH . '/components/footer.php'); ?>

  <!-- Scripts -->
  <?php require(PATH . '/components/scripts.php') ?>
</body>

</html>