{{-- <script> --}}
@section('document')

    $("#lim").on("click", function() {
        limpiar();
    });

    $("#bs_cedula").on("keyup", function() {
        cargar();
    });

    $("#bs_nombre").on("keyup", function() {
        cargar();
    });

    $("#bs_apellido").on("keyup", function() {
        cargar();
    });

    $("#bs_sex").on("change", function() {
        cargar();
    });

    {{-- formulario de estudiante --}}

    $("#cedula").on("keyup", function() {
        val_estudiante();
    });

    $("#nombre").on("keyup", function() {
        val_estudiante();
    });

    $("#apellido").on("keyup", function() {
        val_estudiante();
    });

    $("#sex").on("change", function() {
        val_estudiante();
    });

    $("#telefono").on("keyup", function() {
        val_estudiante();
    });

    $("#state").on("change", function() {
        var state = $("#state").val();
        combo("municipality", "state", state, "municipality", 0, "municipio", "municipalitys", 2);
        val_estudiante();
    });

    $("#municipality").on("change", function() {
        val_estudiante();
    });

    $("#direccion").on("keyup", function() {
        val_estudiante();
    });

    $("#fecha_nacimiento").on("change", function() {
        val_estudiante();
    });

    $("#lugar_nacimiento").on("keyup", function() {
        val_estudiante();
    });

    $("#descripcion").on("keyup", function() {
        val_estudiante();
    });

    {{-- formulario de salud --}}

    $("#tipoa").on("change", function() {
        combo_aler();
    });

    $("#tipod").on("change", function() {
        combo_dis();
    });

    {{-- formulario de representante --}}

    $("#state_r").on("change", function() {
        var state = $("#state_r").val();
        combo("municipality", "state", state, "municipality_r", 0, "municipio", "municipalitys", 2);
        {{-- val_representante(); --}}
    });

@endsection

@section('url_registro') var url = "{{ route('Estudiante.store') }}"; @endsection

@section('url_edicion') var url = "{{ route('Estudiante.update') }}"; @endsection

@section('select') limpiar(); @endsection

@section('registro') limpiar(); @endsection

@section('edicion')

    $('#nombre2').val($('#nombre').val());
    $('#apellido2').val($('#apellido').val());
    $('#sex2').val($('#sex').val());
    $('#telefono2').val($('#telefono').val());
    $('#parentesco2').val($('#parentesco').val());
    $('#municipality2').val($('#municipality').val());
    $('#direccion2').val($('#direccion').val());
    $('#fecha_nacimiento2').val($('#fecha_nacimiento').val());
    $('#lugar_nacimiento2').val($('#lugar_nacimiento').val());
    $('#descripcion2').val($('#descripcion').val());
    $('#representante2').val($('#representante').val());
    $('#parentesco2').val($('#parentesco').val());


 @endsection

@section('delete') url: "{{url('Estudiante')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('Estudiante.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Estudiante.mostrar')}}", @endsection

@section('rellenar')

    $("#cedula").val(valores.cedula);
    $("#nombre").val(valores.nombre);
    $("#nombre2").val(valores.nombre);
    $("#apellido").val(valores.apellido);
    $("#apellido2").val(valores.apellido);
    $("#sex").val(valores.sex);
    $("#sex2").val(valores.sex);
    $("#telefono").val(valores.telefono);
    $("#telefono2").val(valores.telefono);
    $("#state").val(valores.state);
    combo("municipality", "state", valores.state, "municipality", valores.municipality, "municipio", "municipalitys", 1);
    $("#municipality2").val(valores.municipality);
    $("#direccion").val(valores.direccion);
    $("#direccion2").val(valores.direccion);
    $("#fecha_nacimiento").val(valores.fecha_nacimiento);
    $("#fecha_nacimiento2").val(valores.fecha_nacimiento);
    $("#lugar_nacimiento").val(valores.lugar_nacimiento);
    $("#lugar_nacimiento2").val(valores.lugar_nacimiento);
    $("#descripcion2").val(valores.descripcion);
    $("#ocupacion_laboral").val(valores.ocupacion_laboral);
    $("#persona").val(valores.persona);

