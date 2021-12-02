<?php

namespace Peluqueria\App\Controllers;

class AlbumController
{
  public function index()
  {
    // Requiere de la vista mostrar
    require PATH . '/views/album/mostrar.php';
  }

  public function formulario()
  {
    // Requiere de la vista del formulario
    require PATH . '/views/album/formulario.php';
  }
}
