<?php
class App
{
  public function run()
  {
    if (isset($_GET['method']))
      $methodName = $_GET['method'];
    else
      $methodName = 'home';

    $this->$methodName();
  }

  public function home()
  {
    include('views/index.php');
  }

  public function formulario()
  {
    $tipo = $_GET['tipo'];

    include('views/formularios/' . $tipo . '.php');
  }

  public function insertar()
  {
    $tipo = $_GET['tipo'];

    include('models/' . $tipo . '.php');

    // Crear un objeto de la clase correspondiente
    if ($tipo === 'servicio')
      $model = new Servicio(
        $_POST['nombre'],
        $_POST['precio'],
        $_POST['duracion'],
        $_POST['descripcion']
      );
    if ($tipo === 'trabajador')
      $model = new Trabajador(
        $_POST['nombre'],
        $_POST['apellidos'],
        $_POST['sexo'],
        $_POST['turno']
      );

    // Guardar trabajador en la sesión dentro de array trabajadores
    $model->addToSession();

    // Redireccionar a la página de inicio
    header('Location: index.php?method=home');
  }

  public function eliminar()
  {
    $id = $_GET['id'];
    $tipo = $_GET['tipo'];

    include('models/' . $tipo . '.php');

    session_start();

    if ($tipo === "servicio") $arraySesion = $_SESSION["servicios"];
    else $arraySesion = $_SESSION["trabajadores"];

    foreach ($arraySesion as $clave => $item) {
      if ($id == $item->getId()) {
        unset($arraySesion[$clave]);

        if ($tipo === "servicio") {
          $_SESSION["servicios"] = array_values($arraySesion);
          header('Location: index.php?method=mostrar&tipo=servicios');
        } else {
          $_SESSION["trabajadores"] = array_values($arraySesion);
          header('Location: index.php?method=mostrar&tipo=trabajadores');
        }
      }
    }
  }

  public function mostrar()
  {
    $tipo = $_GET['tipo'];

    if ($tipo === 'servicios')
      include('models/Servicio.php');
    if ($tipo === 'trabajadores')
      include('models/Trabajador.php');

    session_start();
    include('views/datos/' . $tipo . '.php');
  }
}
