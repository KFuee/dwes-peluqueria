<?php

use Dompdf\Dompdf;

class TrabajadorController
{
  public function index()
  {
    // Requiere de la vista de mostrar
    require 'app/views/tablas/trabajadores.php';
  }

  public function formulario()
  {
    //Require de la vista del formulario
    require 'app/views/formularios/trabajador.php';
  }

  public function pdf()
  {
    // Requiere de la vista de mostrar en pdf
    ob_start();
    $trabajadores = Trabajador::all();
    require 'app/components/trabajadores/pdf.php';
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
