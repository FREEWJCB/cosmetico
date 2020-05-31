$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

function error(xhr, textStatus, errorMessage) {
    console.log("Error:" + errorMessage + textStatus + xhr.status);
    $.each(xhr.responseJSON, function(indice, valor) {
        console.log(indice + " - " + valor);
    });
    setDone();
    $("body").overhang({
        type: "error",
        message: "error validacion!"
    });
}

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
            error(xhr, textStatus, errorMessage);
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

function desactivar(id) {
    $("body").overhang({
        type: "confirm",
        primary: "#40D47E",
        accent: "#27AE60",
        yesColor: "#3498DB",
        message: "¿Esta seguro de eliminar este dato?",
        overlay: true,
        callback: function(value) {
            var response = value ? "Yes" : "No";
            if (response == "Yes") {
                $.ajax({
                    type: "DELETE",
                    @yield('delete')
                    beforeSend: function() {
                        setStart();
                    },
                    success: function() {

                        setDone();
                        $("body").overhang({
                            type: "success",
                            message: "Dato eliminado con exito",
                            callback: function() {
                                @yield('cargar')
                            }
                        });
                        return false;
                    },
                    error: function(xhr, textStatus, errorMessage) {
                        error(xhr, textStatus, errorMessage);
                    }
                });
                return false;
            } else {
                return false;
            }
        }
    });
}
