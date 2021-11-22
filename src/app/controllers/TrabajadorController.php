<?php
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

  public function insertar()
  {
    $trabajador = new Trabajador();
    foreach ($_POST as $clave => $valor) {
      $trabajador->$clave = $valor;
    }

    $trabajador->insert();

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
