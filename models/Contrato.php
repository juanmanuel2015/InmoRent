
<?php

require_once "config/conexion.php";

class Contrato
{

    private $db;


    public function __construct()
    {

        $conexion = new Conexion();

        $this->db = $conexion->conectar();

    }


    /*
    |--------------------------------------------------------------------------
    | LISTAR
    |--------------------------------------------------------------------------
    */

    public function listar()
    {

        $sql = $this->db->prepare("

            SELECT

            c.*,

            p.titulo,

            CONCAT(i.nombre,' ',i.apellido) AS inquilino

            FROM contratos c

            INNER JOIN propiedades p
            ON c.id_propiedad=p.id

            INNER JOIN inquilinos i
            ON c.id_inquilino=i.id

            ORDER BY c.id DESC

        ");


        $sql->execute();


        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }


    /*
    |--------------------------------------------------------------------------
    | PROPIEDADES DISPONIBLES
    |--------------------------------------------------------------------------
    */

    public function propiedades()
    {

        $sql = $this->db->prepare("

            SELECT *

            FROM propiedades

            WHERE estado='Disponible'

            ORDER BY titulo

        ");


        $sql->execute();


        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }


    /*
    |--------------------------------------------------------------------------
    | INQUILINOS ACTIVOS
    |--------------------------------------------------------------------------
    */

    public function inquilinos()
    {

        $sql = $this->db->prepare("

            SELECT *

            FROM inquilinos

            WHERE estado='Activo'

            ORDER BY apellido

        ");


        $sql->execute();


        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }


    /*
    |--------------------------------------------------------------------------
    | GUARDAR
    |--------------------------------------------------------------------------
    */

    public function guardar($d)
    {

        $sql = $this->db->prepare("

            INSERT INTO contratos(

                id_propiedad,
                id_inquilino,
                fecha_inicio,
                fecha_fin,
                precio_mensual,
                deposito,
                garantia,
                estado

            )

            VALUES(?,?,?,?,?,?,?,?)

        ");


        return $sql->execute([

            $d["id_propiedad"],
            $d["id_inquilino"],
            $d["fecha_inicio"],
            $d["fecha_fin"],
            $d["precio"],
            $d["deposito"],
            $d["garantia"],
            $d["estado"]

        ]);

    }


    /*
    |--------------------------------------------------------------------------
    | BUSCAR CONTRATO
    |--------------------------------------------------------------------------
    */

    public function buscar($id)
    {

        $sql = $this->db->prepare("

            SELECT *

            FROM contratos

            WHERE id = ?

        ");


        $sql->execute([$id]);


        return $sql->fetch(PDO::FETCH_ASSOC);

    }


    /*
    |--------------------------------------------------------------------------
    | ACTUALIZAR CONTRATO
    |--------------------------------------------------------------------------
    */

    public function actualizar($d)
    {

        $sql = $this->db->prepare("

            UPDATE contratos

            SET

                id_propiedad = ?,
                id_inquilino = ?,
                fecha_inicio = ?,
                fecha_fin = ?,
                precio_mensual = ?,
                deposito = ?,
                garantia = ?,
                estado = ?

            WHERE id = ?

        ");


        return $sql->execute([

            $d["id_propiedad"],
            $d["id_inquilino"],
            $d["fecha_inicio"],
            $d["fecha_fin"],
            $d["precio"],
            $d["deposito"],
            $d["garantia"],
            $d["estado"],
            $d["id"]

        ]);

    }

}

