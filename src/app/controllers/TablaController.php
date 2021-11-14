<?php
class TablaController
{
  public function mostrar($atributos)
  {
    $tipo = $atributos[0];
    require 'app/views/tablas/' . $tipo . '.php';
  }
}
