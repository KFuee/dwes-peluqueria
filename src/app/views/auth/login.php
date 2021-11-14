<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Iniciar sesión</title>
</head>

<body>
  <h2>Formulario - Iniciar sesión</h2>

  <form action="/auth/login_post" method="post">
    <label for="email">Email: </label>
    <input type="text" name="email" id="email"><br>

    <br>

    <label for="password">Contraseña: </label>
    <input type="password" name="password" id="password"><br>

    <br>

    <input type="submit" value="Iniciar sesión">
  </form>
</body>

</html>
