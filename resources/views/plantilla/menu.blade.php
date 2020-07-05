<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('titulo','Cosmetico')</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"  />
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}"  />
    <link rel="stylesheet" href="{{ asset('css/overhang.min.css') }}"  />
    <link rel="stylesheet" href="{{ asset('css/progress/nprogress.css') }}"  />
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}"  />

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/turbolinks.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/nprogress.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/overhang2.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript"> @include('js.combo') @include('js.crud') </script>
    <script src="{{ asset('js/progress.js') }}" type="text/javascript"></script>
  </head>
  <body >
    <!-- menu -->
    <div data-turbolinks-permanent class="navbar navbar-expand-md navbar-dark bg-dark mb-4" role="navigation">
      <a class="navbar-brand" title="Inicio" href="/">CRUD Cosmeticos</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a title="Inicio" class='nav-link @yield("inicio","")'  href="/">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a title="Cosmeticos(Sin forey keys)" class='nav-link @yield("cosmeticos","")' href="{{ route('Cosmetico.index') }}">
              Cosmeticos(Sin forey keys)
            </a>
          </li>
          <li class="nav-item dropdown">
            <a title="Cosmeticos(Con forey keys)" href="#" class='nav-link  dropdown-toggle @yield("cosmetic","")' id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Cosmeticos(Con forey keys)
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdown1">
              <li class="dropdown-item">
                <a title="Tipo" href="{{ route('Tipo.index') }}">Tipo</a>
              </li>
              <li class="dropdown-item">
                <a title="Marca" href="{{ route('Marca.index') }}">Marca</a>
              </li>
              <li class="dropdown-item">
                <a title="Modelo" href="{{ route('Modelo.index') }}">Modelo</a>
              </li>
              <li class="dropdown-item">
                <a title="Cosmetico" href="{{ route('Cosmetic.index') }}">Cosmetico</a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a title="proyecto" href="#" class='nav-link  dropdown-toggle @yield("proyecto","")' id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Proyecto
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdown1">
              <li class="dropdown-item">
                <a title="Ocupación laboral" href="{{ route('Ocupacion_Laboral.index') }}">Ocupación laboral</a>
              </li>
              <li class="dropdown-item">
                <a title="Tipo Usuario" href="{{ route('Tipo_Usuario.index') }}">Tipo Usuario</a>
              </li>
              <li class="dropdown-item">
                <a title="Tipo Alergia" href="{{ route('Tipo_Alergia.index') }}">Tipo Alergia</a>
              </li>
              <li class="dropdown-item">
                <a title="Tipo Discapacidad" href="{{ route('Tipo_Discapacidad.index') }}">Tipo Discapacidad</a>
              </li>
              <li class="dropdown-item">
                <a title="Alergia" href="{{ route('Alergia.index') }}">Alergia</a>
              </li>
              <li class="dropdown-item">
                <a title="Discapadidad" href="{{ route('Discapacidad.index') }}">Discapadidad</a>
              </li>
              <li class="dropdown-item">
                <a title="Cargo" href="{{ route('Cargo.index') }}">Cargo</a>
              </li>
              <li class="dropdown-item">
                <a title="Sección" href="{{ route('Seccion.index') }}">Sección</a>
              </li>
              <li class="dropdown-item">
                <a title="Salon" href="{{ route('Salon.index') }}">Salon</a>
              </li>
              <li class="dropdown-item">
                <a title="Grado" href="{{ route('Grado.index') }}">Grado</a>
              </li>
              <li class="dropdown-item">
                <a title="Estado" href="{{ route('State.index') }}">Estado</a>
              </li>
              <li class="dropdown-item">
                <a title="Municipio" href="{{ route('Municipality.index') }}">Municipio</a>
              </li>
              <li class="dropdown-item">
                <a title="Empleado" href="{{ route('Empleado.index') }}">Empleado</a>
              </li>
              <li class="dropdown-item">
                <a title="Usuario" href="{{ route('Usuario.index') }}">Usuario</a>
              </li>
              <li class="dropdown-item">
                <a title="Representante" href="{{ route('Representante.index') }}">Representante</a>
              </li>
              <li class="dropdown-item">
                <a title="Estudiante" href="{{ route('Estudiante.index') }}">Estudiante</a>
              </li>
              <li class="dropdown-item">
                <a title="Periodo escolar" href="{{ route('Periodo_Escolar.index') }}">Periodo escolar</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!-- contenido -->
    <div class="main fadein">

        @yield('contenido')

    </div>

  </body>
</html>
