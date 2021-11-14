<?php
require_once 'core/Database.php';

class Usuario
{
  public $id;
  public $nombre;
  public $email;
  public $password;

  public function __construct($nombre, $email, $password)
  {
    $this->db = Database::getConnection();

    $this->id = uniqid("u-", false);
    $this->nombre = $nombre;
    $this->email = $email;
    $this->password = $password;
  }

  public static function getUser($email)
  {
    $db = Database::getConnection();

    $sql = "SELECT password FROM usuarios WHERE email = :email";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(":email", $email);

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public static function getPassword($email)
  {
    $user = self::getUser($email);
    return $user['password'];
  }

  public static function existe($email)
  {
    $db = Database::getConnection();

    $sql = "SELECT * FROM usuarios WHERE email = :email";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(":email", $email);

    $stmt->execute();

    return $stmt->rowCount() > 0;
  }

  public function insertar()
  {
    $sql = "INSERT INTO usuarios (id, nombre, email, password)
            VALUES (:id, :nombre, :email, :password)";

    $stmt = $this->db->prepare($sql);

    $stmt->bindParam(":id", $this->id);
    $stmt->bindParam(':nombre', $this->nombre);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':password', $this->password);

    $stmt->execute();
  }
}
