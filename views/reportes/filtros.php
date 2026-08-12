<div class="card mb-3">

<div class="card-header">

<h5>Filtros</h5>

</div>

<div class="card-body">

<form method="GET">

<input type="hidden" name="page" value="reportePagos">

<div class="row">

<div class="col-md-3">

<label>Desde</label>

<input
type="date"
name="desde"
class="form-control">

</div>

<div class="col-md-3">

<label>Hasta</label>

<input
type="date"
name="hasta"
class="form-control">

</div>

<div class="col-md-3">

<label>Estado</label>

<select
name="estado"
class="form-select">

<option value="">Todos</option>

<option>Pagado</option>

<option>Pendiente</option>

<option>Atrasado</option>

</select>

</div>

<div class="col-md-3 d-flex align-items-end">

<button class="btn btn-primary w-100">

Buscar

</button>

</div>

</div>

</form>

</div>

</div>