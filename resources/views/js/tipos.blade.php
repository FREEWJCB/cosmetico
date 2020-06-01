@section('document')

    $("#bs_tipo").on("keyup", function() {
        cargar();
    });

@endsection

@section('pro')

    if ($("#pro").val() == "Registro") {
        var url = "{{ route('Tipo.store') }}";
        var tipo = "POST";
        var message = "Registro completado con exito";
    }else{
        var url = "{{ route('Tipo.update',0) }}";
        var tipo = "PUT";
        var message = "Edición completado con exito";
    }

@endsection

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
