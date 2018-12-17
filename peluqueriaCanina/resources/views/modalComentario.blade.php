{{-- Modal del boton (Comentarios) --}}

    <div class="modal-dialog modal-dialog2" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Comentario</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span> <i class="fas fa-times"></i></span>
                </button> 
            </div>
            @if( $comentario != null )
                <div class="modal-body">
                    <div class="container-fluid comentario">
                        <div class="col-sm-10">
                            <div class='row'>
                                <div class="col-sm-2">
                                    <div class='row justify-content-center fotoComentario'>
                                        <img src="{{Storage::url($usuario->imagen)}}" alt="avatar" class="img-thumbnail">
                                    </div>
                                     <div class='row justify-content-center'>
                                        <label>{{ $usuario->nombres }} </label>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <div class='container-fluid'>
                                         <p>{{ $comentario->descripcion }} </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Agregar Fecha Aqui -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                </div>
            @else
                @if( $usuario != null && $usuario->id == Auth::user()->id) 
                    <form class="comentario-form" method="POST" action="{{ route('agregarComentario', ['id'=>$elemento->id])}}" enctype="multipart/form-data" role="form">   
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="container-fluid comentario">
                                <div class="col-sm-12">
                                    <div class='row'>
                                        <div class="col-sm-2">
                                            <div class='row justify-content-center fotoComentario'>
                                                <img src="{{Storage::url($usuario->imagen)}}" alt="avatar" class="img-thumbnail">
                                            </div>
                                            <div class='container-fluid'>
                                                <label>{{ $usuario->nombres }} </label>
                                            </div>
                                        </div>
                                        {{-- descripcion --}}
                                        <div class="col-sm-10">
                                            <div class="form-group row">
                                                <textarea id="descripcion" placeholder="Escribe un comentario..." class="form-control tipo ? ' is-invalid' : '' }}" name="descripcion" required autofocus></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                            <button type="submit" class="btn btn-primary">Comentar</button>
                        </div> 
                    </form>
                @else
                    <div class="modal-body">
                        <p>No hay ningun comentario</p>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    </div>                
                @endif
            @endif
        </div>
    </div>
