
<div class="panel panel-default">
	<div class="panel-heading">
		Animales
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Pedigree</th>
						<th>Sexo</th>
						<th>Fecha Nac.</th>
						<th>Caracteristicas</th>
						<th>Observaciones</th>
						<th>Servicio</th>
						<th>Etapa</th>
						<th>Especie</th>
						<th>Lote</th>
						<th>Raza</th>
					</tr>
				</thead>
				<tbody>
					@foreach($animals as $animal)
					<tr>
						<td>{{ $animal->nombre }}</td>
						<td>{{ $animal->pedigree }}</td>
						<td>{{ $animal->sexo }}</td>
						<td>{{ $animal->fecha_nac }}</td>
						<td>{{ $animal->caracteristicas }}</td>
						<td>{{ $animal->observaciones }}</td>
						<td>{{ $animal->servicio }}</td>
						<td>{{ $animal->etapa }}</td>
						<td>{{ $animal->especie }}</td>
						<td>{{ $animal->lote }}</td>
						<td>{{ $animal->raza }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>