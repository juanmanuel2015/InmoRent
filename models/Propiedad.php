<?php

require_once "config/conexion.php";

class Propiedad{

    private $db;

    public function __construct(){

        $conexion = new Conexion();
        $this->db = $conexion->conectar();

    }

    // Listar propiedades
    public function listar(){

        $sql = $this->db->prepare("
            SELECT
                p.*,
                tp.nombre AS tipo,
                CONCAT(pr.nombre,' ',pr.apellido) AS propietario
            FROM propiedades p
            INNER JOIN propietarios pr
                ON p.id_propietario = pr.id
            INNER JOIN tipos_propiedad tp
                ON p.id_tipo = tp.id
            ORDER BY p.id DESC
        ");

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    // Buscar propiedad
    public function buscar($id){

        $sql = $this->db->prepare("SELECT * FROM propiedades WHERE id=?");
        $sql->execute([$id]);

        return $sql->fetch(PDO::FETCH_ASSOC);

    }

    // Lista de propietarios
    public function propietarios(){

        $sql = $this->db->prepare("
            SELECT id,nombre,apellido
            FROM propietarios
            WHERE estado='Activo'
            ORDER BY apellido,nombre
        ");

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    // Lista de tipos
    public function tipos(){

        $sql = $this->db->prepare("
            SELECT *
            FROM tipos_propiedad
            ORDER BY nombre
        ");

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    // Guardar propiedad
    public function guardar($d){

        $sql = $this->db->prepare("

            INSERT INTO propiedades(

                id_propietario,
                id_tipo,
                titulo,
                descripcion,
                direccion,
                ciudad,
                barrio,
                habitaciones,
                banos,
                cochera,
                superficie,
                precio_mensual,
                estado,
                foto_principal

            )

            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)

        ");

        return $sql->execute([

            $d["id_propietario"],
            $d["id_tipo"],
            $d["titulo"],
            $d["descripcion"],
            $d["direccion"],
            $d["ciudad"],
            $d["barrio"],
            $d["habitaciones"],
            $d["banos"],
            $d["cochera"],
            $d["superficie"],
            $d["precio"],
            $d["estado"],
            $d["foto"]

        ]);

    }

    // Actualizar
    public function actualizar($d){

        $sql = $this->db->prepare("

            UPDATE propiedades SET

            id_propietario=?,
            id_tipo=?,
            titulo=?,
            descripcion=?,
            direccion=?,
            ciudad=?,
            barrio=?,
            habitaciones=?,
            banos=?,
            cochera=?,
            superficie=?,
            precio_mensual=?,
            estado=?,
            foto_principal=?

            WHERE id=?

        ");

        return $sql->execute([

            $d["id_propietario"],
            $d["id_tipo"],
            $d["titulo"],
            $d["descripcion"],
            $d["direccion"],
            $d["ciudad"],
            $d["barrio"],
            $d["habitaciones"],
            $d["banos"],
            $d["cochera"],
            $d["superficie"],
            $d["precio"],
            $d["estado"],
            $d["foto"],
            $d["id"]

        ]);

    }

    // Eliminar
    public function eliminar($id){

        $sql = $this->db->prepare("DELETE FROM propiedades WHERE id=?");

        return $sql->execute([$id]);

    }


public function ultimasPropiedades($limite = 6)
{
    $sql = $this->db->prepare("
        SELECT
            p.*,
            tp.nombre AS tipo,
            CONCAT(pr.nombre,' ',pr.apellido) AS propietario
        FROM propiedades p
        INNER JOIN propietarios pr
            ON p.id_propietario = pr.id
        INNER JOIN tipos_propiedad tp
            ON p.id_tipo = tp.id
        ORDER BY p.id DESC
        LIMIT ?
    ");

    $sql->bindValue(1, (int)$limite, PDO::PARAM_INT);
    $sql->execute();

    return $sql->fetchAll(PDO::FETCH_ASSOC);
}
}