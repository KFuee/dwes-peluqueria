<?php

namespace Peluqueria\App\Controllers;

use Peluqueria\App\Models\Usuario;
use Peluqueria\Core\App;

class HomeController
{
  public function index()
  {
    $this->handleHome();
  }

  // Se ejecuta la primera vez que se carga la página
  private function setup()
  {
    // Obtiene los datos de la tabla Usuarios
    $usuarios = Usuario::all();

    if (count($usuarios) != 0) {
      return false;
    }

    // Crea un usuario por defecto
    $usuario = new Usuario();
    $usuario->nombre = 'Administrador';
    $usuario->apellidos = 'Peluqueria';
    $usuario->email = 'admin@peluqueria.com';
    $usuario->password = password_hash('admin', PASSWORD_DEFAULT);
    $usuario->rol = 'administrador';
    $usuario->insert();

    // Guardamos el usuario en la sesión
    $_SESSION['usuario'] = $usuario;

    return true;
  }

  private function handleHome()
  {
    // Ejecuta la función setup
    $primeraVez = $this->setup();

    // Require de la vista
    require PATH . '/views/home.php';

    // Muestra el mensaje de bienvenida
    if ($primeraVez)
      echo "<script>
              Swal.fire({
                icon: 'info',
                title: 'Configuración inicial',
                html: `Parece que es la primera vez que entras en la página,
                se ha creado e iniciado sesión con el siguiente usuario administrador: <br><br>
                <b>correo</b>: admin@peluqueria.com <br>
                <b>contraseña</b>: peluqueria123`,
                type: 'confirm',
                confirmButtonText: 'Entendido'
              })
            </script>";
  }
}
