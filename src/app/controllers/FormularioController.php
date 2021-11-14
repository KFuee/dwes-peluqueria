<?php
class FormularioController
{
  public function alta($atributos)
  {
    $tipo = $atributos[0];
    //Require de la vista del formulario
    require 'app/views/formularios/' . $tipo . '.php';
  }

  public function insertar($atributos)
  {
    $tipo = ucwords($atributos[0]);

    // Crear un objeto de la clase Trabajador
    $modelo = new $tipo(...$_POST);
    // Insertar el objeto en la sesión
    $modelo->addToSession();

    // Redireccionar al usuario a la página de inicio
    App::redirect("/home");
  }

  public function eliminar($atributos)
  {
    $tipo = ucwords($atributos[0]);
    $idTrabajador = $atributos[1];

    // Obtener el objeto de la sesión
    if ($tipo === 'Trabajador')
      $arraySession = $_SESSION['trabajadores'];
    else $arraySession = $_SESSION['servicios'];

    // Eliminar el objeto de la sesión
    foreach ($arraySession as $clave => $item) {
      if ($idTrabajador !== $item->getId())
        return;

      unset($arraySession[$clave]);

      if ($tipo === 'Trabajador') {
        $_SESSION['trabajadores'] = array_values($arraySession);
        App::redirect("/tabla/mostrar/trabajadores");
      } else {
        $_SESSION['servicios'] = array_values($arraySession);
        App::redirect("/tabla/mostrar/servicios");
      }
    }
  }
}
