<?php

namespace Peluqueria\Core;

class Model
{
  public function __get($atributo)
  {
    if (method_exists($this, $atributo)) {
      $this->$atributo = $this->$atributo();

      return $this->$atributo;
    }
  }
}
