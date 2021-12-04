<?php

namespace Peluqueria\App\Controllers;

use Peluqueria\App\Models\Fotografia;
use Peluqueria\Core\App;

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

  public function insertar()
  {
    $nombreFichero = $_FILES['fichero']['name'];

    $idServicio = $_POST['servicio'];

    $fotografia = new Fotografia();
    $fotografia->nombre_fichero = $nombreFichero;
    $fotografia->id_servicio = $idServicio;

    $fotografia->insert();

    // Subida del archivo al servidor
    $rutaFichero = $_FILES['fichero']['tmp_name'];
    $destinoFichero = 'subidas/' . $nombreFichero;
    move_uploaded_file($rutaFichero, $destinoFichero);

    // Redireccionar al usuario al album
    App::redirect('/album');
  }

  public function eliminar($arguments)
  {
    $idFotografia = $arguments[0];

    $fotografia = new Fotografia();
    $fotografia->id = $idFotografia;
    $fotografia->delete();

    // Redireccionar al usuario al album
    App::redirect('/album');
  }
}
