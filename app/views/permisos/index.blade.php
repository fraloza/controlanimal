
<div class="panel panel-default">
	<div class="panel-body">
		<div class="table-responsive">			
            <div class="form-group">
                <label for="perfil" class="col-xs-12 col-sm-1 control-label no-padding-right">
                    Perfil:
                </label>
                <div class="col-xs-12 col-sm-3">
		            <select id="perfil" class="form-control">
		                <option value="0">Seleccione...</option>
		                @foreach($perfils as $perfil)
	                    <option value="{{ $perfil->id }}">{{ $perfil->descripcion }}</option>
		                @endforeach
		            </select>
                </div>
		        <div id="celda_aceptar">
		            <a href="javascript:cargaMenu()" class="btn btn-primary">Aceptar</a>
		        </div>
            </div>
            <br/>
            <div id="div_modulos" class="form-group">
                <div class="col-xs-12 col-sm-12">
	            	<ul id="modulos" class="nav">
	            		@foreach($modulos as $modulo)
	            			@if($modulo->idpadre == 1)
	            				<li><b>{{ $modulo->descripcion }}</b></li>
	            				@foreach($modulos as $modhijo)
	            					@if($modulo->id == $modhijo->idpadre)
	            						<li>
	            							<label class="checkbox">
	            								<input type="checkbox" id="{{ $modhijo->id }}" />
	            								{{ $modhijo->descripcion }}
	            							</label>
	            						</li>
	            					@endif
	            				@endforeach
	            			@endif
	            		@endforeach
	            	</ul>
	            </div>
            </div>	
		</div>
	</div>
</div>
<script type="text/javascript">	
    $("#celda_aceptar, #div_modulos").hide();
    $("#perfil").change(function(){
        $(document).find(':checkbox').attr('checked',false);
        if($(this).val()==0){
            $("#div_modulos").hide("slow");
            $("#celda_aceptar").hide();
        }else{
        	var url = 'permisos';
		    $.ajax({
		        type: 'POST',
		        data: 
		        	'idperfil='+ $(this).val()
		        ,
		        url: url+'/getPermisos',
		        success: function(datos) {
	                for(var i=0;i<datos.length;i++){
	                    $("#"+datos[i].idmodulo).attr('checked','checked');
	                }
                	$("#celda_aceptar").show();
            		$("#div_modulos").slideDown("slow");
		        }
		    });
        }            
    });
    $("input:checkbox").click(function(){
    	var ruta = '';
        if(this.checked){  
        	ruta = 'permisos/inserta_permiso';   
        }else{
        	ruta = 'permisos/elimina_permiso';
        }   	
	    $.ajax({
	        type: 'POST',
	        data: 
	        	'idperfil='+ $("#perfil").val() +'&'+
	        	'idmodulo='+$(this).attr('id')
	        ,
	        url: ruta,
	        error: function() {
	        	bootbox.alert('Error al guardar los datos')
	        }
	    });
    });
</script>