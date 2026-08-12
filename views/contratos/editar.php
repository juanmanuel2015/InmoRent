
<?php

if ($_SESSION["rol"] != "Administrador") {

    echo '<div class="alert alert-danger">
            No tienes permiso para editar contratos.
          </div>';

    exit;

}


require_once "controllers/ContratoController.php";


$controller = new ContratoController();


$id = $_GET["id"] ?? null;


if (!$id) {

    echo '<div class="alert alert-danger">
            Contrato no encontrado.
          </div>';

    exit;

}


$contrato = $controller->buscar($id);


if (!$contrato) {

    echo '<div class="alert alert-danger">
            Contrato no encontrado.
          </div>';

    exit;

}


$propiedades = $controller->propiedades();

$inquilinos = $controller->inquilinos();


?>


<div class="container-fluid">

    <h2 class="mb-4">
        ✏️ Editar Contrato
    </h2>


    <form method="POST"
          action="index.php?page=editarContrato&id=<?= $contrato["id"] ?>">


        <input type="hidden"
               name="id"
               value="<?= $contrato["id"] ?>">


        <!-- PROPIEDAD -->

        <div class="mb-3">

            <label class="form-label">
                Propiedad
            </label>

            <select name="id_propiedad"
                    class="form-select"
                    required>

                <?php foreach ($propiedades as $p): ?>

                    <option
                        value="<?= $p["id"] ?>"
                        <?= $p["id"] == $contrato["id_propiedad"] ? "selected" : "" ?>>

                        <?= htmlspecialchars($p["titulo"]) ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>


        <!-- INQUILINO -->

        <div class="mb-3">

            <label class="form-label">
                Inquilino
            </label>

            <select name="id_inquilino"
                    class="form-select"
                    required>

                <?php foreach ($inquilinos as $i): ?>

                    <option
                        value="<?= $i["id"] ?>"
                        <?= $i["id"] == $contrato["id_inquilino"] ? "selected" : "" ?>>

                        <?= htmlspecialchars(
                            $i["nombre"] . " " . $i["apellido"]
                        ) ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>


        <!-- FECHA INICIO -->

        <div class="mb-3">

            <label class="form-label">
                Fecha de inicio
            </label>

            <input type="date"
                   name="fecha_inicio"
                   class="form-control"
                   value="<?= $contrato["fecha_inicio"] ?>"
                   required>

        </div>


        <!-- FECHA FIN -->

        <div class="mb-3">

            <label class="form-label">
                Fecha de fin
            </label>

            <input type="date"
                   name="fecha_fin"
                   class="form-control"
                   value="<?= $contrato["fecha_fin"] ?>"
                   required>

        </div>


        <!-- PRECIO -->

        <div class="mb-3">

            <label class="form-label">
                Precio mensual
            </label>

            <input type="number"
                   step="0.01"
                   name="precio"
                   class="form-control"
                   value="<?= $contrato["precio_mensual"] ?>"
                   required>

        </div>


        <!-- DEPOSITO -->

        <div class="mb-3">

            <label class="form-label">
                Depósito
            </label>

            <input type="number"
                   step="0.01"
                   name="deposito"
                   class="form-control"
                   value="<?= $contrato["deposito"] ?>">

        </div>


        <!-- GARANTIA -->

        <div class="mb-3">

            <label class="form-label">
                Garantía
            </label>

            <input type="text"
                   name="garantia"
                   class="form-control"
                   value="<?= htmlspecialchars($contrato["garantia"]) ?>">

        </div>


        <!-- ESTADO -->

        <div class="mb-3">

            <label class="form-label">
                Estado
            </label>

            <select name="estado"
                    class="form-select"
                    required>

                <option value="Activo"
                    <?= $contrato["estado"] == "Activo" ? "selected" : "" ?>>

                    Activo

                </option>

                <option value="Finalizado"
                    <?= $contrato["estado"] == "Finalizado" ? "selected" : "" ?>>

                    Finalizado

                </option>

                <option value="Cancelado"
                    <?= $contrato["estado"] == "Cancelado" ? "selected" : "" ?>>

                    Cancelado

                </option>

            </select>

        </div>


        <!-- BOTONES -->

        <button type="submit"
                name="actualizar"
                class="btn btn-primary">

            💾 Guardar cambios

        </button>


        <a href="index.php?page=contratos"
           class="btn btn-secondary">

            ↩️ Cancelar

        </a>


    </form>

</div>