@endsection

@section('editar')

    $("#cedula").attr("readonly", "readonly");
    $("#nombre").removeAttr("readonly");
    $("#apellido").removeAttr("readonly");
    $("#sex").removeAttr("disabled");
    $("#telefono").removeAttr("readonly");
    $("#ocupacion_laboral").removeAttr("disabled");
    $("#state").removeAttr("disabled");
    $("#municipality").removeAttr("disabled");
    $("#direccion").removeAttr("readonly");

@endsection

@section('mostrar')

    $("#cedula").attr("readonly", "readonly");
    $("#nombre").attr("readonly", "readonly");
    $("#apellido").attr("readonly", "readonly");
    $("#sex").attr("disabled", "disabled");
    $("#telefono").attr("readonly", "readonly");
    $("#ocupacion_laboral").attr("disabled", "disabled");
    $("#state").attr("disabled", "disabled");
    $("#municipality").attr("disabled", "disabled");
    $("#direccion").attr("readonly", "readonly");

@endsection

@section('funciones')

    function estudiante() {
        $("#button_estudiante").attr("class", "btn btn-success");
        $("#button_salud").attr("class", "btn btn-secondary");
        $("#button_representante").attr("class", "btn btn-secondary");
        $('#salud').fadeOut();
        $('#representant').fadeOut();
        $('#estudiante').fadeIn();
        $("#anterior").attr("class", "btn btn-secondary");
        $("#anterior").attr("disabled", "disabled");
        $("#siguiente").attr("class", "btn btn-primary");
        $("#siguiente").removeAttr("disabled");
        $("#ventana").val('1');
        val_estudiante();
    }

    function salud() {
        $("#button_estudiante").attr("class", "btn btn-primary");
        $("#button_salud").attr("class", "btn btn-success");
        $("#button_representante").attr("class", "btn btn-primary");
        $('#representant').fadeOut();
        $('#estudiante').fadeOut();
        $('#salud').fadeIn();
        $("#anterior").attr("class", "btn btn-primary");
        $("#anterior").removeAttr("disabled");
        $("#siguiente").attr("class", "btn btn-primary");
        $("#siguiente").removeAttr("disabled");
        $("#ventana").val('2');
        val_estudiante();
    }

    function representantes() {
        $("#button_estudiante").attr("class", "btn btn-primary");
        $("#button_salud").attr("class", "btn btn-primary");
        $("#button_representante").attr("class", "btn btn-success");
        $('#salud').fadeOut();
        $('#estudiante').fadeOut();
        $('#representant').fadeIn();
        $("#anterior").attr("class", "btn btn-primary");
        $("#anterior").removeAttr("disabled");
        $("#siguiente").attr("class", "btn btn-secondary");
        $("#siguiente").attr("disabled", "disabled");
        $("#ventana").val('3');
        val_estudiante();
    }

    function ante() {
        var ventana = $('#ventana').val();

        if (ventana == 2) {

            estudiante();

        }else if(ventana == 3){

            salud();

        }

    }

    function sigui() {
        var ventana = $('#ventana').val();

        if (ventana == 1) {

            salud();

        }else if(ventana == 2){

            representantes();

        }

    }

    function clear() {
        clear_a();
        clear_d();
    }

    function clear_a() {
        $.ajax({
            type: "POST",
            url:"{{route('Estudiante.clear_a')}}",
            success: function(valores) {
                $('#list_a').html('');
                $('#clear_a').fadeOut();
                combo_aler();
            },
            error: function(xhr, textStatus, errorMessage) {
                error(xhr, textStatus, errorMessage);
            }
        });
        return false;
    }

    function clear_d() {
        $.ajax({
            type: "POST",
            url:"{{route('Estudiante.clear_d')}}",
            success: function(valores) {
                $('#list_d').html('');
                $('#clear_d').fadeOut();
                combo_dis();
            },
            error: function(xhr, textStatus, errorMessage) {
                error(xhr, textStatus, errorMessage);
            }
        });
        return false;
    }

    function quitar_a(id) {
        $.ajax({
            type: "POST",
            url:"{{route('Estudiante.quitar_a')}}",
            data: "id="+id,
            success: function(valores) {
                combo_aler();
            },
            error: function(xhr, textStatus, errorMessage) {
                error(xhr, textStatus, errorMessage);
            }
        });
        return false;
    }

    function quitar_d(id) {
        $.ajax({
            type: "POST",
            url:"{{route('Estudiante.quitar_d')}}",
            data: "id="+id,
            success: function(valores) {
                combo_dis();
            },
            error: function(xhr, textStatus, errorMessage) {
                error(xhr, textStatus, errorMessage);
            }
        });
        return false;
    }

    function alergia() {
        var alergia = $('#alergia').val();
        $.ajax({
            type: "POST",
            url:"{{route('Estudiante.alergias')}}",
            data: "alergia="+alergia,
            beforeSend: function() {
                setStart();
                $("#alergia").attr("readonly", "readonly");
            },
            success: function(valores) {
                setDone();
                $("#alergia").removeAttr("readonly");
                if(valores.num > 0){
                    $("#clear_a").fadeIn();
                    $("#list_a").html(valores.alergias);
                    $("#aler"+valores.id).slideDown();
                }else{
                    $("#clear_a").fadeOut();
                    $("#list_a").html("");
                }
                combo_aler();
            },
            error: function(xhr, textStatus, errorMessage) {
                $("#alergia").removeAttr("readonly");
                error(xhr, textStatus, errorMessage);
            }
        });
        return false;
    }

    function discapacidad() {
        var discapacidad = $('#discapacidad').val();
        $.ajax({
            type: "POST",
            url:"{{route('Estudiante.discapacidades')}}",
            data: "discapacidad="+discapacidad,
            beforeSend: function() {
                setStart();
                $("#discapacidad").attr("readonly", "readonly");
            },
            success: function(valores) {
                setDone();
                $("#discapacidad").removeAttr("readonly");
                if(valores.num > 0){
                    $("#clear_d").fadeIn();
                    $("#list_d").html(valores.discapacidades);
                    $("#dis"+valores.id).slideDown();
                }else{
                    $("#list_d").html("");
                }
                combo_dis();
            },
            error: function(xhr, textStatus, errorMessage) {
                $("#discapacidad").removeAttr("readonly");
                error(xhr, textStatus, errorMessage);
            }
        });
        return false;
    }

    function combobox(tabla,atributo,tipo) {
        if(tipo!=null){
            $.ajax({
                type: "POST",
                url:"{{route('Estudiante.combobox')}}",
                data: "tabla="+tabla+"&atributo="+atributo+"&tipo="+tipo,
                beforeSend: function() {
                    setStart();
                    $("#alergia").attr("readonly", "readonly");
                    $("#discapacidad").attr("readonly", "readonly");
                    $("#tipoa").attr("disabled", "disabled");
                    $("#tipod").attr("disabled", "disabled");
                },
                success: function(valores) {
                    setDone();
                    $("#alergia").removeAttr("readonly");
                    $("#discapacidad").removeAttr("readonly");
                    $("#tipoa").removeAttr("disabled");
                    $("#tipod").removeAttr("disabled");
                    if(tabla == "alergia"){
                        $("#alergia").html(valores.select);
                    }else{
                        $("#discapacidad").html(valores.select);
                    }
                },
                error: function(xhr, textStatus, errorMessage) {
                    $("#alergia").removeAttr("readonly");
                    $("#discapacidad").removeAttr("readonly");
                    $("#tipoa").removeAttr("disabled");
                    $("#tipod").removeAttr("disabled");
                    error(xhr, textStatus, errorMessage);
                }
            });
        }
        return false;
    }

    function combo_aler(){
        var tipo = $("#tipoa").val();
        combobox("alergia", "alergias",tipo);
    }

    function combo_dis(){
        var tipo = $("#tipod").val();
        combobox("discapacidad", "discapacidades",tipo);
    }

    function representante() {
        var cedula = $('#cedula_r').val();
        $.ajax({
            type: "POST",
            url:"{{route('Estudiante.representante')}}",
            data: "cedula="+cedula,
            beforeSend: function() {
                setStart();
                $("#cedula_r").attr("readonly", "readonly");
                $("#representante").val('');
                $("#nombre_r").val('');
                $("#apellido_r").val('');
                $("#sex_r").val('null');
                $("#telefono_r").val('');
                $("#ocupacion_laboral").val('null');
                $("#parentesco").val('');
                $("#state_r").val('null');
                $("#municipality_r").html('<option value="null" disabled selected>Seleccione un municipio</option>');
                $("#direccion_r").val('');
            },
            success: function(valores) {
                setDone();
                if(valores.num_p > 0){
                    $("#repre").fadeOut();
                    $("#persona").val(valores.persona);
                    $("#nombre_r").val(valores.nombre);
                    $("#apellido_r").val(valores.apellido);
                    $("#sex_r").val(valores.sex);
                    $("#telefono_r").val(valores.telefono);
                    $("#state_r").val(valores.state);
                    combo("municipality","state",valores.state,"municipality_r",valores.municipality,"municipio","municipalitys",1);
                    $("#direccion_r").val(valores.direccion);
                    $("#nombre_r").attr("readonly", "readonly");
                    $("#apellido_r").attr("readonly", "readonly");
                    $("#sex_r").attr("disabled", "disabled");
                    $("#telefono_r").attr("readonly", "readonly");
                    $("#state_r").attr("disabled", "disabled");
                    $("#municipality_r").attr("disabled", "disabled");
                    $("#direccion_r").attr("readonly", "readonly");

                    if(valores.num_r > 0){
                        $("#representante").val(valores.id);
                        $("#ocupacion_laboral").val(valores.ocupacion_laboral);
                        $("#ocupacion_laboral").attr("disabled", "disabled");
                    }else{
                        $("#representante").val("");
                        $("#ocupacion_laboral").val("null");
                        $("#ocupacion_laboral").removeAttr("disabled");
                    }

                    $("#cance").fadeIn();
                }else{
                    $("#cance").fadeOut();
                    $("#cedula_r").removeAttr("readonly");
                    $("#cedula_r").removeAttr("readonly");
                    $("#nombre_r").removeAttr("readonly");
                    $("#apellido_r").removeAttr("readonly");
                    $("#sex_r").removeAttr("disabled");
                    $("#telefono_r").removeAttr("readonly");
                    $("#ocupacion_laboral").removeAttr("disabled");
                    $("#state_r").removeAttr("disabled");
                    $("#municipality_r").removeAttr("disabled");
                    $("#direccion_r").removeAttr("readonly");
                    $("#persona").val("");
                    $("#representante").val("");
                    $("#repre").fadeIn();
                }
                $("#parentesco").removeAttr("readonly");
                $("#formu").slideDown();
            },
            error: function(xhr, textStatus, errorMessage) {
                $("#cedula_r").removeAttr("readonly");
                error(xhr, textStatus, errorMessage);
            }
        });
        return false;
    }

    function cancelar() {
        $("#cance").fadeOut();
        $("#repre").fadeIn();
        $("#formu").slideUp();
        $("#cedula_r").removeAttr("readonly");
        $("#representante").val('');
        $("#nombre_r").val('');
        $("#apellido_r").val('');
        $("#sex_r").val('null');
        $("#telefono_r").val('');
        $("#ocupacion_laboral").val('null');
        $("#parentesco").val('');
        $("#state_r").val('null');
        $("#municipality_r").html('<option value="null" disabled selected>Seleccione un municipio</option>');
        $("#direccion_r").val('');
    }

    function limpiar() {
        clear();
        estudiante();
        $("#siguiente").attr("class", "btn btn-secondary");
        $("#siguiente").attr("disabled", "disabled");
        $("#button_salud").attr("class", "btn btn-secondary");
        $("#button_salud").attr("disabled", "disabled");
        $("#button_representante").attr("class", "btn btn-secondary");
        $("#button_representante").attr("disabled", "disabled");
        $('#municipality').html('<option value="null" disabled selected>Seleccione un municipio</option>');
        $('#municipality_r').html('<option value="null" disabled selected>Seleccione un municipio</option>');
        $('#alergia').html('<option value="null" disabled selected>Seleccione una alergia</option>');
        $('#discapacidad').html('<option value="null" disabled selected>Seleccione una discapacidad</option>');
        $('#list_a').html('');
        $('#list_d').html('');
        $('#formu').fadeOut();
        $('#cance').fadeOut();
        $('#repre').fadeIn();
        $("#cedula_r").removeAttr("readonly");
        $("#nombre_r").removeAttr("readonly");
        $("#apellido_r").removeAttr("readonly");
        $("#sex_r").removeAttr("disabled");
        $("#telefono_r").removeAttr("readonly");
        $("#ocupacion_laboral").removeAttr("disabled");
        $("#state_r").removeAttr("disabled");
        $("#municipality_r").removeAttr("disabled");
        $("#direccion_r").removeAttr("readonly");
        $("#tipoa").removeAttr("readonly");
        $("#tipod").removeAttr("readonly");
        $("#alergia").removeAttr("readonly");
        $("#discapacidad").removeAttr("readonly");
        $("#discapacidad").removeAttr("readonly");
        val_estudiante();

    }


    function val_estudiante() {
        var ventana = $('#ventana').val();
        var cedula = $('#cedula').val();
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var sex = $('#sex').val();
        var telefono = $('#telefono').val();
        var state = $('#state').val();
        var municipality = $('#municipality').val();
        var direccion = $('#direccion').val();
        var fecha_nacimiento = $('#fecha_nacimiento').val();
        var lugar_nacimiento = $('#lugar_nacimiento').val();
        var descripcion = $('#descripcion').val();
        if (cedula != "" && nombre != "" && apellido != "" && sex != "null" && sex != null && telefono != "" && state != "null" && state != null && municipality != "null" && municipality != null && direccion != "" && fecha_nacimiento != "" && lugar_nacimiento != "" && descripcion != "") {
            if(ventana == 1){
                $("#button_estudiante").attr("class", "btn btn-success");
                $("#siguiente").attr("class", "btn btn-primary");
                $("#siguiente").removeAttr("disabled");
                $("#button_salud").attr("class", "btn btn-primary");
                $("#button_salud").removeAttr("disabled");
                $("#button_representante").attr("class", "btn btn-primary");
                $("#button_representante").removeAttr("disabled");
            }


        }else{
            $("#anterior").attr("class", "btn btn-secondary");
            $("#anterior").attr("disabled", "disabled");
            $("#siguiente").attr("class", "btn btn-secondary");
            $("#siguiente").attr("disabled", "disabled");
            $("#button_estudiante").attr("class", "btn btn-success");
            $("#button_salud").attr("class", "btn btn-secondary");
            $("#button_salud").attr("disabled", "disabled");
            $("#button_representante").attr("class", "btn btn-secondary");
            $("#button_representante").attr("disabled", "disabled");
            $('#salud').fadeOut();
            $('#representant').fadeOut();
            $('#estudiante').fadeIn();
            $("#ventana").val('1');
        }

    }

@endsection
{{-- </script> --}}
