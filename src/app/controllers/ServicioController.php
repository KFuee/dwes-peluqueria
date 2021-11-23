<?php
class ServicioController
{
  public function index()
  {
    // Requiere de la vista de mostrar
    require 'app/views/tablas/servicios.php';
  }

  public function formulario()
  {
    //Require de la vista del formulario
    require 'app/views/formularios/servicio.php';
  }

  public function pdf()
  {
    // Requiere de la vista de mostrar en pdf
    require 'app/views/tablas/generarPdf.php';
  }

  public function insertar()
  {
    $servicio = new Servicio();
    $servicio->id = uniqid("s-", false);
    foreach ($_POST as $clave => $valor) {
      $servicio->$clave = $valor;
    }

    $servicio->insert();

    // Redireccionar al usuario a la lista de trabajadores
    App::redirect("/servicio");
  }

  public function modificar()
  {
    $servicio = new Servicio();
    foreach ($_POST as $clave => $valor) {
      $servicio->$clave = $valor;
    }

    $servicio->save();

    // Redireccionar al usuario a la lista de trabajadores
    App::redirect("/servicio");
  }

  public function eliminar($atributos)
  {
    $servicio = new Servicio();
    $servicio->id = $atributos[0];
    $servicio->delete();

    // Redireccionar al usuario a la lista de trabajadores
    App::redirect("/servicio");
  }
}
