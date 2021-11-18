<?php
require_once 'core/Database.php';

class Usuario
{
  public function __construct()
  {
    $this->db = Database::getConnection();
  }

  public static function all()
  {
    $db = Database::getConnection();
    $sql = "SELECT * FROM usuarios";

    $stmt = $db->query($sql);

    $usuarios = $stmt->fetchAll(PDO::FETCH_CLASS, User::class);

    return $usuarios;
  }

  public static function find($email)
  {
    $db = Database::getConnection();
    $sql = "SELECT * FROM usuarios WHERE email = :email";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":email", $email);
    $stmt->execute();

    $usuario = $stmt->fetchObject("Usuario");

    return $usuario;
  }

  public static function getPassword($email)
  {
    $usuario = self::find($email);
    return $usuario->password;
  }

  public function insert()
  {
    $sql = "INSERT INTO usuarios (id, nombre, apellidos, email, password)
            VALUES (:id, :nombre, :apellidos, :email, :password)";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":id", $this->id);
    $stmt->bindValue(":nombre", $this->nombre);
    $stmt->bindValue(":apellidos", $this->apellidos);
    $stmt->bindValue(":email", $this->email);
    $stmt->bindValue(":password", $this->password);

    $stmt->execute();
  }

  public function delete()
  {
    $sql = "DELETE FROM usuarios WHERE id = :id";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":id", $this->id);

    $stmt->execute();
  }

  public function save()
  {
    $sql = "UPDATE usuarios
            SET nombre = :nombre, apellidos = :apellidos,
                email = :email, password = :password
            WHERE id = :id";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":id", $this->id);
    $stmt->bindValue(":nombre", $this->nombre);
    $stmt->bindValue(":apellidos", $this->apellidos);
    $stmt->bindValue(":email", $this->email);
    $stmt->bindValue(":password", $this->password);

    $stmt->execute();
  }
}
