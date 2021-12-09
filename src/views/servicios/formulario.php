<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
  <?php require(PATH . '/components/head.php'); ?>

  <title>Nuevo servicio</title>
</head>

<body class="d-flex flex-column h-100">
  <?php require(PATH . '/components/header.php'); ?>

  <div class="py-5 container">
    <div class="bg-light p-5 rounded-lg">
      <?php require(PATH . '/components/breadcrumb.php'); ?>

      <h2 class="mb-4">Formulario - Dar de alta servicio</h2>

      <form action="/servicio/insertar" method="post">
        <div class="form-group row mb-4">
          <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nombre" name="nombre" required />
          </div>
        </div>

        <div class="form-group row mb-4">
          <label for="precio" class="col-sm-2 col-form-label">Precio</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="precio" name="precio" required />
          </div>
        </div>

        <div class="form-group row mb-4">
          <label for="duracion" class="col-sm-2 col-form-label">Duración</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="duracion" name="duracion" required />
          </div>
        </div>

        <div class="form-group row mb-4">
          <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
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