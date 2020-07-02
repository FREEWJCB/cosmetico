@section('document')

    $("#bs_tipo").on("change", function() {
        cargar();
    });

    $("#bs_alergias").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') var url = "{{ route('Alergia.store') }}"; @endsection

@section('url_edicion') var url = "{{ route('Alergia.update') }}"; @endsection

@section('registro')

    $('#tipo').val('null');
    $('#alergias').val('');
    $('#descripcion').val('');

@endsection

@section('edicion')

    $('#tipo2').val($('#tipo').val());
    $('#alergias2').val($('#alergias').val());
    $('#descripcion2').val($('#descripcion').val());

 @endsection

@section('delete') url: "{{url('Alergia')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('Alergia.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Alergia.mostrar')}}", @endsection

@section('rellenar')

    $("#tipo").val(valores.tipo);
    $("#tipo2").val(valores.tipo);
    $("#alergias").val(valores.alergias);
    $("#alergias2").val(valores.alergias);
    $("#descripcion").val(valores.descripcion);
    $("#descripcion2").val(valores.descripcion);

@endsection

@section('editar')

    $("#tipo").removeAttr("disabled");
    $("#alergias").removeAttr("readonly");
    $("#descripcion").removeAttr("readonly");

@endsection

@section('mostrar')

    $("#tipo").attr("disabled", "disabled");
    $("#alergias").attr("readonly", "readonly");
    $("#descripcion").attr("readonly", "readonly");

@endsection
