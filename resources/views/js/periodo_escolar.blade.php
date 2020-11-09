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

    $("#bs_grado").on("change", function() {
        cargar();
    });

    $("#bs_seccion").on("change", function() {
        cargar();
    });

    $("#bs_salon").on("change", function() {
        cargar();
    });

    $("#bs_ano").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') url = "{{ route('Periodo_Escolar.store') }}"; @endsection

@section('url_edicion') url = `{{url('Periodo_Escolar')}}/${id}`; @endsection

@section('select')

    $('#profesor').hide();

@endsection

@section('registro')

    $('#grado').val('null');
    $('#seccion').val('null');
    $('#salon').val('null');
    $('#ano').val('');
    $('#cedula').val('');
    $('#nombre').val('');
    $('#empleado').val('');
    $('#profesor').slideUp();

@endsection

@section('edicion')

    $('#grado2').val($('#grado').val());
    $('#seccion2').val($('#seccion').val());
    $('#salon2').val($('#salon').val());
    $('#ano2').val($('#ano').val());
    $('#empleado2').val($('#empleado').val());

 @endsection

@section('edicion_e')

    $('#grado').val($('#grado2').val());
    $('#seccion').val($('#seccion2').val());
    $('#salon').val($('#salon2').val());
    $('#ano').val($('#ano2').val());
    $('#empleado').val($('#empleado2').val());
    $('#cedula').val($('#cedula2').val());
    $('#nombre').val($('#nombre2').val());

@endsection

@section('delete') url: "{{url('Periodo_Escolar')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('Periodo_Escolar.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Periodo_Escolar.mostrar')}}", @endsection

@section('rellenar')

    $("#grado").val(valores.grado);
    $("#grado2").val(valores.grado);
    $("#seccion").val(valores.seccion);
    $("#seccion2").val(valores.seccion);
    $("#salon").val(valores.salon);
    $("#salon2").val(valores.salon);
    $("#ano").val(valores.ano);
    $("#ano2").val(valores.ano);
    $("#cedula").val(valores.cedula);
    $("#cedula2").val(valores.cedula);
    $("#nombre").val(valores.nombre);
    $("#nombre2").val(valores.nombre);
    $("#empleado").val(valores.empleado);
    $("#empleado2").val(valores.empleado);

@endsection

@section('editar')

    $("#grado").removeAttr("disabled");
    $("#seccion").removeAttr("disabled");
    $("#salon").removeAttr("disabled");
    $("#ano").removeAttr("readonly");
    $("#cedula").removeAttr("readonly");

@endsection

@section('mostrar')

    $("#grado").attr("disabled", "disabled");
    $("#seccion").attr("disabled", "disabled");
    $("#salon").attr("disabled", "disabled");
    $("#ano").attr("readonly", "readonly");
    $("#cedula").attr("readonly", "readonly");

@endsection

@section('funciones')

    function empleado() {
        var cedula = $('#cedula').val();
        $.ajax({
            type: "POST",
            url:"{{route('Periodo_Escolar.empleado')}}",
            data: "cedula="+cedula,
            beforeSend: function() {
                setStart();
                $("#cedula").attr("readonly", "readonly");
                $("#profesor").slideUp();
                $("#noprofesor").slideUp();
                $("#empleado").val('');
                $("#nombre").val('');
            },
            success: function(valores) {
                setDone();
                $("#cedula").removeAttr("readonly");
                if(valores.num > 0){
                    $("#empleado").val(valores.empleado);
                    $("#nombre").val(valores.nombre);
                    $("#profesor").slideDown();
                }else{
                    $("#noprofesor").slideDown();
                }
            },
            error: function(xhr, textStatus, errorMessage) {
                $("#cedula").removeAttr("readonly");
                error(xhr, textStatus, errorMessage);
            }
        });
        return false;
    }

@endsection

