@section('document')

    $("#bs_tipo").on("change", function() {
        cargar();
    });

    $("#bs_discapacidades").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') var url = "{{ route('Discapacidad.store') }}"; @endsection

@section('url_edicion') var url = "{{ route('Discapacidad.update') }}"; @endsection

@section('registro')

    $('#tipo').val('null');
    $('#discapacidades').val('');
    $('#descripcion').val('');

@endsection

@section('edicion')

    $('#tipo2').val($('#tipo').val());
    $('#discapacidades2').val($('#discapacidades').val());
    $('#descripcion2').val($('#descripcion').val());

 @endsection

@section('delete') url: "{{url('Discapacidad')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('Discapacidad.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Discapacidad.mostrar')}}", @endsection

@section('rellenar')

    $("#tipo").val(valores.tipo);
    $("#tipo2").val(valores.tipo);
    $("#discapacidades").val(valores.discapacidades);
    $("#discapacidades2").val(valores.discapacidades);
    $("#descripcion").val(valores.descripcion);
    $("#descripcion2").val(valores.descripcion);

@endsection

@section('editar')

    $("#tipo").removeAttr("disabled");
    $("#discapacidades").removeAttr("readonly");
    $("#descripcion").removeAttr("readonly");

@endsection

@section('mostrar')

    $("#tipo").attr("disabled", "disabled");
    $("#discapacidades").attr("readonly", "readonly");
    $("#descripcion").attr("readonly", "readonly");

@endsection
