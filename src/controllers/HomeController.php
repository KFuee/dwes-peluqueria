<?php

namespace Peluqueria\App\Controllers;

class HomeController
{
  public function index()
  {
    // Require de la vista
    require PATH . '/views/home.php';
  }
}
