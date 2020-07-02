@section('document')

    $("#bs_salones").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') var url = "{{ route('Salon.store') }}"; @endsection

@section('url_edicion') var url = "{{ route('Salon.update') }}"; @endsection

@section('registro') $('#salones').val(''); @endsection

@section('edicion') $('#salones2').val($('#salones').val()); @endsection

@section('delete') url: "{{url('Salon')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('Salon.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Salon.mostrar')}}", @endsection

@section('rellenar')

    $("#salones").val(valores.salones);
    $("#salones2").val(valores.salones);

@endsection

@section('editar') $("#salones").removeAttr("readonly"); @endsection

@section('mostrar') $("#salones").attr("readonly", "readonly"); @endsection
