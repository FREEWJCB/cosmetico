{{-- <script> --}}
@section('document')

    $("#bs_cargos").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') url = "{{ route('Cargo.store') }}"; @endsection

@section('url_edicion') url = `{{url('Cargo')}}/${id}`; @endsection

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
        $("#cargos").attr('class', 'form-control border border-danger');
        $("#cargos_e").html('El campo cargo es obligatorio.');

    }else if(cargos.length > 255){
        i++;
        $("#cargos").attr('class', 'form-control border border-danger');
        $("#cargos_e").html('El campo cargo no debe contener más de 255 caracteres.');

    }else if(cargos.length < 3){
        i++;
        $("#cargos").attr('class', 'form-control border border-danger');
        $("#cargos_e").html('El campo cargo debe contener al menos 03 caracteres.');

    }else if(cargos == cargos2 && pro == 'Edicion'){
        i++;
        message = 'No ha hecho ningun cambio.';
    }



    if(i > 0){

        if(pro == 'Registro'){
            $("#cargos").val('');
        }else{
            $("#cargos").val(cargos2);
        }
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
    $("#cargos_e").html(xhr.responseJSON.errors.cargos);
    $("#cargos").attr('class', 'form-control border border-danger');
    if (pro == "Registro") {
        $("#cargos").val('');
    }else{
        $("#cargos").val($("#cargos2").val());
    }
@endsection
