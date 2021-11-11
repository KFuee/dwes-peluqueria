<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Nuevo servicio</title>
</head>

<body>
  <h2>Formulario - Dar de alta servicio</h2>

  <form action="/formulario/insertar/servicio" method="post">
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" id="nombre"><br>

    <br>

    <label for="precio">Precio: </label>
    <input type="text" name="precio" id="precio"><br>

    <br>

    <label for="precio">Duración (en minutos): </label>
    <input type="text" name="duracion" id="duracion"><br>

    <br>

    <label for="descripcion">Descripción: </label>
    <textarea name="descripcion" id="descripcion"></textarea><br>

    <br>

    <input type="submit" value="Dar de alta">
  </form>
</body>

</html>
