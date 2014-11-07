
var cargando = '<div class="text-center" style="padding: 2em 0"><img src="./assets/img/loading.gif" /></div>';
var $path_base = "/";
var botones_acciones;

$(document).ready(function()
{
    cargaMenu();

});

var pagina = function(url, titulo) 
{
    var contenido = $('#contenido');
    contenido.html(cargando);
    $(".page-header").fadeOut(0).html(titulo).fadeIn(400);
    $.ajax({
        url: url,
        type: 'GET',
    })
    .done(function(data) {
        contenido.fadeOut(0).html(data).fadeIn(400);
    });
}

var cargaMenu = function() 
{
    $("#menu_main").html('<div class="sidebar-collapse"><ul class="nav _menu" id="side-menu"></ul></div>')
    var menu = $("._menu");
    $.ajax({
        type: 'GET',
        url: 'menu',
        beforeSend: function() {
            menu.html(cargando);
        },
        success: function(data) {
            menu.empty().generaMenu(data);
            $("#js-menu").html('<script src="./assets/js/jquery.metisMenu.js"></script><script src="./assets/js/sb-admin.js"></script>'); 
        }
    })
}

$.fn.generaMenu = function(menu)
{
    this.each(function()
    {
        var capaMenu = $(this);
        var capaInicio = $('<li><a href="javascript:pagina(\'inicio\',\'Bienvenido\')"><i class="fa fa-fw fa-home"></i> Inicio </a></li>');
        capaMenu.append(capaInicio);
        jQuery.each(menu, function()
        {
            var capa = $("<li></li>");
            capaMenu.append(capa);
            var capaPadre = $('<a href="#"></a>');
            capa.append(capaPadre);
            var enlacepadre = $('<i class="fa fa-fw ' + this.icono + '"></i> ' + this.descripcion + '<span class="fa arrow"></span>');
            capaPadre.append(enlacepadre);
            var subLista = $('<ul class="nav nav-second-level"></ul>');
            capa.append(subLista);
            jQuery.each(this.enlaces, function()
            {
                var subElemento = $('<li></li>');
                subLista.append(subElemento);
                var subEnlace = $('<a href="javascript:pagina(\'' + this.url + '\',\'' + this.descripcion + '\');">' + this.descripcion + '</a>');
                subElemento.append(subEnlace);
            });
        });
    });
    return this;
};

var loadTable = function(tipo, urlajax, urltable, gridtable, columnas, accions) 
{
    botones_acciones = accions;
    $.ajax({
        type: tipo,
        url: urlajax,
        beforeSend: function() {
            deshabilitar();
            gridtable.html(cargando);
        },
        success: function(datos) {          
            tabla(urltable, datos, columnas, gridtable, accions);
        },
        error: function() {
            gridtable.html('hubo un error al recuperar los datos');
        }
    });
}

var tabla = function(url, datos, columnas, gridtable, actions)
{
    var capa = $('<table class="table table-striped table-bordered table-hover" id="dataTable"></table>');
    var cabecera = $('<thead></thead>');
    var cabecera_tr = $('<tr></tr>');
    cabecera.append(cabecera_tr);
    capa.append(cabecera);
    jQuery.each(columnas, function()
    {
        var header = $('<th>'+this+'</th>');
        cabecera_tr.append(header);
    });
    var cuerpo = $('<tbody></tbody>');
    capa.append(cuerpo);
    var i=0;
    jQuery.each(datos, function()
    {
        var id_tr = this.id;
        var cuerpo_tr = $('<tr></tr>');
        cuerpo.append(cuerpo_tr);
        var data = datos[i];
        for( var property in data ){
            var body = $('<td>'+data[property]+'</td>');
            cuerpo_tr.append(body);   
        }
        i++;
        var td_accions = $('<td></td>');
        var botones = generar_botones(url,id_tr);
        td_accions.append(botones);
        cuerpo_tr.append(td_accions);
    });
    
    $(gridtable).html(capa);
    
    $('#dataTable').dataTable({
        "order": [[ 0, "desc" ]]
    });

    tool_tip();

    habilitar();    
}

