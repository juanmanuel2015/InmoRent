
<?php

require_once "models/Contrato.php";

class ContratoController
{

    private $modelo;


    public function __construct()
    {

        $this->modelo = new Contrato();

    }


    /*
    |--------------------------------------------------------------------------
    | LISTAR CONTRATOS
    |--------------------------------------------------------------------------
    */

    public function index()
    {

        return $this->modelo->listar();

    }


    /*
    |--------------------------------------------------------------------------
    | PROPIEDADES DISPONIBLES
    |--------------------------------------------------------------------------
    */

    public function propiedades()
    {

        return $this->modelo->propiedades();

    }


    /*
    |--------------------------------------------------------------------------
    | INQUILINOS ACTIVOS
    |--------------------------------------------------------------------------
    */

    public function inquilinos()
    {

        return $this->modelo->inquilinos();

    }


    /*
    |--------------------------------------------------------------------------
    | GUARDAR CONTRATO
    |--------------------------------------------------------------------------
    */

    public function guardar()
    {

        if (isset($_POST["guardar"])) {

            $datos = [

                "id_propiedad" => $_POST["id_propiedad"],
                "id_inquilino" => $_POST["id_inquilino"],
                "fecha_inicio" => $_POST["fecha_inicio"],
                "fecha_fin" => $_POST["fecha_fin"],
                "precio" => $_POST["precio"],
                "deposito" => $_POST["deposito"],
                "garantia" => $_POST["garantia"],
                "estado" => $_POST["estado"]

            ];


            $this->modelo->guardar($datos);


            header("Location:index.php?page=contratos");

            exit;

        }

    }


    /*
    |--------------------------------------------------------------------------
    | BUSCAR CONTRATO
    |--------------------------------------------------------------------------
    */

    public function buscar($id)
    {

        return $this->modelo->buscar($id);

    }


    /*
    |--------------------------------------------------------------------------
    | ACTUALIZAR CONTRATO
    |--------------------------------------------------------------------------
    */

    public function actualizar()
    {

        if (isset($_POST["actualizar"])) {

            $datos = [

                "id" => $_POST["id"],
                "id_propiedad" => $_POST["id_propiedad"],
                "id_inquilino" => $_POST["id_inquilino"],
                "fecha_inicio" => $_POST["fecha_inicio"],
                "fecha_fin" => $_POST["fecha_fin"],
                "precio" => $_POST["precio"],
                "deposito" => $_POST["deposito"],
                "garantia" => $_POST["garantia"],
                "estado" => $_POST["estado"]

            ];


            $this->modelo->actualizar($datos);


            header("Location:index.php?page=contratos");

            exit;

        }

    }

}

