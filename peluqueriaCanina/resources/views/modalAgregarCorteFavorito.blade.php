{{-- Modal del boton (Heart) --}}

    <div class="modal-dialog modal-dialog2" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Agregar a Corte Favorito</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span> <i class="fas fa-times"></i></span>
                </button> 
            </div>
            @if($corteFavoritos->count())
                <div class="modal-body">
                    <p> El corte ya esta en favoritos :c  </p>
                </div>
                <form class="corteFavorito-form" action="{{route('agregarCorteFavorito',['id'=>$elemento->id])}}" method="post">
                {{csrf_field()}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>    
                    </div>
                </form>
            @else
                <div class="modal-body">
                    <p> ¿Quiere agregar este corte a favoritos?</p>
                </div>
                <form class="corteFavorito-form" action="{{route('agregarCorteFavorito',['id'=>$elemento->id])}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
