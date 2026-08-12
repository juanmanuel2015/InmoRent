<?php

require_once "config/conexion.php";

class Usuario{

    private $db;

    public function __construct(){

        $conexion = new Conexion();
        $this->db = $conexion->conectar();

    }

    public function login($usuario, $password){

        $sql = $this->db->prepare("
            SELECT *
            FROM usuarios
            WHERE usuario = ?
            AND password = ?
        ");

        $sql->execute([$usuario, $password]);

        return $sql->fetch(PDO::FETCH_ASSOC);

    }

}

    