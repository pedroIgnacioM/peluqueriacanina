{{-- Modal del boton Eliminar --}}

<div class="modal-dialog modal-dialog2" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Eliminar Corte de Pelo</h4>
            <a type="button" class="close" data-dismiss="modal">
                <span> <i class="fas fa-times"></i></span>
            </a> 
        </div>
        <div class="modal-body">
            <div class="form-group row justify-content-md-center">
                <div class="col-md-12">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="col-form-label text-md-right">{{ __('Nombre') }}</label>
                        </div>
                        <div class="col-md-5">
                            <p>{{$elemento->nombre}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="col-form-label text-md-right">{{ __('Descripción') }}</label>
                        </div>
                        <div class="col-md-8">
                            <p>{{$elemento->descripcion}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="col-form-label text-md-right">{{ __('Precio') }}</label>
                        </div>
                        <div class="col-md-8">
                            <p>$ {{$elemento->precio}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="col-form-label text-md-right">{{ __('Foto') }}</label>
                        </div>
                        <div class="col-md-8">
                            <img class="container-fluid" alt="{{$elemento->imagen}}" src="{{Storage::url($elemento->imagen)}}"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form class="producto-form" action="{{route('eliminarProducto',['id'=>$elemento->id])}}" method="post">
            {{csrf_field()}}
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>
        </form>
    </div>
</div>