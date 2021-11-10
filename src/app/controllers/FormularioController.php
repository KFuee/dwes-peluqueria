<?php
class FormularioController
{
  public function alta($atributos)
  {
    $tipo = $atributos[0];
    require 'app/views/formularios/' . $tipo . '.php';
  }

  public function insertar($atributos)
  {
    $tipo = ucwords($atributos[0]);

    require_once 'app/models/' . $tipo . '.php';

    // Crear un objeto de la clase Trabajador
    $modelo = new $tipo(...$_POST);
    // Insertar el objeto en la sesión
    $modelo->addToSession();

    // Redireccionamos a la página de inicio
    header('Location: /home');
  }

  public function eliminar($atributos)
  {
    $tipo = ucwords($atributos[0]);
    $idTrabajador = $atributos[1];

    require_once 'app/models/' . $tipo . '.php';

    session_start();

    if ($tipo === 'Trabajador')
      $arraySession = $_SESSION['trabajadores'];
    else $arraySession = $_SESSION['servicios'];

    foreach ($arraySession as $clave => $item) {
      if ($idTrabajador === $item->getId()) {
        unset($arraySession[$clave]);

        if ($tipo === 'Trabajador') {
          $_SESSION['trabajadores'] = array_values($arraySession);
          header('Location: /tabla/mostrar/trabajadores');
        } else {
          $_SESSION['servicios'] = array_values($arraySession);
          header('Location: /tabla/mostrar/servicios');
        }
      }
    }
  }
}
