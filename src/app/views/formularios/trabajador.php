<?php
$servicios = Servicio::all();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <?php require('app/views/parts/head.php'); ?>

  <title>Nuevo trabajador</title>
</head>

<body>
  <?php require('app/views/parts/header.php'); ?>

  <div class="contenido">
    <?php require('app/views/parts/breadcrumb.php'); ?>

    <h2 class="mb-4">Formulario - Dar de alta trabajador</h2>

    <form action="/trabajador/insertar" method="post">
      <div class="form-group row mb-4">
        <label for="dni" class="col-sm-2 col-form-label">DNI</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="dni" name="dni" />
        </div>
      </div>
      <div class="form-group row mb-4">
        <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nombre" name="nombre" />
        </div>
      </div>
      <div class="form-group row mb-4">
        <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="apellidos" name="apellidos" />
        </div>
      </div>
      <div class="form-group row mb-4">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" name="email" />
        </div>
      </div>
      <div class="form-group row mb-4">
        <label for="categoria" class="col-sm-2 col-form-label">Categoría</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="categoria" name="categoria" />
        </div>
      </div>
      <div class="form-group row mb-4">
        <label for="servicios" class="col-sm-2 col-form-label">Servicios</label>
        <div class="col-sm-10">
          <select multiple class="form-control" id="servicios" name="servicios[]">
            <?php
            foreach ($servicios as $servicio) {
              echo '<option value="' . $servicio->id . '">' . $servicio->nombre . '</option>';
            }
            ?>
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

  <?php require("app/views/parts/scripts.php") ?>
</body>

</html>
