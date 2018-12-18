<div class="modal-dialog modal-dialog2">
    <div class="modal-content">
        <div class="modal-header">
            <h4>Modificar Información</h4>
            <button type="button" class="close" data-dismiss="modal">
                <span> <i class="fas fa-times"></i></span>
            </button> 
        </div>
        <form class="contacto-form" method="POST" action="{{ route('editarContactoModal', ['id'=>$elemento->id])}}" enctype="multipart/form-data"  role="form">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group row justify-content-md-center">
                    <div class="col-md-12">
                        
                        {{-- Numero --}}
                        <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="numero" class="col-form-label text-md-right">{{ __('numero') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="numero" class="form-control tipo ? ' is-invalid' : '' }}" name="numero" required autofocus placeholder="numero" value="{{$elemento->numero}}">
                                </div>
                        </div>

                        {{-- Direccion --}}
                        <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="direccion" class="col-form-label text-md-right">{{ __('direccion') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="direccion" class="form-control tipo ? ' is-invalid' : '' }}" name="direccion" required autofocus placeholder="direccion" value="{{$elemento->direccion}}">
                                </div>
                        </div>

                        {{-- Facebook --}}
                        <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="facebook" class="col-form-label text-md-right">{{ __('facebook') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="facebook" class="form-control tipo ? ' is-invalid' : '' }}" name="facebook" required autofocus placeholder="facebook" value="{{$elemento->facebook}}">
                                </div>
                        </div>

                        {{-- Instagram --}}
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="instagram" class="col-form-label text-md-right">{{ __('instagram') }}</label>
                            </div>
                            <div class="col-md-9">
                            <input type="text" id="instagram" class="form-control tipo ? ' is-invalid' : '' }}" name="instagram" required autofocus placeholder="instagram" value="{{$elemento->instagram}}">
                            </div>
                        </div>    
            </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Editar</button>
    </div>
</div>