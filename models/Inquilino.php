<?php

require_once "config/conexion.php";

class Inquilino{

    private $db;

    public function __construct(){

        $conexion = new Conexion();
        $this->db = $conexion->conectar();

    }

    public function listar(){

        $sql = $this->db->prepare("SELECT * FROM inquilinos ORDER BY id DESC");
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function buscar($id){

        $sql = $this->db->prepare("SELECT * FROM inquilinos WHERE id=?");
        $sql->execute([$id]);

        return $sql->fetch(PDO::FETCH_ASSOC);

    }

    public function guardar($datos){

        $sql = $this->db->prepare("

            INSERT INTO inquilinos(

            nombre,
            apellido,
            dni,
            telefono,
            correo,
            trabajo,
            ingresos,
            foto,
            estado

            )

            VALUES(?,?,?,?,?,?,?,?,?)

        ");

        return $sql->execute([

            $datos["nombre"],
            $datos["apellido"],
            $datos["dni"],
            $datos["telefono"],
            $datos["correo"],
            $datos["trabajo"],
            $datos["ingresos"],
            $datos["foto"],
            $datos["estado"]

        ]);

    }

    public function actualizar($datos){

        $sql=$this->db->prepare("

        UPDATE inquilinos SET

        nombre=?,
        apellido=?,
        dni=?,
        telefono=?,
        correo=?,
        trabajo=?,
        ingresos=?,
        foto=?,
        estado=?

        WHERE id=?

        ");

        return $sql->execute([

            $datos["nombre"],
            $datos["apellido"],
            $datos["dni"],
            $datos["telefono"],
            $datos["correo"],
            $datos["trabajo"],
            $datos["ingresos"],
            $datos["foto"],
            $datos["estado"],
            $datos["id"]

        ]);

    }

    public function eliminar($id){

        $sql=$this->db->prepare("DELETE FROM inquilinos WHERE id=?");

        return $sql->execute([$id]);

    }

}