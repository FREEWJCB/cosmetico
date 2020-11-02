@section('document')

    $("#bs_salones").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') url = "{{ route('Salon.store') }}"; @endsection

@section('url_edicion') url = `{{url('Salon')}}/${id}`; @endsection

@section('registro') $('#salones').val(''); @endsection

@section('edicion') $('#salones2').val($('#salones').val()); @endsection

@section('delete') url: `{{url('Salon')}}/${id}`, @endsection

@section('cargar') url: "{{route('Salon.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Salon.mostrar')}}", @endsection

@section('rellenar')

    $("#salones").val(valores.salones);
    $("#salones2").val(valores.salones);

@endsection

@section('editar') $("#salones").removeAttr("readonly"); @endsection

@section('mostrar') $("#salones").attr("readonly", "readonly"); @endsection

@section('validacion')

    let salones = $("#salones").val();
    let salones2 = $("#salones2").val();

    if(salones == ""){
        i++;
        $("#salones").attr('class', 'form-control border border-danger');
        $("#salones_e").html('El campo salon es obligatorio.');

    }else if(salones.length > 10){
        i++;
        $("#salones").attr('class', 'form-control border border-danger');
        $("#salones_e").html('El campo salon no debe contener más de 10 caracteres.');

    }else if(salones.length < 1){
        i++;
        $("#salones").attr('class', 'form-control border border-danger');
        $("#salones_e").html('El campo salon debe contener al menos 1 caracteres.');

    }else if(salones == salones2 && pro == 'Edicion'){
        i++;
        message = 'No ha hecho ningun cambio.';
    }



    if(i > 0){

        if(pro == 'Registro'){
            $("#salones").val('');
        }else{
            $("#salones").val(salones2);
        }
        boo = false;
        $("body").overhang({
            type: "error",
            message: message
        });
    }
@endsection

@section('reiniciar')
    $("#salones_e").html('');
    $("#salones").attr('class', 'form-control');
@endsection

@section('error')
    $("#salones_e").html(xhr.responseJSON.errors.salones);
    $("#salones").attr('class', 'form-control border border-danger');
    if (pro == "Registro") {
        $("#salones").val('');
    }else{
        $("#salones").val($("#salones2").val());
    }
@endsection
