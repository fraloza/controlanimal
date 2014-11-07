
<div class="panel panel-default">
	<div class="panel-heading">
		Control Materno
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
									<textarea id="descripcion" name="descripcion" class="form-control"></textarea>
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
				    			Fecha Nacimiento
				    		</label>
				    		<div class="col-xs-12 col-sm-8">                              
                                <input type="text" id='fecha' name="fecha" class="form-control" onchange="seleccionaDias()" />
							</div>
						</div>
						<div class="form-group has-info animal">
				    		<label for="loted" class="col-xs-12 col-sm-3 control-label no-padding-right">
				    			Dias faltantes para nacimiento
				    		</label>
				    		<div class="col-xs-12 col-sm-8">                              
                                <input type="text" readonly="readonly" id='fechan' name="fechan" class="form-control" />
							</div>
						</div>
				    </form>
				</div>
		    </div>
		    <div class="modal-footer">
				<div class="btn-footer">
				    <button class="btn btn-primary" onclick="validar('lactancias')" id="btn-save">
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
	$("#fecha").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    });
    var url = 'lactancias';
    var grid_table = $(".table-responsive");
    var col_names = ['Item', 'Descripción', 'Animal', 'Lote', 'Fecha', 'Dias faltantes', ''];
    var accion = [''];
    loadTable('GET', url+'/getLactancia', url, grid_table, col_names, accion);
    
    var parcela = $("#parcela");
    var lote = $("#lote");
    var animal = $("#animal");

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
		        },
		        success: function(data) {
		            var cadena = '<option value="">Seleccione...</option>';
		            for(var i=0; i<data.length; i++)
		                cadena += '<option value="' + data[i].id + '">' + data[i].descripcion + '</option>';
		            lote.empty().html(cadena);
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
        bval = bval && $("#fecha").required();
        
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
	    $('#id_main, #descripcion, #parcela, #lote, #animal, #fecha, #diasn').val('');
		$('.load-footer, .lote, .animal').hide();
	}

var seleccionaDias = function(){
    var dias = getDias($("#fecha").val());
    $("#fechan").val(dias);
}
function getDias(fecha_final) {
    var diastotales;
    //fecha de inicio
    var fecha_incio = new Date();
    var anio_i = fecha_incio.getFullYear();
    var mes_i = fecha_incio.getMonth() + 1;
    var dia_i = fecha_incio.getDate();

//fecha final
    var fecha_final = new Date(fecha_final);
    var anio_f = fecha_final.getFullYear();
    var mes_f = fecha_final.getMonth() + 1;
    var dia_f = fecha_final.getDate() + 1;

    var dif_anio = 0;
    var findemes;

    dif_anio = anio_f - anio_i;//1
    if (dif_anio > 0) {
        findemes = 12;
    } else {
        findemes = mes_f;
    }
    var diasmes = 0;
    var fin = dif_anio;                                        //1-----> 1-02-2014
    for (var i = 0; i <= fin; i++) {//2
        if (dif_anio > 0) {//2>0;1>0;
            findemes = 12;//12;12
            dif_anio = dif_anio - 1;//1;0
            if (i > 0) {
                mes_i = 0;
            }
        } else {
            if (i > 0) {
                mes_i = 0;
            }
            findemes = mes_f;
        }
        for (var j = mes_i + 1; j <= findemes; j++) {//1 a 12
            diasmes += diasMes(j, i);
        }

        if (i < 2) {
            diasmes = diasmes - i; //-1;
        }
    }

    dia_i = diasMes(mes_i, anio_i) - dia_i;
    dia_f = diasMes(mes_f, anio_f) - dia_f;

    diastotales = diasmes + (dia_i - dia_f);

    return diastotales;
}
function diasMes(humanMonth, year) {
    return new Date(year || new Date().getFullYear(), humanMonth, 0).getDate();
}
</script>