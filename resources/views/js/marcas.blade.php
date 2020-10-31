@section('document')

    $("#bs_marca").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') var url = "{{ route('Marca.store') }}"; @endsection

@section('url_edicion') var url = `{{url('Marca')}}/${id}`; @endsection

@section('registro') $('#marca').val(''); @endsection

@section('edicion') $('#marca2').val($('#marca').val()); @endsection

@section('delete') url: `{{url('Marca')}}/${id}`, @endsection

@section('cargar') url: "{{route('Marca.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Marca.mostrar')}}", @endsection

@section('rellenar')

    $("#marca").val(valores.marca);
    $("#marca2").val(valores.marca);

@endsection

@section('editar') $("#marca").removeAttr("readonly"); @endsection

@section('mostrar') $("#marca").attr("readonly", "readonly"); @endsection

@section('validacion')

    let marca = $("#marca").val();
    let marca2 = $("#marca2").val();

    if(marca == ""){
        i++;
        $("#marca").attr('class', 'form-control border border-danger');
        $("#marca_e").html('El campo marca es obligatorio.');

    }else if(marca.length > 255){
        i++;
        $("#marca").attr('class', 'form-control border border-danger');
        $("#marca_e").html('El campo marca no debe contener más de 255 caracteres.');

    }else if(marca.length < 3){
        i++;
        $("#marca").attr('class', 'form-control border border-danger');
        $("#marca_e").html('El campo marca debe contener al menos 03 caracteres.');

    }else if(marca == marca2 && pro == 'Edicion'){
        i++;
        message = 'No ha hecho ningun cambio.';
    }



    if(i > 0){

        if(pro == 'Registro'){
            $("#marca").val('');
        }else{
            $("#marca"
            ).val(marca2);
        }
        boo = false;
        $("body").overhang({
            type: "error",
            message: message
        });
    }
@endsection

@section('reiniciar')
    $("#marca_e").html('');
    $("#marca").attr('class', 'form-control');
@endsection

@section('error')
    $("#marca_e").html(xhr.responseJSON.errors.marca);
    $("#marca").attr('class', 'form-control border border-danger');
    if (pro == "Registro") {
        $("#marca").val('');
    }else{
        $("#marca").val($("#marca2").val());
    }
@endsection
