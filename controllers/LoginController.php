<?php



require_once "models/Usuario.php";

class LoginController{

    public function ingresar(){

        if(isset($_POST["login"])){

            $usuario=$_POST["usuario"];
            $password=$_POST["password"];

            $modelo=new Usuario();

            $datos=$modelo->login($usuario,$password);

            if($datos){

                $_SESSION["usuario"]=$datos["nombre"];
                $_SESSION["rol"]=$datos["rol"];

                header("Location:index.php?page=dashboard");

            }else{

                echo "<script>
                alert('Usuario o contraseña incorrectos');
                </script>";

            }

        }

    }

}