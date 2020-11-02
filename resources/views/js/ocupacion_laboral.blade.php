@section('document')

    $("#bs_labor").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') url = "{{ route('Ocupacion_Laboral.store') }}"; @endsection

@section('url_edicion') url = `{{url('Ocupacion_Laboral')}}/${id}`; @endsection

@section('registro') $('#labor').val(''); @endsection

@section('edicion') $('#labor2').val($('#labor').val()); @endsection

@section('delete') url: `{{url('Ocupacion_Laboral')}}/${id}`, @endsection

@section('cargar') url: "{{route('Ocupacion_Laboral.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Ocupacion_Laboral.mostrar')}}", @endsection

@section('rellenar')

    $("#labor").val(valores.labor);
    $("#labor2").val(valores.labor);

@endsection

@section('editar') $("#labor").removeAttr("readonly"); @endsection

@section('mostrar') $("#labor").attr("readonly", "readonly"); @endsection

@section('validacion')

    let labor = $("#labor").val();
    let labor2 = $("#labor2").val();

    if(labor == ""){
        i++;
        $("#labor").attr('class', 'form-control border border-danger');
        $("#labor_e").html('El campo labor es obligatorio.');

    }else if(labor.length > 255){
        i++;
        $("#labor").attr('class', 'form-control border border-danger');
        $("#labor_e").html('El campo labor no debe contener más de 255 caracteres.');

    }else if(labor.length < 3){
        i++;
        $("#labor").attr('class', 'form-control border border-danger');
        $("#labor_e").html('El campo labor debe contener al menos 03 caracteres.');

    }else if(labor == labor2 && pro == 'Edicion'){
        i++;
        message = 'No ha hecho ningun cambio.';
    }



    if(i > 0){

        if(pro == 'Registro'){
            $("#labor").val('');
        }else{
            $("#labor").val(labor2);
        }
        boo = false;
        $("body").overhang({
            type: "error",
            message: message
        });
    }
@endsection

@section('reiniciar')
    $("#labor_e").html('');
    $("#labor").attr('class', 'form-control');
@endsection

@section('error')
    $("#labor_e").html(xhr.responseJSON.errors.labor);
    $("#labor").attr('class', 'form-control border border-danger');
    if (pro == "Registro") {
        $("#labor").val('');
    }else{
        $("#labor").val($("#labor2").val());
    }
@endsection
