@section('document')

    $("#bs_secciones").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') url = "{{ route('Seccion.store') }}"; @endsection

@section('url_edicion') url = `{{url('Seccion')}}/${id}`; @endsection

@section('registro') $('#secciones').val(''); @endsection

@section('edicion') $('#secciones2').val($('#secciones').val()); @endsection

@section('delete') url: `{{url('Seccion')}}/${id}`, @endsection

@section('cargar') url: "{{route('Seccion.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Seccion.mostrar')}}", @endsection

@section('rellenar')

    $("#secciones").val(valores.secciones);
    $("#secciones2").val(valores.secciones);

@endsection

@section('editar') $("#secciones").removeAttr("readonly"); @endsection

@section('mostrar') $("#secciones").attr("readonly", "readonly"); @endsection

@section('validacion')

    let secciones = $("#secciones").val();
    let secciones2 = $("#secciones2").val();

    if(secciones == ""){
        i++;
        $("#secciones").attr('class', 'form-control border border-danger');
        $("#secciones_e").html('El campo sección es obligatorio.');

    }else if(secciones.length > 10){
        i++;
        $("#secciones").attr('class', 'form-control border border-danger');
        $("#secciones_e").html('El campo sección no debe contener más de 10 caracteres.');

    }else if(secciones.length < 1){
        i++;
        $("#secciones").attr('class', 'form-control border border-danger');
        $("#secciones_e").html('El campo sección debe contener al menos 1 caracteres.');

    }else if(secciones == secciones2 && pro == 'Edicion'){
        i++;
        message = 'No ha hecho ningun cambio.';
    }



    if(i > 0){

        if(pro == 'Registro'){
            $("#secciones").val('');
        }else{
            $("#secciones").val(secciones2);
        }
        boo = false;
        $("body").overhang({
            type: "error",
            message: message
        });
    }
@endsection

@section('reiniciar')
    $("#secciones_e").html('');
    $("#secciones").attr('class', 'form-control');
@endsection

@section('error')
    $("#secciones_e").html(xhr.responseJSON.errors.secciones);
    $("#secciones").attr('class', 'form-control border border-danger');
    if (pro == "Registro") {
        $("#secciones").val('');
    }else{
        $("#secciones").val($("#secciones2").val());
    }
@endsection