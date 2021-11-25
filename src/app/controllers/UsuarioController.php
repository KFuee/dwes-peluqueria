<?php

namespace Peluqueria\App\Controllers;

use Peluqueria\Core\App;
use Peluqueria\App\Models\Usuario;

class UsuarioController
{
  public function index()
  {
    // Require de la vista ajustes
    require 'app/views/auth/ajustes.php';
  }

  public function registro()
  {
    // Require de la vista registro
    require 'app/views/auth/registro.php';
  }

  public function login()
  {
    // Require de la vista login
    require 'app/views/auth/login.php';
  }

  public function registro_post()
  {
    // Comprobar que el usuario no exista
    if (Usuario::find($_POST['email'])) {
      // Si existe, redirigir a login
      App::redirect("/usuario/login");
    }

    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // Instanciar un nuevo usuario y asignar propiedades
    $usuario = new Usuario();
    $usuario->id = uniqid("u-", false);
    $usuario->nombre = $_POST['nombre'];
    $usuario->apellidos = $_POST['apellidos'];
    $usuario->email = $_POST['email'];
    $usuario->password = $hash;

    // Guardar el usuario en la base de datos
    $usuario->insert();

    // Redirigir a login
    App::redirect("/usuario/login");
  }

  public function login_post()
  {
    $usuario = Usuario::find($_POST['email']);
    // Comprobar que el usuario exista
    if (!$usuario) {
      App::redirect("/usuario/registro");
      return;
    }

    // Comprobar que la contraseña sea correcta
    if (!password_verify(
      $_POST['password'],
      $usuario->password
    )) {
      // Si no es correcta, redirigir a login
      App::redirect("/usuario/login");
    }

    // Crear una sesión
    $_SESSION['usuario'] = [
      'id' => $usuario->id,
      'nombre' => $usuario->nombre,
      'apellidos' => $usuario->apellidos,
      'email' => $usuario->email,
      'rol' => $usuario->rol
    ];

    // Redirigir a la página principal
    App::redirect("/home");
  }

  public function logout()
  {
    // Destruir la sesión
    unset($_SESSION['usuario']);

    // Redirigir a la página principal
    App::redirect("/home");
  }
}
