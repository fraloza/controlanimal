

<div class="panel panel-default">
    <div class="panel-heading">
        Lista de Bajas
        <a href="#modal-form" role="button" data-toggle="modal" onclick="cargar_animal()" class="btn btn-default pull-right btn-add">
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
                                    <i class="icon-pencil"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group has-info">
                            <label for="animal" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                Animal
                            </label>
                            <div class="col-xs-12 col-sm-8">
                                <span class="">                                   
                                    <select id='animal' name="animal" class="form-control">
                                    </select>
                                </span>
                            </div>
                        </div>
                        <div class="form-group has-info">
                            <label for="fecha" class="col-xs-12 col-sm-3 control-label no-padding-right">
                                Fecha
                            </label>
                            <div class="col-xs-12 col-sm-8">
                                <span class="">                                   
                                    <input type="date" id='fecha' name="fecha" class="form-control">
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn-footer">
                    <button class="btn btn-primary" onclick="validar('bajas')" id="btn-save">
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
    var url = 'bajas';
    var grid_table = $(".table-responsive");
    var col_names = ['Item', 'Descripción', 'Animal', 'Fecha',''];
    var accion = [];

    loadTable('GET', url+'/getBaja', url, grid_table, col_names, accion);

    var cargar_animal = function()
    {
        nuevo();
        var animal = $("#animal");
        $.ajax({
            type: 'GET',
            url: url+'/getAnimal',
            beforeSend: function() {
                animal.html(cargando);
            },
            success: function(data) {
                var cadena = '<option value="">Seleccione...</option>';
                for(var i=0; i<data.length; i++)
                    cadena += '<option value="' + data[i].id + '">' + data[i].descripcion + '</option>';
                animal.empty().html(cadena);
            }
        });
    }
    
    var validar = function(url)
    {
        bval = true;   
        bval = bval && $("#descripcion").required();
        bval = bval && $("#animal").required();
        bval = bval && $("#fecha").required();
        
        if (bval) 
        {
            guardar(url);
        }
        return false;
    }

    var limpiar = function()
    {
        $('#id_main, #descripcion, #animal, #fecha').val('');
    }
</script>