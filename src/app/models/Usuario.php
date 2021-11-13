<?php
require_once 'core/Database.php';

class Usuario
{
  public $id;
  public $nombre;
  public $apellido;
  public $email;
  public $password;

  public function __construct($nombre, $apellido, $email, $password)
  {
    $this->db = Database::getConnection();

    $this->id = uniqid("u-", false);
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->email = $email;
    $this->password = $password;
  }

  public function insertar()
  {
    $sql = "INSERT INTO usuarios (id, nombre, apellido, email, password)
            VALUES (:id, :nombre, :apellido, :email, :password)";

    $stmt = $this->db->prepare($sql);

    $stmt->bindParam(":id", $this->id);
    $stmt->bindParam(':nombre', $this->nombre);
    $stmt->bindParam(':apellido', $this->apellido);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':password', $this->password);

    $stmt->execute();
  }

  public function eliminar()
  {
    $sql = "DELETE FROM usuarios WHERE id = :id";

    $stmt = $this->db->prepare($sql);

    $stmt->bindParam(':id', $this->id);

    $stmt->execute();
  }
}
