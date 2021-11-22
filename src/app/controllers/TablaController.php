<?php
class TablaController
{
  public function mostrar($atributos)
  {
    $tipo = $atributos[0];
    require 'app/views/tablas/' . $tipo . '.php';
  }

  public function modificar($atributos)
  {
    $tipo = ucwords($atributos[0]);

    $modelo = new $tipo();
    foreach ($_POST as $clave => $valor) {
      $modelo->$clave = $valor;
    }

    $modelo->save();

    if ($tipo === "Servicio")
      App::redirect("/tabla/mostrar/servicios");
    if ($tipo === "Trabajador")
      App::redirect("/tabla/mostrar/trabajadores");
  }

  public function eliminar($atributos)
  {
    $tipo = ucwords($atributos[0]);
    $id = $atributos[1];

    $modelo = new $tipo();
    if ($tipo === "Servicio")
      $modelo->id = $id;
    if ($tipo === "Trabajador")
      $modelo->dni = $id;

    $modelo->delete();

    if ($tipo === "Servicio")
      App::redirect("/tabla/mostrar/servicios");
    if ($tipo === "Trabajador")
      App::redirect("/tabla/mostrar/trabajadores");
  }
}
