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
    $("#formulario textarea").removeAttr("readonly");
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

    $("#bs-marca").on("keyup", function() {
        cargar();
    });

    $("#bs-modelo").on("keyup", function() {
        cargar();
    });

    $("#bs-tipo").on("keyup", function() {
        cargar();
    });

    $("#bs-cosmetico").on("keyup", function() {
        cargar();
    });
});

function agregaRegistro() {
    $.ajax({
        type: "POST",
        url: url,
        data: $("#formulario").serialize(),
        beforeSend: function() {
            NProgress.start();
            $("#formulario input[type=reset]").val("Procesando...");
            $("#formulario input[type=submit]").val("Procesando...");
            $("#formulario input[type=reset]").attr("disabled", "disabled");
            $("#formulario input[type=submit]").attr("disabled", "disabled");
            $("#formulario input[type=text]").attr("readonly", "readonly");
            $("#formulario textarea").attr("readonly", "readonly");
        },
        success: function(valores) {
            setTimeout(function() {
                NProgress.done();
                $(".fade").removeClass("out");
            }, 1000);

            var type = "error";
            var datos = eval(valores);

            $("#alert").html(datos[1]);

            if (datos[0] == "true" || datos[0] == "true2") {
                var type = "success";

                if ($("#pro").val() == "Registro") {
                    var message = "Registro completado con exito";
                    $("#marca").val("");
                    $("#modelo").val("");
                    $("#tipo").val("");
                    $("#cosmetico").val("");
                    $("#descripcion").val("");
                } else {
                    var message = "edición completado con exito";
                    $("#marca2").val($("#marca").val());
                    $("#modelo2").val($("#modelo").val());
                    $("#tipo2").val($("#tipo").val());
                    $("#descripcion2").val($("#descripcion").val());
                    $("#cosmetico2").val($("#cosmetico").val());
                    if (datos[0] == "true2") {
                        $("#id").val(datos[2]);
                    }
                }
            } else if (datos[0] == "false") {
                var message = "Error en el registro!";
            } else {
                var message = "No ha realizado ningun cambio!";
            }

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
            var datos = eval(valores);
            reiniciar();
            $("#reg").hide();
            $("#lim").hide();
            $("#pro").val(pro);
            $("#marca").val(datos[0]);
            $("#marca").val(datos[0]);
            $("#modelo").val(datos[1]);
            $("#modelo2").val(datos[1]);
            $("#tipo").val(datos[2]);
            $("#tipo2").val(datos[2]);
            $("#cosmetico").val(datos[3]);
            $("#cosmetico2").val(datos[3]);
            $("#cosmetico").val(datos[4]);
            $("#cosmetico2").val(datos[4]);
            $("#id").val(id);
            if (pro == "Edicion") {
                $("#marca").removeAttr("readonly");
                $("#modelo").removeAttr("readonly");
                $("#tipo").removeAttr("readonly");
                $("#cosmetico").removeAttr("readonly");
                $("#descripcion").removeAttr("readonly");
                $("#edi").show();
                $("#titulo").html("Editar");
            } else {
                $("#marca").attr("readonly", "readonly");
                $("#modelo").attr("readonly", "readonly");
                $("#tipo").attr("readonly", "readonly");
                $("#cosmetico").attr("readonly", "readonly");
                $("#descripcion").attr("readonly", "readonly");
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
