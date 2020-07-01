@section('document')

    $("#bs_dato").on("keyup", function() {
        cargar();
    });

@endsection

@section('pro')

    if ($("#pro").val() == "Registro") {
        var url = '{{ route("Maestro.store") }}';
        var tipo = "POST";
        var message = "Registro completado con exito";
    }else{
        var url = '{{ route("Maestro.update",0) }}';
        var tipo = "PUT";
        var message = "Edición completado con exito";
    }

@endsection

@section('registro') $('#dato').val(''); @endsection

@section('edicion') $('#dato2').val($('#dato').val()); @endsection

@section('delete') url: '{{url("Maestro")}}'+'/'+id+'/{{$maestro}}', @endsection

@section('cargar') url: "{{route('Maestro.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Maestro.mostrar')}}", @endsection

@section('rellenar')

    $("#dato").val(valores.dato);
    $("#dato2").val(valores.dato);

@endsection

@section('editar') $("#dato").removeAttr("readonly"); @endsection

@section('mostrar') $("#dato").attr("readonly", "readonly"); @endsection
