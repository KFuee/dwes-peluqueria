<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
  <?php require(PATH . '/components/head.php'); ?>

  <title>Iniciar sesión</title>
</head>

<body class="d-flex flex-column h-100">
  <?php require(PATH . '/components/header.php'); ?>

  <div class="py-5 container">
    <div class="bg-light p-5 rounded-lg">
      <?php require(PATH . '/components/breadcrumb.php'); ?>

      <h2 class="mb-4">Formulario - Iniciar sesión</h2>

      <form action="/usuario/login_post" method="post">
        <div class="form-group row mb-4">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" />
          </div>
        </div>
        <div class="form-group row mb-4">
          <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php require(PATH . '/components/footer.php'); ?>

  <?php require(PATH . '/components/scripts.php') ?>
</body>

</html>