<?php

namespace Peluqueria\App\Models;

use Peluqueria\Core\Database;

use PDO;

class ServicioTrabajador
{
  public static function all()
  {
    $db = Database::getConnection();
    $sql = "SELECT * FROM s_trabajadores";

    $stmt = $db->query($sql);

    $servicios = $stmt->fetchAll(PDO::FETCH_CLASS, ServicioTrabajador::class);

    return $servicios;
  }

  // Función que devuelve los trabajadores que realizan un servicio
  public static function find($id)
  {
    $db = Database::getConnection();
    $sql = "SELECT * FROM s_trabajadores WHERE id_servicio = :id";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $trabajadores = $stmt->fetchAll(PDO::FETCH_CLASS, ServicioTrabajador::class);

    return $trabajadores;
  }

  public function insert()
  {
    $db = Database::getConnection();
    $sql = "INSERT INTO s_trabajadores (id_servicio, dni_trabajador)
            VALUES (:id_servicio, :dni_trabajador)";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":id_servicio", $this->idServicio);
    $stmt->bindValue(":dni_trabajador", $this->dniTrabajador);

    $stmt->execute();
  }

  public function delete()
  {
    $db = Database::getConnection();

    $dnis = implode(',', array_map(array($this->db, "quote"), $this->dnis));
    $sql = "DELETE FROM s_trabajadores WHERE dni_trabajador IN ($dnis)";

    $stmt = $db->prepare($sql);

    $stmt->execute();
  }
}
