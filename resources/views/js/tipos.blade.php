@section('document')
    $("#bs_tipo").on("keyup", function() {
        cargar("{{route('Tipo.cargar')}}");
    });
@endsection

@section('delete')

    url: "{{url('Tipo')}}"+"/"+id,

@endsection

@section('cargar')

    cargar("{{route('Tipo.cargar')}}");

@endsection

@section('rellenar_url')

    url: "{{route('Tipo.rellenar')}}",

@endsection

@section('rellenar')

    $("#tipo").val(valores.tipo);
    $("#tipo2").val(valores.tipo);

@endsection

@section('editar')

    $("#tipo").removeAttr("readonly");

@endsection

@section('mostrar')

    $("#tipo").attr("readonly", "readonly");

@endsection
