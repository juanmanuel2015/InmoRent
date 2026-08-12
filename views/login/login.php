
<!DOCTYPE html>


<html>

<head>

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/style.css">

<link rel="stylesheet" href="assets/css/login.css">

</head>

<body class="login">

<div class="container">

<div class="row justify-content-center">

<div class="col-md-4">

<div class="card mt-5 shadow">

<div class="card-header text-center">

    <img src="assets/img/logo.png"
         alt="InmoRent"
         style="width:220px; height:auto;">

</div>

<div class="card-body">

<form method="POST">

<input
class="form-control mb-3"
type="text"
name="usuario"
placeholder="Usuario"
required>

<input
class="form-control mb-3"
type="password"
name="password"
placeholder="Contraseña"
required>

<button
class="btn btn-primary w-100"
name="login">

Ingresar

</button>

</form>

<?php

require_once "controllers/LoginController.php";

$login=new LoginController();

$login->ingresar();

?>

</div>

</div>

</div>

</div>

</div>

</body>

</html>

<hr>

<div class="text-center">

¿No tienes una cuenta?

<br><br>

<a href="index.php?page=registro"

class="btn btn-success">

Crear Cuenta

</a>

</div>

