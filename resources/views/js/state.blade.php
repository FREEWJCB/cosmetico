@section('document')

    $("#bs_states").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') url = "{{ route('State.store') }}"; @endsection

@section('url_edicion') url = `{{url('State')}}/${id}`; @endsection

@section('registro') $('#states').val(''); @endsection

@section('edicion') $('#states2').val($('#states').val()); @endsection

@section('delete') url: `{{url('State')}}/${id}`, @endsection

@section('cargar') url: "{{route('State.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('State.mostrar')}}", @endsection

@section('rellenar')

    $("#states").val(valores.states);
    $("#states2").val(valores.states);

@endsection

@section('editar') $("#states").removeAttr("readonly"); @endsection

@section('mostrar') $("#states").attr("readonly", "readonly"); @endsection

@section('validacion')

    let states = $("#states").val();
    let states2 = $("#states2").val();

    if(states == ""){
        i++;
        $("#states").attr('class', 'form-control border border-danger');
        $("#states_e").html('El campo estado es obligatorio.');

    }else if(states.length > 255){
        i++;
        $("#states").attr('class', 'form-control border border-danger');
        $("#states_e").html('El campo estado no debe contener más de 255 caracteres.');

    }else if(states.length < 3){
        i++;
        $("#states").attr('class', 'form-control border border-danger');
        $("#states_e").html('El campo estado debe contener al menos 03 caracteres.');

    }else if(states == states2 && pro == 'Edicion'){
        i++;
        message = 'No ha hecho ningun cambio.';
    }



    if(i > 0){

        if(pro == 'Registro'){
            $("#states").val('');
        }else{
            $("#states").val(states2);
        }
        boo = false;
        $("body").overhang({
            type: "error",
            message: message
        });
    }
@endsection

@section('reiniciar')
    $("#states_e").html('');
    $("#states").attr('class', 'form-control');
@endsection

@section('error')
    $("#states_e").html(xhr.responseJSON.errors.states);
    $("#states").attr('class', 'form-control border border-danger');
    if (pro == "Registro") {
        $("#states").val('');
    }else{
        $("#states").val($("#states2").val());
    }
@endsection
