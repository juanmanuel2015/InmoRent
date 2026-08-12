<?php

require_once "controllers/ReporteController.php";

$r=new ReporteController();

$datos=$r->contratos();

?>

<h2>Reporte de Contratos</h2>

<table class="table table-bordered table-hover">

<thead>

<tr>

<th>ID</th>
<th>Propiedad</th>
<th>Inquilino</th>
<th>Inicio</th>
<th>Fin</th>
<th>Precio</th>
<th>Estado</th>

</tr>

</thead>

<tbody>

<?php foreach($datos as $c){ ?>

<tr>

<td><?= $c["id"] ?></td>

<td><?= $c["titulo"] ?></td>

<td><?= $c["inquilino"] ?></td>

<td><?= $c["fecha_inicio"] ?></td>

<td><?= $c["fecha_fin"] ?></td>

<td>$<?= number_format($c["precio_mensual"],2,",",".") ?></td>

<td><?= $c["estado"] ?></td>

</tr>

<?php } ?>

</tbody>

</table>