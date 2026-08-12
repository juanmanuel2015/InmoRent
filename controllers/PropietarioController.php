<?php

require_once "models/Propietario.php";

class PropietarioController{

    private $modelo;

    public function __construct(){

        $this->modelo = new Propietario();

    }

    // Mostrar listado
    public function index(){

        return $this->modelo->listar();

    }

    // Guardar nuevo propietario
    public function guardar(){

        if(isset($_POST["guardar"])){

            $foto = "";

            if(!empty($_FILES["foto"]["name"])){

                $foto = time()."_".$_FILES["foto"]["name"];

                move_uploaded_file(

                    $_FILES["foto"]["tmp_name"],
                    "uploads/propietarios/".$foto

                );

            }

            $datos = [

                "nombre"=>$_POST["nombre"],
                "apellido"=>$_POST["apellido"],
                "dni"=>$_POST["dni"],
                "telefono"=>$_POST["telefono"],
                "correo"=>$_POST["correo"],
                "direccion"=>$_POST["direccion"],
                "foto"=>$foto,
                "estado"=>$_POST["estado"]

            ];

            $this->modelo->guardar($datos);

            header("Location:index.php?page=propietarios");

            exit;

        }

    }

    // Obtener propietario
    public function editar($id){

        return $this->modelo->buscar($id);

    }

    // Actualizar
    public function actualizar(){

        if(isset($_POST["actualizar"])){

            $foto = $_POST["foto_actual"];

            if(!empty($_FILES["foto"]["name"])){

                $foto = time()."_".$_FILES["foto"]["name"];

                move_uploaded_file(

                    $_FILES["foto"]["tmp_name"],
                    "uploads/propietarios/".$foto

                );

            }

            $datos=[

                "id"=>$_POST["id"],
                "nombre"=>$_POST["nombre"],
                "apellido"=>$_POST["apellido"],
                "dni"=>$_POST["dni"],
                "telefono"=>$_POST["telefono"],
                "correo"=>$_POST["correo"],
                "direccion"=>$_POST["direccion"],
                "foto"=>$foto,
                "estado"=>$_POST["estado"]

            ];

            $this->modelo->actualizar($datos);

            header("Location:index.php?page=propietarios");

            exit;

        }

    }

    // Eliminar
    public function eliminar($id){

        $this->modelo->eliminar($id);

        header("Location:index.php?page=propietarios");

        exit;

    }

}