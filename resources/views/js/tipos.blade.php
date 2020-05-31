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
