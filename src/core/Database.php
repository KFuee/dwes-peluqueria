<?php

namespace Peluqueria\Core;

use PDO;
use Peluqueria\App\Models\Usuario;
use Peluqueria\Core\App;

class Database
{
  private $uri;
  private $username;
  private $password;

  private $conn;
  private static $db;

  public function __construct()
  {
    $this->uri = "mysql:host="
      . $_ENV['DB_HOST'] . ":" . $_ENV['DB_PORT'];
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
    if (self::$db == null) {
      self::$db = new Database();
      if (!App::isFirstTime()) {
        // Establece la base de datos a la que se conecta
        self::$db->conn->query("USE " . $_ENV['DB_NAME']);
      }
    }

    return self::$db->conn;
  }

  public static function setup()
  {
    // Crea la base de datos en caso de que no exista
    $db = self::getConnection();
    $db->exec("CREATE DATABASE IF NOT EXISTS " . $_ENV['DB_NAME']);

    // Establece la base de datos a la que se conecta
    $db->query("USE " . $_ENV['DB_NAME']);

    // Crea las tablas en caso de que no existan
    // Obtener todos los archivos .sql de la carpeta sql
    $sqlFiles = glob(__DIR__ . "/../sql/*.sql");

    foreach ($sqlFiles as $file) {
      $sql = file_get_contents($file);
      $db->exec($sql);
    }

    // Crea el usuario administrador por defecto
    $password = password_hash("peluqueria123", PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuarios (nombre, apellidos, email, password, rol)
            VALUES ('Administrador', 'Peluqueria', 'admin@peluqueria.com', '$password', 'administrador')";
    $db->exec($sql);
  }
}
