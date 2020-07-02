@section('document')

    $("#bs_state").on("change", function() {
        cargar();
    });

    $("#bs_municipalitys").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') var url = "{{ route('Municipality.store') }}"; @endsection

@section('url_edicion') var url = "{{ route('Municipality.update') }}"; @endsection

@section('registro')

    $('#state').val('null');
    $('#municipalitys').val('');

@endsection

@section('edicion')

    $('#state2').val($('#state').val());
    $('#municipalitys2').val($('#municipalitys').val());

 @endsection

@section('delete') url: "{{url('Municipality')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('Municipality.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Municipality.mostrar')}}", @endsection

@section('rellenar')

    $("#state").val(valores.state);
    $("#state2").val(valores.state);
    $("#municipalitys").val(valores.municipalitys);
    $("#municipalitys2").val(valores.municipalitys);

@endsection

@section('editar')

    $("#state").removeAttr("disabled");
    $("#municipalitys").removeAttr("readonly");

@endsection

@section('mostrar')

    $("#state").attr("disabled", "disabled");
    $("#municipalitys").attr("readonly", "readonly");

@endsection
