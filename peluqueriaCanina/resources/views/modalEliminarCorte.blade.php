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
                                    <label class="col-form-label text-md-right">{{ __('Tipo') }}</label>
                                </div>
                                <div class="col-md-5">
                                    <p>{{$elemento->tipo}}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <div class="col-md-3">
                                        <label class="col-form-label text-md-right">{{ __('Tamaño') }}</label>
                                    </div>
                                    <div class="col-md-5">
                                        <p>{{$elemento->tamaño}}</p>
                                    </div>
                                </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label class="col-form-label text-md-right">{{ __('Cabello') }}</label>
                                </div>
                                <div class="col-md-5">
                                    <p>{{$elemento->tipo_cabello_id}}</p>
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
                                    <label class="col-form-label text-md-right">{{ __('Foto') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <img class="img-fluid" alt="{{$elemento->imagen}}" src="{{Storage::url($elemento->imagen)}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="corte-form" action="{{route('eliminarCorte',['id'=>$elemento->id])}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
