<?php

namespace Peluqueria\Core;

use PDO;

class Database
{
  private $uri;
  private $username;
  private $password;

  private $conn;
  private static $db;

  private function __construct()
  {
    $this->uri = "mysql:host="
      . $_ENV['DB_HOST'] . ":" . $_ENV['DB_PORT'] .
      ";dbname=" . $_ENV['DB_NAME'];
    $this->username = $_ENV['DB_USER'];
    $this->password = $_ENV['MYSQL_ROOT_PASSWORD'];

    $this->dbConnection();
  }

  function __destruct()
  {
    $this->conn = null;
  }

  private function dbConnection()
  {
    try {
      $this->conn = new PDO($this->uri, $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (\PDOException $exception) {
      echo "Ha ocurrido un error conectando con la base de datos: "
        . $exception->getMessage();
    }
  }

  public static function getConnection()
  {
    if (self::$db == null)
      self::$db = new Database();

    return self::$db->conn;
  }
}
