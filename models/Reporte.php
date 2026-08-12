<?php

require_once "config/conexion.php";

class Reporte{

    private $db;

    public function __construct(){

        $conexion = new Conexion();
        $this->db = $conexion->conectar();

    }

    // Dashboard
    public function dashboard(){

        $datos = [];

        $datos["propietarios"] = $this->db->query("SELECT COUNT(*) FROM propietarios")->fetchColumn();
        $datos["inquilinos"] = $this->db->query("SELECT COUNT(*) FROM inquilinos")->fetchColumn();
        $datos["propiedades"] = $this->db->query("SELECT COUNT(*) FROM propiedades")->fetchColumn();
        $datos["contratos"] = $this->db->query("SELECT COUNT(*) FROM contratos")->fetchColumn();
        $datos["pagos"] = $this->db->query("SELECT COUNT(*) FROM pagos")->fetchColumn();

        $datos["disponibles"] = $this->db->query("SELECT COUNT(*) FROM propiedades WHERE estado='Disponible'")->fetchColumn();
        $datos["alquiladas"] = $this->db->query("SELECT COUNT(*) FROM propiedades WHERE estado='Alquilado'")->fetchColumn();

        return $datos;

    }

    // Reporte de pagos
    public function pagos(){

        $sql = $this->db->prepare("

            SELECT

                p.*,
                pr.titulo,
                CONCAT(i.nombre,' ',i.apellido) AS inquilino

            FROM pagos p

            INNER JOIN contratos c
                ON c.id = p.id_contrato

            INNER JOIN propiedades pr
                ON pr.id = c.id_propiedad

            INNER JOIN inquilinos i
                ON i.id = c.id_inquilino

            ORDER BY p.fecha_pago DESC

        ");

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    // Reporte de contratos
    public function contratos(){

        $sql = $this->db->prepare("

            SELECT

                c.*,
                pr.titulo,
                CONCAT(i.nombre,' ',i.apellido) AS inquilino

            FROM contratos c

            INNER JOIN propiedades pr
                ON pr.id = c.id_propiedad

            INNER JOIN inquilinos i
                ON i.id = c.id_inquilino

            ORDER BY c.id DESC

        ");

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    // Reporte de propiedades
    public function propiedades(){

        $sql = $this->db->prepare("

            SELECT

                p.*,
                tp.nombre AS tipo,
                CONCAT(pr.nombre,' ',pr.apellido) AS propietario

            FROM propiedades p

            INNER JOIN propietarios pr
                ON pr.id = p.id_propietario

            INNER JOIN tipos_propiedad tp
                ON tp.id = p.id_tipo

            ORDER BY p.id DESC

        ");

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    // Pagos filtrados
    public function pagosFiltrados($desde, $hasta, $estado){

        $sql = "

            SELECT

                p.*,
                pr.titulo,
                CONCAT(i.nombre,' ',i.apellido) AS inquilino

            FROM pagos p

            INNER JOIN contratos c
                ON c.id = p.id_contrato

            INNER JOIN propiedades pr
                ON pr.id = c.id_propiedad

            INNER JOIN inquilinos i
                ON i.id = c.id_inquilino

            WHERE 1 = 1

        ";

        $params = [];

        if($desde != ""){

            $sql .= " AND p.fecha_pago >= ?";
            $params[] = $desde;

        }

        if($hasta != ""){

            $sql .= " AND p.fecha_pago <= ?";
            $params[] = $hasta;

        }

        if($estado != ""){

            $sql .= " AND p.estado = ?";
            $params[] = $estado;

        }

        $sql .= " ORDER BY p.fecha_pago DESC";

        $q = $this->db->prepare($sql);

        $q->execute($params);

        return $q->fetchAll(PDO::FETCH_ASSOC);

    }

}