<?php
class Database
{
  private $host;
  private $username;
  private $password;

  protected $conn;

  public function __construct()
  {
    $this->host = "mysql:host=database:3306;dbname=docker";
    $this->username = "root";
    $this->password = $_ENV['MYSQL_ROOT_PASSWORD'];

    $this->dbConnection();
  }

  public function dbConnection()
  {
    try {
      $this->conn = new PDO($this->host, $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $exception) {
      echo "Ha ocurrido un error conectando con la base de datos: "
        . $exception->getMessage();
    }
  }

  public function getConnection()
  {
    return $this->conn;
  }
}
