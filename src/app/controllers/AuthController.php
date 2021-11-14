<?php
class AuthController
{
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
    if (Usuario::existe($_POST['email'])) {
      // Si existe, redirigir a login
      App::redirect("/auth/login");
    }

    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // Crear un nuevo usuario
    $usuario = new Usuario($_POST['nombre'], $_POST['email'], $hash);

    // Guardar el usuario en la base de datos
    $usuario->insertar();

    // Redirigir a login
    App::redirect("/auth/login");
  }

  public function login_post()
  {
    // Comprobar que el usuario exista
    if (!Usuario::existe($_POST['email'])) {
      // Si no existe, redirigir a registro
      App::redirect("/auth/register");
    }

    // Comprobar que la contraseña sea correcta
    if (!password_verify(
      $_POST['password'],
      Usuario::getPassword($_POST['email'])
    )) {
      // Si no es correcta, redirigir a login
      App::redirect("/auth/login");
    }

    // Crear una sesión
    $_SESSION['usuario'] = $_POST['email'];

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
