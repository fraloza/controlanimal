
<div class="panel panel-default">
	<div class="panel-heading">
		Animales por parir
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-2">
				Seleccione fecha
			</div>
			<div class="col-md-3">
				De:
				<input type="text" id="date" class="form-control" />
			</div>
			<div class="col-md-3">
				A:
				<input type="text" id="date2" class="form-control" />
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
						<th>Descripcion</th>
						<th>Animal</th>
						<th>Lote</th>
						<th>Fecha</th>
						<th>Dias restantes</th>
					</tr>
				</thead>
				<tbody id="tbody">
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
    $('#date,#date2').datepicker( {
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
    });
	function buscar()
	{
		$(".table-responsive").removeClass('hide');
		var tbody = $("#tbody");
		$.ajax({
	        type: 'GET',
	        url: 'reporte_animales_parir/getFecha',
	        data: 'fecha1='+$("#date").val()+"&fecha2="+$("#date2").val(),
	        beforeSend: function() {
	            tbody.html(cargando);
	        },
	        success: function(data) {
	            var cadena = '';
	            for(var i=0; i<data.length; i++){
	                cadena += '<tr>';
	                cadena += '<td>'+data[i].descripcion+'</td>';
	                cadena += '<td>'+data[i].nombre+'</td>';
	                cadena += '<td>'+data[i].lote+'</td>';
	                cadena += '<td>'+data[i].fecha+'</td>';
	                cadena += '<td>'+data[i].expire_days+'</td>';
	                cadena += '</tr>';
	            }
	            tbody.empty().html(cadena);
	        }
	    })
	}
</script>