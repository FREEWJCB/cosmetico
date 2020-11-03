@section('document')

    $("#bs_tipo").on("change", function() {
        cargar();
    });

    $("#bs_marca").on("change", function() {

        cargar();
        var marca = $("#bs_marca").val();
        combo("modelos", "marca", marca, "bs_modelo", 0, "modelo", "modelo", 0);

    });

    $("#bs_modelo").on("change", function() {
        cargar();
    });

    $("#bs_cosmetico").on("keyup", function() {
        cargar();
    });

    $("#marca").on("change", function() {
        var marca = $("#marca").val();
        combo("modelos", "marca", marca, "modelo", 0, "modelo", "modelo", 2);
    });

@endsection

@section('url_registro') url = "{{ route('Cosmetic.store') }}"; @endsection

@section('url_edicion') url = `{{url('Cosmetic')}}/${id}`; @endsection

@section('select')


    $('#modelo').html('<option value="null" disabled selected>Seleccione un modelo</option>');


@endsection

@section('registro')

    $('#tipo').val('null');
    $('#marca').val('null');
    $('#modelo').html('<option value="null" disabled selected>Seleccione un modelo</option>');
    $('#descripcion').val('');
    $('#cosmetico').val('');

@endsection

@section('edicion')

    $('#marca2').val($('#marca').val());
    $('#modelo2').val($('#modelo').val());
    $('#tipo2').val($('#tipo').val());
    $('#descripcion2').val($('#descripcion').val());
    $('#cosmetico2').val($('#cosmetico').val());

 @endsection

@section('delete') url: `{{url('Cosmetic')}}/${id}`, @endsection

@section('cargar') url: "{{route('Cosmetic.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Cosmetic.mostrar')}}", @endsection

@section('rellenar')

    $("#marca").val(valores.marca);
    $("#marca2").val(valores.marca);
    combo("modelos", "marca", valores.marca, "modelo", valores.modelo, "modelo", "modelo", 1);
    $("#modelo2").val(valores.modelo);
    $("#tipo").val(valores.tipo);
    $("#tipo2").val(valores.tipo);
    $("#descripcion").val(valores.descripcion);
    $("#descripcion2").val(valores.descripcion);
    $("#cosmetico").val(valores.cosmetico);
    $("#cosmetico2").val(valores.cosmetico);

@endsection

@section('editar')

    $("#marca").removeAttr("disabled");
    $("#modelo").removeAttr("disabled");
    $("#tipo").removeAttr("disabled");
    $("#descripcion").removeAttr("readonly");
    $("#cosmetico").removeAttr("readonly");

@endsection

@section('mostrar')

    $("#marca").attr("disabled", "disabled");
    $("#modelo").attr("disabled", "disabled");
    $("#tipo").attr("disabled", "disabled");
    $("#descripcion").attr("readonly", "readonly");
    $("#cosmetico").attr("readonly", "readonly");

@endsection

