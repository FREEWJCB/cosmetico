@section('document')

    $("#bs_cargos").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') var url = "{{ route('Cargo.store') }}"; @endsection

@section('url_edicion') var url = "{{ route('Cargo.update') }}"; @endsection

@section('registro') $('#cargos').val(''); @endsection

@section('edicion') $('#cargos2').val($('#cargos').val()); @endsection

@section('delete') url: "{{url('Cargo')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('Cargo.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Cargo.mostrar')}}", @endsection

@section('rellenar')

    $("#cargos").val(valores.cargos);
    $("#cargos2").val(valores.cargos);

@endsection

@section('editar') $("#cargos").removeAttr("readonly"); @endsection

@section('mostrar') $("#cargos").attr("readonly", "readonly"); @endsection
