@section('document')

    $("#bs_states").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') var url = "{{ route('State.store') }}"; @endsection

@section('url_edicion') var url = "{{ route('State.update') }}"; @endsection

@section('registro') $('#states').val(''); @endsection

@section('edicion') $('#states2').val($('#states').val()); @endsection

@section('delete') url: "{{url('State')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('State.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('State.mostrar')}}", @endsection

@section('rellenar')

    $("#states").val(valores.states);
    $("#states2").val(valores.states);

@endsection

@section('editar') $("#states").removeAttr("readonly"); @endsection

@section('mostrar') $("#states").attr("readonly", "readonly"); @endsection
