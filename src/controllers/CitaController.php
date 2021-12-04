<?php

namespace Peluqueria\App\Controllers;

use Peluqueria\App\Models\ServicioTrabajador;
use Peluqueria\App\Models\Trabajador;
use Peluqueria\App\Models\Cita;
use Peluqueria\App\Models\Servicio;
use Peluqueria\Core\App;

use Dompdf\Dompdf;

class CitaController
{
  public function index()
  {
    // Requiere de la vista mostrar
    require PATH . '/views/citas/mostrar.php';
  }

  public function formulario()
  {
    // Require de la vista del formulario
    require PATH . '/views/citas/formulario.php';
  }

  public function pdf()
  {
    // Requiere de la vista de mostrar en pdf
    ob_start();
    $citas = Cita::all();
    require PATH . '/components/citas/pdf.php';
    $html = ob_get_clean();

    $dompdf = new Dompdf();
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->loadHtml($html);
    $dompdf->render();
    $dompdf->stream('citas.pdf', array('Attachment' => 0));
  }

  public function trabajadores()
  {
    $servicio = $_POST['idServicio'];
    $serviciosTrabajador = ServicioTrabajador::find($servicio);

    foreach ($serviciosTrabajador as $servicioTrabajador) {
      $trabajador = Trabajador::find($servicioTrabajador->dni_trabajador);
      $trabajadores[] = $trabajador;
    }

    header('Content-Type: application/json');
    echo json_encode(array_values($trabajadores));
  }

  public function fechas()
  {
    $dniTrabajador = $_POST['dniTrabajador'];

    $citas = Cita::findCitasSemanaTrabajador($dniTrabajador);

    // Obtener array de los 7 días posteriores a hoy
    $fechas = array();
    $fecha = new \DateTime();

    for ($i = 0; $i < 7; $i++) {
      $fechas[] = $fecha->format('d-m-Y');
      $fecha->modify('+1 day');
    }

    $diasCitas = array();
    foreach ($citas as $cita) {
      if (isset($diasCitas[$cita->fecha])) {
        $diasCitas[$cita->fecha] += $cita->duracion;
      } else {
        $diasCitas[$cita->fecha] = $cita->duracion;
      }
    }

    $horasDia = 60 * 7;

    foreach ($diasCitas as $dia => $horasOcupadas) {
      if ($horasOcupadas < $horasDia) {
        unset($diasCitas[$dia]);
      }
    }

    $fechas = array_diff($fechas, array_keys($diasCitas));

    header('Content-Type: application/json');
    echo json_encode(array_values($fechas));
  }

  public function horas()
  {
    $dia = $_POST['dia'];
    $dniTrabajador = $_POST['dniTrabajador'];
    $idServicio = $_POST['idServicio'];

    $servicio = Servicio::find($idServicio);
    $citas = Cita::findCitasDiaTrabajador($dniTrabajador, $dia);

    // Obtener array de las horas de 8 a 15
    $min = 8 * 60;
    $max = 15 * 60;

    $horas = array();

    for ($i = $min; $i <= $max; $i += 15) {
      $horas[] = date('H:i', mktime(0, $i));
    }

    // Obtener array de las horas ocupadas
    $horasOcupadas = array();
    foreach ($citas as $clave => $cita) {
    }

    $horasOcupadas = array_merge(...$horasOcupadas);

    header('Content-Type: application/json');
    echo json_encode(array_values($horas));
  }

  public function crear()
  {
    $cita = new Cita();

    $cita->trabajador = $_POST['trabajador'];
    $cita->servicio = $_POST['servicio'];
    $cita->fecha = $_POST['fecha'];
    $cita->hora = $_POST['hora'];
    $cita->nombre = $_POST['nombre'];
    $cita->apellidos = $_POST['apellidos'];
    $cita->email = $_POST['email'];
    $cita->observaciones = $_POST['observaciones'];

    $cita->insert();

    // Response OK
    header('Content-Type: application/json');
    echo json_encode(array('status' => 'OK'));
  }

  public function eliminar($atributos)
  {
    $id = $atributos[0];


    $cita = new Cita();
    $cita->id = $id;
    $cita->delete();

    // Redireccionar al usuario a la lista de citas
    App::redirect("/cita");
  }
}
