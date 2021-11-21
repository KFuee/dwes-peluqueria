<?php
$usuario = null;
if (isset($_SESSION['usuario']))
  $usuario = $_SESSION['usuario'];
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <span class="navbar-brand">Peluquería</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/home">Home</a>
        </li>

        <?php
        if ($usuario) {
        ?>
          <li class="nav-item">
            <a class="nav-link" aria-current="page">Pedir cita</a>
          </li>
        <?php
        }
        ?>

        <?php if ($usuario) {
          if ($usuario['rol'] !== 'cliente') { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Formularios
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="/formulario/alta/servicio">Alta servicio</a></li>
              </ul>
            </li>


            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Tablas de datos
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="/tabla/mostrar/servicios">Mostrar servicios</a></li>
              </ul>
            </li>
        <?php }
        } ?>
      </ul>

      <form class="d-flex">
        <?php
        if ($usuario) {
          echo "<a class='btn btn-outline-success me-2' href='/auth/datos_usuario'>Ajustes</a>";
          echo "<a class='btn btn-outline-danger' href='/auth/logout'>Cerrar sesión</a>";
        } else {
          echo "<a class='btn btn-outline-primary me-2' href='/auth/registro'>Registrarse</a>";
          echo "<a class='btn btn-outline-success' href='/auth/login'>Iniciar sesión</a>";
        }
        ?>
      </form>
    </div>
  </div>
</nav>
