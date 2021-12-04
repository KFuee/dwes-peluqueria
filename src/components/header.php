<?php
$usuario = null;
if (isset($_SESSION['usuario']))
  $usuario = $_SESSION['usuario'];
?>

<nav class="navbar navbar-dark bg-dark shadow-sm navbar-expand-lg">
  <div class="container">
    <span class="navbar-brand"><i class="fas fa-cut me-3"></i>Peluquería</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/home">Home</a>
        </li>

        <?php if ($usuario) {
          if ($usuario['rol'] !== 'cliente') ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Citas
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="/cita">Mostrar citas</a></li>
              <li><a class="dropdown-item" href="/cita/formulario">Pedir cita</a></li>
            </ul>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/cita/formulario">Pedir cita</a>
          </li>
        <?php } ?>

        <?php if ($usuario) {
          if ($usuario['rol'] !== 'cliente') ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Album
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="/album">Mostrar album</a></li>
              <li><a class="dropdown-item" href="/album/formulario">Añadir entrada</a></li>
            </ul>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/album">Album</a>
          </li>
        <?php } ?>

        <?php if ($usuario) {
          if ($usuario['rol'] !== 'cliente') { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Servicios
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="/servicio">Mostrar servicios</a></li>
                <li><a class="dropdown-item" href="/servicio/formulario">Alta servicio</a></li>
              </ul>
            </li>


            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Trabajadores
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="/trabajador">Mostrar trabajadores</a></li>
                <li><a class="dropdown-item" href="/trabajador/formulario">Alta trabajador</a></li>
              </ul>
            </li>
        <?php }
        } ?>
      </ul>

      <form class="d-flex">
        <?php
        if ($usuario) {
          echo "<a class='btn btn-outline-success me-2' href='/usuario'>Usuario</a>";
          echo "<a class='btn btn-outline-danger' href='/usuario/logout'>Cerrar sesión</a>";
        } else {
          echo "<a class='btn btn-outline-primary me-2' href='/usuario/registro'>Registrarse</a>";
          echo "<a class='btn btn-outline-success' href='/usuario/login'>Iniciar sesión</a>";
        }
        ?>
      </form>
    </div>
  </div>
</nav>