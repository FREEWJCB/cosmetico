{{-- <script> --}}

function reiniciar(pro) {
    $("#reg").val("Registrar");
    $("#edi").val("Editar");
    $("#lim").val("Limpiar");
    $("#pro").val(pro);
    $("#formulario input[type=reset]").removeAttr("disabled");
    $("#formulario input[type=submit]").removeAttr("disabled");
    $("#formulario select").removeAttr("disabled");
    $("#formulario input[type=text]").removeAttr("readonly");
    $("#formulario input[type=number]").removeAttr("readonly");
    $("#formulario input[type=email]").removeAttr("readonly");
    $("#formulario input[type=tel]").removeAttr("readonly");
    $("#formulario textarea").removeAttr("readonly");
    @yield('reiniciar')
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

        $("#titulo").html("Registrar");
        $("#edi").hide();
        $("#lim").show();
        $("#reg").show();
        @yield('select')
        reiniciar("Registro");
        $("#modal").modal({
            show: true,
            backdrop: "static"
        });
    });

    @yield('document')
});

function agregaRegistro() {
    let pro = $("#pro").val();
    let boo = validacion(pro);
    let url = ''; let tipo = ''; let message = ''; let id = ''; let type = "";
    if(boo == true){
        if (pro == "Registro") {
            tipo = "POST";
            message = "Registro completado con exito";
            @yield('url_registro')
        }else{
            tipo = "PUT";
            message = "Edición completado con exito";
            id = $('#id').val();
            @yield('url_edicion')
        }

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
                if(!valores.error || valores.error == 'false'){
                    type = "success";
                    if (pro == "Registro") {
                        $("#formulario")[0].reset();
                        @yield('registro')
                    }else{
                        if(valores.i > 0){
                            $('#id').val(valores.id);
                        }
                        @yield('edicion')
                    }
                }else{
                    type = "error";
                    message = valores.message;
                    if (pro == "Registro") {
                        if (valores.limpiar == true){
                            $("#formulario")[0].reset();
                            @yield('registro')
                        }else{
                            $('#alert_e').html(valores.alerta);
                        }

                    }else{
                        if (valores.limpiar == true){
                            @yield('edicion_e')
                        }else{
                            $('#alert_e').html(valores.alerta);
                        }

                    }

                }


                $("body").overhang({
                    type: type,
                    message: message,
                    callback: function() {
                        reiniciar(pro);
                        cargar();
                        console.log("%cProceso realizado con éxito",'color:green;');
                        return false;
                    }
                });
            },
            error: function(xhr, textStatus, errorMessage) {
                error(xhr, textStatus, errorMessage);
                reiniciar(pro);
                cargar();
                @yield('error')
            }
        });
    }
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
            }
            return false;
        }
    });
}

function mostrar(id, pro) {
    @yield('mostra')
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

function validacion(pro){
    let i = 0;
    let boo = true;
    let message = '';
    if(pro == 'Registro'){
        message = 'Error en el registro.';
    }else{
        message = 'Error en la edición.';
    }

    @yield('validacion')

    return boo;
}

@yield('funciones')
{{-- </script> --}}
