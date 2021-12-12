<?php

namespace Peluqueria\App\Models;

use Peluqueria\Core\Database;

use PDO;
use Peluqueria\Core\Model;

class Trabajador extends Model
{
  public static function all()
  {
    $db = Database::getConnection();
    $sql = "SELECT * FROM trabajadores";

    $stmt = $db->query($sql);

    $trabajadores = $stmt->fetchAll(PDO::FETCH_CLASS, Trabajador::class);

    return $trabajadores;
  }

  public static function find($dni)
  {
    $db = Database::getConnection();
    $sql = "SELECT * FROM trabajadores WHERE dni = :dni";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":dni", $dni);
    $stmt->execute();

    $trabajador = $stmt->fetchObject(Trabajador::class);

    return $trabajador;
  }

  public function insert()
  {
    $db = Database::getConnection();
    $sql = "INSERT INTO trabajadores (dni, nombre, apellidos, email, categoria)
            VALUES (:dni, :nombre, :apellidos, :email, :categoria)";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":dni", $this->dni);
    $stmt->bindValue(":nombre", $this->nombre);
    $stmt->bindValue(":apellidos", $this->apellidos);
    $stmt->bindValue(":email", $this->email);
    $stmt->bindValue(":categoria", $this->categoria);

    $stmt->execute();
  }

  public function delete()
  {
    $db = Database::getConnection();

    $dnis = '"' . implode('", "', $this->dnis) . '"';
    $sql = "DELETE FROM trabajadores WHERE dni IN ($dnis)";

    $stmt = $db->prepare($sql);

    $stmt->execute();
  }

  public function save()
  {
    $db = Database::getConnection();
    $sql = "UPDATE trabajadores
            SET nombre = :nombre, apellidos = :apellidos,
                email = :email, categoria = :categoria
            WHERE dni = :dni";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":dni", $this->dni);
    $stmt->bindValue(":nombre", $this->nombre);
    $stmt->bindValue(":apellidos", $this->apellidos);
    $stmt->bindValue(":email", $this->email);
    $stmt->bindValue(":categoria", $this->categoria);

    $stmt->execute();
  }

  public function servicios()
  {
    return "hola";
  }
}
