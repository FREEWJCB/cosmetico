@section('document')

    $("#bs_grados").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') var url = "{{ route('Grado.store') }}"; @endsection

@section('url_edicion') var url = "{{ route('Grado.update') }}"; @endsection

@section('registro') $('#grados').val(''); @endsection

@section('edicion') $('#grados2').val($('#grados').val()); @endsection

@section('delete') url: "{{url('Grado')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('Grado.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Grado.mostrar')}}", @endsection

@section('rellenar')

    $("#grados").val(valores.grados);
    $("#grados2").val(valores.grados);

@endsection

@section('editar') $("#grados").removeAttr("readonly"); @endsection

@section('mostrar') $("#grados").attr("readonly", "readonly"); @endsection
