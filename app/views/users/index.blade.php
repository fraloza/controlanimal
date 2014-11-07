
<div class="panel panel-default">
    <div class="panel-heading">
        Lista de Empleados
        <a href="#modal-form" role="button" data-toggle="modal" onclick="form_nuevo()" class="btn btn-default pull-right btn-add">
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
				    		<label for="nombre" class="col-xs-12 col-sm-3 control-label no-padding-right">
				    			Nombre
				    		</label>
				    		<div class="col-xs-12 col-sm-8">
								<span class="block input-icon input-icon-right">
									<input type="text" id="nombre" name="nombre" class="form-control" />
									<i class="icon-user"></i>
								</span>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="usuario" class="col-xs-12 col-sm-3 control-label no-padding-right">
				    			Usuario
				    		</label>
				    		<div class="col-xs-12 col-sm-8">
								<span class="block input-icon input-icon-right">
									<input type="hidden" id="id_main" name="id" />
									<input type="text" id="usuario" name="usuario" class="form-control" />
									<i class="icon-user"></i>
								</span>
							</div>
						</div>
						<div class="form-group has-info form-clave">
				    		<label for="clave" class="col-xs-12 col-sm-3 control-label no-padding-right">
				    			Clave
				    		</label>
				    		<div class="col-xs-12 col-sm-8">
								<span class="block input-icon input-icon-right">
									<input type="text" id="clave" name="clave" class="form-control"  />
									<i class="icon-lock"></i>
								</span>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="email" class="col-xs-12 col-sm-3 control-label no-padding-right">
				    			Email
				    		</label>
				    		<div class="col-xs-12 col-sm-8">
								<span class="block input-icon input-icon-right">
									<input type="text" id="email" name="email" class="form-control"  />
									<i class="icon-laptop"></i>
								</span>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="direccion" class="col-xs-12 col-sm-3 control-label no-padding-right">
				    			Direccion
				    		</label>
				    		<div class="col-xs-12 col-sm-8">
								<span class="block input-icon input-icon-right">
									<input type="text" id="direccion" name="direccion" class="form-control" />
									<i class="icon-maker"></i>
								</span>
							</div>
						</div>
						<div class="form-group has-info">
				    		<label for="telefono" class="col-xs-12 col-sm-3 control-label no-padding-right">
				    			Telefono
				    		</label>
				    		<div class="col-xs-12 col-sm-8">
								<span class="block input-icon input-icon-right">
									<input type="text" id="telefono" name="telefono" class="form-control" />
									<i class="icon-phone"></i>
								</span>
							</div>
						</div>
                        <div class="form-group has-info">
                            <label for="perfil" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                Perfil
                            </label>
                            <div class="col-xs-12 col-sm-8">
                                <span class="">                                   
                                    <select id='perfil' name="perfil" class="form-control">
                                    </select>
                                </span>
                            </div>
                        </div>
				    </form>
				</div>
		    </div>
		    <div class="modal-footer">
				<div class="btn-footer">
				    <button class="btn btn-primary" onclick="validar('empleados')" id="btn-save">
				    	<i class='icon-ok'></i>
				    	Guardar
				    </button>
				    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
				    	<i class='icon-undo'></i>
				    	Cancelar
				    </button>
				</div>
				<div class="load-footer">
				    <i class="icon-spinner icon-spin blue bigger-125"></i>
				    Guardando
				</div>
		    </div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var clave = 0;
	$('.load-footer').hide();
	$(".form-clave").hide();
    var url = 'empleados';
    var grid_table = $(".table-responsive");
    var col_names = ['Item', 'Nombre', 'Usuario', 'Perfil', ''];
    var accion = ['edit','delete'];
    loadTable('GET', url+'/getUser', url, grid_table, col_names, accion);
    
    var perfil = $("#perfil");
    $.ajax({
        type: 'GET',
        url: url+'/getPerfil',
        beforeSend: function() {
            perfil.html(cargando);
        },
        success: function(data) {
            var cadena = '';
            for(var i=0; i<data.length; i++)
                cadena += '<option value="' + data[i].id + '">' + data[i].descripcion + '</option>';
            perfil.empty().html(cadena);
            //set_chosen();
        }
    })

    var form_nuevo = function()
    {
    	clave = 0;
    	nuevo();
    }

    var validar = function(url)
    {
    	bval = true;   
        bval = bval && $("#nombre").required();
        bval = bval && $("#usuario").required();
        if(clave == 0)
        	bval = bval && $("#clave").required();
        bval = bval && $("#email").required();
        bval = bval && $("#direccion").required();
        bval = bval && $("#telefono").required();
        
        if (bval) 
        {
    		guardar(url);
        }
        return false;
    }

    var llenar_datos = function(data)
    {
    	clave = 1;
    	$("#id_main").val(data[0].id);
    	$("#nombre").val(data[0].name);
    	$("#usuario").val(data[0].username);
    	$("#email").val(data[0].email);
    	$("#direccion").val(data[0].direccion);
    	$("#telefono").val(data[0].telefono);
    	$("#perfil").val(data[0].idperfil);
    }

	var limpiar = function()
	{
		if(clave == 0)
			$(".form-clave").show();
		else
    		$(".form-clave").hide();
	    $('#id_main, #usuario, #clave, #email, #nombre, #direccion, #telefono').val('');
	}
</script>