
<?php

require_once "controllers/PagoController.php";

$controller = new PagoController();

$pagos = $controller->index();

?>

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">

        <h2>Pagos</h2>


        <?php if ($_SESSION["rol"] == "Administrador"): ?>

            <a href="index.php?page=crearPago"
               class="btn btn-success">

                <i class="bi bi-cash-stack"></i>

                Nuevo Pago

            </a>

        <?php endif; ?>

    </div>


    <table class="table table-striped table-bordered">

        <thead class="table-dark">

            <tr>

                <th>ID</th>
                <th>Propiedad</th>
                <th>Inquilino</th>
                <th>Mes</th>
                <th>Fecha</th>
                <th>Importe</th>
                <th>Método</th>
                <th>Estado</th>

                <?php if ($_SESSION["rol"] == "Administrador"): ?>

                    <th>Acciones</th>

                <?php endif; ?>

            </tr>

        </thead>


        <tbody>

            <?php foreach ($pagos as $p): ?>

                <tr>

                    <td>
                        <?= $p["id"] ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($p["titulo"]) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($p["inquilino"]) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($p["mes"]) ?>
                    </td>

                    <td>
                        <?= $p["fecha_pago"] ?>
                    </td>

                    <td>
                        $<?= number_format(
                            $p["importe"],
                            2,
                            ",",
                            "."
                        ) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($p["metodo_pago"]) ?>
                    </td>

                    <td>

                        <?php

                        if ($p["estado"] == "Pagado") {

                            echo "<span class='badge bg-success'>Pagado</span>";

                        } elseif ($p["estado"] == "Pendiente") {

                            echo "<span class='badge bg-warning text-dark'>Pendiente</span>";

                        } else {

                            echo "<span class='badge bg-danger'>Atrasado</span>";

                        }

                        ?>

                    </td>


                    <?php if ($_SESSION["rol"] == "Administrador"): ?>

                        <td>

                            <!-- EDITAR -->

                            <a href="index.php?page=editarPago&id=<?= $p["id"] ?>"
                               class="btn btn-warning btn-sm">

                                ✏️ Editar

                            </a>


                            <!-- IMPRIMIR -->

                            <a href="controllers/PDFPago.php?id=<?= $p["id"] ?>"
                               target="_blank"
                               class="btn btn-primary btn-sm">

                                🖨️ Imprimir

                            </a>

                        </td>

                    <?php endif; ?>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>

