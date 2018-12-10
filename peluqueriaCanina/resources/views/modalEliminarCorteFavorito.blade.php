{{-- Modal del boton Eliminar  --}}

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Eliminar Corte Favorito</h5>
                <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span> <i class="fas fa-times"></i></span>
                </a>
            </div>
            <div class="modal-body">
                <p>¿Seguro que desea eliminar de favoritos?<p>     
            </div>
            <form class="corteFavorito-form" action="{{route('eliminarCorteFavorito',['id'=>$elemento->id])}}" method="post">
                {{csrf_field()}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Aceptar</button>
                </div>
            </form>
        </div>
    </div>