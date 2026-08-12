
<?php

require_once "models/Pago.php";

class PagoController
{

    private $modelo;


    public function __construct()
    {

        $this->modelo = new Pago();

    }


    /*
    |--------------------------------------------------------------------------
    | LISTAR PAGOS
    |--------------------------------------------------------------------------
    */

    public function index()
    {

        return $this->modelo->listar();

    }


    /*
    |--------------------------------------------------------------------------
    | CONTRATOS ACTIVOS
    |--------------------------------------------------------------------------
    */

    public function contratos()
    {

        return $this->modelo->contratos();

    }


    /*
    |--------------------------------------------------------------------------
    | GUARDAR PAGO
    |--------------------------------------------------------------------------
    */

    public function guardar()
    {

        if (isset($_POST["guardar"])) {

            $datos = [

                "id_contrato" => $_POST["id_contrato"],
                "mes" => $_POST["mes"],
                "fecha" => $_POST["fecha_pago"],
                "importe" => $_POST["importe"],
                "metodo" => $_POST["metodo_pago"],
                "estado" => $_POST["estado"],
                "observacion" => $_POST["observacion"]

            ];


            $this->modelo->guardar($datos);


            header("Location:index.php?page=pagos");

            exit;

        }

    }


    /*
    |--------------------------------------------------------------------------
    | BUSCAR PAGO
    |--------------------------------------------------------------------------
    */

    public function buscar($id)
    {

        return $this->modelo->buscar($id);

    }


    /*
    |--------------------------------------------------------------------------
    | ACTUALIZAR PAGO
    |--------------------------------------------------------------------------
    */

    public function actualizar()
    {

        if (isset($_POST["actualizar"])) {

            $datos = [

                "id" => $_POST["id"],
                "id_contrato" => $_POST["id_contrato"],
                "mes" => $_POST["mes"],
                "fecha" => $_POST["fecha_pago"],
                "importe" => $_POST["importe"],
                "metodo" => $_POST["metodo_pago"],
                "estado" => $_POST["estado"],
                "observacion" => $_POST["observacion"]

            ];


            $this->modelo->actualizar($datos);


            header("Location:index.php?page=pagos");

            exit;

        }

    }

}

