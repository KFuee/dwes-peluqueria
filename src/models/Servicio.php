<?php

namespace Peluqueria\App\Models;

use Peluqueria\Core\Database;

use PDO;
use Peluqueria\Core\Model;

class Servicio extends Model
{
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
    $db = Database::getConnection();
    $sql = "INSERT INTO servicios (nombre, precio, duracion, descripcion)
            VALUES (:nombre, :precio, :duracion, :descripcion)";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":nombre", $this->nombre);
    $stmt->bindValue(":precio", $this->precio);
    $stmt->bindValue(":duracion", $this->duracion);
    $stmt->bindValue(":descripcion", $this->descripcion);

    $stmt->execute();
  }

  public function delete()
  {
    $db = Database::getConnection();

    $ids = implode(',', array_map(array($this->db, "quote"), $this->ids));
    $sql = "DELETE FROM servicios WHERE id IN ($ids)";

    $stmt = $db->prepare($sql);

    $stmt->execute();
  }

  public function save()
  {
    $db = Database::getConnection();
    $sql = "UPDATE servicios
            SET nombre = :nombre, precio = :precio,
                duracion = :duracion, descripcion = :descripcion
            WHERE id = :id";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":id", $this->id);
    $stmt->bindValue(":nombre", $this->nombre);
    $stmt->bindValue(":precio", $this->precio);
    $stmt->bindValue(":duracion", $this->duracion);
    $stmt->bindValue(":descripcion", $this->descripcion);

    $stmt->execute();
  }
}