@section('validacion')

    let grado = $("#grado").val(); let grado2 = $("#grado2").val();
    let seccion = $("#seccion").val(); let seccion2 = $("#seccion2").val();
    let salon = $("#salon").val(); let salon2 = $("#salon2").val();
    let ano = $("#ano").val(); let ano2 = $("#ano2").val();
    let empleado = $("#empleado").val(); let empleado2 = $("#empleado2").val();
    let gra = 0; let sal = 0;  let sec = 0; let emp = 0; let an = 0;

    if(grado == "" || grado == "null"){
        i++; gra++;
        $("#grado").attr('class', 'form-control border border-danger');
        $("#grado_e").html('El campo grado es obligatorio.');

    }

    if(seccion == "" || seccion == "null"){
        i++; sec++;
        $("#seccion").attr('class', 'form-control border border-danger');
        $("#seccion_e").html('El campo seccion es obligatorio.');

    }

    if(salon == "" || salon == "null"){
        i++; sal++;
        $("#salon").attr('class', 'form-control border border-danger');
        $("#salon_e").html('El campo salon es obligatorio.');

    }

    if(ano == ""){
        i++; an++;
        $("#ano").attr('class', 'form-control border border-danger');
        $("#ano_e").html('El campo año es obligatorio.');

    }

    if(empleado == ""){
        i++; emp++;
        message = 'El profesor es obligatorio.';

    }

    if(grado == grado2 && seccion == seccion2 && salon == salon2 && empleado == empleado2 && pro == 'Edicion'){
        i++; emp++; gra++; sec++; sal++;
        message = 'No ha hecho ningun cambio.';

    }


    if(i > 0){

        if(pro == 'Registro'){

            if (gra > 0) {
                $("#grado").val('null');
            }

            if (sec > 0) {
                $("#seccion").val('null');
            }

            if (sal > 0) {
                $("#salon").val('null');
            }

            if (emp > 0) {
                $("#empleado").val('');
                $("#cedula").val('');
                $("#nombre").val('');
                $("#profesor").slideUp();
                $("#noprofesor").slideUp();
            }

            if (an > 0) {
                $("#ano").val('');
            }

        }else{

            if (gra > 0) {
                $("#grado").val(grado2);
            }

            if (sec > 0) {
                $("#seccion").val(seccion2);
            }

            if (sal > 0) {
                $("#salon").val(salon2);
            }

            if (emp > 0) {
                $("#empleado").val(empleado2);
                $("#cedula").val(cedula2);
                $("#nombre").val(nombre2);
                $("#profesor").slideDown();
                $("#noprofesor").slideDown();
            }

            if (an > 0) {
                $("#ano").val(ano2);
            }

        }
        boo = false;
        $("body").overhang({
            type: "error",
            message: message
        });
    }
@endsection

@section('reiniciar')
    $("#grado_e").html('');
    $("#seccion_e").html('');
    $("#salon_e").html('');
    $("#ano_e").html('');
    $("#cedula_e").html('');
    $("#grado").attr('class', 'form-control');
    $("#seccion").attr('class', 'form-control');
    $("#salon").attr('class', 'form-control');
    $("#ano").attr('class', 'form-control');
    $("#cedula").attr('class', 'form-control');
@endsection

@section('error')
    let gra = 0; let sec = 0; let sal = 0; let emp = 0; let an = 0;
    if (xhr.responseJSON.errors.empleado){
        $("#cedula_e").html(xhr.responseJSON.errors.empleado);
        $("#cedula").attr('class', 'form-control border border-danger');
        emp++;
    }

    if (xhr.responseJSON.errors.grado){
        $("#grado_e").html(xhr.responseJSON.errors.grado);
        $("#grado").attr('class', 'form-control border border-danger');
        gra++;
    }

    if (xhr.responseJSON.errors.seccion){
        $("#seccion_e").html(xhr.responseJSON.errors.seccion);
        $("#seccion").attr('class', 'form-control border border-danger');
        sec++;
    }

    if (xhr.responseJSON.errors.salon){
        $("#salon_e").html(xhr.responseJSON.errors.salon);
        $("#salon").attr('class', 'form-control border border-danger');
        sal++;
    }

    if (xhr.responseJSON.errors.ano){
        $("#ano_e").html(xhr.responseJSON.errors.ano);
        $("#ano").attr('class', 'form-control border border-danger');
        an++;
    }

    if (pro == "Registro") {

        if (gra > 0) {
            $("#grado").val('null');
        }

        if (sec > 0) {
            $("#seccion").val('null');
        }

        if (sal > 0) {
            $("#salon").val('null');
        }

        if (emp > 0) {
            $("#empleado").val('');
            $("#cedula").val('');
            $("#nombre").val('');
            $("#profesor").slideUp();
            $("#noprofesor").slideUp();
        }

        if (an > 0) {
            $("#ano").val('');
        }

    }else{

        if (gra > 0) {
            $("#grado").val($("#grado2").val());
        }

        if (sec > 0) {
            $("#seccion").val($("#seccion2").val());
        }

        if (sal > 0) {
            $("#salon").val($("#salon2").val());
        }

        if (emp > 0) {
            $("#empleado").val(empleado2);
            $("#cedula").val(cedula2);
            $("#nombre").val(nombre2);
            $("#profesor").slideDown();
            $("#noprofesor").slideDown();
        }

        if (an > 0) {
            $("#ano").val($("#ano2").val());
        }

    }
@endsection
