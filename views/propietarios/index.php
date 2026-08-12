<?php

require_once "controllers/PropietarioController.php";

$controller = new PropietarioController();

// Eliminar
if (isset($_GET["eliminar"])) {
    $controller->eliminar($_GET["eliminar"]);
}

$propietarios = $controller->index();

?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Propietarios</h2>

        <a href="index.php?page=crearPropietario"
           class="btn btn-success">
            + Nuevo Propietario
        </a>

    </div>

    <table class="table table-bordered table-hover table-striped">

        <thead class="table-dark">

            <tr>

                <th>ID</th>

                <th>Foto</th>

                <th>Nombre</th>

                <th>Apellido</th>

                <th>DNI</th>

                <th>Teléfono</th>

                <th>Correo</th>

                <th>Estado</th>

                <th width="180">Acciones</th>

            </tr>

        </thead>

        <tbody>

        <?php foreach($propietarios as $p): ?>

            <tr>

                <td><?= $p["id"] ?></td>

                <td>

                <?php

                if($p["foto"]!=""){

                    ?>

                    <img
                    src="uploads/propietarios/<?= $p["foto"] ?>"
                    width="70"
                    class="img-thumbnail">

                    <?php

                }else{

                    echo "Sin foto";

                }

                ?>

                </td>

                <td><?= $p["nombre"] ?></td>

                <td><?= $p["apellido"] ?></td>

                <td><?= $p["dni"] ?></td>

                <td><?= $p["telefono"] ?></td>

                <td><?= $p["correo"] ?></td>

                <td>

                    <?php

                    if($p["estado"]=="Activo"){

                        echo "<span class='badge bg-success'>Activo</span>";

                    }else{

                        echo "<span class='badge bg-danger'>Inactivo</span>";

                    }

                    ?>

                </td>

                <td>

                    <a
                    href="index.php?page=editarPropietario&id=<?= $p["id"] ?>"
                    class="btn btn-warning btn-sm">

                        Editar

                    </a>

                    <a

                    onclick="return confirm('¿Eliminar propietario?')"

                    href="index.php?page=propietarios&eliminar=<?= $p["id"] ?>"

                    class="btn btn-danger btn-sm">

                        Eliminar

                    </a>

                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>




<th>Foto</th>

<td class="text-center">

<?php if(!empty($p["foto"])){ ?>

<a href="uploads/propietarios/<?= htmlspecialchars($p["foto"]) ?>" target="_blank">

<img
src="uploads/propietarios/<?= htmlspecialchars($p["foto"]) ?>"
class="rounded border"
style="width:80px;height:80px;object-fit:cover;cursor:pointer;">

</a>

<?php }else{ ?>

<img
src="assets/img/sin-foto.png"
class="rounded border"
style="width:80px;height:80px;object-fit:cover;">

<?php } ?>

</td>