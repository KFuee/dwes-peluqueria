<?php

namespace Peluqueria\App\Models;

use Peluqueria\Core\Database;

use PDO;

class Fotografia
{
  public function __construct()
  {
    $this->db = Database::getConnection();
  }

  public static function all()
  {
    $db = Database::getConnection();
    $sql = "SELECT * from fotografias";

    $stmt = $db->query($sql);

    $fotografias = $stmt->fetchAll(PDO::FETCH_CLASS, Fotografia::class);

    return $fotografias;
  }

  public static function find($id)
  {
    $db = Database::getConnection();
    $sql = "SELECT * from fotografias WHERE id = :id";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();

    $fotografia = $stmt->fetchObject(Fotografia::class);

    return $fotografia;
  }

  public function insert()
  {
    $sql = "INSERT INTO fotografias (nombre_fichero, id_servicio)
            VALUES (:nombre_fichero, :id_servicio)";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":nombre_fichero", $this->nombre_fichero);
    $stmt->bindValue(":id_servicio", $this->id_servicio);

    $stmt->execute();
  }

  public function delete()
  {
    $sql = "DELETE from fotografias WHERE id = :id";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":id", $this->id);

    $stmt->execute();
  }

  public function deleteFotosServicio()
  {
    $ids = implode(',', array_map(array($this->db, "quote"), $this->ids));

    $sql = "DELETE FROM fotografias WHERE id_servicio IN ($ids)";

    $stmt = $this->db->prepare($sql);

    $stmt->execute();
  }

  public function save()
  {
    $sql = "UPDATE fotografias
            SET nombre_fichero = :nombre_fichero,
                id_servicio = :id_servicio,
            WHERE id = :id";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":id", $this->id);
    $stmt->bindValue(":nombre_fichero", $this->nombre_fichero);
    $stmt->bindValue(":id_servicio", $this->id_servicio);

    $stmt->execute();
  }
}
