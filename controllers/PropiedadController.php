
<?php

require_once "models/Propiedad.php";

class PropiedadController
{

    private $modelo;

    public function ver($id){

    return $this->modelo->buscar($id);

}


    public function __construct()
    {

        $this->modelo = new Propiedad();

    }


    public function index()
    {

        return $this->modelo->listar();

    }


    // Dashboard
    public function dashboard()
    {

        return $this->modelo->ultimasPropiedades();

    }


    // Propietarios
    public function propietarios()
    {

        return $this->modelo->propietarios();

    }


    // Tipos de propiedad
    public function tipos()
    {

        return $this->modelo->tipos();

    }


    // Buscar propiedad para editar
    public function editar($id)
    {

        return $this->modelo->buscar($id);

    }


    // Guardar propiedad
    public function guardar()
    {

        if (isset($_POST["guardar"])) {

            $foto = "";

            if (!empty($_FILES["foto"]["name"])) {

                $foto = time() . "_" . $_FILES["foto"]["name"];

                move_uploaded_file(
                    $_FILES["foto"]["tmp_name"],
                    "uploads/propiedades/" . $foto
                );

            }


            $datos = [

                "id_propietario" => $_POST["id_propietario"],
                "id_tipo"        => $_POST["id_tipo"],
                "titulo"         => $_POST["titulo"],
                "descripcion"    => $_POST["descripcion"],
                "direccion"      => $_POST["direccion"],
                "ciudad"         => $_POST["ciudad"],
                "barrio"         => $_POST["barrio"],
                "habitaciones"   => $_POST["habitaciones"],
                "banos"          => $_POST["banos"],
                "cochera"        => $_POST["cochera"],
                "superficie"     => $_POST["superficie"],
                "precio"         => $_POST["precio"],
                "estado"         => $_POST["estado"],
                "foto"           => $foto

            ];


            $this->modelo->guardar($datos);


            header("Location:index.php?page=propiedades");

            exit;

        }

    }


    // Actualizar propiedad
    public function actualizar()
    {

        if (isset($_POST["actualizar"])) {

            $foto = $_POST["foto_actual"] ?? "";


            // Si se selecciona una foto nueva
            if (!empty($_FILES["foto"]["name"])) {

                $foto = time() . "_" . $_FILES["foto"]["name"];

                move_uploaded_file(
                    $_FILES["foto"]["tmp_name"],
                    "uploads/propiedades/" . $foto
                );

            }


            $datos = [

                "id"             => $_POST["id"],
                "id_propietario" => $_POST["id_propietario"],
                "id_tipo"        => $_POST["id_tipo"],
                "titulo"         => $_POST["titulo"],
                "descripcion"    => $_POST["descripcion"],
                "direccion"      => $_POST["direccion"],
                "ciudad"         => $_POST["ciudad"],
                "barrio"         => $_POST["barrio"],
                "habitaciones"   => $_POST["habitaciones"],
                "banos"          => $_POST["banos"],
                "cochera"        => $_POST["cochera"],
                "superficie"     => $_POST["superficie"],
                "precio"         => $_POST["precio"],
                "estado"         => $_POST["estado"],
                "foto"           => $foto

            ];


            $this->modelo->actualizar($datos);


            header("Location:index.php?page=propiedades");

            exit;

        }

    }


    // Eliminar
    public function eliminar($id)
    {

        $this->modelo->eliminar($id);

        header("Location:index.php?page=propiedades");

        exit;

    }

}

