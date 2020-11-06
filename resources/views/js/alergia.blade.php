@section('document')

    $("#bs_tipo").on("change", function() {
        cargar();
    });

    $("#bs_alergias").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') url = "{{ route('Alergia.store') }}"; @endsection

@section('url_edicion') url = `{{url('Alergia')}}/${id}`; @endsection

@section('registro')

    $('#tipo').val('null');
    $('#alergias').val('');
    $('#descripcion').val('');

@endsection

@section('edicion')

    $('#tipo2').val($('#tipo').val());
    $('#alergias2').val($('#alergias').val());
    $('#descripcion2').val($('#descripcion').val());

 @endsection

@section('delete') url: `{{url('Alergia')}}/${id}`, @endsection

@section('cargar') url: "{{route('Alergia.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Alergia.mostrar')}}", @endsection

@section('rellenar')

    $("#tipo").val(valores.tipo);
    $("#tipo2").val(valores.tipo);
    $("#alergias").val(valores.alergias);
    $("#alergias2").val(valores.alergias);
    $("#descripcion").val(valores.descripcion);
    $("#descripcion2").val(valores.descripcion);

@endsection

@section('editar')

    $("#tipo").removeAttr("disabled");
    $("#alergias").removeAttr("readonly");
    $("#descripcion").removeAttr("readonly");

@endsection

@section('mostrar')

    $("#tipo").attr("disabled", "disabled");
    $("#alergias").attr("readonly", "readonly");
    $("#descripcion").attr("readonly", "readonly");

@endsection

@section('validacion')

    let tipo = $("#tipo").val(); let tipo2 = $("#tipo2").val();
    let alergias = $("#alergias").val(); let alergias2 = $("#alergias2").val();
    let descripcion = $("#descripcion").val(); let descripcion2 = $("#descripcion2").val();
    let tip = 0; let ale = 0; let des = 0;

    if(tipo == "" || tipo == "null"){
        i++; tip++;
        $("#tipo").attr('class', 'form-control border border-danger');
        $("#tipo_e").html('El campo tipo es obligatorio.');

    }

    if(alergias == ""){
        i++; ale++;
        $("#alergias").attr('class', 'form-control border border-danger');
        $("#alergias_e").html('El campo alergia es obligatorio.');

    }else if(alergias.length > 255){
        i++; ale++;
        $("#alergias").attr('class', 'form-control border border-danger');
        $("#alergias_e").html('El campo alergia no debe contener más de 255 caracteres.');

    }else if(alergias.length < 3){
        i++; ale++;
        $("#alergias").attr('class', 'form-control border border-danger');
        $("#alergias_e").html('El campo alergia debe contener al menos 03 caracteres.');

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

    if(tipo == tipo2 && alergias == alergias2 && descripcion == descripcion2 && pro == 'Edicion'){
        i++; ale++; tip++; des++;
        message = 'No ha hecho ningun cambio.';

    }


    if(i > 0){

        if(pro == 'Registro'){

            if (tip > 0) {
                $("#tipo").val('null');
            }

            if (ale > 0) {
                $("#alergias").val('');
            }

            if (des > 0) {
                $("#descripcion").val('');
            }

        }else{

            if (tip > 0) {
                $("#tipo").val(tipo2);
            }

            if (ale > 0) {
                $("#alergias").val(alergias2);
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
    $("#alergias_e").html('');
    $("#tipo_e").html('');
    $("#descripcion_e").html('');
    $("#alergias").attr('class', 'form-control');
    $("#tipo").attr('class', 'form-control');
    $("#descripcion").attr('class', 'form-control');
@endsection

@section('error')
    let tip = 0; let ale = 0; let des = 0;
    if (xhr.responseJSON.errors.alergias){
        $("#alergias_e").html(xhr.responseJSON.errors.alergias);
        $("#alergias").attr('class', 'form-control border border-danger');
        ale++;
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

        if (ale > 0) {
            $("#alergias").val('');
        }

        if (des > 0) {
            $("#descripcion").val('');
        }

    }else{

        if (tip > 0) {
            $("#tipo").val($("#tipo2").val());
        }

        if (ale > 0) {
            $("#alergias").val($("#alergias2").val());
        }

        if (des > 0) {
            $("#descripcion").val($("#descripcion2").val());
        }
    }
@endsection
