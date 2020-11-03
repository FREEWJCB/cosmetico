@section('document')

    $("#bs_state").on("change", function() {
        cargar();
    });

    $("#bs_municipalitys").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') url = "{{ route('Municipality.store') }}"; @endsection

@section('url_edicion') url = `{{url('Municipality')}}/${id}`; @endsection

@section('registro')

    $('#state').val('null');
    $('#municipalitys').val('');

@endsection

@section('edicion')

    $('#state2').val($('#state').val());
    $('#municipalitys2').val($('#municipalitys').val());

 @endsection

@section('delete') url: `{{url('Municipality')}}/${id}`, @endsection

@section('cargar') url: "{{route('Municipality.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Municipality.mostrar')}}", @endsection

@section('rellenar')

    $("#state").val(valores.state);
    $("#state2").val(valores.state);
    $("#municipalitys").val(valores.municipalitys);
    $("#municipalitys2").val(valores.municipalitys);

@endsection

@section('editar')

    $("#state").removeAttr("disabled");
    $("#municipalitys").removeAttr("readonly");

@endsection

@section('mostrar')

    $("#state").attr("disabled", "disabled");
    $("#municipalitys").attr("readonly", "readonly");

@endsection

@section('validacion')

    let state = $("#state").val(); let state2 = $("#state2").val();
    let municipalitys = $("#municipalitys").val(); let municipalitys2 = $("#municipalitys2").val();
    let mar = 0; let mod = 0;

    if(state == "" || state == "null"){
        i++; mar++;
        $("#state").attr('class', 'form-control border border-danger');
        $("#state_e").html('El campo estado es obligatorio.');

    }

    if(municipalitys == ""){
        i++; mod++;
        $("#municipalitys").attr('class', 'form-control border border-danger');
        $("#municipalitys_e").html('El campo municipio es obligatorio.');

    }else if(municipalitys.length > 255){
        i++; mod++;
        $("#municipalitys").attr('class', 'form-control border border-danger');
        $("#municipalitys_e").html('El campo municipio no debe contener más de 255 caracteres.');

    }else if(municipalitys.length < 3){
        i++; mod++;
        $("#municipalitys").attr('class', 'form-control border border-danger');
        $("#municipalitys_e").html('El campo municipio debe contener al menos 03 caracteres.');

    }

    if(state == state2 && municipalitys == municipalitys2 && pro == 'Edicion'){
        i++; mod++; mar++;
        message = 'No ha hecho ningun cambio.';

    }


    if(i > 0){

        if(pro == 'Registro'){

            if (mar > 0) {
                $("#state").val('null');
            }

            if (mod > 0) {
                $("#municipalitys").val('');
            }

        }else{

            if (mar > 0) {
                $("#state").val(state2);
            }

            if (mod > 0) {
                $("#municipalitys").val(municipalitys2);
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
    $("#municipalitys_e").html('');
    $("#state_e").html('');
    $("#municipalitys").attr('class', 'form-control');
    $("#state").attr('class', 'form-control');
@endsection

@section('error')
    let mar = 0; let mod = 0;
    if (xhr.responseJSON.errors.municipalitys){
        $("#municipalitys_e").html(xhr.responseJSON.errors.municipalitys);
        $("#municipalitys").attr('class', 'form-control border border-danger');
        mod++;
    }

    if (xhr.responseJSON.errors.state){
        $("#state_e").html(xhr.responseJSON.errors.state);
        $("#state").attr('class', 'form-control border border-danger');
        mar++;
    }



    if (pro == "Registro") {

        if (mar > 0) {
            $("#state").val('null');
        }

        if (mod > 0) {
            $("#municipalitys").val('');
        }

    }else{

        if (mar > 0) {
            $("#state").val($("#state2").val());
        }

        if (mod > 0) {
            $("#municipalitys").val($("#municipalitys2").val());
        }

    }
@endsection
