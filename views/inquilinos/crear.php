<?php

require_once "controllers/InquilinoController.php";

$controller = new InquilinoController();

$controller->guardar();

?>

<div class="container">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>Nuevo Inquilino</h3>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="row">

<div class="col-md-6">

<label>Nombre</label>

<input
type="text"
name="nombre"
class="form-control"
required>

</div>

<div class="col-md-6">

<label>Apellido</label>

<input
type="text"
name="apellido"
class="form-control"
required>

</div>

<div class="col-md-6 mt-3">

<label>DNI</label>

<input
type="text"
name="dni"
class="form-control"
required>

</div>

<div class="col-md-6 mt-3">

<label>Teléfono</label>

<input
type="text"
name="telefono"
class="form-control">

</div>

<div class="col-md-6 mt-3">

<label>Correo</label>

<input
type="email"
name="correo"
class="form-control">

</div>

<div class="col-md-6 mt-3">

<label>Trabajo</label>

<input
type="text"
name="trabajo"
class="form-control">

</div>

<div class="col-md-6 mt-3">

<label>Ingresos</label>

<input
type="number"
step="0.01"
name="ingresos"
class="form-control">

</div>

<div class="col-md-6 mt-3">

<label>Estado</label>

<select
name="estado"
class="form-select">

<option>Activo</option>

<option>Inactivo</option>

</select>

</div>

<div class="col-md-12 mt-3">

<label>Fotografía</label>

<input
type="file"
name="foto"
class="form-control">

</div>

</div>

<hr>

<button
class="btn btn-success"
name="guardar">

Guardar

</button>

<a
href="index.php?page=inquilinos"
class="btn btn-secondary">

Cancelar

</a>

</form>

</div>

</div>

</div>