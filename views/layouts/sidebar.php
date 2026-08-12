```php
<?php

$rol = $_SESSION["rol"] ?? "";

?>

<div class="d-flex">

    <!-- SIDEBAR -->

    <div
        class="sidebar bg-dark text-white p-3"
        style="width:250px; min-height:100vh;"
    >

        <!-- LOGO -->

        <div class="text-center mb-4">

            <img
                src="assets/img/logo.png"
                alt="InmoRent"
                style="width:180px; height:auto;"
            >

        </div>


        <!-- USUARIO -->

        <div class="text-center mb-4">

            <div class="fw-bold">

                <?= htmlspecialchars($_SESSION["usuario"]) ?>

            </div>

            <small class="text-info">

                <?= htmlspecialchars($rol) ?>

            </small>

        </div>


        <hr>


        <!-- DASHBOARD -->

        <a
            href="index.php?page=dashboard"
            class="nav-link text-white mb-2"
        >

            🏠 Dashboard

        </a>


        <?php if ($rol == "Administrador"): ?>


            <!-- PROPIETARIOS -->

            <a
                href="index.php?page=propietarios"
                class="nav-link text-white mb-2"
            >

                👤 Propietarios

            </a>


            <!-- INQUILINOS -->

            <a
                href="index.php?page=inquilinos"
                class="nav-link text-white mb-2"
            >

                👥 Inquilinos

            </a>


            <!-- PROPIEDADES -->

            <a
                href="index.php?page=propiedades"
                class="nav-link text-white mb-2"
            >

                🏠 Propiedades

            </a>


        <?php endif; ?>


        <!-- CONTRATOS -->

        <?php if (
            $rol == "Administrador" ||
            $rol == "Empleado"
        ): ?>

            <a
                href="index.php?page=contratos"
                class="nav-link text-white mb-2"
            >

                📄 Contratos

            </a>


            <!-- PAGOS -->

            <a
                href="index.php?page=pagos"
                class="nav-link text-white mb-2"
            >

                💰 Pagos

            </a>

        <?php endif; ?>


        <!-- REPORTES -->

        <?php if ($rol == "Administrador"): ?>

            <a
                href="index.php?page=reportes"
                class="nav-link text-white mb-2"
            >

                📊 Reportes

            </a>

        <?php endif; ?>


        <hr>


        <!-- CERRAR SESIÓN -->

        <a
            href="index.php?page=logout"
            class="nav-link text-danger fw-bold"
        >

            🚪 Cerrar sesión

        </a>

    </div>


    <!-- CONTENIDO -->

    <div class="flex-grow-1">

```

