<?php

namespace Peluqueria\App\Models;

use Peluqueria\Core\Database;

use PDO;

class Cita
{
  public function __construct()
  {
    $this->db = Database::getConnection();
  }

  public static function all()
  {
    $db = Database::getConnection();
    $sql = "SELECT * FROM citas";

    $stmt = $db->query($sql);

    $citas = $stmt->fetchAll(PDO::FETCH_CLASS, Cita::class);

    return $citas;
  }

  public static function find($id)
  {
    $db = Database::getConnection();
    $sql = "SELECT * FROM citas WHERE id = :id";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();

    $cita = $stmt->fetchObject(Cita::class);

    return $cita;
  }

  public static function findCitasSemanaTrabajador($dniTrabajador)
  {
    $db = Database::getConnection();
    $sql = "SELECT c.fecha , c.hora, s.duracion
            FROM citas c, servicios s
            WHERE c.servicio = s.id AND c.trabajador = :trabajador
            AND str_to_date(c.fecha, '%d-%m-%Y') BETWEEN CURDATE() AND CURDATE() + INTERVAL 7 DAY";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":trabajador", $dniTrabajador);
    $stmt->execute();

    $citas = $stmt->fetchAll(PDO::FETCH_CLASS, Cita::class);

    return $citas;
  }

  public static function findCitasDiaTrabajador($dniTrabajador, $fecha)
  {
    $db = Database::getConnection();
    $sql = "SELECT c.fecha , c.hora, s.duracion
            FROM citas c, servicios s
            WHERE c.servicio = s.id AND c.trabajador = :trabajador
            AND c.fecha = :fecha";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":trabajador", $dniTrabajador);
    $stmt->bindValue(":fecha", $fecha);
    $stmt->execute();

    $citas = $stmt->fetchAll(PDO::FETCH_CLASS, Cita::class);

    return $citas;
  }

  public function insert()
  {
    $sql = "INSERT INTO citas (trabajador, servicio, fecha, hora, nombre, apellidos, email, observaciones)
            VALUES (:trabajador, :servicio, :fecha, :hora, :nombre, :apellidos, :email, :observaciones)";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":trabajador", $this->trabajador);
    $stmt->bindValue(":servicio", $this->servicio);
    $stmt->bindValue(":fecha", $this->fecha);
    $stmt->bindValue(":hora", $this->hora);
    $stmt->bindValue(":nombre", $this->nombre);
    $stmt->bindValue(":apellidos", $this->apellidos);
    $stmt->bindValue(":email", $this->email);
    $stmt->bindValue(":observaciones", $this->observaciones);

    $stmt->execute();
  }

  public function delete()
  {
    $ids = implode(',', array_map(array($this->db, "quote"), $this->ids));

    $sql = "DELETE FROM citas WHERE id IN ($ids)";

    $stmt = $this->db->prepare($sql);

    $stmt->execute();
  }

  public function save()
  {
    $sql = "UPDATE citas
            SET id = :id, servicio = :servicio, trabajador = :trabajador,
                fecha = :fecha, hora = :hora,
                nombre = :nombre, apellidos = :apellidos, email = :email,
                observaciones = :observaciones
            WHERE id = :id";

    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":id", $this->id);
    $stmt->bindValue(":trabajador", $this->trabajador);
    $stmt->bindValue(":servicio", $this->servicio);
    $stmt->bindValue(":fecha", $this->fecha);
    $stmt->bindValue(":hora", $this->hora);
    $stmt->bindValue(":nombre", $this->nombre);
    $stmt->bindValue(":apellidos", $this->apellidos);
    $stmt->bindValue(":email", $this->email);
    $stmt->bindValue(":observaciones", $this->observaciones);

    $stmt->execute();
  }
}
