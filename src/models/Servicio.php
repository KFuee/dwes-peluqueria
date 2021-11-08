<?php
class Servicio
{
  private $id;

  private $nombre;
  private $descripcion;

  public function __construct($nombre, $descripcion)
  {
    $this->id = uniqid("s_");

    $this->nombre = $nombre;
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

  public function setDescripcion($descripcion)
  {
    $this->descripcion = $descripcion;
  }

  public function __toString()
  {
    return $this->nombre;
  }
}
