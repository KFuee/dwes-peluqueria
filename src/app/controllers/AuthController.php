<?php
require_once 'app/models/Usuario.php';

class AuthController
{
  public function registro($atributos)
  {
    // Require de la vista registro
    require 'app/views/auth/registro.php';
  }

  public function insertar()
  {
    // Instanciar un objeto de la clase Usuario
    $usuario = new Usuario(
      $_POST['nombre'],
      $_POST['apellido'],
      $_POST['email'],
      $_POST['password']
    );

    // Guardar el usuario en la base de datos
    $usuario->insertar();
    // Mensaje de confirmación al redireccionar
    flash()->success('Usuario ' . $_POST['email'] . ' creado exitosamente');

    // Redireccionar al usuario a la página de inicio
    header('Location: /home');
  }
}
