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

@section('url_registro') url = "{{ route('Usuario.store') }}"; @endsection

@section('url_edicion') url = `{{url('Usuario')}}/${id}`; @endsection

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

@section('edicion_e')

    $('#tipo').val($('#tipo2').val());

 @endsection

@section('delete') url: `{{url('Usuario')}}/${id}`, @endsection

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
@section('validacion')

    let empleado = $("#empleado").val();
    let username = $("#username").val();
    let tipo = $("#tipo").val(); let tipo2 = $("#tipo2").val();
    let pregunta = $("#pregunta").val();
    let respuesta = $("#respuesta").val();
    let password = $("#password").val(); let password2 = $("#password2").val();
    let emp = 0; let use = 0; let tip = 0; let pre = 0; let res = 0; let pas = 0; let pas2 = 0;

    if(tipo == "" || tipo == "null"){
        i++; tip++;
        $("#tipo").attr('class', 'form-control border border-danger');
        $("#tipo_e").html('El campo tipo es obligatorio.');

    }

    if(pro == 'Registro'){
        if(empleado == ""){
            i++; emp++;
            $("#cedula").attr('class', 'form-control border border-danger');
            $("#cedula_e").html('El campo tipo es obligatorio.');

        }

        if(username == ""){
            i++; use++;
            $("#username").attr('class', 'form-control border border-danger');
            $("#username_e").html('El campo usuario es obligatorio.');

        }else if(username.length > 10){
            i++; use++;
            $("#username").attr('class', 'form-control border border-danger');
            $("#username_e").html('El campo usuario no debe contener más de 10 caracteres.');

        }else if(username.length < 8){
            i++; use++;
            $("#username").attr('class', 'form-control border border-danger');
            $("#username_e").html('El campo usuario debe contener al menos 8 caracteres.');

        }

        if(pregunta == ""){
            i++; pre++;
            $("#pregunta").attr('class', 'form-control border border-danger');
            $("#pregunta_e").html('El campo pregunta es obligatorio.');

        }else if(pregunta.length > 255){
            i++; pre++;
            $("#pregunta").attr('class', 'form-control border border-danger');
            $("#pregunta_e").html('El campo pregunta no debe contener más de 255 caracteres.');

        }else if(pregunta.length < 3){
            i++; pre++;
            $("#pregunta").attr('class', 'form-control border border-danger');
            $("#pregunta_e").html('El campo pregunta debe contener al menos 03 caracteres.');

        }

        if(respuesta == ""){
            i++; res++;
            $("#respuesta").attr('class', 'form-control border border-danger');
            $("#respuesta_e").html('El campo respuesta es obligatorio.');

        }else if(respuesta.length > 20){
            i++; res++;
            $("#respuesta").attr('class', 'form-control border border-danger');
            $("#respuesta_e").html('El campo respuesta no debe contener más de 20 caracteres.');

        }else if(respuesta.length < 3){
            i++; res++;
            $("#respuesta").attr('class', 'form-control border border-danger');
            $("#respuesta_e").html('El campo respuesta debe contener al menos 3 caracteres.');

        }

        if(password == ""){
            i++; pas++;
            $("#password").attr('class', 'form-control border border-danger');
            $("#password_e").html('El campo contraseña es obligatorio.');

        }else if(password.length > 20){
            i++; pas++;
            $("#password").attr('class', 'form-control border border-danger');
            $("#password_e").html('El campo contraseña no debe contener más de 20 caracteres.');

        }else if(password.length < 8){
            i++; pas++;
            $("#password").attr('class', 'form-control border border-danger');
            $("#password_e").html('El campo contraseña debe contener al menos 8 caracteres.');

        }else if(password == password2){
            i++; pas2++;
            $("#password2").attr('class', 'form-control border border-danger');
            $("#password2_e").html('Las contraseñas no coinciden.');
        }
    }else if(tipo == tipo2){
        tip++;
        message = 'No ha hecho ningun cambio.';
    }

    if(i > 0){

        if(pro == 'Registro'){

            if (tip > 0) {
                $("#tipo").val('null');
            }

            if (emp > 0) {
                $("#empleado").val('');
            }

            if (use > 0) {
                $("#username").val('');
            }

            if (pre > 0) {
                $("#pregunta").val('');
            }

            if (res > 0) {
                $("#respuesta").val('');
            }

            if (pas > 0) {
                $("#password").val('');
                $("#password2").val('');
            }

            if (pas2 > 0) {
                $("#password2").val('');
            }

        }else{

            if (tip > 0) {
                $("#tipo").val(tipo2);
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
    $("#cedula_e").html('');
    $("#tipo_e").html('');
    $("#username_e").html('');
    $("#pregunta_e").html('');
    $("#respuesta_e").html('');
    $("#password_e").html('');
    $("#password2_e").html('');
    $("#cedula").attr('class', 'form-control');
    $("#tipo").attr('class', 'form-control');
    $("#username").attr('class', 'form-control');
    $("#pregunta").attr('class', 'form-control');
    $("#respuesta").attr('class', 'form-control');
    $("#password").attr('class', 'form-control');
    $("#password2").attr('class', 'form-control');
@endsection

@section('error')
    let emp = 0; let use = 0; let tip = 0; let pre = 0; let res = 0; let pas = 0; let pas2 = 0;

    if (xhr.responseJSON.errors.empleado){
        $("#cedula_e").html(xhr.responseJSON.errors.empleado);
        $("#cedula").attr('class', 'form-control border border-danger');
        emp++;
    }

    if (xhr.responseJSON.errors.tipo){
        $("#tipo_e").html(xhr.responseJSON.errors.tipo);
        $("#tipo").attr('class', 'form-control border border-danger');
        tip++;
    }

    if (xhr.responseJSON.errors.username){
        $("#username_e").html(xhr.responseJSON.errors.username);
        $("#username").attr('class', 'form-control border border-danger');
        use++;
    }

    if (xhr.responseJSON.errors.pregunta){
        $("#pregunta_e").html(xhr.responseJSON.errors.pregunta);
        $("#pregunta").attr('class', 'form-control border border-danger');
        pre++;
    }

    if (xhr.responseJSON.errors.respuesta){
        $("#respuesta_e").html(xhr.responseJSON.errors.respuesta);
        $("#respuesta").attr('class', 'form-control border border-danger');
        res++;
    }

    if (xhr.responseJSON.errors.password || xhr.responseJSON.errors.password2){
        $("#password_e").html(xhr.responseJSON.errors.password);
        $("#password").attr('class', 'form-control border border-danger');
        pass++;
    }

    if (pro == "Registro") {

        if (tip > 0) {
            $("#tipo").val('null');
        }

        if (emp > 0) {
            $("#empleado").val('');
        }

        if (use > 0) {
            $("#username").val('');
        }

        if (pre > 0) {
            $("#pregunta").val('');
        }

        if (res > 0) {
            $("#respuesta").val('');
        }

        if (pas > 0) {
            $("#password").val('');
            $("#password2").val('');
        }

        if (pas2 > 0) {
            $("#password2").val('');
        }

    }else{

        if (tip > 0) {
            $("#tipo").val($("#tipo2").val());
        }
    }
@endsection
