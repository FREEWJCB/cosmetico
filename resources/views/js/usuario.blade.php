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

    $("#bs_email").on("keyup", function() {
        cargar();
    });

    $("#bs_tipo").on("change", function() {
        cargar();
    });

    $("#bs_username").on("keyup", function() {
        cargar();
    });

    $("#lim").on("click", function() {
        cancelar();
    });

@endsection

@section('url_registro') var url = "{{ route('Usuario.store') }}"; @endsection

@section('url_edicion') var url = "{{ route('Usuario.update') }}"; @endsection

@section('select')

    $('#cance').hide();
    $('#siempleado').hide();
    $('#noempleado').hide();
    $("#empleado").val('');
    $("#nombre").val('');
    $("#cargo").val('');
    $("#respuesta").attr("required", "required");
    $("#password").attr("required", "required");
    $("#password2").attr("required", "required");
    $("#emplea").show();
    $("#emple").show();
    $("#usu").show();
    $("#pregu").show();
    $("#resp").show();
    $("#passw").show();

@endsection

@section('registro')

    $('#cedula').val('');
    $('#nombre').val('');
    $('#cargo').val('');
    $('#siempleado').slideUp();
    $('#noempleado').slideUp();
    $('#username').val('');
    $('#tipo').val('null');
    $('#pregunta').val('');
    $('#respuesta').val('');
    $('#password').val('');
    $('#password2').val('');

@endsection

@section('edicion')

    $('#tipo2').val($('#tipo').val());

 @endsection

@section('delete') url: "{{url('Usuario')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('Usuario.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Usuario.mostrar')}}", @endsection

@section('rellenar')

    $("#cedula").val(valores.cedula);
    $("#nombre").val(valores.nombre);
    $("#cargo").val(valores.cargo);
    $("#tipo").val(valores.tipo);
    $("#tipo2").val(valores.tipo);
    $("#username").val(valores.username);
    $("#pregunta").val(valores.pregunta);
    $("#empleado").val(valores.empleado);

@endsection

@section('editar')

    $("#tipo").removeAttr("disabled");
    ocultar();

@endsection

@section('mostrar')

    $("#tipo").attr("disabled", "disabled");
    $("#seccion").attr("disabled", "disabled");
    $("#salon").attr("disabled", "disabled");
    $("#ano").attr("readonly", "readonly");
    $("#cedula").attr("readonly", "readonly");
    $("#username").attr("readonly", "readonly");
    $("#pregunta").attr("readonly", "readonly");
    desocultar();
@endsection

@section('funciones')

    function empleado() {
        var cedula = $('#cedula').val();
        $.ajax({
            type: "POST",
            url:"{{route('Usuario.empleado')}}",
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
