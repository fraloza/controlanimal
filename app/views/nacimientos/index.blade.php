
<div class="panel panel-default">
	<div class="panel-heading">
		Lista de Animales
		<a href="#modal-form" role="button" data-toggle="modal" onclick="nuevo()" class="btn btn-default pull-right btn-add">
			<i class="fa fa-plus"></i>
			Agregar
		</a>
	</div>
	<div class="panel-body">
		<div class="table-responsive"></div>
	</div>
</div>

<!-- Modal -->
<div id="modal-form" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 id="myModalLabel" class="blue bigger"></h4>
		    </div>
		    <div class="modal-body text-justify overflow-visible" style="max-height: 400px; overflow-y: auto">
				<div id="bodymodal">
				    <form class="form-horizontal" id='formulario'>
						<div class="form-group has-info">
				    		<label for="nombre" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Nombre
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<span class="block input-icon input-icon-right">
									<input type="hidden" id="id_main" name="id" />
									<input type="text" id="nombre" name="nombre" class="form-control"  />
								</span>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="pedigree" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Pedigree
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<span class="block input-icon input-icon-right">
									<input type="text" id="pedigree" name="pedigree" class="form-control"  />
								</span>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="sexo" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Sexo
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<span class="block input-icon input-icon-right">
									<input type="text" id="sexo" name="sexo" class="form-control"  />
								</span>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="fecha_nac" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Fecha Nacimiento
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<span class="block input-icon input-icon-right">
									<input type="date" id="fecha_nac" name="fecha_nac" class="form-control"  />
								</span>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="servicio" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Servicio
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<select id="servicio" name="servicio" class="form-control"></select>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="npadre" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Padre
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<select id="npadre" name="npadre" class="form-control"></select>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="nmadre" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Madre
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<select id="nmadre" name="nmadre" class="form-control"></select>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="caracteristicas" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Caracteristicas
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<textarea id="caracteristicas" name="caracteristicas" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="observaciones" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Observaciones
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<textarea id="observaciones" name="observaciones" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="categoria" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Etapa
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<select id="categoria" name="categoria" class="form-control"></select>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="especie" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Especie
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<select id="especie" name="especie" class="form-control"></select>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="lote" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Lote
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<select id="lote" name="lote" class="form-control"></select>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="estado" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Estado
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<select id="estado" name="estado" class="form-control"></select>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="raza" class="col-xs-12 col-sm-4 control-label no-padding-right">
				    			Raza
				    		</label>
				    		<div class="col-xs-12 col-sm-7">
								<select id="raza" name="raza" class="form-control"></select>
							</div>
						</div>
				    </form>
				</div>
		    </div>
		    <div class="modal-footer">
				<div class="btn-footer">
				    <button class="btn btn-primary" onclick="validar('nacimientos')" id="btn-save">
				    	<i class='icon-ok'></i>
				    	Guardar
				    </button>
				    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
				    	<i class='icon-undo'></i>
				    	Cancelar
				    </button>
				</div>
				<div class="load-footer">
				    <img src="./assets/img/loading.gif" />
				    Guardando...
				</div>
		    </div>
		</div>
	</div>
