<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Contacta con nosotros</title>
</head>

<body>
  <h2>Inserte nuevo trabajador</h2>
  <form method="POST" action="?method=auth">
    <label>Nombre</label> <input type="text" name="nombre"><br><br>
    <label>Apellido</label> <input type="text" name="apellido"><br><br>
    <label>Email</label> <input type="text" name="email"><br><br>
    <label>Comentario</label> <input type="textarea" rows="10" cols="50" name="comentario"><br><br>
    <input type="submit" value="enviar">
  </form>

</body>

</html>
