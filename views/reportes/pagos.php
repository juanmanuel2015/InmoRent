<?php

require_once "controllers/ReporteController.php";

$r=new ReporteController();

$datos=$r->pagos();

?>

<h2>Reporte de Pagos</h2>

<table class="table table-bordered">

<thead>

<tr>

<th>ID</th>
<th>Propiedad</th>
<th>Inquilino</th>
<th>Mes</th>
<th>Fecha</th>
<th>Importe</th>
<th>Estado</th>

</tr>

</thead>

<tbody>

<?php foreach($datos as $p){ ?>

<tr>

<td><?= $p["id"] ?></td>

<td><?= $p["titulo"] ?></td>

<td><?= $p["inquilino"] ?></td>

<td><?= $p["mes"] ?></td>

<td><?= $p["fecha_pago"] ?></td>

<td>$<?= number_format($p["importe"],2,",",".") ?></td>

<td><?= $p["estado"] ?></td>

</tr>

<?php } ?>

</tbody>

</table>