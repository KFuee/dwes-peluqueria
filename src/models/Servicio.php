<?php

namespace Peluqueria\App\Models;

use Peluqueria\Core\Database;

use PDO;

class Servicio
{
  public function __construct()
  {
    $this->db = Database::getConnection();
  }

  public static function all()
  {
    $db = Database::getConnection();
    $sql = "SELECT * FROM servicios";

    $stmt = $db->query($sql);

    $servicios = $stmt->fetchAll(PDO::FETCH_CLASS, Servicio::class);

    return $servicios;
  }

  public static function find($id)
  {
    $db = Database::getConnection();
    $sql = "SELECT * FROM servicios WHERE id = :id";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();

    $servicio = $stmt->fetchObject(Servicio::class);

    return $servicio;
  }

  public function insert()
  {
    $sql = "INSERT INTO servicios (id, nombre, precio, duracion, descripcion)
            VALUES (:id, :nombre, :precio, :duracion, :descripcion)";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":id", $this->id);
    $stmt->bindValue(":nombre", $this->nombre);
    $stmt->bindValue(":precio", $this->precio);
    $stmt->bindValue(":duracion", $this->duracion);
    $stmt->bindValue(":descripcion", $this->descripcion);

    $stmt->execute();
  }

  public function delete()
  {
    $ids = implode(',', array_map(array($this->db, "quote"), $this->ids));

    $sql = "DELETE FROM servicios WHERE id IN ($ids)";

    $stmt = $this->db->prepare($sql);

    $stmt->execute();
  }

  public function save()
  {
    $sql = "UPDATE servicios
            SET nombre = :nombre, precio = :precio,
                duracion = :duracion, descripcion = :descripcion
            WHERE id = :id";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":id", $this->id);
    $stmt->bindValue(":nombre", $this->nombre);
    $stmt->bindValue(":precio", $this->precio);
    $stmt->bindValue(":duracion", $this->duracion);
    $stmt->bindValue(":descripcion", $this->descripcion);

    $stmt->execute();
  }
}
