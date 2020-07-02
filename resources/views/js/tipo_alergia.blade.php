@section('document')

    $("#bs_tipo").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') var url = "{{ route('Tipo_Alergia.store') }}"; @endsection

@section('url_edicion') var url = "{{ route('Tipo_Alergia.update') }}"; @endsection

@section('registro') $('#tipo').val(''); @endsection

@section('edicion') $('#tipo2').val($('#tipo').val()); @endsection

@section('delete') url: "{{url('Tipo_Alergia')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('Tipo_Alergia.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Tipo_Alergia.mostrar')}}", @endsection

@section('rellenar')

    $("#tipo").val(valores.tipo);
    $("#tipo2").val(valores.tipo);

@endsection

@section('editar') $("#tipo").removeAttr("readonly"); @endsection

@section('mostrar') $("#tipo").attr("readonly", "readonly"); @endsection
