
<div class="panel panel-default">
	<div class="panel-heading">
		Lista de Enfermedades
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
		    <div class="modal-body text-justify overflow-visible">
				<div id="bodymodal">
				    <form class="form-horizontal" id='formulario'>
						<div class="form-group has-info">
				    		<label for="descripcion" class="col-xs-12 col-sm-3 control-label no-padding-right">
				    			Descripción
				    		</label>
				    		<div class="col-xs-12 col-sm-8">
								<span class="block input-icon input-icon-right">
									<input type="hidden" id="id_main" name="id" />
									<input type="text" id="descripcion" name="descripcion" class="form-control"  />
									<i class="icon-user"></i>
								</span>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="cantidad" class="col-xs-12 col-sm-3 control-label no-padding-right">
				    			Parcela
				    		</label>
				    		<div class="col-xs-12 col-sm-8">                              
                                <select id='parcela' name="parcela" class="form-control">
                                </select>
							</div>
						</div>
						<div class="form-group has-info lote">
				    		<label for="cantidad" class="col-xs-12 col-sm-3 control-label no-padding-right">
				    			Lote
				    		</label>
				    		<div class="col-xs-12 col-sm-8">                              
                                <select id='lote' name="lote" class="form-control">
                                </select>
							</div>
						</div>
						<div class="form-group has-info animal">
				    		<label for="cantidad" class="col-xs-12 col-sm-3 control-label no-padding-right">
				    			Animal
				    		</label>
				    		<div class="col-xs-12 col-sm-8">                              
                                <select id='animal' name="animal" class="form-control">
                                </select>
							</div>
						</div>
						<div class="form-group has-info animal">
				    		<label for="loted" class="col-xs-12 col-sm-3 control-label no-padding-right">
				    			Lote Destino
				    		</label>
				    		<div class="col-xs-12 col-sm-8">                              
                                <select id='loted' name="loted" class="form-control">
                                </select>
							</div>
						</div>
				    </form>
				</div>
		    </div>
		    <div class="modal-footer">
				<div class="btn-footer">
				    <button class="btn btn-primary" onclick="validar('enfermedades')" id="btn-save">
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

	$('.load-footer, .lote, .animal').hide();
    var url = 'enfermedades';
    var grid_table = $(".table-responsive");
    var col_names = ['Item', 'Descripción', 'Animal', 'Lote Actual', ''];
    var accion = [''];
    loadTable('GET', url+'/getEnfermedad', url, grid_table, col_names, accion);
    
    var parcela = $("#parcela");
    var lote = $("#lote");
    var animal = $("#animal");
    var loted = $("#loted");

    $.ajax({
        type: 'GET',
        url: url+'/getParcela',
        beforeSend: function() {
            parcela.html(cargando);
        },
        success: function(data) {
            var cadena = '<option value="">Seleccione...</option>';
            for(var i=0; i<data.length; i++)
                cadena += '<option value="' + data[i].id + '">' + data[i].descripcion + '</option>';
            parcela.empty().html(cadena);
            //set_chosen();
        }
    });

    parcela.change(function(){
    	if(parcela.val() != ''){
    		$(".lote").show();
    		$.ajax({
		        type: 'GET',
		        url: url+'/getLote',
		        data: 'id=' + parcela.val(),
		        beforeSend: function() {
		            lote.html(cargando);
		            loted.html(cargando);
		        },
		        success: function(data) {
		            var cadena = '<option value="">Seleccione...</option>';
		            for(var i=0; i<data.length; i++)
		                cadena += '<option value="' + data[i].id + '">' + data[i].descripcion + '</option>';
		            lote.empty().html(cadena);
		            loted.empty().html(cadena);
		        }
		    });
    	}else{
    		$(".lote, .animal").hide();
    	}
    });

    lote.change(function(){
    	if(lote.val() != ''){
    		$(".animal").show();
    		$.ajax({
		        type: 'GET',
		        url: url+'/getAnimal',
		        data: 'id=' + lote.val(),
		        beforeSend: function() {
		            animal.html(cargando);
		        },
		        success: function(data) {
		            var cadena = '<option value="">Seleccione...</option>';
		            for(var i=0; i<data.length; i++)
		                cadena += '<option value="'+data[i].id+'">'+data[i].descripcion+' / '+data[i].etapa+'</option>';
		            animal.empty().html(cadena);
		        }
		    });
    	}else{
    		$(".animal").hide();
    	}
    });

    var validar = function(url)
    {
    	bval = true;   
        bval = bval && $("#descripcion").required();
        bval = bval && $("#parcela").required();
        bval = bval && $("#lote").required();
        bval = bval && $("#animal").required();
        bval = bval && $("#loted").required();
        
        if (bval) 
        {
    		guardar(url);
        }
        return false;
    }

    var llenar_datos = function(data)
    {
    	$("#id_main").val(data[0].id);
    	$("#descripcion").val(data[0].descripcion);
    }

	var limpiar = function()
	{
	    $('#id_main, #descripcion, #lote, #animal, #loted').val('');
	}
</script>