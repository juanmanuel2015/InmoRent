<h2 class="text-center">Crear Cuenta</h2>

<form method="POST" action="index.php?page=guardarRegistro">

    <div class="mb-3">
        <label>Nombre completo</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Usuario</label>
        <input type="text" name="usuario" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Correo</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Contraseña</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button class="btn btn-success w-100">
        Crear Cuenta
    </button>

</form>