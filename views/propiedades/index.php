<?php

require_once "controllers/PropiedadController.php";

$controller = new PropiedadController();

if(isset($_GET["eliminar"])){

    $controller->eliminar($_GET["eliminar"]);

}

$propiedades = $controller->index();

?>

<div class="container-fluid">

<div class="d-flex justify-content-between mb-3">

<h2>Propiedades</h2>

<a href="index.php?page=crearPropiedad"
class="btn btn-success">

<i class="bi bi-house-add"></i>

Nueva Propiedad

</a>

</div>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Foto</th>
<th>Título</th>
<th>Propietario</th>
<th>Tipo</th>
<th>Ciudad</th>
<th>Precio</th>
<th>Estado</th>
<th>Acciones</th>

</tr>

</thead>

<tbody>

<?php foreach($propiedades as $p): ?>

<tr>

<td><?= $p["id"] ?></td>

<td>

<?php

if($p["foto_principal"]!=""){

?>

<img src="uploads/propiedades/<?= $p["foto_principal"] ?>"

width="100"

class="img-thumbnail">

<?php } ?>

</td>

<td><?= $p["titulo"] ?></td>

<td><?= $p["propietario"] ?></td>

<td><?= $p["tipo"] ?></td>

<td><?= $p["ciudad"] ?></td>

<td>$<?= number_format($p["precio_mensual"],2,",",".") ?></td>

<td>

<?php

switch($p["estado"]){

case "Disponible":

echo "<span class='badge bg-success'>Disponible</span>";

break;

case "Alquilado":

echo "<span class='badge bg-danger'>Alquilado</span>";

break;

default:

echo "<span class='badge bg-warning text-dark'>Mantenimiento</span>";

}

?>

</td>

<td>

<a

href="index.php?page=editarPropiedad&id=<?= $p["id"] ?>"

class="btn btn-warning btn-sm">

Editar

</a>

<a

onclick="return confirm('¿Eliminar propiedad?')"

href="index.php?page=propiedades&eliminar=<?= $p["id"] ?>"

class="btn btn-danger btn-sm">

Eliminar

</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

<td>

<?php if(!empty($p["foto_principal"])){ ?>

<a href="uploads/propiedades/<?= htmlspecialchars($p["foto_principal"]) ?>" target="_blank">

<img
src="uploads/propiedades/<?= htmlspecialchars($p["foto_principal"]) ?>"
class="img-thumbnail"
style="width:140px;height:100px;object-fit:cover;cursor:pointer;">

</a>

<?php }else{ ?>

<img
src="assets/img/sin-imagen.png"
class="img-thumbnail"
style="width:140px;height:100px;object-fit:cover;">

<?php } ?>

</td>

