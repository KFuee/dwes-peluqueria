<?php

namespace Peluqueria\App\Models;

use Peluqueria\Core\Database;

use PDO;

class Trabajador
{
  public function __construct()
  {
    $this->db = Database::getConnection();
  }

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
    $sql = "INSERT INTO trabajadores (dni, nombre, apellidos, email, categoria)
            VALUES (:dni, :nombre, :apellidos, :email, :categoria)";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":dni", $this->dni);
    $stmt->bindValue(":nombre", $this->nombre);
    $stmt->bindValue(":apellidos", $this->apellidos);
    $stmt->bindValue(":email", $this->email);
    $stmt->bindValue(":categoria", $this->categoria);

    $stmt->execute();
  }

  public function delete()
  {
    $sql = "DELETE FROM trabajadores WHERE dni = :dni";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":dni", $this->dni);

    $stmt->execute();
  }

  public function save()
  {
    $sql = "UPDATE trabajadores
            SET nombre = :nombre, apellidos = :apellidos,
                email = :email, categoria = :categoria
            WHERE dni = :dni";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":dni", $this->dni);
    $stmt->bindValue(":nombre", $this->nombre);
    $stmt->bindValue(":apellidos", $this->apellidos);
    $stmt->bindValue(":email", $this->email);
    $stmt->bindValue(":categoria", $this->categoria);

    $stmt->execute();
  }
}
