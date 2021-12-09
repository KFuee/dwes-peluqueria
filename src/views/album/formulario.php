<?

use Peluqueria\App\Models\Servicio;

$servicios = Servicio::all();
?>

<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
  <?php require(PATH . '/components/head.php'); ?>

  <title>Subir imagen</title>
</head>

<body class="d-flex flex-column h-100">
  <?php require(PATH . '/components/header.php'); ?>

  <div class="py-5 container">
    <div class="bg-light p-5 rounded-lg">
      <?php require(PATH . '/components/breadcrumb.php'); ?>

      <h2 class="mb-4">Formulario - Subir imagen</h2>

      <form action="/album/insertar" method="post" enctype="multipart/form-data">
        <div class="form-group row mb-4">
          <label for="fichero" class="col-sm-2 col-form-label">Fichero</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="fichero" name="fichero" accept="image/*" />
          </div>
        </div>

        <div class="form-group row mb-4">
          <label for="servicio" class="col-sm-2 col-form-label">Servicio</label>
          <div class="col-sm-10">
            <select class="form-control" id="servicio" name="servicio">
              <?php if (count($servicios) > 0) : ?>
                <option value="">Seleccione un servicio</option>
                <?php foreach ($servicios as $servicio) : ?>
                  <option value="<?= $servicio->id ?>"><?= $servicio->nombre ?></option>
                <?php endforeach; ?>
              <?php else : ?>
                <option value="">No hay servicios disponibles</option>
              <?php endif; ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Subir imagen</button>
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