<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Nuevo trabajador</title>
</head>

<body>
  <h2>Formulario - Dar de alta trabajador</h2>
  <form action="?method=insertar&tipo=trabajador" method="post">
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" id="nombre"><br>

    <br>

    <label for="apellidos">Apellidos: </label>
    <input type="text" name="apellidos" id="apellidos"><br>

    <br>

    <label for="sexo">Sexo: </label>
    <select name="sexo" id="sexo">
      <option value="hombre">Hombre</option>
      <option value="mujer">Mujer</option>
    </select><br>

    <br>

    <label for="turno">Turno: </label>
    <select name="turno" id="turno">
      <option value="mañana">Mañana</option>
      <option value="tarde">Tarde</option>
    </select><br>

    <br>

    <input type="submit" value="Dar de alta">
  </form>

</body>

</html>
