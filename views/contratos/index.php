
<?php

require_once "controllers/ContratoController.php";

$controller = new ContratoController();

$contratos = $controller->index();

?>

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">

        <h2>Contratos</h2>

        <?php if ($_SESSION["rol"] == "Administrador"): ?>

            <a href="index.php?page=crearContrato"
               class="btn btn-success">

                ➕ Nuevo Contrato

            </a>

        <?php endif; ?>

    </div>


    <table class="table table-striped table-bordered">

        <thead class="table-dark">

            <tr>

                <th>ID</th>
                <th>Propiedad</th>
                <th>Inquilino</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Precio</th>
                <th>Estado</th>

                <?php if ($_SESSION["rol"] == "Administrador"): ?>

                    <th>Acciones</th>

                <?php endif; ?>

            </tr>

        </thead>


        <tbody>

            <?php foreach ($contratos as $c): ?>

                <tr>

                    <td>
                        <?= $c["id"] ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($c["titulo"]) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($c["inquilino"]) ?>
                    </td>

                    <td>
                        <?= $c["fecha_inicio"] ?>
                    </td>

                    <td>
                        <?= $c["fecha_fin"] ?>
                    </td>

                    <td>
                        $<?= number_format(
                            $c["precio_mensual"],
                            2,
                            ",",
                            "."
                        ) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($c["estado"]) ?>
                    </td>


                    <?php if ($_SESSION["rol"] == "Administrador"): ?>

                        <td>

                            <!-- EDITAR -->
                            <a href="index.php?page=editarContrato&id=<?= $c["id"] ?>"
                               class="btn btn-warning btn-sm">

                                ✏️ Editar

                            </a>


                            <!-- IMPRIMIR / PDF -->
                            <a href="controllers/PDFContrato.php?id=<?= $c["id"] ?>"
                               target="_blank"
                               class="btn btn-danger btn-sm">

                                🖨️ Imprimir

                            </a>

                        </td>

                    <?php endif; ?>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>
```
