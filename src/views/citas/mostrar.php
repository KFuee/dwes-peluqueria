<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
  <?php require(PATH . '/components/head.php'); ?>

  <title>Consultar citas</title>
</head>

<body class="d-flex flex-column h-100 min-vh-100">
  <?php require(PATH . '/components/header.php'); ?>

  <div class="py-5 container">
    <div class="bg-light p-5 rounded-lg">
      <?php require(PATH . '/components/breadcrumb.php'); ?>

      <h2 class="mb-4">Listado de citas:</h2>

      <div id="toolbar">
        <button id="eliminar" class="btn btn-danger" disabled>
          <i class="fa fa-trash me-2"></i>Eliminar
        </button>
      </div>

      <table id="citas" data-toolbar="#toolbar"></table>
    </div>
  </div>

  <!-- Footer -->
  <?php require(PATH . '/components/footer.php'); ?>

  <!-- Scripts -->
  <?php require(PATH . '/components/scripts.php') ?>
  <script src=" ../../assets/js/citas/mostrar.js"></script>
  <!-- Fin - Scripts -->
</body>

</html>