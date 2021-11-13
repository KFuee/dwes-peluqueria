<?php
class Database
{
  private $host;
  private $username;
  private $password;

  private $conn;
  private static $db;

  private function __construct()
  {
    $this->host = "mysql:host=database:3306;dbname=peluqueria";
    $this->username = "root";
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
      $this->conn = new PDO($this->host, $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $exception) {
      echo "Ha ocurrido un error conectando con la base de datos: "
        . $exception->getMessage();
    }
  }

  public static function getConnection()
  {
    if (self::$db == null) {
      self::$db = new Database();
    }

    return self::$db->conn;
  }
}
