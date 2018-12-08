{{-- Modal del boton (Heart) --}}

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Agregar Corte de pelo</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span> <i class="fas fa-times"></i></span>
                </button> 
            </div>
            <div class="modal-body">  
                <p> ¿Quiere agregar este corte de Pelo a favoritos?</p>
            </div>
            <form class="corteFavorito-form" action="{{route('agregarCorteFavorito',['id'=>$elemento->id])}}" method="post">
                    {{csrf_field()}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </form>
        </div>
    </div>
