<?php

namespace Peluqueria\App\Controllers;

use Peluqueria\App\Models\ServicioTrabajador;
use Peluqueria\App\Models\Trabajador;
use Peluqueria\App\Models\Cita;
use Peluqueria\App\Models\Servicio;

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

  // Devuelve todos las citas en JSON
  public function data()
  {
    $citas = Cita::all();
    echo json_encode($citas);
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
    // Obtener array de los 7 días posteriores a hoy
    $fechas = array();
    $fechaActual = new \DateTime();
    for ($i = 0; $i < 7; $i++) {
      $fechas[] = $fechaActual->format('d-m-Y');
      $fechaActual->modify('+1 day');
    }

    // Obtener citas del trabajador en las fechas
    $dniTrabajador = $_POST['dniTrabajador'];
    $citas = Cita::findCitasSemanaTrabajador($dniTrabajador);

    $citasDiarias = array();
    foreach ($citas as $cita) {
      $fecha = $cita->fecha;
      $modulosCita = Servicio::find($cita->servicio)->duracion / 15;

      if (!isset($citasDiarias[$fecha])) {
        $citasDiarias[$fecha] = 0;
      }

      $citasDiarias[$fecha] += $modulosCita;
    }

    $horasDiarias = 6;
    $minutosDiarios = 60 * $horasDiarias;
    $modulosDiarios = $minutosDiarios / 15;

    $diasCompletos = array();
    foreach ($citasDiarias as $fecha => $modulos) {
      if ($modulos >= $modulosDiarios) {
        $diasCompletos[] = $fecha;
      }
    }

    $fechasDisponibles = array_diff($fechas, $diasCompletos);

    // Devuelve las fechas disponibles en JSON
    header('Content-Type: application/json');
    echo json_encode(array_values($fechasDisponibles));
  }

  public function horas()
  {
    $fecha = $_POST['fecha'];
    $dniTrabajador = $_POST['dniTrabajador'];
    $idServicio = $_POST['idServicio'];

    // Obtener array de horas del día en formato hh:mm
    $horas = array();
    $horaActual = new \DateTime();
    $horaActual->setTime(8, 0);
    for ($i = 0; $i < 25; $i++) {
      $horas[] = $horaActual->format('H:i');
      $horaActual->modify('+15 minutes');
    }

    // Obtener citas del trabajador en el día
    $citas = Cita::findCitasDiaTrabajador($dniTrabajador, $fecha);

    // Obtener horas ocupadas del día
    $horasOcupadas = array();
    foreach ($citas as $cita) {
      $hora = $cita->hora;
      $modulosCita = Servicio::find($cita->servicio)->duracion / 15;

      $horaActual = new \DateTime($hora);
      $horasOcupadas[] = $horaActual->format('H:i');
      for ($i = 0; $i < $modulosCita - 1; $i++) {
        $horaActual->modify('+15 minutes');
        $horasOcupadas[] = $horaActual->format('H:i');
      }
    }

    // Obtener horas disponibles del día
    $horasDisponibles = array_diff($horas, $horasOcupadas);

    $servicio = Servicio::find($idServicio);
    $modulosServicio = $servicio->duracion / 15;
    // Descartar horas en función de la duración del servicio
    $horasDisponibles = array_filter(
      $horasDisponibles,
      function ($hora) use ($modulosServicio, $horasOcupadas) {
        $horaActual = new \DateTime($hora);

        $intervalosServicio = array();
        for ($i = 0; $i < $modulosServicio; $i++) {
          $intervalosServicio[] = $horaActual->format('H:i');
          $horaActual->modify('+15 minutes');
        }

        // Comprobar si los intervalos están en la lista de horas ocupadas
        $intervalosOcupadas = array_intersect($intervalosServicio, $horasOcupadas);

        return empty($intervalosOcupadas);
      }
    );

    // Devuelve las horas disponibles en JSON
    header('Content-Type: application/json');
    echo json_encode(array_values($horasDisponibles));
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

  public function eliminar()
  {
    $cita = new Cita();
    $cita->ids = $_POST['ids'];
    $cita->delete();

    // Response OK
    header('Content-Type: application/json');
    echo json_encode(array('status' => 'OK'));
  }
}
