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

  public function getNombre()
  {
    return $this->nombre;
  }

  public function getPrecio()
  {
    return $this->precio;
  }

  public function getDuracion()
  {
    return $this->duracion;
  }

  public function getDescripcion()
  {
    return $this->descripcion;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }

  public function setPrecio($precio)
  {
    $this->precio = $precio;
  }

  public function setDuracion($duracion)
  {
    $this->duracion = $duracion;
  }

  public function setDescripcion($descripcion)
  {
    $this->descripcion = $descripcion;
  }

  public function addToSession()
  {
    session_start();

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
