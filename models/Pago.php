
<?php

require_once "config/conexion.php";

class Pago
{

    private $db;


    public function __construct()
    {

        $conexion = new Conexion();

        $this->db = $conexion->conectar();

    }


    /*
    |--------------------------------------------------------------------------
    | LISTAR PAGOS
    |--------------------------------------------------------------------------
    */

    public function listar()
    {

        $sql = $this->db->prepare("

            SELECT

                p.*,

                pr.titulo,

                CONCAT(i.nombre,' ',i.apellido) AS inquilino

            FROM pagos p

            INNER JOIN contratos c
                ON p.id_contrato = c.id

            INNER JOIN propiedades pr
                ON c.id_propiedad = pr.id

            INNER JOIN inquilinos i
                ON c.id_inquilino = i.id

            ORDER BY p.fecha_pago DESC

        ");


        $sql->execute();


        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }


    /*
    |--------------------------------------------------------------------------
    | CONTRATOS ACTIVOS
    |--------------------------------------------------------------------------
    */

    public function contratos()
    {

        $sql = $this->db->prepare("

            SELECT

                c.id,

                pr.titulo,

                CONCAT(i.nombre,' ',i.apellido) AS inquilino

            FROM contratos c

            INNER JOIN propiedades pr
                ON c.id_propiedad = pr.id

            INNER JOIN inquilinos i
                ON c.id_inquilino = i.id

            WHERE c.estado='Activo'

            ORDER BY c.id DESC

        ");


        $sql->execute();


        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }


    /*
    |--------------------------------------------------------------------------
    | GUARDAR PAGO
    |--------------------------------------------------------------------------
    */

    public function guardar($d)
    {

        $sql = $this->db->prepare("

            INSERT INTO pagos(

                id_contrato,
                mes,
                fecha_pago,
                importe,
                metodo_pago,
                estado,
                observacion

            )

            VALUES(?,?,?,?,?,?,?)

        ");


        return $sql->execute([

            $d["id_contrato"],
            $d["mes"],
            $d["fecha"],
            $d["importe"],
            $d["metodo"],
            $d["estado"],
            $d["observacion"]

        ]);

    }


    /*
    |--------------------------------------------------------------------------
    | BUSCAR PAGO
    |--------------------------------------------------------------------------
    */

    public function buscar($id)
    {

        $sql = $this->db->prepare("

            SELECT *

            FROM pagos

            WHERE id = ?

        ");


        $sql->execute([$id]);


        return $sql->fetch(PDO::FETCH_ASSOC);

    }


    /*
    |--------------------------------------------------------------------------
    | ACTUALIZAR PAGO
    |--------------------------------------------------------------------------
    */

    public function actualizar($d)
    {

        $sql = $this->db->prepare("

            UPDATE pagos

            SET

                id_contrato = ?,
                mes = ?,
                fecha_pago = ?,
                importe = ?,
                metodo_pago = ?,
                estado = ?,
                observacion = ?

            WHERE id = ?

        ");


        return $sql->execute([

            $d["id_contrato"],
            $d["mes"],
            $d["fecha"],
            $d["importe"],
            $d["metodo"],
            $d["estado"],
            $d["observacion"],
            $d["id"]

        ]);

    }

}

