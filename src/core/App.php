<?php
class App
{
  public function __construct()
  {
    $this->run();
  }

  public function run()
  {
    // Obtiene los argumentos de la URL
    // En caso de no existir, se asigna el controlador por defecto
    if (isset($_GET['url']) && !empty($_GET['url'])) {
      $url = $_GET['url'];
    } else {
      $url = 'home';
    }

    $argumentos = explode('/', $url);

    // Obtiene el controlador
    $nombreControlador = array_shift($argumentos);
    $nombreControlador = ucwords($nombreControlador) . 'Controller';

    // Obtiene el método
    if (count($argumentos) > 0) {
      $metodo = array_shift($argumentos);
    } else {
      $metodo = 'index';
    }

    // Importa el controlador
    $archivoControlador = 'app/controllers/' . $nombreControlador . '.php';
    if (file_exists($archivoControlador)) {
      require_once $archivoControlador;
    } else {
      $this->errorNotFound('archivo');
    }

    // Instancia el controlador
    $controladorObjeto = new $nombreControlador();
    if (method_exists($controladorObjeto, $metodo)) {
      $controladorObjeto->$metodo($argumentos);
    } else {
      $this->errorNotFound('metodo');
    }
  }

  // Función para manejar errores
  public function errorNotFound($tipo)
  {
    header("HTTP/1.0 404 Not Found");
    $mensaje = "No se ha encontrado el $tipo especificado.";
    exit($mensaje);
  }
}
