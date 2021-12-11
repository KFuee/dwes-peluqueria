<?php

namespace Peluqueria\App\Models;

use Peluqueria\Core\Model;
use Peluqueria\Core\Database;

use PDO;

class Usuario extends Model
{
  public static function all()
  {
    $db = Database::getConnection();
    $sql = "SELECT * FROM usuarios";

    $stmt = $db->query($sql);

    $usuarios = $stmt->fetchAll(PDO::FETCH_CLASS, Usuario::class);

    return $usuarios;
  }

  public static function find($email)
  {
    $db = Database::getConnection();
    $sql = "SELECT * FROM usuarios WHERE email = :email";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":email", $email);
    $stmt->execute();

    $usuario = $stmt->fetchObject(Usuario::class);

    return $usuario;
  }

  public function insert()
  {
    $db = Database::getConnection();
    $sql = "INSERT INTO usuarios (nombre, apellidos, email, password, rol)
            VALUES (:nombre, :apellidos, :email, :password, :rol)";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":nombre", $this->nombre);
    $stmt->bindValue(":apellidos", $this->apellidos);
    $stmt->bindValue(":email", $this->email);
    $stmt->bindValue(":password", $this->password);
    $stmt->bindValue(":rol", $this->rol);

    $stmt->execute();
  }

  public function delete()
  {
    $db = Database::getConnection();
    $sql = "DELETE FROM usuarios WHERE id = :id";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":id", $this->id);

    $stmt->execute();
  }

  public function save()
  {
    $db = Database::getConnection();
    $sql = "UPDATE usuarios
            SET nombre = :nombre, apellidos = :apellidos,
                email = :email, password = :password, rol = :rol
            WHERE id = :id";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":id", $this->id);
    $stmt->bindValue(":nombre", $this->nombre);
    $stmt->bindValue(":apellidos", $this->apellidos);
    $stmt->bindValue(":email", $this->email);
    $stmt->bindValue(":password", $this->password);
    $stmt->bindValue(":rol", $this->rol);

    $stmt->execute();
  }
}
