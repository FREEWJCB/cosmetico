function cargar() {
    $.ajax({
        type: "POST",
        url: "{{URL('Tipo.cargar')}}",
        // url: "http://127.0.0.1:8000/Tipo",
        data: $("#form").serialize(),
        success: function(registro) {
            $("#agrega-registros").html(registro);
            return false;
        },
        error: function() {
            setTimeout(function() {
                NProgress.done();
                $(".fade").removeClass("out");
            }, 1000);
            $("body").overhang({
                type: "error",
                message: "error validacion!"
            });
        }
    });
    return false;
}

function reiniciar() {
    $("#reg").val("Registrar");
    $("#edi").val("Editar");
    $("#lim").val("Limpiar");
    $("#formulario input[type=reset]").removeAttr("disabled");
    $("#formulario input[type=submit]").removeAttr("disabled");
    $("#formulario input[type=text]").removeAttr("readonly");
}






