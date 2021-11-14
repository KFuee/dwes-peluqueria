<?php
class Servicio
{
  private $id;

  private $nombre;
  private $precio;
  private $duracion;
  private $descripcion;

  public function __construct($nombre, $precio, $duracion, $descripcion)
  {
    $this->id = uniqid("s_");

    $this->nombre = $nombre;
    $this->precio = $precio;
    $this->duracion = $duracion;
    $this->descripcion = $descripcion;
  }

  public function getId()
  {
    return $this->id;
  }

  public function addToSession()
  {
    // Si no existe la sesión, la creamos
    if (!isset($_SESSION['servicios']))
      $_SESSION['servicios'] = array();

    // Añadimos el trabajador a la sesión
    array_push($_SESSION['servicios'], $this);
  }

  public function __toString()
  {
    return "Servicio: " .
      $this->id .
      " | " . $this->nombre .
      " | " . $this->precio .
      " | " . $this->duracion .
      " | " . $this->descripcion;
  }
}
