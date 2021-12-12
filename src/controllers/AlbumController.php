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
    // En caso de que APP_ENV sea producción
    if ($_ENV['APP_ENV'] !== 'dev') {
      $this->insertarS3();
    } else {
      // En caso de que APP_ENV sea desarrollo
      $this->insertarLocal();
    }
  }

  private function insertarS3()
  {
    $s3Client = App::s3Client();

    if (isset($_FILES['fichero']) && $_FILES['fichero']['error'] == 0) {
      $nombre = $_FILES['fichero']['name'];

      $ext = pathinfo($nombre, PATHINFO_EXTENSION);

      $key = 'subidas/' . uniqid() . '.' . $ext;
      $result = $s3Client->putObject([
        'Bucket' => 'dwes-peluqueria',
        'Key'    => $key,
        'ContentType' => $_FILES['fichero']['type'],
        'Body'   => fopen($_FILES['fichero']['tmp_name'], 'rb'),
        'ACL'    => 'public-read'
      ]);

      // Url de previsualización
      $url = $result['ObjectURL'];

      $fotografia = new Fotografia();
      $fotografia->localizacion = $url;
      $fotografia->id_servicio = $_POST['servicio'];
      $fotografia->insert();

      // Redirecciona al album de fotografías 
      App::redirect('/album');
    }
  }

  private function insertarLocal()
  {
    $nombre = $_FILES['fichero']['name'];

    // Subida del archivo al servidor
    $ext = pathinfo($nombre, PATHINFO_EXTENSION);
    $key = uniqid() . '.' . $ext;

    $destinoFichero = PATH . '/../public/subidas/' . $key;
    $rutaFichero = $_FILES['fichero']['tmp_name'];
    move_uploaded_file($rutaFichero, $destinoFichero);

    $fotografia = new Fotografia();
    $fotografia->localizacion = $key;
    $fotografia->id_servicio = $_POST['servicio'];

    $fotografia->insert();

    // Redireccionar al usuario al album
    App::redirect('/album');
  }


  public function eliminar($arguments)
  {
    $id = $arguments[0];

    // En caso de que APP_ENV sea producción
    if ($_ENV['APP_ENV'] !== 'dev') {
      $this->eliminarS3($id);
    } else {
      // En caso de que APP_ENV sea desarrollo
      $this->eliminarLocal($id);
    }
  }

  private function eliminarS3($id)
  {
    // Eliminar la fotografía del bucket S3
    $fotografia = Fotografia::find($id);

    $s3Client = App::s3Client();

    // Obtener la key de la url completa
    $key = substr(
      $fotografia->localizacion,
      strpos($fotografia->localizacion, 'subidas/')
    );

    $s3Client->deleteObject([
      'Bucket' => 'dwes-peluqueria',
      'Key'    => $key
    ]);

    // Eliminar la fotografía de la base de datos
    $fotografia->delete();

    // Redireccionar al usuario al album
    App::redirect('/album');
  }


  private function eliminarLocal($id)
  {
    // Eliminar la fotografía del servidor
    $fotografia = Fotografia::find($id);
    $localizacion = PATH . '/../public/subidas/' . $fotografia->localizacion;
    unlink($localizacion);

    // Eliminar la fotografía de la base de datos
    $fotografia = new Fotografia();
    $fotografia->id = $id;
    $fotografia->delete();

    // Redireccionar al usuario al album
    App::redirect('/album');
  }
}
