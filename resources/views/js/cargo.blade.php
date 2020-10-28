{{-- <script> --}}
@section('document')

    $("#bs_cargos").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') let url = "{{ route('Cargo.store') }}"; @endsection

@section('url_edicion') let url = `{{url('Cargo')}}/${id}`; @endsection

@section('registro') $('#cargos').val(''); @endsection

@section('edicion') $('#cargos2').val($('#cargos').val()); @endsection

@section('delete') url: `{{url('Cargo')}}/${id}`, @endsection

@section('cargar') url: "{{route('Cargo.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Cargo.mostrar')}}", @endsection

@section('rellenar')

    $("#cargos").val(valores.cargos);
    $("#cargos2").val(valores.cargos);

@endsection

@section('editar') $("#cargos").removeAttr("readonly"); @endsection

@section('mostrar') $("#cargos").attr("readonly", "readonly"); @endsection

@section('validacion')

    let cargos = $("#cargos").val();
    let cargos2 = $("#cargos2").val();

    if(cargos == ""){
        i++;
        $("#cargos").val('');
        $("#cargos").attr('class', 'form-control border border-danger');
        $("#cargos_e").html('El campo cargo es obligatorio.');

    }else if(cargos.length > 255){
        i++;
        $("#cargos").val('');
        $("#cargos").attr('class', 'form-control border border-danger');
        $("#cargos_e").html('El campo cargo no debe contener más de 255 caracteres.');

    }else if(cargos.length < 3){
        i++;
        $("#cargos").val('');
        $("#cargos").attr('class', 'form-control border border-danger');
        $("#cargos_e").html('El campo cargo debe contener al menos 03 caracteres.');

    }else if(cargos == cargos2 && pro == 'Edicion'){
        i++;
        $("#cargos").val(cargos2);
        message = 'No ha hecho ningun cambio.';
    }
    console.log(i);
    if(i > 0){
        boo = false;
        $("body").overhang({
            type: "error",
            message: message
        });
    }
@endsection

@section('reiniciar')
    $("#cargos_e").html('');
    $("#cargos").attr('class', 'form-control');
@endsection

@section('error')
    console.log(xhr.responseJSON);
@endsection
