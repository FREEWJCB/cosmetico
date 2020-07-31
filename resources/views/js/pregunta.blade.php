@section('document')

    $("#bs_preguntas").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') var url = "{{ route('Pregunta.store') }}"; @endsection

@section('url_edicion') var url = "{{ route('Pregunta.update') }}"; @endsection

@section('registro') $('#preguntas').val(''); @endsection

@section('edicion') $('#preguntas2').val($('#preguntas').val()); @endsection

@section('delete') url: "{{url('Pregunta')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('Pregunta.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Pregunta.mostrar')}}", @endsection

@section('rellenar')

    $("#preguntas").val(valores.preguntas);
    $("#preguntas2").val(valores.preguntas);

@endsection

@section('editar') $("#preguntas").removeAttr("readonly"); @endsection

@section('mostrar') $("#preguntas").attr("readonly", "readonly"); @endsection
