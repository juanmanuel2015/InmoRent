<?php

require_once "controllers/PropiedadController.php";

$control = new PropiedadController();
$propiedades = $control->dashboard();

?>

<h2>🏠 Dashboard</h2>

<hr>

<div class="alert alert-info">

Bienvenido
<strong><?= $_SESSION["usuario"] ?></strong>

|

Rol:
<strong><?= $_SESSION["rol"] ?></strong>

</div>

<h3 class="mb-4">Últimas Propiedades</h3>

<div class="row">

<?php foreach($propiedades as $p){ ?>

<div class="col-md-4 mb-4">

<div class="card shadow h-100">

<a href="uploads/propiedades/<?= htmlspecialchars($p["foto_principal"]) ?>" target="_blank">

<img
src="uploads/propiedades/<?= htmlspecialchars($p["foto_principal"]) ?>"
style="height:220px;object-fit:cover;"
alt="<?= htmlspecialchars($p["titulo"]) ?>">

</a>

<div class="card-body">

<h5><?= htmlspecialchars($p["titulo"]) ?></h5>

<p class="text-muted">
<?= htmlspecialchars($p["ciudad"]) ?>
</p>

<h4 class="text-success">

$<?= number_format($p["precio_mensual"],0,",",".") ?>

</h4>

<?php

switch($p["estado"]){

case "Disponible":
echo '<span class="badge bg-success">🟢 Disponible</span>';
break;

case "Alquilado":
echo '<span class="badge bg-danger">🔴 Alquilado</span>';
break;

case "Venta":
echo '<span class="badge bg-warning text-dark">🟡 En Venta</span>';
break;

default:
echo '<span class="badge bg-secondary">'.$p["estado"].'</span>';

}

?>

<hr>

<p>

🛏 <?= $p["habitaciones"] ?> habitaciones<br>

🚿 <?= $p["banos"] ?> baños

</p>

<a
href="index.php?page=verPropiedad&id=<?= $p["id"] ?>"
class="btn btn-primary w-100">

👁️ Ver Propiedad

</a>

</div>

</div>

</div>

<?php } ?>

</div>