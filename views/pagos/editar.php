
<?php

if ($_SESSION["rol"] != "Administrador") {

    echo '<div class="alert alert-danger">
            No tienes permiso para editar pagos.
          </div>';

    exit;

}


require_once "controllers/PagoController.php";


$controller = new PagoController();


$id = $_GET["id"] ?? null;


if (!$id) {

    echo '<div class="alert alert-danger">
            Pago no encontrado.
          </div>';

    exit;

}


$pago = $controller->buscar($id);


if (!$pago) {

    echo '<div class="alert alert-danger">
            Pago no encontrado.
          </div>';

    exit;

}


$contratos = $controller->contratos();

?>


<div class="container-fluid">

    <h2 class="mb-4">

        ✏️ Editar Pago

    </h2>


    <form method="POST"
          action="index.php?page=editarPago&id=<?= $pago["id"] ?>">


        <input type="hidden"
               name="id"
               value="<?= $pago["id"] ?>">


        <!-- CONTRATO -->

        <div class="mb-3">

            <label class="form-label">

                Contrato

            </label>


            <select name="id_contrato"
                    class="form-select"
                    required>

                <?php foreach ($contratos as $c): ?>

                    <option

                        value="<?= $c["id"] ?>"

                        <?= $c["id"] == $pago["id_contrato"]
                            ? "selected"
                            : "" ?>>

                        <?= htmlspecialchars(
                            $c["titulo"] .
                            " - " .
                            $c["inquilino"]
                        ) ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>


        <!-- MES -->

        <div class="mb-3">

            <label class="form-label">

                Mes

            </label>


            <input type="text"
                   name="mes"
                   class="form-control"
                   value="<?= htmlspecialchars($pago["mes"]) ?>"
                   required>

        </div>


        <!-- FECHA -->

        <div class="mb-3">

            <label class="form-label">

                Fecha de pago

            </label>


            <input type="date"
                   name="fecha_pago"
                   class="form-control"
                   value="<?= $pago["fecha_pago"] ?>"
                   required>

        </div>


        <!-- IMPORTE -->

        <div class="mb-3">

            <label class="form-label">

                Importe

            </label>


            <input type="number"
                   step="0.01"
                   name="importe"
                   class="form-control"
                   value="<?= $pago["importe"] ?>"
                   required>

        </div>


        <!-- MÉTODO -->

        <div class="mb-3">

            <label class="form-label">

                Método de pago

            </label>


            <select name="metodo_pago"
                    class="form-select"
                    required>

                <option value="Efectivo"
                    <?= $pago["metodo_pago"] == "Efectivo"
                        ? "selected"
                        : "" ?>>

                    Efectivo

                </option>


                <option value="Transferencia"
                    <?= $pago["metodo_pago"] == "Transferencia"
                        ? "selected"
                        : "" ?>>

                    Transferencia

                </option>


                <option value="Tarjeta"
                    <?= $pago["metodo_pago"] == "Tarjeta"
                        ? "selected"
                        : "" ?>>

                    Tarjeta

                </option>

            </select>

        </div>


        <!-- ESTADO -->

        <div class="mb-3">

            <label class="form-label">

                Estado

            </label>


            <select name="estado"
                    class="form-select"
                    required>

                <option value="Pagado"
                    <?= $pago["estado"] == "Pagado"
                        ? "selected"
                        : "" ?>>

                    Pagado

                </option>


                <option value="Pendiente"
                    <?= $pago["estado"] == "Pendiente"
                        ? "selected"
                        : "" ?>>

                    Pendiente

                </option>


                <option value="Atrasado"
                    <?= $pago["estado"] == "Atrasado"
                        ? "selected"
                        : "" ?>>

                    Atrasado

                </option>

            </select>

        </div>


        <!-- OBSERVACIÓN -->

        <div class="mb-3">

            <label class="form-label">

                Observación

            </label>


            <textarea name="observacion"
                      class="form-control"
                      rows="3"><?= htmlspecialchars(
                          $pago["observacion"] ?? ""
                      ) ?></textarea>

        </div>


        <!-- BOTONES -->

        <button type="submit"
                name="actualizar"
                class="btn btn-primary">

            💾 Guardar cambios

        </button>


        <a href="index.php?page=pagos"
           class="btn btn-secondary">

            ↩️ Cancelar

        </a>

    </form>

</div>

