<?php

namespace Peluqueria\App\Controllers;

use Peluqueria\Core\App;
use Peluqueria\App\Models\Servicio;
use Peluqueria\App\Models\Fotografia;

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
    // Eliminar el servicio
    $servicio = new Servicio();
    $servicio->ids = $_POST['ids'];
    $servicio->delete();

    // Eliminar todas las fotografías asociadas al servicio
    $fotografias = new Fotografia();
    $fotografias->ids = $_POST['ids'];
    $fotografias->deleteFotosServicio();

    // Response OK
    header('Content-Type: application/json');
    echo json_encode(array('status' => 'OK'));
  }
}
