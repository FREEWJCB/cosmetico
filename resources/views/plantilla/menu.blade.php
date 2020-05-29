<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('titulo','Cosmetico')</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/overhang.min.css') }}" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/progress/nprogress.css') }}" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}" crossorigin="anonymous" />
  </head>
  <body>
    <!-- menu -->
    <div class="navbar navbar-expand-md navbar-dark bg-dark mb-4" role="navigation">
      <a class="navbar-brand" href="#">CRUD Cosmeticos</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class='nav-link @yield("inicio","")'  href="/">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class='nav-link @yield("cosmeticos","")' href="{{ route('Cosmetico.index') }}">
              Cosmeticos(Sin forey keys)
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class='nav-link  dropdown-toggle @yield("cosmetic","")' id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Cosmeticos(Con forey keys)
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdown1">
              <li class="dropdown-item">
                <a href="{{ route('Tipo.index') }}">Tipo</a>
              </li>
              <li class="dropdown-item">
                <a href="{{ route('Marca.index') }}">Marca</a>
              </li>
              <li class="dropdown-item">
                <a href="{{ route('Modelo.index') }}">Modelo</a>
              </li>
              <li class="dropdown-item">
                <a href="{{ route('Cosmetic.index') }}">Cosmetico</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!-- contenido -->

    @yield('contenido')

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/popper.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/turbolinks.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/nprogress.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/overhang2.min.js') }}" crossorigin="anonymous"></script>

    <script>


        @yield('script')
    </script>

  </body>
</html>
