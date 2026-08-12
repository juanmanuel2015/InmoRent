<?php

require_once "controllers/PropietarioController.php";

$controller = new PropietarioController();

$controller->actualizar();

if(!isset($_GET["id"])){

    header("Location:index.php?page=propietarios");
    exit;

}

$propietario = $controller->editar($_GET["id"]);

?>

<div class="container">

<div class="card shadow">

<div class="card-header bg-warning">

<h3>Editar Propietario</h3>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<input
type="hidden"
name="id"
value="<?= $propietario["id"] ?>">

<input
type="hidden"
name="foto_actual"
value="<?= $propietario["foto"] ?>">

<div class="row">

<div class="col-md-6 mb-3">

<label>Nombre</label>

<input
type="text"
name="nombre"
class="form-control"
value="<?= $propietario["nombre"] ?>"
required>

</div>

<div class="col-md-6 mb-3">

<label>Apellido</label>

<input
type="text"
name="apellido"
class="form-control"
value="<?= $propietario["apellido"] ?>"
required>

</div>

<div class="col-md-6 mb-3">

<label>DNI</label>

<input
type="text"
name="dni"
class="form-control"
value="<?= $propietario["dni"] ?>"
required>

</div>

<div class="col-md-6 mb-3">

<label>Teléfono</label>

<input
type="text"
name="telefono"
class="form-control"
value="<?= $propietario["telefono"] ?>">

</div>

<div class="col-md-6 mb-3">

<label>Correo</label>

<input
type="email"
name="correo"
class="form-control"
value="<?= $propietario["correo"] ?>">

</div>

<div class="col-md-6 mb-3">

<label>Estado</label>

<select
name="estado"
class="form-select">

<option
value="Activo"
<?= $propietario["estado"]=="Activo"?"selected":"" ?>>
Activo
</option>

<option
value="Inactivo"
<?= $propietario["estado"]=="Inactivo"?"selected":"" ?>>
Inactivo
</option>

</select>

</div>

<div class="col-md-12 mb-3">

<label>Dirección</label>

<textarea
name="direccion"
class="form-control"
rows="3"><?= $propietario["direccion"] ?></textarea>

</div>

<div class="col-md-6">

<label>Foto actual</label><br>

<?php

if($propietario["foto"]!=""){

?>

<img
src="uploads/propietarios/<?= $propietario["foto"] ?>"
width="180"
class="img-thumbnail">

<?php

}else{

echo "No tiene fotografía.";

}

?>

</div>

<div class="col-md-6">

<label>Nueva fotografía</label>

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
href="index.php?page=propietarios"
class="btn btn-secondary">

Cancelar

</a>

</form>

</div>

</div>

</div>