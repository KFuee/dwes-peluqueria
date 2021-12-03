<?php

use Peluqueria\App\Models\Fotografia;

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
          <?php foreach ($fotografias as $fotografia) : ?>
            <div class="col">
              <div class="card shadow-sm">
                <img class="card-img-top" src="/subidas/<?= $fotografia->nombre_fichero ?>" alt="Imagen album">

                <div class="card-body">
                  <p class="card-text"><?= $fotografia->descripcion ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="/subidas/<?= $fotografia->nombre_fichero ?>" target="_blank" class="btn btn-sm btn-outline-success">Ver</a>
                      <a href="/cita/formulario" class="btn btn-sm btn-outline-primary">Pedir cita</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </main>

  <?php require(PATH . '/components/footer.php'); ?>

  <?php require(PATH . '/components/scripts.php') ?>
</body>

</html>