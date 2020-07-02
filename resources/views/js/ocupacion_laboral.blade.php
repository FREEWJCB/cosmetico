@section('document')

    $("#bs_labor").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') var url = "{{ route('Ocupacion_Laboral.store') }}"; @endsection

@section('url_edicion') var url = "{{ route('Ocupacion_Laboral.update') }}"; @endsection

@section('registro') $('#labor').val(''); @endsection

@section('edicion') $('#labor2').val($('#labor').val()); @endsection

@section('delete') url: "{{url('Ocupacion_Laboral')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('Ocupacion_Laboral.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Ocupacion_Laboral.mostrar')}}", @endsection

@section('rellenar')

    $("#labor").val(valores.labor);
    $("#labor2").val(valores.labor);

@endsection

@section('editar') $("#labor").removeAttr("readonly"); @endsection

@section('mostrar') $("#labor").attr("readonly", "readonly"); @endsection
