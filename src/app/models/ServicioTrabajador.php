<?php

namespace Peluqueria\App\Models;

use Peluqueria\Core\Database;

use PDO;

class ServicioTrabajador
{
  public function __construct()
  {
    $this->db = Database::getConnection();
  }

  public static function all()
  {
    $db = Database::getConnection();
    $sql = "SELECT * FROM s_trabajadores";

    $stmt = $db->query($sql);

    $servicios = $stmt->fetchAll(PDO::FETCH_CLASS, ServicioTrabajador::class);

    return $servicios;
  }

  public static function find($id)
  {
    $db = Database::getConnection();
    $sql = "SELECT dni_trabajador FROM s_trabajadores WHERE id_servicio = :id_servicio";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":id_servicio", $id);
    $stmt->execute();

    $trabajadores = $stmt->fetchObject(ServicioTrabajador::class);

    return $trabajadores;
  }

  public function insert()
  {
    $sql = "INSERT INTO s_trabajadores (id_servicio, dni_trabajador)
            VALUES (:id_servicio, :dni_trabajador)";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":id_servicio", $this->idServicio);
    $stmt->bindValue(":dni_trabajador", $this->dniTrabajador);

    $stmt->execute();
  }
}
