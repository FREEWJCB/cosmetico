$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});
function cargar(url) {
    $.ajax({
        type: "POST",
        url: url,
        data: $("#form").serialize(),
        success: function(registro) {
            $("#agrega-registros").html(registro.catalogo);
            return false;
        },
        error: function(xhr, textStatus, errorMessage) {
            console.log("Error:" + errorMessage + textStatus + xhr.status);
            $.each(xhr.responseJSON, function(indice, valor) {
                console.log(indice + " - " + valor);
            });
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

$(document).ready(function() {
    $("#nuevo").on("click", function() {
        $("#formulario")[0].reset();
        $("#pro").val("Registro");
        $("#titulo").html("Registrar");
        $("#edi").hide();
        $("#lim").show();
        $("#reg").show();
        reiniciar();
        $("#modal").modal({
            show: true,
            backdrop: "static"
        });
    });

    @yield('document')
});
