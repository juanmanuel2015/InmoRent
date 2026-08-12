<?php

require_once "config/conexion.php";

class Propietario{

    private $db;

    public function __construct(){

        $conexion = new Conexion();
        $this->db = $conexion->conectar();

    }

    // Listar propietarios
    public function listar(){

        $sql = $this->db->prepare("SELECT * FROM propietarios ORDER BY id DESC");
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    // Buscar por ID
    public function buscar($id){

        $sql = $this->db->prepare("SELECT * FROM propietarios WHERE id=?");
        $sql->execute([$id]);

        return $sql->fetch(PDO::FETCH_ASSOC);

    }

    // Insertar
    public function guardar($datos){

        $sql = $this->db->prepare("

            INSERT INTO propietarios(

                nombre,
                apellido,
                dni,
                telefono,
                correo,
                direccion,
                foto,
                estado

            )

            VALUES(?,?,?,?,?,?,?,?)

        ");

        return $sql->execute([

            $datos["nombre"],
            $datos["apellido"],
            $datos["dni"],
            $datos["telefono"],
            $datos["correo"],
            $datos["direccion"],
            $datos["foto"],
            $datos["estado"]

        ]);

    }

    // Actualizar
    public function actualizar($datos){

        $sql = $this->db->prepare("

            UPDATE propietarios SET

            nombre=?,
            apellido=?,
            dni=?,
            telefono=?,
            correo=?,
            direccion=?,
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
            $datos["direccion"],
            $datos["foto"],
            $datos["estado"],
            $datos["id"]

        ]);

    }

    // Eliminar
    public function eliminar($id){

        $sql = $this->db->prepare("DELETE FROM propietarios WHERE id=?");

        return $sql->execute([$id]);

    }

}