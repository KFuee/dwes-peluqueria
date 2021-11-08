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

  public function getNombre()
  {
    return $this->nombre;
  }

  public function getApellidos()
  {
    return $this->apellidos;
  }

  public function getSexo()
  {
    return $this->sexo;
  }

  public function getTurno()
  {
    return $this->turno;
  }

  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }

  public function setApellidos($apellidos)
  {
    $this->apellidos = $apellidos;
  }

  public function setSexo($sexo)
  {
    $this->sexo = $sexo;
  }

  public function setTurno($turno)
  {
    $this->turno = $turno;
  }

  public function addToSession()
  {
    session_start();

    // Si no existe la sesión, la creamos
    if (!isset($_SESSION['trabajadores']))
      $_SESSION['trabajadores'] = array();

    // Añadimos el trabajador a la sesión
    array_push($_SESSION['trabajadores'], $this);
  }

  public function removeFromSession()
  {
    session_start();

    foreach ($_SESSION['trabajadores'] as $clave => $trabajador) {
      if ($trabajador->getId() == $this->getId()) {
        unset($_SESSION['trabajadores'][$clave]);
      }
    }
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
