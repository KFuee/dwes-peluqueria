<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
  <?php require(PATH . '/components/head.php'); ?>

  <title>Album de fotos</title>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
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
          <div class="col">
            <div class="card shadow-sm">
              <img src="../../../assets/img/prueba.jpeg" class="card-img-top" alt="Prueba">

              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Pedir cita</button>
                  </div>
                  <small class="text-muted">Hace 10 mins</small>
                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <img src="../../../assets/img/prueba.jpeg" class="card-img-top" alt="Prueba">

              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Pedir cita</button>
                  </div>
                  <small class="text-muted">Hace 9 mins</small>
                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <img src="../../../assets/img/prueba.jpeg" class="card-img-top" alt="Prueba">

              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Pedir cita</button>
                  </div>
                  <small class="text-muted">Hace 25 mins</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </main>

  <?php require(PATH . '/components/footer.php'); ?>

  <?php require(PATH . '/components/scripts.php') ?>
</body>

</html>