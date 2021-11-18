<?php
$servicios = Servicio::all();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Consultar servicios</title>
</head>

<body>
  <h1>Listado de servicios:</h1>

  <table border="1">
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Duración</th>
      <th>Opciones</th>
    </tr>

    <?php
    if (count($servicios) > 0) {
      foreach ($servicios as $servicio) {
        $idServicio = $servicio->id;
        echo "<tr>";
        echo "<td>" . $idServicio . "</td>";
        echo "<td>" . $servicio->nombre . "</td>";
        echo "<td>" . $servicio->precio . "</td>";
        echo "<td>" . $servicio->duracion . "</td>";
        // Botón eliminar
        echo "<td>
                <a href='/formulario/eliminar/servicio/$idServicio'>Eliminar item</a>
              </td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='5'>No hay servicios</td></tr>";
    }
    ?>
  </table>
</body>

</html>
