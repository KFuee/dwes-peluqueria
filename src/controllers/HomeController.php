<?php

namespace Peluqueria\App\Controllers;

class HomeController
{
  public function index()
  {
    $this->homeHandler();
  }

  private function homeHandler()
  {
    // Require de la vista
    require PATH . '/views/home.php';

    if (isset($_SESSION['installed'])) {
      // Muestra un mensaje indicando que se ha instalado correctamente
      echo "<script>
              Swal.fire({
                icon: 'info',
                title: 'Configuración inicial',
                html: `Parece que es la primera vez que entras en la página.
                Se ha generado la base de datos <b>peluquería</b> con las siguientes tablas:
                <br><br>
                <ul style='list-style: none; padding-left: 0;'>
                  <li><b>Citas</b></li>
                  <li><b>Fotografías</b></li>
                  <li><b>Servicios</b></li>
                  <li><b>Servicios trabajadores</b></li>
                  <li><b>Trabajadores</b></li>
                  <li><b>Usuarios</b></li>
                </ul>`,
                type: 'confirm',
                confirmButtonText: 'Entendido'
              }).then(() => {
                Swal.fire({
                  icon: 'info',
                  title: 'Configuración inicial',
                  html: `Además, se ha generado el siguiente usuario administrador por defecto:
                  <br><br>
                  <b>Usuario:</b> admin@peluqueria.com
                  <br>
                  <b>Contraseña:</b> peluqueria123
                  <br><br>
                  ¡Ya estás list@ para usar la página!`,
                  type: 'info',
                  confirmButtonText: 'Entendido'
                })
              });
            </script>";

      // Borra la variable de sesión
      unset($_SESSION['installed']);
    }
  }
}
