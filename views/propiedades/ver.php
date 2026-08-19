<?php

if(!$propiedad){

    echo '<div class="alert alert-danger">
            Propiedad no encontrada.
          </div>';

    exit;
}

?>

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>🏠 Detalle de la Propiedad</h2>

        <a href="index.php?page=dashboard"
           class="btn btn-secondary">

            ← Volver

        </a>

    </div>


    <div class="card shadow">

        <div class="row g-0">


            <!-- FOTO -->

            <div class="col-md-6">

                <?php

                if(!empty($propiedad["foto_principal"])){

                    $foto = "uploads/propiedades/" .
                            $propiedad["foto_principal"];

                }else{

                    $foto = "assets/img/sin-imagen.png";

                }

                ?>

                <a href="<?= $foto ?>" target="_blank">

                    <img
                        src="<?= $foto ?>"
                        class="img-fluid rounded-start"
                        style="width:100%; height:450px; object-fit:cover;"
                        alt="Foto de la propiedad">

                </a>

            </div>


            <!-- DATOS -->

            <div class="col-md-6">

                <div class="card-body">

                    <h2 class="card-title">

                        <?= htmlspecialchars($propiedad["titulo"]) ?>

                    </h2>


                    <hr>


                    <h3 class="text-success mb-4">

                        $<?= number_format(
                            $propiedad["precio_mensual"],
                            0,
                            ",",
                            "."
                        ) ?>

                        <small class="text-muted">
                            / mes
                        </small>

                    </h3>


                    <!-- ESTADO -->

                    <p>

                        <strong>Estado:</strong>

                        <?php

                        switch($propiedad["estado"]){

                            case "Disponible":

                                echo '<span class="badge bg-success">
                                        🟢 Disponible
                                      </span>';

                            break;


                            case "Alquilado":

                                echo '<span class="badge bg-danger">
                                        🔴 Alquilado
                                      </span>';

                            break;


                            case "Venta":

                                echo '<span class="badge bg-warning text-dark">
                                        🟡 En Venta
                                      </span>';

                            break;


                            case "Mantenimiento":

                                echo '<span class="badge bg-secondary">
                                        🔧 Mantenimiento
                                      </span>';

                            break;


                            default:

                                echo '<span class="badge bg-secondary">'
                                    .htmlspecialchars($propiedad["estado"]).
                                    '</span>';

                        }

                        ?>

                    </p>


                    <hr>


                    <h5>📍 Ubicación</h5>

                    <p>

                        <strong>Dirección:</strong>
                        <?= htmlspecialchars($propiedad["direccion"]) ?>

                        <br>

                        <strong>Ciudad:</strong>
                        <?= htmlspecialchars($propiedad["ciudad"]) ?>

                        <br>

                        <strong>Barrio:</strong>
                        <?= htmlspecialchars($propiedad["barrio"]) ?>

                    </p>


                    <hr>


                    <h5>🏠 Características</h5>

                    <div class="row">

                        <div class="col-6">

                            🛏️

                            <strong>
                                <?= $propiedad["habitaciones"] ?>
                            </strong>

                            habitaciones

                        </div>


                        <div class="col-6">

                            🚿

                            <strong>
                                <?= $propiedad["banos"] ?>
                            </strong>

                            baños

                        </div>


                        <div class="col-6 mt-3">

                            🚗

                            <strong>
                                <?= $propiedad["cochera"] ?>
                            </strong>

                            cochera

                        </div>


                        <div class="col-6 mt-3">

                            📐

                            <strong>
                                <?= $propiedad["superficie"] ?>
                            </strong>

                            m²

                        </div>

                    </div>


                    <hr>


                    <h5>📝 Descripción</h5>

                    <p>

                        <?= nl2br(
                            htmlspecialchars(
                                $propiedad["descripcion"]
                            )
                        ) ?>

                    </p>


                    <hr>


  <?php if($_SESSION["rol"] == "Administrador"){ ?>

<a href="index.php?page=propiedades"
   class="btn btn-primary">

    🏠 Ver todas las propiedades

</a>

<?php } ?>


                </div>

            </div>

        </div>

    </div>

</div>