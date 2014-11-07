

<div class="panel panel-default">
    <div class="panel-heading">
        Lista de Servicios
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
                                    <input type="text" id="descripcion" name="descripcion" class="form-control" 
                                    onkeypress="return soloLetras(event)" />
                                    <i class="icon-pencil"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group has-info">
                            <label for="padre" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                Tipo de Servicio
                            </label>
                            <div class="col-xs-12 col-sm-8">
                                <span class="">                                   
                                    <select id='tiposervicio' name="tiposervicio" class="form-control">
                                    </select>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn-footer">
                    <button class="btn btn-primary" onclick="validar('servicios')" id="btn-save">
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
    var url = 'servicios';
    var grid_table = $(".table-responsive");
    var col_names = ['Item', 'Descripción', 'Tipo de Servicio', ''];
    var accion = ['edit','delete'];

    loadTable('GET', url+'/getServicio', url, grid_table, col_names, accion);

    var tiposervicio = $("#tiposervicio");
    $.ajax({
        type: 'GET',
        url: url+'/getTiposervicio',
        beforeSend: function() {
            tiposervicio.html(cargando);
        },
        success: function(data) {
            var cadena = '';
            for(var i=0; i<data.length; i++)
                cadena += '<option value="' + data[i].id + '">' + data[i].descripcion + '</option>';
            tiposervicio.empty().html(cadena);
            //set_chosen();
        }
    })
    
    var validar = function(url)
    {
        bval = true;   
        bval = bval && $("#descripcion").required();
        
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
        $("#tiposervicio").val(data[0].idtiposervicio);
        //set_chosen();
    }

    var limpiar = function()
    {
        $('#id_main, #descripcion').val('');
    }
</script>