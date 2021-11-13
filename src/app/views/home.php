<?php
$alerta = flash()->display();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <style>
    body {
      padding: 15px;
    }

    #notification {
      position: absolute;
      right: 15px;
    }
  </style>

  <title>Home</title>
</head>

<body>
  <div id="notification">
    <?= $alerta ?>
  </div>

  <h2>Bienvenid@ a la App de peluquería</h2>

  <br>

  <h3><u>Usuario:</u></h3>
  <ul>
    <li><a href="/auth/registro">Registrarse</a></li>
    <li><a href="/formulario/alta/servicio">Iniciar sesión</a></li>
  </ul>

  <br>

  <h3><u>Formularios:</u></h3>
  <ul>
    <li><a href="/formulario/alta/trabajador">Dar de alta trabajador</a></li>
    <li><a href="/formulario/alta/servicio">Dar de alta servicio</a></li>
  </ul>

  <br>

  <h3><u>Tablas de datos:</u></h3>
  <ul>
    <li><a href="/tabla/mostrar/trabajadores">Trabajadores</a></li>
    <li><a href="/tabla/mostrar/servicios">Servicios</a></li>
  </ul>
</body>

</html>
