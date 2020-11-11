{{-- document.ready --}}
@section('document')

    $("#cedula").on("keyup", function() {
        persona();
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

    $("#bs_email").on("keyup", function() {
        cargar();
    });

    $("#bs_cargo").on("change", function() {
        cargar();
    });

    $("#state").on("change", function() {
        var state = $("#state").val();
        combo("municipality", "state", state, "municipality", 0, "municipio", "municipalitys", 2);
    });

@endsection
{{-- url registro--}}
@section('url_registro') url = "{{ route('Empleado.store') }}"; @endsection
{{-- url edicion--}}
@section('url_edicion') url = `{{url('Empleado')}}/${id}`; @endsection

{{-- boton nuevo --}}
@section('select')

    $('#municipality').html('<option value="null" disabled selected>Seleccione un municipio</option>');

@endsection
{{-- reinicio de registro --}}
@section('registro')

    $('#persona').val('');
    $('#cedula').val('');
    $('#nombre').val('');
    $('#apellido').val('');
    $('#sex').val('null');
    $('#telefono').val('');
    $('#email').val('');
    $('#state').val('null');
    $('#municipality').html('<option value="null" disabled selected>Seleccione un municipio</option>');
    $('#direccion').val('');
    $('#cargo').val('null');

@endsection
{{-- reinicio de una edición despues de una actualización --}}
@section('edicion')

    $('#nombre2').val($('#nombre').val());
    $('#apellido2').val($('#apellido').val());
    $('#sex2').val($('#sex').val());
    $('#telefono2').val($('#telefono').val());
    $('#email2').val($('#email').val());
    $('#state2').val($('#state').val());
    $('#municipality2').val($('#municipality').val());
    $('#direccion2').val($('#direccion').val());
    $('#cargo2').val($('#cargo').val());

@endsection
{{-- reinicio de una edición en un error de validación --}}
@section('edicion_e')

    $('#nombre').val($('#nombre2').val());
    $('#apellido').val($('#apellido2').val());
    $('#sex').val($('#sex2').val());
    $('#telefono').val($('#telefono2').val());
    $('#email').val($('#email2').val());
    $('#state').val($('#state2').val());
    combo("municipality", "state", $('#state2').val(), "municipality", $('#municipality2').val(), "municipio", "municipalitys", 1);
    $('#direccion').val($('#direccion2').val());
    $('#cargo').val($('#cargo2').val());

@endsection
{{-- url de desactivación --}}
@section('delete') url: `{{url('Empleado')}}/${id}`, @endsection
{{-- url de la funcion cargar --}}
@section('cargar') url: "{{route('Empleado.cargar')}}", @endsection
{{-- url de la funcion mostrar --}}
@section('rellenar_url') url: "{{route('Empleado.mostrar')}}", @endsection
{{-- rellenar los campos de la función mostrar --}}
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
    $("#email").val(valores.email);
    $("#email2").val(valores.email);
    $("#state").val(valores.state);
    combo("municipality", "state", valores.state, "municipality", valores.municipality, "municipio", "municipalitys", 1);
    $("#municipality2").val(valores.municipality);
    $("#direccion").val(valores.direccion);
    $("#direccion2").val(valores.direccion);
    $("#cargo").val(valores.cargo);
    $("#cargo2").val(valores.cargo);
    $("#persona").val(valores.persona);

@endsection
{{-- mostrar edicion --}}
@section('editar')

    $("#cedula").attr("readonly", "readonly");
    $("#nombre").removeAttr("readonly");
    $("#apellido").removeAttr("readonly");
    $("#sex").removeAttr("disabled");
    $("#telefono").removeAttr("readonly");
    $("#email").removeAttr("readonly");
    $("#state").removeAttr("disabled");
    $("#municipality").removeAttr("disabled");
    $("#direccion").removeAttr("readonly");
    $("#cargo").removeAttr("disabled");

@endsection
{{-- mostrar sin edicion --}}
@section('mostrar')

    $("#cedula").attr("readonly", "readonly");
    $("#nombre").attr("readonly", "readonly");
    $("#apellido").attr("readonly", "readonly");
    $("#sex").attr("disabled", "disabled");
    $("#telefono").attr("readonly", "readonly");
    $("#email").attr("readonly", "readonly");
    $("#state").attr("disabled", "disabled");
    $("#municipality").attr("disabled", "disabled");
    $("#direccion").attr("readonly", "readonly");
    $("#cargo").attr("disabled", "disabled");

@endsection
{{-- funciones adicionales --}}
@section('funciones')

    function persona(){
        let cedula = $("#cedula").val();
        let persona = 'empleado';
        $.ajax({
            type: "POST",
            url: "{{route('Persona.consulta')}}",
            data: `persona=${persona}&cedula=${cedula}`,
            success: function(registro) {
                if (registro.boo == true){
                    $("#cedula").attr("readonly", "readonly");
                    $("#nombre").attr("readonly", "readonly");
                    $("#apellido").attr("readonly", "readonly");
                    $("#sex").attr("disabled", "disabled");
                    $("#telefono").attr("readonly", "readonly");
                    $("#state").attr("disabled", "disabled");
                    $("#municipality").attr("disabled", "disabled");
                    $("#direccion").attr("readonly", "readonly");

                    $("#persona").val(registro.persona);
                    $("#cedula").val(registro.cedula);
                    $("#nombre").val(registro.nombre);
                    $("#apellido").val(registro.apellido);
                    $("#sex").val(registro.sex);
                    $("#telefono").val(registro.telefono);
                    $("#state").val(registro.state);
                    combo("municipality", "state", registro.state, "municipality", registro.municipality, "municipio", "municipalitys", 1);
                    $("#direccion").val(registro.direccion);
                    $("#cance").fadeIn();
                }
                console.log("%cConsulta realizado con éxito",'color:green;');
                return false;
            },
            error: function(xhr, textStatus, errorMessage) {
                {{-- error(xhr, textStatus, errorMessage); --}}
            }
        });
        return false;
    }

    function cancelar(){
        $("#cedula").attr("readonly", "readonly");
        $("#nombre").removeAttr("readonly");
        $("#apellido").removeAttr("readonly");
        $("#sex").removeAttr("disabled");
        $("#telefono").removeAttr("readonly");
        $("#state").removeAttr("disabled");
        $("#municipality").removeAttr("disabled");
        $("#direccion").removeAttr("readonly");

        $("#persona").val('');
        $("#cedula").val('');
        $("#nombre").val('');
        $("#apellido").val('');
        $("#sex").val('');
        $("#telefono").val('');
        $("#state").val('null');
        $('#municipality').html('<option value="null" disabled selected>Seleccione un municipio</option>');
        $("#direccion").val('');
        $("#cance").fadeIn();
    }
@endsection

{{-- funcion validacion --}}
@section('validacion')

    let persona = $("#persona").val();
    let cedula = $("#cedula").val();
    let nombre = $("#nombre").val(); let nombre2 = $("#nombre2").val();
    let apellido = $("#apellido").val(); let apellido2 = $("#apellido2").val();
    let sex = $("#sex").val(); let sex2 = $("#sex2").val();
    let telefono = $("#telefono").val(); let telefono2 = $("#telefono2").val();
    let email = $("#email").val(); let email2 = $("#email2").val();
    let state = $("#state").val(); let state2 = $("#state2").val();
    let municipality = $("#municipality").val(); let municipality2 = $("#municipality2").val();
    let cargo = $("#cargo").val(); let cargo2 = $("#cargo2").val();
    let direccion = $("#direccion").val(); let direccion2 = $("#direccion2").val();
    let ced = 0; let nom = 0; let ape = 0; let se = 0; let tel = 0; let ema = 0; let sta = 0; let mun = 0; let car = 0; let dir = 0;



    if(cargo == "" || cargo == "null"){
        i++; car++;
        $("#cargo").attr('class', 'form-control border border-danger');
        $("#cargo_e").html('El campo cargo es obligatorio.');

    }

    if(persona == '' && pro == 'Registro' || pro == 'Edicion'){

        if(pro == 'Registro'){
            if(cedula == ""){
                i++; ced++;
                $("#cedula").attr('class', 'form-control border border-danger');
                $("#cedula_e").html('El campo cedula es obligatorio.');

            }else if(cedula.length > 8){
                i++; ced++;
                $("#cedula").attr('class', 'form-control border border-danger');
                $("#cedula_e").html('El campo cedula no debe contener más de 10 caracteres.');

            }else if(cedula.length < 7){
                i++; ced++;
                $("#cedula").attr('class', 'form-control border border-danger');
                $("#cedula_e").html('El campo cedula debe contener al menos 8 caracteres.');

            }
        }

        if(nombre == ""){
            i++; nom++;
            $("#nombre").attr('class', 'form-control border border-danger');
            $("#nombre_e").html('El campo nombre es obligatorio.');

        }else if(nombre.length > 255){
            i++; nom++;
            $("#nombre").attr('class', 'form-control border border-danger');
            $("#nombre_e").html('El campo nombre no debe contener más de 255 caracteres.');

        }else if(nombre.length < 3){
            i++; nom++;
            $("#nombre").attr('class', 'form-control border border-danger');
            $("#nombre_e").html('El campo nombre debe contener al menos 03 caracteres.');

        }

        {{-- if(apellido == ""){
            i++; ape++;
            $("#apellido").attr('class', 'form-control border border-danger');
            $("#apellido_e").html('El campo apellido es obligatorio.');

        }else if(apellido.length > 255){
            i++; ape++;
            $("#apellido").attr('class', 'form-control border border-danger');
            $("#apellido_e").html('El campo apellido no debe contener más de 255 caracteres.');

        }else if(apellido.length < 3){
            i++; ape++;
            $("#apellido").attr('class', 'form-control border border-danger');
            $("#apellido_e").html('El campo apellido debe contener al menos 03 caracteres.');

        } --}}

        if(sex == "" || sex == "null"){
            i++; se++;
            $("#sex").attr('class', 'form-control border border-danger');
            $("#sex_e").html('El campo sexo es obligatorio.');

        }

        if(telefono == ""){
            i++; tel++;
            $("#telefono").attr('class', 'form-control border border-danger');
            $("#telefono_e").html('El campo telefono es obligatorio.');

        }else if(telefono.length != 11){
            i++; tel++;
            $("#telefono").attr('class', 'form-control border border-danger');
            $("#telefono_e").html('El campo telefono no debe contener más de 11 caracteres.');

        }

        if(email == ""){
            i++; ema++;
            $("#email").attr('class', 'form-control border border-danger');
            $("#email_e").html('El campo email es obligatorio.');

        }

        if(state == "" || state == "null"){
            i++; sta++;
            $("#state").attr('class', 'form-control border border-danger');
            $("#state_e").html('El campo estado es obligatorio.');

        }

        if(municipality == "" || municipality == "null"){
            i++; mun++;
            $("#municipality").attr('class', 'form-control border border-danger');
            $("#municipality_e").html('El campo municipio es obligatorio.');

        }

        if(direccion == ""){
            i++; dir++;
            $("#direccion").attr('class', 'form-control border border-danger');
            $("#direccion_e").html('El campo dirección es obligatorio.');

        }
    }

    if(i > 0){

        if(pro == 'Registro'){

            if (ced > 0) {
                $("#cedula").val('');
            }

            if (nom > 0) {
                $("#nombre").val('');
            }

            if (ape > 0) {
                $("#apellido").val('');
            }

            if (se > 0) {
                $("#sex").val('null');
            }

            if (tel > 0) {
                $("#telefono").val('');
            }

            if (ema > 0) {
                $("#email").val('');
            }

            if (sta > 0) {
                $("#state").val('null');
                $('#municipality').html('<option value="null" disabled selected>Seleccione un municipio</option>');
            }

            if (mun > 0) {
                $("#municipality").val('null');
            }

            if (car > 0) {
                $("#cargo").val('null');
            }

            if (dir > 0) {
                $("#direccion").val('');
            }
        }else{

            if (nom > 0) {
                $("#nombre").val(nombre2);
            }

            if (ape > 0) {
                $("#apellido").val(apellido2);
            }

            if (se > 0) {
                $("#sex").val(sex2);
            }

            if (tel > 0) {
                $("#telefono").val(telefono2);
            }

            if (ema > 0) {
                $("#email").val(email2);
            }

            if (sta > 0 || mun > 0) {
                $("#state").val(state2);
                combo("municipality", "state", state2, "municipality", municipality2, "municipio", "municipalitys", 1);
            }

            if (car > 0) {
                $("#cargo").val(cargo2);
            }

            if (dir > 0) {
                $("#direccion").val(direccion2);
            }

        }
        boo = false;
        $("body").overhang({
            type: "error",
            message: message
        });
    }
@endsection
{{-- funcion reiniciar --}}
@section('reiniciar')
    $("#cedula_e").html('');
    $("#nombre_e").html('');
    $("#apellido_e").html('');
    $("#sex_e").html('');
    $("#telefono_e").html('');
    $("#email_e").html('');
    $("#state_e").html('');
    $("#municipality_e").html('');
    $("#direccion_e").html('');
    $("#cargo_e").html('');
    $("#cedula").attr('class', 'form-control');
    $("#nombre").attr('class', 'form-control');
    $("#apellido").attr('class', 'form-control');
    $("#sex").attr('class', 'form-control');
    $("#telefono").attr('class', 'form-control');
    $("#email").attr('class', 'form-control');
    $("#state").attr('class', 'form-control');
    $("#municipality").attr('class', 'form-control');
    $("#direccion").attr('class', 'form-control');
    $("#cargo").attr('class', 'form-control');
@endsection
{{-- error en el registro o edicion --}}
@section('error')
    let ced = 0; let nom = 0; let ape = 0; let se = 0; let tel = 0; let ema = 0; let sta = 0; let mun = 0; let car = 0; let dir = 0;

    if (xhr.responseJSON.errors.cedula){
        $("#cedula_e").html(xhr.responseJSON.errors.cedula);
        $("#cedula").attr('class', 'form-control border border-danger');
        ced++;
    }

    if (xhr.responseJSON.errors.nombre){
        $("#nombre_e").html(xhr.responseJSON.errors.nombre);
        $("#nombre").attr('class', 'form-control border border-danger');
        nom++;
    }

    if (xhr.responseJSON.errors.apellido){
        $("#apellido_e").html(xhr.responseJSON.errors.apellido);
        $("#apellido").attr('class', 'form-control border border-danger');
        ape++;
    }

    if (xhr.responseJSON.errors.sex){
        $("#sex_e").html(xhr.responseJSON.errors.sex);
        $("#sex").attr('class', 'form-control border border-danger');
        se++;
    }

    if (xhr.responseJSON.errors.telefono){
        $("#telefono_e").html(xhr.responseJSON.errors.telefono);
        $("#telefono").attr('class', 'form-control border border-danger');
        tel++;
    }

    if (xhr.responseJSON.errors.email){
        $("#email_e").html(xhr.responseJSON.errors.email);
        $("#email").attr('class', 'form-control border border-danger');
        ema++;
    }

    if (xhr.responseJSON.errors.state){
        $("#state_e").html(xhr.responseJSON.errors.state);
        $("#state").attr('class', 'form-control border border-danger');
        sta++;
    }

    if (xhr.responseJSON.errors.municipality){
        $("#municipality_e").html(xhr.responseJSON.errors.municipality);
        $("#municipality").attr('class', 'form-control border border-danger');
        mun++;
    }

    if (xhr.responseJSON.errors.direccion){
        $("#direccion_e").html(xhr.responseJSON.errors.direccion);
        $("#direccion").attr('class', 'form-control border border-danger');
        dir++;
    }

    if (xhr.responseJSON.errors.cargo){
        $("#cargo_e").html(xhr.responseJSON.errors.cargo);
        $("#cargo").attr('class', 'form-control border border-danger');
        car++;
    }

    if(pro == 'Registro'){

        if (ced > 0) {
            $("#cedula").val('');
        }

        if (nom > 0) {
            $("#nombre").val('');
        }

        if (ape > 0) {
            $("#apellido").val('');
        }

        if (se > 0) {
            $("#sex").val('null');
        }

        if (tel > 0) {
            $("#telefono").val('');
        }

        if (ema > 0) {
            $("#email").val('');
        }

        if (sta > 0) {
            $("#state").val('null');
            $('#municipality').html('<option value="null" disabled selected>Seleccione un municipio</option>');
        }

        if (mun > 0) {
            $("#municipality").val('null');
        }

        if (car > 0) {
            $("#cargo").val('null');
        }

        if (dir > 0) {
            $("#direccion").val('');
        }
    }else{

        if (nom > 0) {
            $("#nombre").val($("#nombre2").val());
        }

        if (ape > 0) {
            $("#apellido").val($("#apellido2").val());
        }

        if (se > 0) {
            $("#sex").val($("#sex2").val());
        }

        if (tel > 0) {
            $("#telefono").val($("#telefono2").val());
        }

        if (ema > 0) {
            $("#email").val($("#email2").val());
        }

        if (sta > 0 || mun > 0) {
            $("#state").val($("#state2").val());
            combo("municipality", "state", $("#state2").val(), "municipality", $("#municipality2").val(), "municipio", "municipalitys", 1);
        }

        if (car > 0) {
            $("#cargo").val($("#cargo2").val());
        }

        if (dir > 0) {
            $("#direccion").val($("#direccion2").val());
        }

    }
@endsection
