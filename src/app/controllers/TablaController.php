<?php
class TablaController
{
  public function mostrar($atributos)
  {
    $tipo = $atributos[0];

    if ($tipo === 'trabajadores')
      require_once 'app/models/Trabajador.php';
    else require_once 'app/models/Servicio.php';

    session_start();
    require 'app/views/tablas/' . $tipo . '.php';
  }
}
