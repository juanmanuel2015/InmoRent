<?php

require_once "controllers/PagoController.php";

$controller = new PagoController();

$controller->guardar();

$contratos = $controller->contratos();

?>

<div class="container">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>Registrar Pago</h3>

</div>

<div class="card-body">

<form method="POST">

<div class="row">

<div class="col-md-12">

<label>Contrato</label>

<select name="id_contrato" class="form-select">

<?php foreach($contratos as $c): ?>

<option value="<?= $c["id"] ?>">

<?= $c["titulo"] ?> -
<?= $c["inquilino"] ?>

</option>

<?php endforeach; ?>

</select>

</div>

<div class="col-md-4 mt-3">

<label>Mes</label>

<input
type="text"
name="mes"
class="form-control"
placeholder="Ej: Julio 2026">

</div>

<div class="col-md-4 mt-3">

<label>Fecha</label>

<input
type="date"
name="fecha_pago"
class="form-control">

</div>

<div class="col-md-4 mt-3">

<label>Importe</label>

<input
type="number"
step="0.01"
name="importe"
class="form-control">

</div>

<div class="col-md-4 mt-3">

<label>Método</label>

<select
name="metodo_pago"
class="form-select">

<option>Efectivo</option>
<option>Transferencia</option>
<option>Tarjeta</option>

</select>

</div>

<div class="col-md-4 mt-3">

<label>Estado</label>

<select
name="estado"
class="form-select">

<option>Pagado</option>
<option>Pendiente</option>
<option>Atrasado</option>

</select>

</div>

<div class="col-md-12 mt-3">

<label>Observaciones</label>

<textarea
name="observacion"
rows="3"
class="form-control"></textarea>

</div>

</div>

<hr>

<button
class="btn btn-success"
name="guardar">

Guardar Pago

</button>

<a
href="index.php?page=pagos"
class="btn btn-secondary">

Cancelar

</a>

</form>

</div>

</div>

</div>