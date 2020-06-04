@section('document')

    $("#bs_marca").on("change", function() {
        cargar();
    });

    $("#bs_modelo").on("keyup", function() {
        cargar();
    });

@endsection

@section('pro')

    if ($("#pro").val() == "Registro") {
        var url = "{{ route('Modelo.store') }}";
        var tipo = "POST";
        var message = "Registro completado con exito";
    }else{
        var url = "{{ route('Modelo.update',0) }}";
        var tipo = "PUT";
        var message = "Edición completado con exito";
    }

@endsection

@section('registro')

    $('#marca').val('null');
    $('#modelo').val('');

@endsection

@section('edicion')

$('#marca2').val($('#marca').val());
$('#modelo2').val($('#modelo').val());

 @endsection

@section('delete') url: "{{url('Modelo')}}"+"/"+id, @endsection

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
