<?php

require_once "controllers/InquilinoController.php";

$controller = new InquilinoController();

if(isset($_GET["eliminar"])){
    $controller->eliminar($_GET["eliminar"]);
}

$inquilinos = $controller->index();

?>

<div class="container-fluid">

<div class="d-flex justify-content-between mb-3">

<h2>Inquilinos</h2>

<a href="index.php?page=crearInquilino"
class="btn btn-success">

<i class="bi bi-plus-circle"></i>

Nuevo Inquilino

</a>

</div>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Foto</th>
<th>Nombre</th>
<th>Apellido</th>
<th>DNI</th>
<th>Trabajo</th>
<th>Ingresos</th>
<th>Estado</th>
<th>Acciones</th>

</tr>

</thead>

<tbody>

<?php foreach($inquilinos as $i): ?>

<tr>

<td><?= $i["id"] ?></td>

<td>

<?php if($i["foto"]!=""){ ?>

<img src="uploads/inquilinos/<?= $i["foto"] ?>"
width="70"
class="img-thumbnail">

<?php } ?>

</td>

<td><?= $i["nombre"] ?></td>

<td><?= $i["apellido"] ?></td>

<td><?= $i["dni"] ?></td>

<td><?= $i["trabajo"] ?></td>

<td>$<?= number_format($i["ingresos"],2,",",".") ?></td>

<td>

<?php

if($i["estado"]=="Activo"){

echo "<span class='badge bg-success'>Activo</span>";

}else{

echo "<span class='badge bg-danger'>Inactivo</span>";

}

?>

</td>

<td>

<a
href="index.php?page=editarInquilino&id=<?= $i["id"] ?>"
class="btn btn-warning btn-sm">

Editar

</a>

<a

onclick="return confirm('¿Eliminar registro?')"

href="index.php?page=inquilinos&eliminar=<?= $i["id"] ?>"

class="btn btn-danger btn-sm">

Eliminar

</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

<td class="text-center">

<?php if(!empty($i["foto"])){ ?>

<a href="uploads/inquilinos/<?= htmlspecialchars($i["foto"]) ?>" target="_blank">

<img
src="uploads/inquilinos/<?= htmlspecialchars($i["foto"]) ?>"
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

<div class="modal fade" id="modalFoto" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Vista de la imagen</h5>

                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">

                <img id="imagenGrande"
                     src=""
                     class="img-fluid rounded">

            </div>

        </div>
    </div>
</div>

<img
src="uploads/propiedades/<?= htmlspecialchars($p["foto_principal"]) ?>"
class="img-thumbnail"
style="width:140px;height:100px;object-fit:cover;cursor:pointer;"
onclick="verFoto(this.src)">

function verFoto(ruta){

    document.getElementById("imagenGrande").src = ruta;

    let modal = new bootstrap.Modal(document.getElementById("modalFoto"));

    modal.show();

}