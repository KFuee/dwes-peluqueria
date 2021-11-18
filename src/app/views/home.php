<?php
$usuario = null;
if (isset($_SESSION['usuario']))
  $usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Home</title>

  <style>
    a {
      color: #0000EE;
      text-decoration: none;
    }

    a:visited {
      color: #0000EE;
    }
  </style>
</head>

<body>
  <h1>Bienvenid@ a la App de peluquería</h1>
  <?php
  // Comprueba si el usuario está logueado
  if ($usuario) {
    // Muestra los datos del usuario
    echo "<p>Iniciado sesión como: <b>" . $usuario['email'] . "</b>, eres <b>"
      . $usuario['rol'] . "</b></p>";
  }
  ?>

  <h2><u>Usuario:</u></h2>
  <ul>
    <?php
    if ($usuario) {
      echo "<li><a href='/auth/datos_usuario'>Datos</a></li>";
      echo "<li><a href='/auth/logout'>Cerrar sesión</a></li>";
    } else {
      echo "<li><a href='/auth/registro'>Registrarse</a></li>";
      echo "<li><a href='/auth/login'>Iniciar sesión</a></li>";
    }
    ?>
  </ul>

  <br>

  <?php
  if ($usuario) {
    if ($usuario['rol'] === 'gerente' || $usuario['rol'] === 'administrador') {
      echo "<h2><u>Formularios:</u></h2>";

      echo "<ul>";
      echo "<li><a href='/formulario/alta/trabajador'>Alta trabajador</a></li>";
      echo "<li><a href='/formulario/alta/servicio'>Alta servicio</a></li>";
      echo "</ul>";

      echo "<br>";

      echo "<h2><u>Tablas de datos:</u></h2>";
      echo "<ul>";
      echo "<li><a href='/tabla/mostrar/trabajadores'>Trabajadores</a></li>";
      echo "<li><a href='/tabla/mostrar/servicios'>Servicios</a></li>";
      echo "</ul>";
    }
  }
  ?>
</body>

</html>
