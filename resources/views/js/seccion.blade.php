@section('document')

    $("#bs_secciones").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') var url = "{{ route('Seccion.store') }}"; @endsection

@section('url_edicion') var url = "{{ route('Seccion.update') }}"; @endsection

@section('registro') $('#secciones').val(''); @endsection

@section('edicion') $('#secciones2').val($('#secciones').val()); @endsection

@section('delete') url: "{{url('Seccion')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('Seccion.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Seccion.mostrar')}}", @endsection

@section('rellenar')

    $("#secciones").val(valores.secciones);
    $("#secciones2").val(valores.secciones);

@endsection

@section('editar') $("#secciones").removeAttr("readonly"); @endsection

@section('mostrar') $("#secciones").attr("readonly", "readonly"); @endsection
