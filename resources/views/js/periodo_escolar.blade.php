@section('document')

    $("#bs_cedula").on("keyup", function() {
        cargar();
    });

    $("#bs_nombre").on("keyup", function() {
        cargar();
    });

    $("#bs_apellido").on("keyup", function() {
        cargar();
    });

    $("#bs_grado").on("change", function() {
        cargar();
    });

    $("#bs_seccion").on("change", function() {
        cargar();
    });

    $("#bs_salon").on("change", function() {
        cargar();
    });

    $("#bs_ano").on("keyup", function() {
        cargar();
    });

@endsection

@section('url_registro') var url = "{{ route('Periodo_Escolar.store') }}"; @endsection

@section('url_edicion') var url = "{{ route('Periodo_Escolar.update') }}"; @endsection

@section('select')

    $('#profesor').hide();

@endsection

@section('registro')

    $('#grado').val('null');
    $('#seccion').val('null');
    $('#salon').val('null');
    $('#ano').val('');
    $('#cedula').val('');
    $('#nombre').val('');
    $('#empleado').val('');
    $('#profesor').slideUp();

@endsection

@section('edicion')

    $('#grado2').val($('#grado').val());
    $('#seccion2').val($('#seccion').val());
    $('#salon2').val($('#salon').val());
    $('#ano2').val($('#ano').val());
    $('#empleado2').val($('#empleado').val());

 @endsection

@section('delete') url: "{{url('Periodo_Escolar')}}"+"/"+id, @endsection

@section('cargar') url: "{{route('Periodo_Escolar.cargar')}}", @endsection

@section('rellenar_url') url: "{{route('Periodo_Escolar.mostrar')}}", @endsection

@section('rellenar')

    $("#grado").val(valores.grado);
    $("#grado2").val(valores.grado);
    $("#seccion").val(valores.seccion);
    $("#seccion2").val(valores.seccion);
    $("#salon").val(valores.salon);
    $("#salon2").val(valores.salon);
    $("#ano").val(valores.ano);
    $("#ano2").val(valores.ano);
    $("#cedula").val(valores.cedula);
    $("#nombre").val(valores.nombre);
    $("#empleado").val(valores.empleado);
    $("#empleado2").val(valores.empleado);

@endsection

@section('editar')

    $("#grado").removeAttr("disabled");
    $("#seccion").removeAttr("disabled");
    $("#salon").removeAttr("disabled");
    $("#ano").removeAttr("readonly");
    $("#cedula").removeAttr("readonly");

@endsection

@section('mostrar')

    $("#grado").attr("disabled", "disabled");
    $("#seccion").attr("disabled", "disabled");
    $("#salon").attr("disabled", "disabled");
    $("#ano").attr("readonly", "readonly");
    $("#cedula").attr("readonly", "readonly");

@endsection
