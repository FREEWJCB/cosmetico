@section('document')

    $("#bs_grados").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') url = "{{ route('Grado.store') }}"; @endsection

@section('url_edicion') url = `{{url('Grado')}}/${id}`; @endsection

@section('registro') $('#grados').val(''); @endsection

@section('edicion') $('#grados2').val($('#grados').val()); @endsection

@section('delete') url: `{{url('Grado')}}/${id}`, @endsection

@section('cargar') url: "{{route('Grado.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Grado.mostrar')}}", @endsection

@section('rellenar')

    $("#grados").val(valores.grados);
    $("#grados2").val(valores.grados);

@endsection

@section('editar') $("#grados").removeAttr("readonly"); @endsection

@section('mostrar') $("#grados").attr("readonly", "readonly"); @endsection

@section('validacion')

    let grados = $("#grados").val();
    let grados2 = $("#grados2").val();

    if(grados == ""){
        i++;
        $("#grados").attr('class', 'form-control border border-danger');
        $("#grados_e").html('El campo grado es obligatorio.');

    }else if(grados > 11){
        i++;
        $("#grados").attr('class', 'form-control border border-danger');
        $("#grados_e").html('El campo grado no debe ser mayor a 11.');

    }else if(grados < 1){
        i++;
        $("#grados").attr('class', 'form-control border border-danger');
        $("#grados_e").html('El campo grado debe ser al menos 1.');

    }else if(grados.length > 2){
        i++;
        $("#grados").attr('class', 'form-control border border-danger');
        $("#grados_e").html('El campo grado no debe contener más de 2 caracteres.');

    }else if(grados == grados2 && pro == 'Edicion'){
        i++;
        message = 'No ha hecho ningun cambio.';
    }



    if(i > 0){

        if(pro == 'Registro'){
            $("#grados").val('');
        }else{
            $("#grados").val(grados2);
        }
        boo = false;
        $("body").overhang({
            type: "error",
            message: message
        });
    }
@endsection

@section('reiniciar')
    $("#grados_e").html('');
    $("#grados").attr('class', 'form-control');
@endsection

@section('error')
    $("#grados_e").html(xhr.responseJSON.errors.grados);
    $("#grados").attr('class', 'form-control border border-danger');
    if (pro == "Registro") {
        $("#grados").val('');
    }else{
        $("#grados").val($("#grados2").val());
    }
@endsection
