<?php

require_once "controllers/PropiedadController.php";

$controller = new PropiedadController();

$controller->guardar();

$propietarios = $controller->propietarios();

$tipos = $controller->tipos();

?>

<div class="container">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>Nueva Propiedad</h3>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="row">

<div class="col-md-6">

<label>Propietario</label>

<select name="id_propietario" class="form-select">

<?php foreach($propietarios as $p){ ?>

<option value="<?= $p["id"] ?>">

<?= $p["apellido"].", ".$p["nombre"] ?>

</option>

<?php } ?>

</select>

</div>

<div class="col-md-6">

<label>Tipo</label>

<select name="id_tipo" class="form-select">

<?php foreach($tipos as $t){ ?>

<option value="<?= $t["id"] ?>">

<?= $t["nombre"] ?>

</option>

<?php } ?>

</select>

</div>

<div class="col-md-12 mt-3">

<label>Título</label>

<input type="text"

name="titulo"

class="form-control"

required>

</div>

<div class="col-md-12 mt-3">

<label>Descripción</label>

<textarea

name="descripcion"

class="form-control"

rows="4">

</textarea>

</div>

<div class="col-md-6 mt-3">

<label>Dirección</label>

<input

type="text"

name="direccion"

class="form-control">

</div>

<div class="col-md-6 mt-3">

<label>Ciudad</label>

<input

type="text"

name="ciudad"

class="form-control">

</div>

<div class="col-md-4 mt-3">

<label>Barrio</label>

<input

type="text"

name="barrio"

class="form-control">

</div>

<div class="col-md-2 mt-3">

<label>Habitaciones</label>

<input

type="number"

name="habitaciones"

class="form-control">

</div>

<div class="col-md-2 mt-3">

<label>Baños</label>

<input

type="number"

name="banos"

class="form-control">

</div>

<div class="col-md-2 mt-3">

<label>Cochera</label>

<select

name="cochera"

class="form-select">

<option>Si</option>

<option>No</option>

</select>

</div>

<div class="col-md-2 mt-3">

<label>Superficie</label>

<input

type="number"

step="0.01"

name="superficie"

class="form-control">

</div>

<div class="col-md-4 mt-3">

<label>Precio mensual</label>

<input

type="number"

step="0.01"

name="precio"

class="form-control">

</div>

<div class="col-md-4 mt-3">

<label>Estado</label>

<select

name="estado"

class="form-select">

<option>Disponible</option>

<option>Alquilado</option>

<option>Mantenimiento</option>

</select>

</div>

<div class="col-md-4 mt-3">

<label>Foto principal</label>

<input

type="file"

name="foto"

class="form-control">

</div>

</div>

<hr>

<button class="btn btn-success"

name="guardar">

Guardar

</button>

<a href="index.php?page=propiedades"

class="btn btn-secondary">

Cancelar

</a>

</form>

</div>

</div>

</div>