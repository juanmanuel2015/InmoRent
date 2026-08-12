<?php

require_once "controllers/PropietarioController.php";

$controller = new PropietarioController();
$controller->guardar();

?>

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-success text-white">

            <h3>Nuevo Propietario</h3>

        </div>

        <div class="card-body">

            <form method="POST" enctype="multipart/form-data">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label>Nombre</label>

                        <input
                        type="text"
                        name="nombre"
                        class="form-control"
                        required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Apellido</label>

                        <input
                        type="text"
                        name="apellido"
                        class="form-control"
                        required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>DNI</label>

                        <input
                        type="text"
                        name="dni"
                        class="form-control"
                        required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Teléfono</label>

                        <input
                        type="text"
                        name="telefono"
                        class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Correo</label>

                        <input
                        type="email"
                        name="correo"
                        class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Estado</label>

                        <select
                        name="estado"
                        class="form-select">

                            <option value="Activo">Activo</option>

                            <option value="Inactivo">Inactivo</option>

                        </select>

                    </div>

                    <div class="col-md-12 mb-3">

                        <label>Dirección</label>

                        <textarea
                        name="direccion"
                        class="form-control"
                        rows="3"></textarea>

                    </div>

                    <div class="col-md-12 mb-3">

                        <label>Fotografía</label>

                        <input
                        type="file"
                        name="foto"
                        class="form-control"
                        accept="image/*">

                    </div>

                </div>

                <hr>

                <button
                type="submit"
                name="guardar"
                class="btn btn-success">

                    Guardar

                </button>

                <a
                href="index.php?page=propietarios"
                class="btn btn-secondary">

                    Cancelar

                </a>

            </form>

        </div>

    </div>

</div>