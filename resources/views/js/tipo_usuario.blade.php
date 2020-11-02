@section('document')

    $("#bs_tipo").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') url = "{{ route('Tipo_Usuario.store') }}"; @endsection

@section('url_edicion') url = `{{url('Tipo_Usuario')}}/${id}`; @endsection

@section('registro') $('#tipo').val(''); @endsection

@section('edicion') $('#tipo2').val($('#tipo').val()); @endsection

@section('delete') url: `{{url('Tipo_Usuario')}}/${id}`, @endsection

@section('cargar') url: "{{route('Tipo_Usuario.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Tipo_Usuario.mostrar')}}", @endsection

@section('rellenar')

    $("#tipo").val(valores.tipo);
    $("#tipo2").val(valores.tipo);

@endsection

@section('editar') $("#tipo").removeAttr("readonly"); @endsection

@section('mostrar') $("#tipo").attr("readonly", "readonly"); @endsection

@section('validacion')

    let tipo = $("#tipo").val();
    let tipo2 = $("#tipo2").val();

    if(tipo == ""){
        i++;
        $("#tipo").attr('class', 'form-control border border-danger');
        $("#tipo_e").html('El campo tipo es obligatorio.');

    }else if(tipo.length > 255){
        i++;
        $("#tipo").attr('class', 'form-control border border-danger');
        $("#tipo_e").html('El campo tipo no debe contener más de 255 caracteres.');

    }else if(tipo.length < 3){
        i++;
        $("#tipo").attr('class', 'form-control border border-danger');
        $("#tipo_e").html('El campo tipo debe contener al menos 03 caracteres.');

    }else if(tipo == tipo2 && pro == 'Edicion'){
        i++;
        message = 'No ha hecho ningun cambio.';
    }



    if(i > 0){

        if(pro == 'Registro'){
            $("#tipo").val('');
        }else{
            $("#tipo").val(tipo2);
        }
        boo = false;
        $("body").overhang({
            type: "error",
            message: message
        });
    }
@endsection

@section('reiniciar')
    $("#tipo_e").html('');
    $("#tipo").attr('class', 'form-control');
@endsection

@section('error')
    $("#tipo_e").html(xhr.responseJSON.errors.tipo);
    $("#tipo").attr('class', 'form-control border border-danger');
    if (pro == "Registro") {
        $("#tipo").val('');
    }else{
        $("#tipo").val($("#tipo2").val());
    }
@endsection