</div>
<script type="text/javascript">

	$('.load-footer').hide();
    var url = 'nacimientos';
    var grid_table = $(".table-responsive");
    var col_names = ['Item', 'Nombre', 'Pedigree', 'Fecha Nacimiento', ''];
    var accion = ['edit','delete'];
    loadTable('GET', url+'/getNacimiento', url, grid_table, col_names, accion);
    
    var servicio = $("#servicio");
    $.ajax({
        type: 'GET',
        url: url+'/getServicio',
        beforeSend: function() {
            servicio.html(cargando);
        },
        success: function(data) {
            var cadena = '<option value="">Seleccione...</option>';
            for(var i=0; i<data.length; i++)
                cadena += '<option value="' + data[i].id + '">' + data[i].descripcion + '</option>';
            servicio.empty().html(cadena);
        }
    });

    var padre = $("#npadre");
    var madre = $("#nmadre");
    $.ajax({
        type: 'GET',
        url: url+'/getPadreMadre',
        beforeSend: function() {
            padre.html(cargando);
            madre.html(cargando);
        },
        success: function(data) {
            var cadena = '<option value="">Seleccione...</option>';
            for(var i=0; i<data.length; i++)
                cadena += '<option value="' + data[i].id + '">' + data[i].descripcion + '</option>';
            padre.empty().html(cadena);
            madre.empty().html(cadena);
        }
    });

    var select1 = $("#categoria");
    $.ajax({
        type: 'GET',
        url: url+'/getCategoria',
        beforeSend: function() {
            select1.html(cargando);
        },
        success: function(data) {
            var cadena = '<option value="">Seleccione...</option>';
            for(var i=0; i<data.length; i++)
                cadena += '<option value="' + data[i].id + '">' + data[i].descripcion + '</option>';
            select1.empty().html(cadena);
        }
    });

    var select2 = $("#especie");
    $.ajax({
        type: 'GET',
        url: url+'/getEspecie',
        beforeSend: function() {
            select2.html(cargando);
        },
        success: function(data) {
            var cadena = '<option value="">Seleccione...</option>';
            for(var i=0; i<data.length; i++)
                cadena += '<option value="' + data[i].id + '">' + data[i].descripcion + '</option>';
            select2.empty().html(cadena);
        }
    });

    var select4 = $("#lote");
    $.ajax({
        type: 'GET',
        url: url+'/getLote',
        beforeSend: function() {
            select4.html(cargando);
        },
        success: function(data) {
            var cadena = '<option value="">Seleccione...</option>';
            for(var i=0; i<data.length; i++)
                cadena += '<option value="' + data[i].id + '">' + data[i].descripcion + '</option>';
            select4.empty().html(cadena);
        }
    });

    var select5 = $("#estado");
    $.ajax({
        type: 'GET',
        url: url+'/getEstado',
        beforeSend: function() {
            select5.html(cargando);
        },
        success: function(data) {
            var cadena = '<option value="">Seleccione...</option>';
            for(var i=0; i<data.length; i++)
                cadena += '<option value="' + data[i].id + '">' + data[i].descripcion + '</option>';
            select5.empty().html(cadena);
        }
    });

    var select6 = $("#raza");
    $.ajax({
        type: 'GET',
        url: url+'/getRaza',
        beforeSend: function() {
            select6.html(cargando);
        },
        success: function(data) {
            var cadena = '<option value="">Seleccione...</option>';
            for(var i=0; i<data.length; i++)
                cadena += '<option value="' + data[i].id + '">' + data[i].descripcion + '</option>';
            select6.empty().html(cadena);
        }
    });

    var validar = function(url)
    {
    	bval = true;   
        bval = bval && $("#nombre").required();
        bval = bval && $("#pedigree").required();
        bval = bval && $("#sexo").required();
        bval = bval && $("#fecha_nac").required();
        
        if (bval) 
        {
    		guardar(url);
        }
        return false;
    }

    var llenar_datos = function(data)
    {
    	$("#id_main").val(data[0].id);
    	$("#nombre").val(data[0].nombre);
    	$("#pedigree").val(data[0].pedigree);
    	$("#sexo").val(data[0].sexo);
    	$("#fecha_nac").val(data[0].fecha_nac);
    	$("#servicio").val(data[0].idservicio);
    	$("#npadre").val(data[0].npadre);
    	$("#nmadre").val(data[0].nmadre);
    	$("#caracteristicas").val(data[0].caracteristicas);
    	$("#observaciones").val(data[0].observaciones);
    	$("#categoria").val(data[0].idcategoria);
    	$("#especie").val(data[0].idespecie);
    	$("#lote").val(data[0].idlote);
    	$("#estado").val(data[0].idestado);
    	$("#raza").val(data[0].idraza);
    }

	var limpiar = function()
	{
	    $('#id_main, #nombre, #pedigree, #sexo, #fecha_nac, #servicio, #npadre, #nmadre, #caracteristicas, #observaciones, #categoria, #especie, #lote, #estado, #raza').val('');
	}
</script>