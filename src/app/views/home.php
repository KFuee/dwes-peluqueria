<?php
$logged = false;
if (isset($_SESSION['usuario']))
  $logged = true;
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Home</title>
</head>

<body>
  <h1>Bienvenid@ a la App de peluquería</h1>
  <?php
  // Comprueba si el usuario está logueado
  if ($logged) {
    // Muestra los datos del usuario
    echo "<p>Iniciado sesión como: <b>" . $_SESSION['usuario'] . "</b></p>";
  }
  ?>

  <h2><u>Usuario:</u></h2>
  <ul>
    <?php
    if ($logged)
      echo "<li><a href='/auth/logout'>Cerrar sesión</a></li>";
    else {
      echo "<li><a href='/auth/registro'>Registrarse</a></li>";
      echo "<li><a href='/auth/login'>Iniciar sesión</a></li>";
    }
    ?>
  </ul>

  <br>

  <h2><u>Formularios:</u></h2>
  <ul>
    <li><a href="/formulario/alta/trabajador">Dar de alta trabajador</a></li>
    <li><a href="/formulario/alta/servicio">Dar de alta servicio</a></li>
  </ul>

  <br>

  <h2><u>Tablas de datos:</u></h2>
  <ul>
    <li><a href="/tabla/mostrar/trabajadores">Trabajadores</a></li>
    <li><a href="/tabla/mostrar/servicios">Servicios</a></li>
  </ul>
</body>

</html>
