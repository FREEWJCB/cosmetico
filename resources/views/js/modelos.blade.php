{{-- <script> --}}
@section('document')

    $("#bs_marca").on("change", function() {
        cargar();
    });

    $("#bs_modelo").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') url = "{{ route('Modelo.store') }}"; @endsection

@section('url_edicion') url = `{{url('Modelo')}}/${id}`; @endsection

@section('registro')

    $('#marca').val('null');
    $('#modelo').val('');

@endsection

@section('edicion')

    $('#marca2').val($('#marca').val());
    $('#modelo2').val($('#modelo').val());

 @endsection

@section('delete') url: `{{url('Modelo')}}/${id}`, @endsection

@section('cargar') url: "{{route('Modelo.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Modelo.mostrar')}}", @endsection

@section('rellenar')

    $("#marca").val(valores.marca);
    $("#marca2").val(valores.marca);
    $("#modelo").val(valores.modelo);
    $("#modelo2").val(valores.modelo);

@endsection

@section('editar')

    $("#marca").removeAttr("disabled");
    $("#modelo").removeAttr("readonly");

@endsection

@section('mostrar')

    $("#marca").attr("disabled", "disabled");
    $("#modelo").attr("readonly", "readonly");

@endsection

@section('validacion')

    let marca = $("#marca").val();
    let marca2 = $("#marca2").val();
    let modelo = $("#modelo").val();
    let modelo2 = $("#modelo2").val();
    let mar = 0;
    let mod = 0;

    if(marca == "" || marca == "null"){
        i++; mar++;
        $("#marca").attr('class', 'form-control border border-danger');
        $("#marca_e").html('El campo marca es obligatorio.');

    }

    if(modelo == ""){
        i++;
        $("#modelo").attr('class', 'form-control border border-danger');
        $("#modelo_e").html('El campo modelo es obligatorio.');
        mod++; mod++;
    }else if(modelo.length > 255){
        i++; mod++;
        $("#modelo").attr('class', 'form-control border border-danger');
        $("#modelo_e").html('El campo modelo no debe contener más de 255 caracteres.');

    }else if(modelo.length < 3){
        i++; mod++;
        $("#modelo").attr('class', 'form-control border border-danger');
        $("#modelo_e").html('El campo modelo debe contener al menos 03 caracteres.');

    }

    if(marca == marca2 && modelo == modelo2 && pro == 'Edicion'){
        i++; mod++; mar++;
        message = 'No ha hecho ningun cambio.';

    }


    if(i > 0){

        if(pro == 'Registro'){
            if (mar > 0) {
                $("#marca").val('null');
            }

            if (mod > 0) {
                $("#modelo").val('');
            }

        }else{
            if (mar > 0) {
                $("#marca").val(marca2);
            }

            if (mod > 0) {
                $("#modelo").val(modelo2);
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
    $("#modelo_e").html('');
    $("#marca_e").html('');
    $("#modelo").attr('class', 'form-control');
    $("#marca").attr('class', 'form-control');
@endsection

@section('error')
    let mar = 0;
    let mod = 0;
    if (xhr.responseJSON.errors.modelo){
        $("#modelo_e").html(xhr.responseJSON.errors.modelo);
        $("#modelo").attr('class', 'form-control border border-danger');
        mod++;
    }

    if (xhr.responseJSON.errors.marca){
        $("#marca_e").html(xhr.responseJSON.errors.marca);
        $("#marca").attr('class', 'form-control border border-danger');
        mar++;
    }



    if (pro == "Registro") {
        if (mar > 0) {
            $("#marca").val('null');
        }

        if (mod > 0) {
            $("#modelo").val('');
        }
    }else{
        $("#marca").val($("#marca2").val());
        $("#modelo").val($("#modelo2").val());
    }
@endsection
