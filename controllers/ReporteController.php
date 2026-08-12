<?php

require_once "models/Reporte.php";

class ReporteController{

    private $modelo;

    public function __construct(){

        $this->modelo=new Reporte();

    }

    public function dashboard(){

        return $this->modelo->dashboard();

    }

    public function pagos(){

        return $this->modelo->pagos();

    }

    public function contratos(){

        return $this->modelo->contratos();

    }

    public function propiedades(){

        return $this->modelo->propiedades();

    }

}