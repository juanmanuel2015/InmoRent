<?php

require_once "config/conexion.php";

class Gasto
{
    private $db;

    public function __construct()
    {
        $conexion = new Conexion();
        $this->db = $conexion->conectar();
    }

    // Listar gastos
    public function listar()
    {
        $sql = $this->db->prepare("
            SELECT g.*, p.titulo
            FROM gastos g
            INNER JOIN propiedades p
                ON g.id_propiedad = p.id
            ORDER BY g.fecha DESC
        ");

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar un gasto
    public function buscar($id)
    {
        $sql = $this->db->prepare("
            SELECT * FROM gastos
            WHERE id = ?
        ");

        $sql->execute([$id]);

        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    // Obtener propiedades
    public function propiedades()
    {
        $sql = $this->db->prepare("
            SELECT id, titulo
            FROM propiedades
            ORDER BY titulo
        ");

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    // Guardar gasto
    public function guardar($datos)
    {
        $sql = $this->db->prepare("
            INSERT INTO gastos(
                id_propiedad,
                concepto,
                monto,
                fecha,
                observacion
            )
            VALUES(?,?,?,?,?)
        ");

        return $sql->execute([
            $datos["id_propiedad"],
            $datos["concepto"],
            $datos["monto"],
            $datos["fecha"],
            $datos["observacion"]
        ]);
    }

    // Actualizar gasto
    public function actualizar($datos)
    {
        $sql = $this->db->prepare("
            UPDATE gastos SET
                id_propiedad = ?,
                concepto = ?,
                monto = ?,
                fecha = ?,
                observacion = ?
            WHERE id = ?
        ");

        return $sql->execute([
            $datos["id_propiedad"],
            $datos["concepto"],
            $datos["monto"],
            $datos["fecha"],
            $datos["observacion"],
            $datos["id"]
        ]);
    }

    // Eliminar gasto
    public function eliminar($id)
    {
        $sql = $this->db->prepare("
            DELETE FROM gastos
            WHERE id = ?
        ");

        return $sql->execute([$id]);
    }

    // Total de gastos
    public function totalGastos()
    {
        $sql = $this->db->query("
            SELECT SUM(monto) AS total
            FROM gastos
        ");

        return $sql->fetch(PDO::FETCH_ASSOC);
    }
}