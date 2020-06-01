@section('document')

    $("#bs_tipo").on("keyup", function() {
        cargar();
    });

    $("#bs_marca").on("keyup", function() {
        cargar();
    });

    $("#bs_modelo").on("keyup", function() {
        cargar();
    });

    $("#bs_cosmetico").on("keyup", function() {
        cargar();
    });

@endsection

@section('pro')

    if ($("#pro").val() == "Registro") {
        var url = "{{ route('Cosmetico.store') }}";
        var marca = "POST";
        var message = "Registro completado con exito";
    }else{
        var url = "{{ route('Cosmetico.update',0) }}";
        var marca = "PUT";
        var message = "Edición completado con exito";
    }

@endsection

@section('registro')

    $('#tipo').val('');
    $('#marca').val('');
    $('#modelo').val('');
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

@section('delete') url: "{{url('Cosmetico')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('Cosmetico.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Cosmetico.mostrar')}}", @endsection

@section('rellenar')

    $("#marca").val(valores.marca);
    $("#marca2").val(valores.marca);
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

$("#marca").removeAttr("readonly");
$("#modelo").removeAttr("readonly");
$("#tipo").removeAttr("readonly");
$("#descripcion").removeAttr("readonly");
$("#cosmetico").removeAttr("readonly");

@endsection

@section('mostrar')

$("#marca").attr("readonly", "readonly");
$("#modelo").attr("readonly", "readonly");
$("#tipo").attr("readonly", "readonly");
$("#descripcion").attr("readonly", "readonly");
$("#modelo").attr("readonly", "readonly");

@endsection
