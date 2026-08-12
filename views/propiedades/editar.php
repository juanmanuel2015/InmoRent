
<?php

if ($_SESSION["rol"] != "Administrador") {

    echo '<div class="alert alert-danger">
            No tienes permiso para editar propiedades.
          </div>';

    exit;

}


require_once "controllers/PropiedadController.php";


$controller = new PropiedadController();


$id = $_GET["id"] ?? null;


if (!$id) {

    echo '<div class="alert alert-danger">
            Propiedad no encontrada.
          </div>';

    exit;

}


$propiedad = $controller->editar($id);


if (!$propiedad) {

    echo '<div class="alert alert-danger">
            Propiedad no encontrada.
          </div>';

    exit;

}


$propietarios = $controller->propietarios();

$tipos = $controller->tipos();

?>


<div class="container-fluid">

    <h2 class="mb-4">

        ✏️ Editar Propiedad

    </h2>


    <form method="POST"
          action="index.php?page=editarPropiedad&id=<?= $propiedad["id"] ?>"
          enctype="multipart/form-data">


        <input type="hidden"
               name="id"
               value="<?= $propiedad["id"] ?>">


        <input type="hidden"
               name="foto_actual"
               value="<?= htmlspecialchars($propiedad["foto_principal"] ?? "") ?>">


        <!-- PROPIETARIO -->

        <div class="mb-3">

            <label class="form-label">
                Propietario
            </label>

            <select name="id_propietario"
                    class="form-select"
                    required>

                <?php foreach ($propietarios as $p): ?>

                    <option
                        value="<?= $p["id"] ?>"
                        <?= $p["id"] == $propiedad["id_propietario"]
                            ? "selected"
                            : "" ?>>

                        <?= htmlspecialchars(
                            $p["nombre"] . " " . $p["apellido"]
                        ) ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>


        <!-- TIPO -->

        <div class="mb-3">

            <label class="form-label">
                Tipo de propiedad
            </label>

            <select name="id_tipo"
                    class="form-select"
                    required>

                <?php foreach ($tipos as $tipo): ?>

                    <option
                        value="<?= $tipo["id"] ?>"
                        <?= $tipo["id"] == $propiedad["id_tipo"]
                            ? "selected"
                            : "" ?>>

                        <?= htmlspecialchars($tipo["nombre"]) ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>


        <!-- TITULO -->

        <div class="mb-3">

            <label class="form-label">
                Título
            </label>

            <input type="text"
                   name="titulo"
                   class="form-control"
                   value="<?= htmlspecialchars($propiedad["titulo"]) ?>"
                   required>

        </div>


        <!-- DESCRIPCIÓN -->

        <div class="mb-3">

            <label class="form-label">
                Descripción
            </label>

            <textarea name="descripcion"
                      class="form-control"
                      rows="4"><?= htmlspecialchars(
                          $propiedad["descripcion"]
                      ) ?></textarea>

        </div>


        <!-- DIRECCIÓN -->

        <div class="mb-3">

            <label class="form-label">
                Dirección
            </label>

            <input type="text"
                   name="direccion"
                   class="form-control"
                   value="<?= htmlspecialchars($propiedad["direccion"]) ?>"
                   required>

        </div>


        <!-- CIUDAD -->

        <div class="mb-3">

            <label class="form-label">
                Ciudad
            </label>

            <input type="text"
                   name="ciudad"
                   class="form-control"
                   value="<?= htmlspecialchars($propiedad["ciudad"]) ?>">

        </div>


        <!-- BARRIO -->

        <div class="mb-3">

            <label class="form-label">
                Barrio
            </label>

            <input type="text"
                   name="barrio"
                   class="form-control"
                   value="<?= htmlspecialchars($propiedad["barrio"]) ?>">

        </div>


        <div class="row">


            <!-- HABITACIONES -->

            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Habitaciones
                </label>

                <input type="number"
                       name="habitaciones"
                       class="form-control"
                       value="<?= $propiedad["habitaciones"] ?>">

            </div>


            <!-- BAÑOS -->

            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Baños
                </label>

                <input type="number"
                       name="banos"
                       class="form-control"
                       value="<?= $propiedad["banos"] ?>">

            </div>


            <!-- COCHERA -->

            <div class="col-md-4 mb-3">

                <label class="form-label">
                    Cochera
                </label>

                <select name="cochera"
                        class="form-select">

                    <option value="Si"
                        <?= $propiedad["cochera"] == "Si"
                            ? "selected"
                            : "" ?>>

                        Sí

                    </option>

                    <option value="No"
                        <?= $propiedad["cochera"] == "No"
                            ? "selected"
                            : "" ?>>

                        No

                    </option>

                </select>

            </div>

        </div>


        <!-- SUPERFICIE -->

        <div class="mb-3">

            <label class="form-label">
                Superficie
            </label>

            <input type="number"
                   step="0.01"
                   name="superficie"
                   class="form-control"
                   value="<?= $propiedad["superficie"] ?>">

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
                   value="<?= $propiedad["precio_mensual"] ?>"
                   required>

        </div>


        <!-- ESTADO -->

        <div class="mb-3">

            <label class="form-label">
                Estado
            </label>

            <select name="estado"
                    class="form-select"
                    required>

                <option value="Disponible"
                    <?= $propiedad["estado"] == "Disponible"
                        ? "selected"
                        : "" ?>>

                    Disponible

                </option>

                <option value="Alquilado"
                    <?= $propiedad["estado"] == "Alquilado"
                        ? "selected"
                        : "" ?>>

                    Alquilado

                </option>

                <option value="En venta"
                    <?= $propiedad["estado"] == "En venta"
                        ? "selected"
                        : "" ?>>

                    En venta

                </option>

            </select>

        </div>


        <!-- FOTO ACTUAL -->

        <?php if (!empty($propiedad["foto_principal"])): ?>

            <div class="mb-3">

                <label class="form-label">
                    Foto actual
                </label>

                <br>

                <img src="uploads/propiedades/<?= htmlspecialchars(
                    $propiedad["foto_principal"]
                ) ?>"
                     alt="Foto de propiedad"
                     style="max-width:250px; border-radius:10px;">

            </div>

        <?php endif; ?>


        <!-- NUEVA FOTO -->

        <div class="mb-3">

            <label class="form-label">
                Cambiar foto
            </label>

            <input type="file"
                   name="foto"
                   class="form-control"
                   accept="image/*">

        </div>


        <!-- BOTONES -->

        <button type="submit"
                name="actualizar"
                class="btn btn-primary">

            💾 Guardar cambios

        </button>


        <a href="index.php?page=propiedades"
           class="btn btn-secondary">

            ↩️ Cancelar

        </a>

    </form>

</div>
