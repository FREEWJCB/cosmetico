<center>
    <h1>Gestionar @yield('titulo','Cosmetico')</h1>

    <br />

    <!-- busqueda -->
    <nav class="navbar navbar-light">
        <h3>Buscar:</h3>
        <form name="form" id="form" class="form-inline">

            @yield('busqueda')

            <a href="#" id="nuevo" class="btn btn-info btncolorblanco">
                <i class="fas fa-user-plus"></i> Nuevo
            </a>
        </form>
    </nav>
    <!-- catalogo -->
    <table border="0" class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th width="3%" scope="col"><center>#</center></th>
                @yield('thead')
                <th width="15%" scope="col"><center>Opcción</center></th>
            </tr>
        </thead>
        <tbody>
            @yield('tbody')
        </tbody>
    </table>
</center>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titulo"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formulario" name="formulario" class="formulario" onsubmit="return agregaRegistro();">
                <input type="hidden" id="id" name="id" />
                <input type="hidden" id="pro" name="pro" />
                <div class="modal-body">
                    @yield('form')
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-danger" id="lim" value="Limpiar" />
                    <input type="submit" class="btn btn-primary" id="reg" value="Registrar" />
                    <input type="submit" class="btn btn-warning" id="edi" value="Editar" />
                </div>
            </form>
        </div>
    </div>
</div>
