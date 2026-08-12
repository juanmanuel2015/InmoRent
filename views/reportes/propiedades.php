<?php

require_once "controllers/ReporteController.php";

$r=new ReporteController();

$datos=$r->propiedades();

?>

<h2>Reporte de Propiedades</h2>

<table class="table table-striped table-bordered">

<thead>

<tr>

<th>ID</th>
<th>Título</th>
<th>Tipo</th>
<th>Propietario</th>
<th>Ciudad</th>
<th>Precio</th>
<th>Estado</th>

</tr>

</thead>

<tbody>

<?php foreach($datos as $d){ ?>

<tr>

<td><?= $d["id"] ?></td>

<td><?= $d["titulo"] ?></td>

<td><?= $d["tipo"] ?></td>

<td><?= $d["propietario"] ?></td>

<td><?= $d["ciudad"] ?></td>

<td>$<?= number_format($d["precio_mensual"],2,",",".") ?></td>

<td><?= $d["estado"] ?></td>

</tr>

<?php } ?>

</tbody>

</table>