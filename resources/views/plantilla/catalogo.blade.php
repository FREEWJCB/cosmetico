<td>
    <center class='navbar navbar-light'>
        <a href="#" data-toggle='dropdown' onclick = "return mostrar({{ $cons2->id }},'Mostrar');" class="btn btn-info btncolorblanco">
            <i class="fa fa-list-alt"></i>
        </a>
        <a href="#" data-toggle='dropdown' onclick = "return mostrar({{ $cons2->id }},'Edicion');" class="btn btn-success btncolorblanco">
            <i class="fa fa-edit"></i>
        </a>
        <a href="#" data-toggle='dropdown' onclick = "return desactivar({{ $cons2->id }});" class="btn btn-danger btncolorblanco">
            <i class="fa fa-trash-alt"></i>
        </a>
    </center>
</td>
