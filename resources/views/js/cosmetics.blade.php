@section('document')

    $("#bs_tipo").on("change", function() {
        cargar();
    });

    $("#bs_marca").on("change", function() {
        cargar();
    });

    $("#bs_modelo").on("change", function() {
        cargar();
    });

    $("#bs_cosmetico").on("keyup", function() {
        cargar();
    });

@endsection

@section('pro')

    if ($("#pro").val() == "Registro") {
        var url = "{{ route('Cosmetic.store') }}";
        var tipo = "POST";
        var message = "Registro completado con exito";
    }else{
        var url = "{{ route('Cosmetic.update',0) }}";
        var tipo = "PUT";
        var message = "Edición completado con exito";
    }

@endsection

@section('registro')

    $('#tipo').val('null');
    $('#marca').val('null');
    $('#modelo').val('null');
    $('#descripcion').val('');
    $('#cosmetico').val('');

@endsection

@section('edicion')

$('#modelo2').val($('#modelo').val());
$('#tipo2').val($('#tipo').val());
$('#descripcion2').val($('#descripcion').val());
$('#cosmetico2').val($('#cosmetico').val());

 @endsection

@section('delete') url: "{{url('Cosmetic')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('Cosmetic.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Cosmetic.mostrar')}}", @endsection

@section('rellenar')

    $("#marca").val(valores.marca);
    $("#modelo").val(valores.modelo);
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
