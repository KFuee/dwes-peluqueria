<?php

use Peluqueria\App\Models\Fotografia;
use Peluqueria\App\Models\Servicio;

$fotografias = Fotografia::all();
?>

<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
  <?php require(PATH . '/components/head.php'); ?>

  <title>Album de fotos</title>

  <style>
    .card-img-top {
      width: 100%;
      height: 15vw;
      object-fit: cover;
    }
  </style>
</head>

<body class="d-flex flex-column h-100">
  <?php require(PATH . '/components/header.php'); ?>

  <main>
    <section class="py-5 text-center container bg-light">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">Album de fotografías</h1>

          <p class="lead text-muted">"Cirujanos del cabello"
            Dicen que nuestros productos son mágicos, pero ¿quieres saber el secreto?
            Casi 30 años de experiencia, de investigación y de trabajo.
          </p>
        </div>
      </div>
    </section>

    <div class="album py-5">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php if (!empty($fotografias)) : ?>
            <?php foreach ($fotografias as $fotografia) : ?>
              <?php $servicio = Servicio::find($fotografia->id_servicio); ?>
              <div class="col">
                <div class="card shadow-sm">
                  <?php if ($_ENV['APP_ENV'] !== 'dev') : ?>
                    <img class="card-img-top" src="<?= $fotografia->localizacion ?>" alt="Imagen album">
                  <?php else : ?>
                    <img class="card-img-top" src="/subidas/<?= $fotografia->localizacion ?>" alt="Imagen album">
                  <?php endif; ?>

                  <div class="card-body">
                    <p class="card-text"><?= "<b>Servicio</b>: " . $servicio->nombre . "<br>" ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <?php if ($_ENV['APP_ENV'] !== 'dev') : ?>
                          <a href="<?= $fotografia->localizacion ?>" target="_blank" class="btn btn-sm btn-outline-success">Ver</a>
                        <?php else : ?>
                          <a href="/subidas/<?= $fotografia->localizacion ?>" target="_blank" class="btn btn-sm btn-outline-success">Ver</a>
                        <?php endif; ?>
                        <a href="/cita/formulario?servicio=<?= $fotografia->id_servicio ?>" class="btn btn-sm btn-outline-primary">Pedir cita</a>
                      </div>

                      <!-- Botón eliminar -->
                      <?php if (isset($_SESSION['usuario'])) : ?>
                        <?php if ($usuario->rol !== 'cliente') : ?>
                          <div class="btn-group">
                            <a href="/album/eliminar/<?= $fotografia->id ?>" class="btn btn-sm btn-outline-danger">Eliminar</a>
                          </div>
                        <?php endif; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else : ?>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <div class="card shadow-sm">
                <div class="card-body">
                  <p class="card-text text-center">
                    <i class="fas fa-database me-2" style="color: #dc3545;"></i>
                    <b>No se encontraron fotografías</b>
                  </p>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <?php require(PATH . '/components/footer.php'); ?>

  <!-- Scripts -->
  <?php require(PATH . '/components/scripts.php') ?>
</body>

</html>