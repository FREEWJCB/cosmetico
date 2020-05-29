function cargar() {
    $.ajax({
        type: "POST",
        url: url,
        data: $("#form").serialize() + "&pro=CARGAR",
        success: function(registro) {
            $("#agrega-registros").html(registro);
            return false;
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
$(function() {
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

    $("#bs-tipo").on("keyup", function() {
        cargar();
    });
});

function agregaRegistro() {
    if ($("#pro").val() == "Registro") {
        var url = "{{ route('Tipo.store') }}";
    }
    alert(url);
    $.ajax({
        type: "POST",
        url: "http://127.0.0.1:8000/Tipo.store",
        data: $("#formulario").serialize(),
        beforeSend: function() {
            NProgress.start();
            $("#formulario input[type=reset]").val("Procesando...");
            $("#formulario input[type=submit]").val("Procesando...");
            $("#formulario input[type=reset]").attr("disabled", "disabled");
            $("#formulario input[type=submit]").attr("disabled", "disabled");
            $("#formulario input[type=text]").attr("readonly", "readonly");
        },
        success: function(valores) {
            setTimeout(function() {
                NProgress.done();
                $(".fade").removeClass("out");
            }, 1000);

            var type = "success";
            var message = "Registro completado con exito";

            $("body").overhang({
                type: type,
                message: message,
                callback: function() {
                    reiniciar();
                    cargar();
                    return false;
                }
            });
        },
        error: function() {
            setTimeout(function() {
                NProgress.done();
                $(".fade").removeClass("out");
            }, 1000);
            $("body").overhang({
                type: "error",
                message: "error validacion!",
                callback: function() {
                    reiniciar();
                }
            });
        }
    });
    return false;
}

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
                    type: "POST",
                    url: url,
                    data: "id=" + id,
                    beforeSend: function() {
                        NProgress.start();
                    },
                    success: function(registro) {
                        setTimeout(function() {
                            NProgress.done();
                            $(".fade").removeClass("out");
                        }, 1000);
                        $("body").overhang({
                            type: "success",
                            message: "Dato eliminado con exito",
                            callback: function() {
                                cargar();
                            }
                        });
                        return false;
                    }
                });
                return false;
            } else {
                return false;
            }
        }
    });
}

function mostrar(id, pro) {
    $("#formulario")[0].reset();

    $.ajax({
        type: "POST",
        url: url,
        data: "id=" + id,
        success: function(valores) {
            reiniciar();
            $("#reg").hide();
            $("#lim").hide();
            $("#pro").val(pro);
            $("#tipo").val(valores);
            $("#tipo2").val(valores);
            $("#id").val(id);
            if (pro == "Edicion") {
                $("#tipo").removeAttr("readonly");
                $("#edi").show();
                $("#titulo").html("Editar");
            } else {
                $("#tipo").attr("readonly", "readonly");
                $("#edi").hide();
                $("#titulo").html("Mostrar");
            }

            $("#modal").modal({
                show: true,
                backdrop: "static"
            });
            return false;
        }
    });
    return false;
}
