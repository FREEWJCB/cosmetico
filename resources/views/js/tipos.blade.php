@section('document')

    $("#bs_tipo").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') var url = "{{ route('Tipo.store') }}"; @endsection

@section('url_edicion') var url = "{{ route('Tipo.update') }}"; @endsection

@section('registro') $('#tipo').val(''); @endsection

@section('edicion') $('#tipo2').val($('#tipo').val()); @endsection

@section('delete') url: "{{url('Tipo')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('Tipo.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Tipo.mostrar')}}", @endsection

@section('rellenar')

    $("#tipo").val(valores.tipo);
    $("#tipo2").val(valores.tipo);

@endsection

@section('editar') $("#tipo").removeAttr("readonly"); @endsection

@section('mostrar') $("#tipo").attr("readonly", "readonly"); @endsection
