<?php

require_once "controllers/InquilinoController.php";

$controller = new InquilinoController();

$controller->actualizar();

$inquilino = $controller->editar($_GET["id"]);

?>

<div class="container">

<div class="card shadow">

<div class="card-header bg-warning">

<h3>Editar Inquilino</h3>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?= $inquilino["id"] ?>">

<input type="hidden" name="foto_actual" value="<?= $inquilino["foto"] ?>">

<div class="row">

<div class="col-md-6">

<label>Nombre</label>

<input
type="text"
name="nombre"
value="<?= $inquilino["nombre"] ?>"
class="form-control">

</div>

<div class="col-md-6">

<label>Apellido</label>

<input
type="text"
name="apellido"
value="<?= $inquilino["apellido"] ?>"
class="form-control">

</div>

<div class="col-md-6 mt-3">

<label>DNI</label>

<input
type="text"
name="dni"
value="<?= $inquilino["dni"] ?>"
class="form-control">

</div>

<div class="col-md-6 mt-3">

<label>Teléfono</label>

<input
type="text"
name="telefono"
value="<?= $inquilino["telefono"] ?>"
class="form-control">

</div>

<div class="col-md-6 mt-3">

<label>Correo</label>

<input
type="email"
name="correo"
value="<?= $inquilino["correo"] ?>"
class="form-control">

</div>

<div class="col-md-6 mt-3">

<label>Trabajo</label>

<input
type="text"
name="trabajo"
value="<?= $inquilino["trabajo"] ?>"
class="form-control">

</div>

<div class="col-md-6 mt-3">

<label>Ingresos</label>

<input
type="number"
step="0.01"
name="ingresos"
value="<?= $inquilino["ingresos"] ?>"
class="form-control">

</div>

<div class="col-md-6 mt-3">

<label>Estado</label>

<select name="estado" class="form-select">

<option value="Activo" <?= $inquilino["estado"]=="Activo"?"selected":"" ?>>Activo</option>

<option value="Inactivo" <?= $inquilino["estado"]=="Inactivo"?"selected":"" ?>>Inactivo</option>

</select>

</div>

<div class="col-md-6 mt-3">

<?php if($inquilino["foto"]!=""){ ?>

<img src="uploads/inquilinos/<?= $inquilino["foto"] ?>" width="180" class="img-thumbnail">

<?php } ?>

</div>

<div class="col-md-6 mt-3">

<label>Nueva Foto</label>

<input
type="file"
name="foto"
class="form-control">

</div>

</div>

<hr>

<button
class="btn btn-warning"
name="actualizar">

Actualizar

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