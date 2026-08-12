<?php

require_once "controllers/ContratoController.php";

$controller=new ContratoController();

$controller->guardar();

$propiedades=$controller->propiedades();

$inquilinos=$controller->inquilinos();

?>

<div class="container">

<div class="card">

<div class="card-header bg-primary text-white">

<h3>Nuevo Contrato</h3>

</div>

<div class="card-body">

<form method="POST">

<div class="row">

<div class="col-md-6">

<label>Propiedad</label>

<select name="id_propiedad" class="form-select">

<?php foreach($propiedades as $p){ ?>

<option value="<?= $p["id"] ?>">

<?= $p["titulo"] ?>

</option>

<?php } ?>

</select>

</div>

<div class="col-md-6">

<label>Inquilino</label>

<select name="id_inquilino" class="form-select">

<?php foreach($inquilinos as $i){ ?>

<option value="<?= $i["id"] ?>">

<?= $i["apellido"].", ".$i["nombre"] ?>

</option>

<?php } ?>

</select>

</div>

<div class="col-md-4 mt-3">

<label>Fecha Inicio</label>

<input
type="date"
name="fecha_inicio"
class="form-control">

</div>

<div class="col-md-4 mt-3">

<label>Fecha Fin</label>

<input
type="date"
name="fecha_fin"
class="form-control">

</div>

<div class="col-md-4 mt-3">

<label>Precio</label>

<input
type="number"
step="0.01"
name="precio"
class="form-control">

</div>

<div class="col-md-4 mt-3">

<label>Depósito</label>

<input
type="number"
step="0.01"
name="deposito"
class="form-control">

</div>

<div class="col-md-8 mt-3">

<label>Garantía</label>

<input
type="text"
name="garantia"
class="form-control">

</div>

<div class="col-md-4 mt-3">

<label>Estado</label>

<select
name="estado"
class="form-select">

<option>Activo</option>

<option>Finalizado</option>

<option>Cancelado</option>

</select>

</div>

</div>

<hr>

<button
class="btn btn-success"
name="guardar">

Guardar

</button>

<a
href="index.php?page=contratos"

class="btn btn-secondary">

Cancelar

</a>

</form>

</div>

</div>

</div>


<a href="controllers/PDFContrato.php?id=<?=$c['id']?>"
class="btn btn-danger"
target="_blank">

PDF

</a>