<?php

require_once "models/Inquilino.php";

class InquilinoController{

    private $modelo;

    public function __construct(){

        $this->modelo=new Inquilino();

    }

    public function index(){

        return $this->modelo->listar();

    }

    public function guardar(){

        if(isset($_POST["guardar"])){

            $foto="";

            if(!empty($_FILES["foto"]["name"])){

                $foto=time()."_".$_FILES["foto"]["name"];

                move_uploaded_file(

                    $_FILES["foto"]["tmp_name"],
                    "uploads/inquilinos/".$foto

                );

            }

            $datos=[

                "nombre"=>$_POST["nombre"],
                "apellido"=>$_POST["apellido"],
                "dni"=>$_POST["dni"],
                "telefono"=>$_POST["telefono"],
                "correo"=>$_POST["correo"],
                "trabajo"=>$_POST["trabajo"],
                "ingresos"=>$_POST["ingresos"],
                "foto"=>$foto,
                "estado"=>$_POST["estado"]

            ];

            $this->modelo->guardar($datos);

            header("Location:index.php?page=inquilinos");

            exit;

        }

    }

    public function editar($id){

        return $this->modelo->buscar($id);

    }

    public function actualizar(){

        if(isset($_POST["actualizar"])){

            $foto=$_POST["foto_actual"];

            if(!empty($_FILES["foto"]["name"])){

                $foto=time()."_".$_FILES["foto"]["name"];

                move_uploaded_file(

                    $_FILES["foto"]["tmp_name"],
                    "uploads/inquilinos/".$foto

                );

            }

            $datos=[

                "id"=>$_POST["id"],
                "nombre"=>$_POST["nombre"],
                "apellido"=>$_POST["apellido"],
                "dni"=>$_POST["dni"],
                "telefono"=>$_POST["telefono"],
                "correo"=>$_POST["correo"],
                "trabajo"=>$_POST["trabajo"],
                "ingresos"=>$_POST["ingresos"],
                "foto"=>$foto,
                "estado"=>$_POST["estado"]

            ];

            $this->modelo->actualizar($datos);

            header("Location:index.php?page=inquilinos");

            exit;

        }

    }

    public function eliminar($id){

        $this->modelo->eliminar($id);

        header("Location:index.php?page=inquilinos");

        exit;

    }

}