@section('document')

    $("#bs_marca").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') var url = "{{ route('Marca.store') }}"; @endsection

@section('url_edicion') var url = "{{ route('Marca.update') }}"; @endsection

@section('registro') $('#marca').val(''); @endsection

@section('edicion') $('#marca2').val($('#marca').val()); @endsection

@section('delete') url: "{{url('Marca')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('Marca.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Marca.mostrar')}}", @endsection

@section('rellenar')

    $("#marca").val(valores.marca);
    $("#marca2").val(valores.marca);

@endsection

@section('editar') $("#marca").removeAttr("readonly"); @endsection

@section('mostrar') $("#marca").attr("readonly", "readonly"); @endsection
