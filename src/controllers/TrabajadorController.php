<?php

namespace Peluqueria\App\Controllers;

use Peluqueria\Core\App;
use Peluqueria\App\Models\Trabajador;
use Peluqueria\App\Models\ServicioTrabajador;

use Dompdf\Dompdf;

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

  public function pdf()
  {
    // Requiere de la vista de mostrar en pdf
    ob_start();
    $trabajadores = Trabajador::all();
    require PATH . '/components/trabajadores/pdf.php';
    $html = ob_get_clean();

    $dompdf = new Dompdf();
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->loadHtml($html);
    $dompdf->render();
    $dompdf->stream('trabajadores.pdf', array('Attachment' => 0));
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

  public function eliminar($atributos)
  {
    $trabajador = new Trabajador();
    $trabajador->dni = $atributos[0];
    $trabajador->delete();

    // Redireccionar al usuario a la lista de trabajadores
    App::redirect("/trabajador");
  }
}
