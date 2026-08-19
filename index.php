
<?php

session_start();
require_once "controllers/PropiedadController.php";

/*
|--------------------------------------------------------------------------
| CERRAR SESIÓN
|--------------------------------------------------------------------------
*/

if (isset($_GET["page"]) && $_GET["page"] == "logout") {

    session_unset();
    session_destroy();

    header("Location: index.php");
    exit;
}


/*
|--------------------------------------------------------------------------
| VERIFICAR SESIÓN
|--------------------------------------------------------------------------
*/

if (!isset($_SESSION["usuario"])) {

    require_once "views/login/login.php";

    exit;
}


/*
|--------------------------------------------------------------------------
| HEADER Y SIDEBAR
|--------------------------------------------------------------------------
*/

require_once "views/layouts/header.php";
require_once "views/layouts/sidebar.php";


/*
|--------------------------------------------------------------------------
| PÁGINAS
|--------------------------------------------------------------------------
*/

if (isset($_GET["page"])) {

    switch ($_GET["page"]) {


        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        case "dashboard":

            require_once "views/dashboard/inicio.php";

            break;


        /*
        |--------------------------------------------------------------------------
        | PROPIETARIOS
        |--------------------------------------------------------------------------
        */

        case "propietarios":

            require_once "views/propietarios/index.php";

            break;


        case "crearPropietario":

            require_once "views/propietarios/crear.php";

            break;


        case "editarPropietario":

            require_once "views/propietarios/editar.php";

            break;


        /*
        |--------------------------------------------------------------------------
        | INQUILINOS
        |--------------------------------------------------------------------------
        */

        case "inquilinos":

            require_once "views/inquilinos/index.php";

            break;


        case "crearInquilino":

            require_once "views/inquilinos/crear.php";

            break;


        case "editarInquilino":

            require_once "views/inquilinos/editar.php";

            break;


        /*
        |--------------------------------------------------------------------------
        | PROPIEDADES
        |--------------------------------------------------------------------------
        */

        case "propiedades":

            require_once "views/propiedades/index.php";

            break;

            case "verPropiedad":

    $controller = new PropiedadController();

    $propiedad = $controller->ver($_GET["id"]);

    require_once "views/propiedades/ver.php";

break;


        case "crearPropiedad":

            require_once "views/propiedades/crear.php";

            break;


        case "editarPropiedad":

    require_once "controllers/PropiedadController.php";

    $controllerPropiedad = new PropiedadController();

    if (isset($_POST["actualizar"])) {

        $controllerPropiedad->actualizar();

    }

    require_once "views/propiedades/editar.php";

    break;


        /*
        |--------------------------------------------------------------------------
        | CONTRATOS
        |--------------------------------------------------------------------------
        */

        case "contratos":

            require_once "views/contratos/index.php";

            break;


        case "crearContrato":

            require_once "views/contratos/crear.php";

            break;

        case "editarContrato":

    require_once "controllers/ContratoController.php";

    $controllerContrato = new ContratoController();

    if (isset($_POST["actualizar"])) {

        $controllerContrato->actualizar();

    }

    require_once "views/contratos/editar.php";

    break;


        /*
        |--------------------------------------------------------------------------
        | PAGOS
        |--------------------------------------------------------------------------
        */

        case "pagos":

    require_once "views/pagos/index.php";

    break;


case "crearPago":

    require_once "views/pagos/crear.php";

    break;


case "editarPago":

    require_once "controllers/PagoController.php";

    $controllerPago = new PagoController();

    if (isset($_POST["actualizar"])) {

        $controllerPago->actualizar();

    }

    require_once "views/pagos/editar.php";

    break;


        /*
        |--------------------------------------------------------------------------
        | REPORTES
        |--------------------------------------------------------------------------
        */

        case "reportes":

            require_once "views/reportes/index.php";

            break;


        case "reportePropiedades":

            require_once "views/reportes/propiedades.php";

            break;


        case "reporteContratos":

            require_once "views/reportes/contratos.php";

            break;


        case "reportePagos":

            require_once "views/reportes/pagos.php";

            break;


        /*
        |--------------------------------------------------------------------------
        | PÁGINA POR DEFECTO
        |--------------------------------------------------------------------------
        */

        default:

            require_once "views/dashboard/inicio.php";

            break;
    }

} else {

    require_once "views/dashboard/inicio.php";

}


/*
|--------------------------------------------------------------------------
| FOOTER
|--------------------------------------------------------------------------
*/

require_once "views/layouts/footer.php";

?>


