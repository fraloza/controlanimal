
<div class="panel panel-default">
	<div class="panel-heading">
		Nacimientos
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-2">
				Seleccione fecha
			</div>
			<div class="col-md-3">
				<input type="date" id="date" class="form-control" />
			</div>
			<div class="col-md-1">
				<button type="button" class="btn btn-default" onclick="buscar()">Buscar</button>
			</div>
		</div>
		<br/>
		<div class="table-responsive hide">
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Pedigree</th>
						<th>Sexo</th>
						<th>Fecha Nac.</th>
						<th>Caracteristicas</th>
						<th>Observaciones</th>
						<th>Padre</th>
						<th>Madre</th>
					</tr>
				</thead>
				<tbody id="tbody">
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	function buscar()
	{
		$(".table-responsive").removeClass('hide');
		var tbody = $("#tbody");
		$.ajax({
	        type: 'GET',
	        url: 'reporte_nacimientos_fecha/getFecha',
	        data: 'fecha='+$("#date").val(),
	        beforeSend: function() {
	            tbody.html(cargando);
	        },
	        success: function(data) {
	            var cadena = '';
	            for(var i=0; i<data.length; i++){
	                cadena += '<tr>';
	                cadena += '<td>'+data[i].nombre+'</td>';
	                cadena += '<td>'+data[i].pedigree+'</td>';
	                cadena += '<td>'+data[i].sexo+'</td>';
	                cadena += '<td>'+data[i].fecha_nac+'</td>';
	                cadena += '<td>'+data[i].caracteristicas+'</td>';
	                cadena += '<td>'+data[i].observaciones+'</td>';
	                cadena += '<td>'+data[i].padre+'</td>';
	                cadena += '<td>'+data[i].madre+'</td>';
	                cadena += '</tr>';
	            }
	            tbody.empty().html(cadena);
	        }
	    })
	}
</script>