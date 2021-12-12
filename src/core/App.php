<?php

namespace Peluqueria\Core;

use Peluqueria\Core\Database;
use Aws\S3\S3Client;

class App
{
  public function __construct()
  {
    // Comprobar si la sesión está iniciada
    if (session_status() == PHP_SESSION_NONE) session_start();

    if ($this->isFirstTime()) {
      $this->setup();

      // Evita que se cargue un controlador
      return;
    }

    // Cargar el controlador y la acción introducida
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

    // Instancia el controlador
    $nombreControlador = '\\Peluqueria\\App\\Controllers\\' . $nombreControlador;
    $controladorObjeto = new $nombreControlador();
    if (method_exists($controladorObjeto, $metodo)) {
      $controladorObjeto->$metodo($argumentos);
    } else {
      $this->errorNotFound('metodo');
    }
  }

  public static function redirect($url)
  {
    header("Location: $url");
    exit;
  }

  // Función para manejar errores
  public function errorNotFound($tipo)
  {
    header("HTTP/1.0 404 Not Found");
    $mensaje = "No se ha encontrado el $tipo especificado.";
    exit($mensaje);
  }

  // Función que comprueba si es la primera vez que se ejecuta el servidor
  public static function isFirstTime()
  {
    if (!file_exists(PATH . '/../.installed')) {
      return true;
    } else {
      return false;
    }
  }

  private function setup()
  {
    // Poner en marcha la base de datos
    Database::setup();

    // Crea el archivo de marca de instalación
    $file = fopen(PATH . '/../.installed', 'w');
    fclose($file);

    // Añade a la sesión que ya se ha instalado
    $_SESSION['installed'] = true;

    // Redirige a la página de inicio
    $this->redirect('/home');
  }

  public static function s3Client()
  {
    $s3Client = new S3Client([
      'version' => 'latest',
      'region'  => 'eu-west-3',
      'credentials' => [
        'key'    => $_ENV['AWS_ACCESS_KEY_ID'],
        'secret' => $_ENV['AWS_SECRET_ACCESS_KEY']
      ]
    ]);

    return $s3Client;
  }
}
