<?php
require_once 'app/models/Usuario.php';

class AuthController
{
  public function registro($atributos)
  {
    require 'app/views/auth/registro.php';
  }

  public function insertar()
  {
    $usuario = new Usuario(
      $_POST['nombre'],
      $_POST['apellido'],
      $_POST['email'],
      $_POST['password']
    );

    $usuario->insertar();
  }
}
