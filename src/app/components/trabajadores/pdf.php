<!DOCTYPE html>
<html lang="en">

<head>
  <?php require('app/views/parts/head.php'); ?>

  <title>Listado de trabajadores</title>

  <style>
    h2 {
      margin-bottom: 1.5rem;
    }

    .table {
      width: 100%;
      max-width: 100%;
      margin-bottom: 1rem;
      text-align: center;

    }

    .table th,
    .table td {
      padding: 0.75rem;
      vertical-align: top;
      border-top: 1px solid #eceeef;
    }
  </style>
</head>

<body>
  <h2 class="mb-4">Listado de trabajadores:</h2>

  <table class="table" id="tabla">
    <tr>
      <th>DNI</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Email</th>
      <th>Categoría</th>
    </tr>

    <?php
    if (count($trabajadores) > 0) {
      for ($i = 0; $i < count($trabajadores); $i++) {
        $trabajador = $trabajadores[$i];
        $dni = $trabajador->dni;
        $nombre = $trabajador->nombre;
        $apellidos = $trabajador->apellidos;
        $email = $trabajador->email;
        $categoria = $trabajador->categoria;

        echo "<tr>";
        echo "<td>" . $dni . "</td>";
        echo "<td>" . $nombre . "</td>";
        echo "<td>" . $apellidos . "</td>";
        echo "<td>" . $email . "</td>";
        echo "<td>" . $categoria . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='5'>No hay trabajadores</td></tr>";
    }
    ?>
  </table>
</body>

</html>
