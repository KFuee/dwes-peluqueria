<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
  <?php require(PATH . '/components/head.php'); ?>

  <title>Registro</title>
</head>

<body class="d-flex flex-column h-100">
  <?php require(PATH . '/components/header.php'); ?>

  <div class="py-5 container">
    <div class="bg-light p-5 rounded-lg">
      <?php require(PATH . '/components/breadcrumb.php'); ?>

      <h2 class="mb-4">Formulario - Registro</h2>

      <form action="/usuario/registro_post" method="post">
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
          <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" />
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Registrarse</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php require(PATH . '/components/footer.php'); ?>

  <?php require(PATH . '/components/scripts.php') ?>
</body>

</html>