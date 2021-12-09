<?php

namespace Peluqueria\App\Controllers;

use Peluqueria\Core\App;
use Peluqueria\App\Models\Trabajador;
use Peluqueria\App\Models\ServicioTrabajador;

class TrabajadorController
{
  public function index()
  {
    // Requiere de la vista mostrar
    require PATH . '/views/trabajadores/mostrar.php';
  }

  public function formulario()
  {
    //Require de la vista del formulario
    require PATH . '/views/trabajadores/formulario.php';
  }

  // Devuelve todos los trabajadores en JSON
  public function data()
  {
    $trabajadores = Trabajador::all();
    echo json_encode($trabajadores);
  }

  public function insertar()
  {
    $trabajador = new Trabajador();
    foreach ($_POST as $clave => $valor) {
      $trabajador->$clave = $valor;
    }

    $trabajador->insert();

    // Inserta los servicios que realiza el trabajador
    foreach ($_POST['servicios'] as $servicio) {
      $servicioTrabajador = new ServicioTrabajador();
      $servicioTrabajador->idServicio = $servicio;
      $servicioTrabajador->dniTrabajador = $_POST['dni'];

      $servicioTrabajador->insert();
    }

    // Redireccionar al usuario a la lista de trabajadores
    App::redirect("/trabajador");
  }

  public function modificar()
  {
    $trabajador = new Trabajador();
    foreach ($_POST as $clave => $valor) {
      $trabajador->$clave = $valor;
    }

    $trabajador->save();

    // Redireccionar al usuario a la lista de trabajadores
    App::redirect("/trabajador");
  }

  public function eliminar()
  {
    // Eliminar el trabajador
    $trabajador = new Trabajador();
    $trabajador->dnis = $_POST['dnis'];
    $trabajador->delete();

    // Eliminar todos los servicios que realiza el trabajador
    $servicioTrabajador = new ServicioTrabajador();
    $servicioTrabajador->dnis = $_POST['dnis'];
    $servicioTrabajador->delete();

    // Response OK
    header('Content-Type: application/json');
    echo json_encode(array('status' => 'OK'));
  }
}
