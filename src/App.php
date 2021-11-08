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
    session_start();
    include('views/index.php');
  }

  public function formulario()
  {
    if (isset($_GET['tipo'])) $tipo = $_GET['tipo'];
    else $tipo = 'trabajador';

    include('views/formularios/' . $tipo . '.php');
  }

  public function insertar()
  {
    if (isset($_GET['tipo'])) $tipo = $_GET['tipo'];
    else $tipo = 'trabajador';

    include('models/' . $tipo . '.php');

    // Crear un objeto de la clase correspondiente
    if ($tipo === 'servicio')
      $model = new Servicio(
        $_POST['nombre'],
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

  public function mostrar()
  {
    if (isset($_GET['tipo'])) $tipo = $_GET['tipo'];
    else $tipo = 'trabajadores';

    if ($tipo === 'servicios')
      include('models/Servicio.php');
    if ($tipo === 'trabajadores')
      include('models/Trabajador.php');

    session_start();
    include('views/datos/' . $tipo . '.php');
  }
}
