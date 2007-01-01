@section('document')

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

@endsection

@section('url_registro') var url = "{{ route('Estudiante.store') }}"; @endsection

@section('url_edicion') var url = "{{ route('Estudiante.update') }}"; @endsection

@section('select')

    $('#estudiante').show();
    $('#salud').hide();
    $('#representant').hide();
    $('#formu').hide();
    $('#cance').hide();
    $('#repre').show();
    $("#persona").val('');
    $("#representate").val('');
    $("#list_a").html('');
    $("#list_d").html('');
    $('#municipality').html('<option value="null" disabled selected>Seleccione un municipio</option>');
    $('#municipality_r').html('<option value="null" disabled selected>Seleccione un municipio</option>');
    $('#alergia').html('<option value="null" disabled selected>Seleccione una alergia</option>');
    $('#discapacidad').html('<option value="null" disabled selected>Seleccione una discapacidad</option>');
    clear();

@endsection

@section('registro')

    $('#persona').val('');
    $('#representante').val('');
    $('#representante_regis').val('');
    $('#cedula').val('');
    $('#nombre').val('');
    $('#apellido').val('');
    $('#sex').val('null');
    $('#telefono').val('');
    $('#state').val('null');
    $('#municipality').html('<option value="null" disabled selected>Seleccione un municipio</option>');
    $('#direccion').val('');
    $('#fecha_nacimiento').val('');
    $('#lugar_nacimiento').val('');
    $('#descripcion').val('');
    $('#tipoa').val('null');
    $('#tipod').val('null');
    $('#alergia').val('');
    $('#discapacidad').val('');
    $('#list_a').html('');
    $('#list_d').html('');
    clear();
    $('#cedula_r').val('');
    $('#nombre_r').val('');
    $('#apellido_r').val('');
    $('#sex_r').val('null');
    $('#telefono_r').val('');
    $('#state_r').val('null');
    $('#municipality_r').html('<option value="null" disabled selected>Seleccione un municipio</option>');
    $('#direccion_r').val('');
    $('#ocupacion_laboral').val('null');
    $('#parentesco').val('');
    $('#salud').fadeOut();
    $('#representant').fadeOut();
    $('#formu').fadeOut();
    $('#repre').show();
    $('#cance').hide();
    $('#estudiante').fadeIn();


@endsection

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
            },
            error: function(xhr, textStatus, errorMessage) {
                error(xhr, textStatus, errorMessage);
            }
        });
        return false;
    }

    function representante() {
        var cedula = $('#cedula_r').val();
        $.ajax({
            type: "POST",
            url:"{{route('Estudiante.representante')}}",
            data: "cedula="+cedula,
            beforeSend: function() {
                setStart();
                $("#cedula").attr("readonly", "readonly");
                $("#siempleado").slideUp();
                $("#noempleado").slideUp();
                $("#empleado").val('');
                $("#nombre").val('');
                $("#cargo").val('');
            },
            success: function(valores) {
                setDone();
                if(valores.num > 0){
                    $("#emplea").fadeOut();
                    $("#cance").fadeIn();
                    $("#empleado").val(valores.empleado);
                    $("#nombre").val(valores.nombre);
                    $("#cargo").val(valores.cargo);
                    $("#siempleado").slideDown();
                }else{
                    $("#cedula").removeAttr("readonly");
                    $("#noempleado").slideDown();
                }
            },
            error: function(xhr, textStatus, errorMessage) {
                $("#cedula").removeAttr("readonly");
                error(xhr, textStatus, errorMessage);
            }
        });
        return false;
    }

    function cancelar() {
        $("#cance").fadeOut();
        $("#emplea").fadeIn();
        $("#siempleado").slideUp();
        $("#noempleado").slideUp();
        $("#cedula").removeAttr("readonly");
        $('#cedula').val("");
        $("#empleado").val('');
        $("#nombre").val('');
        $("#cargo").val('');
    }

    function ocultar() {
        $("#emple").hide();
        $("#siempleado").hide();
        $("#noempleado").hide();
        $("#usu").hide();
        $("#pregu").hide();
        $("#passw").hide();
        $("#respuesta").removeAttr("required");
        $("#password").removeAttr("required");
        $("#password2").removeAttr("required");
    }

    function desocultar() {
        $("#emple").show();
        $("#siempleado").show();
        $("#noempleado").hide();
        $("#usu").show();
        $("#pregu").show();
        $("#resp").hide();
        $("#passw").hide();
        $("#emplea").hide();
        $("#cance").hide();
    }

@endsection
