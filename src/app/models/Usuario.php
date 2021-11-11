<?php
require_once 'core/Database.php';

class Usuario extends Database
{
  private $nombre;
  private $apellido;
  private $email;
  private $password;

  public function __construct($nombre, $apellido, $email, $password)
  {
    parent::__construct();
    $this->db = Database::getConnection();

    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->email = $email;
    $this->password = $password;
  }

  public function insertar()
  {
    $sql = "INSERT INTO usuarios (nombre, apellido, email, password)
            VALUES (:nombre, :apellido, :email, :password)";

    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':nombre', $this->nombre);
    $stmt->bindParam(':apellido', $this->apellido);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':password', $this->password);

    $stmt->execute();
  }
}
