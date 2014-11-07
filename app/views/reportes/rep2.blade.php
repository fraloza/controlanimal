
<div class="panel panel-default">
	<div class="panel-heading">
		Producciones
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th>Descripcion</th>
						<th>Cantidad</th>
						<th>Animal</th>
						<th>Etapa</th>
						<th>Lote</th>
						<th>Parcela</th>
					</tr>
				</thead>
				<tbody>
					@foreach($prods as $prod)
					<tr>
						<td>{{ $prod->descripcion }}</td>
						<td>{{ $prod->cantidad }}</td>
						<td>{{ $prod->nombre }}</td>
						<td>{{ $prod->etapa }}</td>
						<td>{{ $prod->lote }}</td>
						<td>{{ $prod->parcela }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>