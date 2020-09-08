@section('document')

    $("#bs_curso").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') var url = "{{ route('Curso.store') }}"; @endsection

@section('url_edicion') var url = "{{ route('Curso.update') }}"; @endsection

@section('registro') $('#curso').val(''); @endsection

@section('edicion') $('#curso2').val($('#curso').val()); @endsection

@section('delete') url: "{{url('Curso')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('Curso.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Curso.mostrar')}}", @endsection

@section('rellenar')

    $("#curso").val(valores.curso);
    $("#curso2").val(valores.curso);

@endsection

@section('editar') $("#curso").removeAttr("readonly"); @endsection

@section('mostrar') $("#curso").attr("readonly", "readonly"); @endsection
