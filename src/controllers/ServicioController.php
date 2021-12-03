<?php

namespace Peluqueria\App\Controllers;

use Peluqueria\Core\App;
use Peluqueria\App\Models\Servicio;

class ServicioController
{
  public function index()
  {
    // Requiere de la vista mostrar
    require PATH . '/views/servicios/mostrar.php';
  }

  public function formulario()
  {
    //Require de la vista del formulario
    require PATH . '/views/servicios/formulario.php';
  }

  // Devuelve todos los servicios en JSON
  public function data()
  {
    $servicios = Servicio::all();
    echo json_encode($servicios);
  }

  public function insertar()
  {
    $servicio = new Servicio();
    $servicio->id = uniqid("s-", false);
    foreach ($_POST as $clave => $valor) {
      $servicio->$clave = $valor;
    }

    $servicio->insert();

    // Redireccionar al usuario a la lista de servicios
    App::redirect("/servicio");
  }

  public function modificar()
  {
    $servicio = new Servicio();
    foreach ($_POST as $clave => $valor) {
      $servicio->$clave = $valor;
    }

    $servicio->save();

    // Redireccionar al usuario a la lista de servicios
    App::redirect("/servicio");
  }

  public function eliminar()
  {
    $servicio = new Servicio();
    $servicio->ids = $_POST['ids'];
    $test = $servicio->delete();

    // Response OK
    header('Content-Type: application/json');
    echo json_encode(array('status' => 'OK', 'test' => $test));
  }
}
