{{-- <script> --}}

function reiniciar() {
    $("#reg").val("Registrar");
    $("#edi").val("Editar");
    $("#lim").val("Limpiar");
    $("#formulario input[type=reset]").removeAttr("disabled");
    $("#formulario input[type=submit]").removeAttr("disabled");
    $("#formulario input[type=text]").removeAttr("readonly");
    $("#formulario textarea").removeAttr("readonly");
}

function cargar() {
    $.ajax({
        type: "POST",
        @yield('cargar')
        data: $("#form").serialize(),
        success: function(registro) {
            $("#agrega-registros").html(registro.catalogo);
            console.log("%cCargar catalogo realizado con éxito",'color:green;');
            return false;
        },
        error: function(xhr, textStatus, errorMessage) {
            error(xhr, textStatus, errorMessage);
        }
    });
    return false;
}

// function cargar_axios() {
//     axios({
//         type: "POST",
//         @yield('cargar')
//         data: $("#form").serialize(),
//     })
//     .then(function (registro){
//         $("#agrega-registros").html(registro.catalogo);
//         console.log("%cCargar catalogo realizado con éxito",'color:green;');
//         return false;
//     })
//     .catch(function (registro){
//         $("#agrega-registros").html(registro.catalogo);
//         console.log("%cCargar catalogo realizado con éxito",'color:green;');
//         return false;
//     });
//     return false;
// }


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

function agregaRegistro() {
    @yield('pro')

    $.ajax({
        type: tipo,
        url: url,
        data: $("#formulario").serialize(),
        beforeSend: function() {
            setStart();
            $("#formulario input[type=reset]").val("Procesando...");
            $("#formulario input[type=submit]").val("Procesando...");
            $("#formulario input[type=reset]").attr("disabled", "disabled");
            $("#formulario input[type=submit]").attr("disabled", "disabled");
            $("#formulario input[type=text]").attr("readonly", "readonly");
            $("#formulario textarea").attr("readonly", "readonly");
        },
        success: function(valores) {
            setDone();

            var type = "success";
            if ($("#pro").val() == "Registro") {
                 var message = "Registro completado con exito";
                @yield('registro')
            }else{
                var message = "Edición completado con exito";
                @yield('edicion')
            }

            $("body").overhang({
                type: type,
                message: message,
                callback: function() {
                    reiniciar();
                    cargar();
                    console.log("%cProceso realizado con éxito",'color:green;');
                    return false;
                }
            });
        },
        error: function(xhr, textStatus, errorMessage) {
            error(xhr, textStatus, errorMessage);
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
                                cargar();
                                console.log("%cEliminación realizado con éxito",'color:green;');
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

function mostrar(id, pro) {
    $.ajax({
        type: "POST",
        @yield('rellenar_url')
        data: "id="+id,
        success: function(valores) {
            reiniciar();
            $("#reg").hide();
            $("#lim").hide();
            $("#pro").val(pro);
            @yield('rellenar')
            $("#id").val(id);
            if (pro == "Edicion") {
                @yield('editar')
                $("#edi").show();
                $("#titulo").html("Editar");
            } else {
                @yield('mostrar')
                $("#edi").hide();
                $("#titulo").html("Mostrar");
            }
            $("#modal").modal({
                show: true,
                backdrop: "static"
            });
            console.log("%cRellenar realizado con éxito",'color:green;');
            return false;
        },
        error: function(xhr, textStatus, errorMessage) {
            error(xhr, textStatus, errorMessage);
        }
    });
    return false;
}

{{-- </script> --}}
