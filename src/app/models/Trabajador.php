<?php
class Trabajador
{
  private $id;

  private $nombre;
  private $apellidos;
  private $sexo;
  private $turno;

  public function __construct($nombre, $apellidos, $sexo, $turno)
  {
    $this->id = uniqid("t_");

    $this->nombre = $nombre;
    $this->apellidos = $apellidos;
    $this->sexo = $sexo;
    $this->turno = $turno;
  }

  public function getId()
  {
    return $this->id;
  }

  public function addToSession()
  {
    // Si no existe la sesión, la creamos
    if (!isset($_SESSION['trabajadores']))
      $_SESSION['trabajadores'] = array();

    // Añadimos el trabajador a la sesión
    array_push($_SESSION['trabajadores'], $this);
  }

  public function __toString()
  {
    return "Trabajador: " .
      $this->id .
      " | " . $this->nombre .
      " | " . $this->apellidos .
      " | " . $this->sexo .
      " | " . $this->turno;
  }
}
