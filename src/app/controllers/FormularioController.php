<?php
class FormularioController
{
  public function alta($atributos)
  {
    $tipo = $atributos[0];
    //Require de la vista del formulario
    require 'app/views/formularios/' . $tipo . '.php';
  }

  public function insertar($atributos)
  {
    $tipo = ucwords($atributos[0]);
    $id = uniqid(strtolower(substr($tipo, 0, 1)) . "-", false);

    $modelo = new $tipo();
    $modelo->id = $id;
    foreach ($_POST as $clave => $valor) {
      $modelo->$clave = $valor;
    }

    $modelo->insert();

    // Redireccionar al usuario a la página de inicio
    App::redirect("/home");
  }
}
