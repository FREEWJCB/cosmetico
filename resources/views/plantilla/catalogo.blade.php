<td>
    <center data-turbolinks="false" class='navbar navbar-light'>
        <a href="#" onclick = "return mostrar({{ $cons2->id }},'Mostrar');" class="btn btn-info btncolorblanco">
            <i class="fa fa-list-alt"></i>
        </a>
        <a href="#" onclick = "return mostrar({{ $cons2->id }},'Edicion');" class="btn btn-success btncolorblanco">
            <i class="fa fa-edit"></i>
        </a>
        <a href="#" onclick = "return desactivar({{ $cons2->id }});" class="btn btn-danger btncolorblanco">
            <i class="fa fa-trash-alt"></i>
        </a>
    </center>
</td>
