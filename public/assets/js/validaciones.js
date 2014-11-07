
//validar solo letras
var soloLetras = function(e) 
{
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8,9,37,39,46];
    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        } 
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial)
    return false;
}

//validar vacios
$(function() {
  $.fn.required = function() {
    if ( $(this).val() == '' || $(this).val() == 0 ) {
        $(this).css('border','solid 1px red');
        $(this).focus();
        return false;
    }else {
        $(this).css('border','solid 1px #64a6bc');
        $('#msg').html('');
        return true;
    }
  };
});

//validar email
$(function() {
    $.fn.email = function() {
        var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        if ( $.trim( $(this).val())!='' && filter.test($(this).val()) ) {
            $(this).css('border','solid 1px #64a6bc');
            return true;
        }else {
            $(this).css('border','solid 1px red');
            return false;
        }
    };
});