@section('validacion')

    let marca = $("#marca").val(); let marca2 = $("#marca2").val();
    let modelo = $("#modelo").val(); let modelo2 = $("#modelo2").val();
    let tipo = $("#tipo").val(); let tipo2 = $("#tipo2").val();
    let cosmetico = $("#cosmetico").val(); let cosmetico2 = $("#cosmetico2").val();
    let descripcion = $("#descripcion").val(); let descripcion2 = $("#descripcion2").val();
    let mar = 0; let mod = 0; let tip = 0; let cos = 0; let des = 0;

    if(marca == "" || marca == "null"){
        i++; mar++;
        $("#marca").attr('class', 'form-control border border-danger');
        $("#marca_e").html('El campo marca es obligatorio.');

    }

    if(modelo == "" || modelo == "null"){
        i++; mod++;
        $("#modelo").attr('class', 'form-control border border-danger');
        $("#modelo_e").html('El campo modelo es obligatorio.');

    }

    if(tipo == "" || tipo == "null"){
        i++; tip++;
        $("#tipo").attr('class', 'form-control border border-danger');
        $("#tipo_e").html('El campo tipo es obligatorio.');

    }

    if(cosmetico == ""){
        i++; cos++;
        $("#cosmetico").attr('class', 'form-control border border-danger');
        $("#cosmetico_e").html('El campo cosmetico es obligatorio.');
    }else if(cosmetico.length > 255){
        i++; cos++;
        $("#cosmetico").attr('class', 'form-control border border-danger');
        $("#cosmetico_e").html('El campo cosmetico no debe contener más de 255 caracteres.');

    }else if(cosmetico.length < 3){
        i++; cos++;
        $("#cosmetico").attr('class', 'form-control border border-danger');
        $("#cosmetico_e").html('El campo cosmetico debe contener al menos 03 caracteres.');

    }

    if(descripcion == ""){
        i++; des++;
        $("#descripcion").attr('class', 'form-control border border-danger');
        $("#descripcion_e").html('El campo descripción es obligatorio.');
    }else if(descripcion.length < 3){
        i++; des++;
        $("#descripcion").attr('class', 'form-control border border-danger');
        $("#descripcion_e").html('El campo descripción debe contener al menos 03 caracteres.');

    }

    if(marca == marca2 && modelo == modelo2 &&  tipo == tipo2 &&  cosmetico == cosmetico2 &&  descripcion == descripcion2 && pro == 'Edicion'){
        i++; mod++; mar++; tip++; cos++; des++;
        message = 'No ha hecho ningun cambio.';

    }

    if(i > 0){

        if(pro == 'Registro'){
            if (mar > 0) {
                $("#marca").val('null');
            }

            if (mod > 0) {
                $('#modelo').html('<option value="null" disabled selected>Seleccione un modelo</option>');
            }

            if (tip > 0) {
                $("#tipo").val('null');
            }

            if (cos > 0) {
                $("#cosmetico").val('');
            }

            if (des > 0) {
                $("#descripcion").val('');
            }

        }else{
            if (mar > 0) {
                $("#marca").val(marca2);
            }

            if (mod > 0) {
                combo("modelos", "marca", marca2, "modelo", modelo2, "modelo", "modelo", 1);
            }

            if (tip > 0) {
                $("#tipo").val(tipo2);
            }

            if (cos > 0) {
                $("#cosmetico").val(cosmetico2);
            }

            if (des > 0) {
                $("#descripcion").val(descripcion2);
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
    $("#tipo_e").html('');
    $("#cosmetico_e").html('');
    $("#descripcion_e").html('');
    $("#modelo").attr('class', 'form-control');
    $("#marca").attr('class', 'form-control');
    $("#tipo").attr('class', 'form-control');
    $("#cosmetico").attr('class', 'form-control');
    $("#descripcion").attr('class', 'form-control');
@endsection

@section('error')
    let mar = 0; let mod = 0; let tip = 0; let cos = 0; let des = 0;

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

    if (xhr.responseJSON.errors.tipo){
        $("#tipo_e").html(xhr.responseJSON.errors.tipo);
        $("#tipo").attr('class', 'form-control border border-danger');
        tip++;
    }

    if (xhr.responseJSON.errors.cosmetico){
        $("#cosmetico_e").html(xhr.responseJSON.errors.cosmetico);
        $("#cosmetico").attr('class', 'form-control border border-danger');
        cos++;
    }

    if (xhr.responseJSON.errors.descripcion){
        $("#descripcion_e").html(xhr.responseJSON.errors.descripcion);
        $("#descripcion").attr('class', 'form-control border border-danger');
        des++;
    }



    if (pro == "Registro") {

        if (mar > 0) {
            $("#marca").val('null');
        }

        if (mod > 0) {
            $('#modelo').html('<option value="null" disabled selected>Seleccione un modelo</option>');
        }

        if (tip > 0) {
            $("#tipo").val('null');
        }

        if (cos > 0) {
            $("#cosmetico").val('');
        }

        if (des > 0) {
            $("#descripcion").val('');
        }

    }else{

        if (mar > 0) {
            $("#marca").val($("#marca2").val());
        }

        if (mod > 0) {
            combo("modelos", "marca", $("#marca2").val(), "modelo", $("#modelo2").val(), "modelo", "modelo", 1);
        }

        if (tip > 0) {
            $("#tipo").val($("#tipo2").val());
        }

        if (cos > 0) {
            $("#cosmetico").val($("#cosmetico2").val());
        }

        if (des > 0) {
            $("#descripcion").val($("#descripcion2").val());
        }

    }
@endsection