var eliminar = function(url, id)
{
    bootbox.confirm("¿Está seguro que desea eliminar este registro?", function(result) {
        if(result) {
            var dt = $('#dataTable').dataTable();
            var row = $('.delete_'+id).closest("tr").get(0);
            dt.fnDeleteRow(dt.fnGetPosition(row));
            $.ajax({
                type: 'POST',
                url: url+'/action',
                data: 
                    'id='+ id + '&'+
                    'oper=' + 'del'
                ,
                beforeSend: function() {
                    //deshabilitar();
                },
                success: function(response) {          
                    //habilitar();
                },
                error: function() {
                   bootbox.alert('Hubo un error al eliminar los datos');
                }
            });
        }
    });
}

var guardar = function(urlp)
{
    var ruta = urlp+'/action', oper = '';
    if($("#id_main").val() != ''){
        oper = 'edit';
    }else{
        oper = 'add';
    }
    $.ajax({
        type:"POST",
        url:ruta,
        data:
            'oper='+oper+'&'+
            $("#formulario").serialize()
        ,
        beforeSend:function(){
            $(".btn-footer").hide();
            $(".load-footer").show();
        },
        success:function(response){
            //console.log(response);
            $('#modal-form').modal('hide');
            if(oper == 'edit')
            {
                var dt = $('#dataTable').dataTable();
                var id = $('#id_main').val();
                var row = $('.delete_'+id).closest("tr").get(0);
                dt.fnDeleteRow(dt.fnGetPosition(row));
            }
            agregar(response, urlp);
            setTimeout(function(){
                limpiar();
                $(".btn-footer").show();
                $(".load-footer").hide();
            },1000);
        },
        error: function() {
            bootbox.alert('Hubo un error al guardar los datos');
            $(".btn-footer").show();
            $(".load-footer").hide();
        }
    });    
}

var agregar = function(datos, url)
{
    var cadena = new Array, i=0, botones = '';
    i = 0;
    jQuery.each(datos, function()
    {
        var id_tr = this.id;
        botones = generar_botones(url, id_tr);
        var data = datos[i];
        j = i;
        for( var property in data ){
            cadena[j] = data[property];  
            j++;     
        } 
        i++;
    });
    cadena[j] = botones;
    $('#dataTable').dataTable().fnAddData(cadena);
    tool_tip();
}

var generar_botones = function(url, id)
{
    var botones_min = '';
    for( var botones in botones_acciones ){
        switch(botones_acciones[botones]){
            case "edit": botones_min += '<a class="btn btn-xs btn-success" data-rel="tooltip" title="Editar" href="#modal-form" role="button" data-toggle="modal" onclick="editar(\''+url+'\',\''+id+'\')"><i class="fa fa-pencil bigger-130"></i></a> '; break;
            case "delete": botones_min += '<a class="btn btn-xs btn-danger delete_'+id+'" data-rel="tooltip" title="Eliminar" href="javascript:void(0)" onclick="eliminar(\''+url+'\',\''+id+'\')"><i class="fa fa-times bigger-130"></i></a> '; break;
        }
    }
    return botones_min;
}

var editar = function(url, id)
{
    limpiar();
    $("#myModalLabel").html('Actualizar');
    $.ajax({
        type:"POST",
        url:url+'/editar',
        data: 
            'id='+ id
        ,
        beforeSend:function(){
            clave = 1;
            limpiar();
            $("#formulario input, #formulario textarea").attr('disabled','disabled');
        },
        success:function(data){
            //console.log(data);
            llenar_datos(data);
            $("#formulario input, #formulario textarea").removeAttr('disabled');
        },
        error: function() {
            bootbox.alert('Hubo un error al obtener los datos');
        }
    });   
}

var nuevo = function()
{
    limpiar();
    $("#myModalLabel").html('Registrar');
}

var habilitar = function()
{
    $(".btn, .action-buttons a").removeAttr('disabled');
}

var deshabilitar = function()
{
    $(".btn, .action-buttons a").attr('disabled','disabled');
}

var tool_tip = function()
{
    $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
}

var tooltip_placement = function(context, source) 
{
    var $source = $(source);
    var $parent = $source.closest('table')
    var off1 = $parent.offset();
    var w1 = $parent.width();

    var off2 = $source.offset();
    var w2 = $source.width();

    if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
    return 'top';
}

var set_chosen = function()
{
    $(".chosen-select").chosen();
    $('.chosen-container').each(function(){
        $(this).find('a:first-child').css('width' , '260px');
        $(this).find('.chosen-drop').css('width' , '260px');
        $(this).find('.chosen-search input').css('width' , '250px');
    });
}