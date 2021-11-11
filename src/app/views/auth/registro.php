<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Registro</title>
</head>

<body>
  <h2>Formulario - Registro</h2>

  <form action="/auth/insertar" method="post">
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" id="nombre"><br>

    <br>

    <label for="apellido">Apellido: </label>
    <input type="text" name="apellido" id="apellido"><br>

    <br>

    <label for="email">Email: </label>
    <input type="text" name="email" id="email"><br>

    <br>

    <label for="password">Contraseña: </label>
    <input type="text" name="password" id="password"><br>

    <br>

    <input type="submit" value="Registrarse">
  </form>
</body>

</html>
