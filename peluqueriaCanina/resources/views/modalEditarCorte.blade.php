<div class="modal-dialog modal-dialog2">
    <div class="modal-content">
        <div class="modal-header">
            <h4>Modificar Corte de Pelo</h4>
            <button type="button" class="close" data-dismiss="modal">
                <span> <i class="fas fa-times"></i></span>
            </button> 
        </div>
        <form class="corte-form" method="POST" action="{{ route('editarCorte', ['id'=>$elemento->id])}}" enctype="multipart/form-data"  role="form">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group row justify-content-md-center">
                    <div class="col-md-12">
                        {{-- Tipo --}}
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="tipo" class="col-form-label text-md-right">{{ __('Tipo') }}</label>
                            </div>
                            <div class="col-md-5">
                                <select id="tipo" class="custom-select form-control tipo ? ' is-invalid' : '' }}" name="tipo" required autofocus>
                                    <optgroup label="Tipos de servicios">
                                    @if($elemento->tipo == 'solo corte')
                                        <option value="solo corte" selected>Solo corte</option>              
                                        <option value="baño y corte">Baño + Corte</option>
                                        <option value="solo baño">Solo baño</option>
                                    @elseif($elemento->tipo == 'baño y corte')     
                                        <option value="solo corte">Solo corte</option>              
                                        <option value="baño y corte"selected>Baño + Corte</option>
                                        <option value="solo baño">Solo baño</option>
                                    @elseif($elemento->tipo == 'solo baño')     
                                        <option value="solo corte">Solo corte</option>              
                                        <option value="baño y corte">Baño + Corte</option>
                                        <option value="solo baño" selected>Solo baño</option>
                                    @endif    
                                </select>
                            </div>
                        </div>

                        {{-- Tamaño --}}
                        <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="tamano" class="col-form-label text-md-right">{{ __('Tamaño') }}</label>
                                </div>
                                <div class="col-md-5">
                                    <select id="tamano" class="custom-select form-control tipo ? ' is-invalid' : '' }}" name="tamano" required autofocus>
                                        <optgroup label="Tamaños de Perros">
                                        @if($elemento->tamaño == 'grande')              
                                            <option value="pequeño">Pequeño</option>
                                            <option value="mediano">Mediano</option>
                                            <option value="grande" selected>Grande</option>
                                        @elseif($elemento->tamaño == 'mediano')     
                                            <option value="pequeño">Pequeño</option>
                                            <option value="mediano" selected>Mediano</option>
                                            <option value="grande">Grande</option>
                                        @elseif($elemento->tamaño == 'pequeño')     
                                            <option value="pequeño" selected>Pequeño</option>
                                            <option value="mediano">Mediano</option>
                                            <option value="grande" >Grande</option>
                                        @endif    
                                    </select>
                                </div>
                        </div>
                        {{-- Tipo Cabello --}}
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="cabello" class="col-form-label text-md-right">{{ __('Cabello') }}</label>
                            </div>
                            <div class="col-md-5">
                                <select id="cabello" class="custom-select form-control tipo ? ' is-invalid' : '' }}" name="cabello" required autofocus>>
                                    <optgroup label="Tipos de Cabellos">
                                    @if($elemento->tipo_cabello_id == '1')              
                                        <option value="1" selected>Rubio</option>
                                        <option value="2">Castaño</option>
                                        <option value="3">Pelo liso</option>
                                    @elseif($elemento->tipo_cabello_id == '2')     
                                        <option value="1">Rubio</option>
                                        <option value="2" selected>Castaño</option>
                                        <option value="3">Pelo liso</option>
                                    @elseif($elemento->tipo_cabello_id == '3')
                                        <option value="1">Rubio</option>
                                        <option value="2">Castaño</option>
                                        <option value="3" selected>Pelo liso</option>
                                    @endif  
                                </select>
                            </div>
                        </div>

                        {{-- Descripción --}}
                        <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="descripcion" class="col-form-label text-md-right">{{ __('Descripción') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea id="descripcion" rows="4" class="form-control tipo ? ' is-invalid' : '' }}" name="descripcion" required autofocus placeholder="descripcion">{{$elemento->descripcion}}</textarea>
                                </div>
                        </div>

                        {{-- Imagen --}}
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="imagen" class="col-form-label text-md-right">{{ __('Imagen') }}</label>
                            </div>
                            <div class="col-md-9">
                                <input id="imagen" type="file" name="imagen" value="{{$elemento->imagen}}">
                            </div>
                        </div>    
            </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Editar</button>
    </div>
</div>