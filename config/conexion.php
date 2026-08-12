<?php

class Conexion{

    private $host="localhost";
    private $db="inmobiliaria";
    private $user="root";
    private $pass="";
    public $conexion;

    public function conectar(){

        try{

            $this->conexion=new PDO(
                "mysql:host=".$this->host.";dbname=".$this->db,
                $this->user,
                $this->pass
            );

            $this->conexion->exec("SET NAMES utf8");

            return $this->conexion;

        }catch(PDOException $e){

            die("Error: ".$e->getMessage());

        }

    }

}