@section('document')

    $("#bs_tipo").on("change", function() {
        cargar();
    });

    $("#bs_discapacidades").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') url = "{{ route('Discapacidad.store') }}"; @endsection

@section('url_edicion') url = `{{url('Discapacidad')}}/${id}`; @endsection

@section('registro')

    $('#tipo').val('null');
    $('#discapacidades').val('');
    $('#descripcion').val('');

@endsection

@section('edicion')

    $('#tipo2').val($('#tipo').val());
    $('#discapacidades2').val($('#discapacidades').val());
    $('#descripcion2').val($('#descripcion').val());

 @endsection

@section('delete') url: `{{url('Discapacidad')}}/${id}`, @endsection

@section('cargar') url: "{{route('Discapacidad.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Discapacidad.mostrar')}}", @endsection

@section('rellenar')

    $("#tipo").val(valores.tipo);
    $("#tipo2").val(valores.tipo);
    $("#discapacidades").val(valores.discapacidades);
    $("#discapacidades2").val(valores.discapacidades);
    $("#descripcion").val(valores.descripcion);
    $("#descripcion2").val(valores.descripcion);

@endsection

@section('editar')

    $("#tipo").removeAttr("disabled");
    $("#discapacidades").removeAttr("readonly");
    $("#descripcion").removeAttr("readonly");

@endsection

@section('mostrar')

    $("#tipo").attr("disabled", "disabled");
    $("#discapacidades").attr("readonly", "readonly");
    $("#descripcion").attr("readonly", "readonly");

@endsection

@section('validacion')

    let tipo = $("#tipo").val(); let tipo2 = $("#tipo2").val();
    let discapacidades = $("#discapacidades").val(); let discapacidades2 = $("#discapacidades2").val();
    let descripcion = $("#descripcion").val(); let descripcion2 = $("#descripcion2").val();
    let tip = 0; let dis = 0; let des = 0;

    if(tipo == "" || tipo == "null"){
        i++; tip++;
        $("#tipo").attr('class', 'form-control border border-danger');
        $("#tipo_e").html('El campo tipo es obligatorio.');

    }

    if(discapacidades == ""){
        i++; dis++;
        $("#discapacidades").attr('class', 'form-control border border-danger');
        $("#discapacidades_e").html('El campo discapacidad es obligatorio.');

    }else if(discapacidades.length > 255){
        i++; dis++;
        $("#discapacidades").attr('class', 'form-control border border-danger');
        $("#discapacidades_e").html('El campo discapacidad no debe contener más de 255 caracteres.');

    }else if(discapacidades.length < 3){
        i++; dis++;
        $("#discapacidades").attr('class', 'form-control border border-danger');
        $("#discapacidades_e").html('El campo discapacidad debe contener al menos 03 caracteres.');

    }

    if(descripcion == ""){
        i++; des++;
        $("#descripcion").attr('class', 'form-control border border-danger');
        $("#descripcion_e").html('El campo descripción es obligatorio.');
    }else if(descripcion.length < 3){
        i++; des++;
        $("#descripcion").attr('class', 'form-control border border-danger');
        $("#descripcion_e").html('El campo descripción debe contener al menos 03 caracteres.');

    }

    if(tipo == tipo2 && discapacidades == discapacidades2 && descripcion == descripcion2 && pro == 'Edicion'){
        i++; dis++; tip++; des++;
        message = 'No ha hecho ningun cambio.';

    }


    if(i > 0){

        if(pro == 'Registro'){

            if (tip > 0) {
                $("#tipo").val('null');
            }

            if (dis > 0) {
                $("#discapacidades").val('');
            }

            if (des > 0) {
                $("#descripcion").val('');
            }

        }else{

            if (tip > 0) {
                $("#tipo").val(tipo2);
            }

            if (dis > 0) {
                $("#discapacidades").val(discapacidades2);
            }

            if (des > 0) {
                $("#descripcion").val(descripcion2);
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
    $("#discapacidades_e").html('');
    $("#tipo_e").html('');
    $("#descripcion_e").html('');
    $("#discapacidades").attr('class', 'form-control');
    $("#tipo").attr('class', 'form-control');
    $("#descripcion").attr('class', 'form-control');
@endsection

@section('error')
    let tip = 0; let dis = 0; let des = 0;
    if (xhr.responseJSON.errors.discapacidades){
        $("#discapacidades_e").html(xhr.responseJSON.errors.discapacidades);
        $("#discapacidades").attr('class', 'form-control border border-danger');
        dis++;
    }

    if (xhr.responseJSON.errors.tipo){
        $("#tipo_e").html(xhr.responseJSON.errors.tipo);
        $("#tipo").attr('class', 'form-control border border-danger');
        tip++;
    }

    if (xhr.responseJSON.errors.descripcion){
        $("#descripcion_e").html(xhr.responseJSON.errors.descripcion);
        $("#descripcion").attr('class', 'form-control border border-danger');
        des++;
    }

    if (pro == "Registro") {

        if (tip > 0) {
            $("#tipo").val('null');
        }

        if (dis > 0) {
            $("#discapacidades").val('');
        }

        if (des > 0) {
            $("#descripcion").val('');
        }

    }else{

        if (tip > 0) {
            $("#tipo").val($("#tipo2").val());
        }

        if (dis > 0) {
            $("#discapacidades").val($("#discapacidades2").val());
        }

        if (des > 0) {
            $("#descripcion").val($("#descripcion2").val());
        }

    }
@endsection
