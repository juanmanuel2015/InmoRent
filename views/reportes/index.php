<?php

require_once "controllers/ReporteController.php";

$reporte=new ReporteController();

$d=$reporte->dashboard();

?>

<div class="container-fluid">

<h2>Dashboard</h2>

<hr>

<div class="row">

<div class="col-md-3">

<div class="card bg-primary text-white">

<div class="card-body">

<h5>Propietarios</h5>

<h1><?= $d["propietarios"] ?></h1>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card bg-success text-white">

<div class="card-body">

<h5>Inquilinos</h5>

<h1><?= $d["inquilinos"] ?></h1>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card bg-warning">

<div class="card-body">

<h5>Propiedades</h5>

<h1><?= $d["propiedades"] ?></h1>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card bg-danger text-white">

<div class="card-body">

<h5>Contratos</h5>

<h1><?= $d["contratos"] ?></h1>

</div>

</div>

</div>

</div>

<hr>

<div class="row">

<div class="col-md-6">

<div class="alert alert-success">

<b>Disponibles:</b>

<?= $d["disponibles"] ?>

</div>

</div>

<div class="col-md-6">

<div class="alert alert-danger">

<b>Alquiladas:</b>

<?= $d["alquiladas"] ?>

</div>

</div>

</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<canvas id="grafico"></canvas>

<script>

new Chart(document.getElementById("grafico"),{

type:"bar",

data:{

labels:["Ene","Feb","Mar","Abr","May","Jun"],

datasets:[{

label:"Ingresos",

data:[120000,98000,140000,180000,210000,250000]

}]

}

});

</script>