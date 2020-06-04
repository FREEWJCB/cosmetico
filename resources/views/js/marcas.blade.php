@section('document')

    $("#bs_marca").on("keyup", function() {
        cargar();
    });

@endsection

@section('pro')

    if ($("#pro").val() == "Registro") {
        var url = "{{ route('Marca.store') }}";
        var tipo = "POST";
        var message = "Registro completado con exito";
    }else{
        var url = "{{ route('Marca.update',0) }}";
        var tipo = "PUT";
        var message = "Edición completado con exito";
    }

@endsection

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
