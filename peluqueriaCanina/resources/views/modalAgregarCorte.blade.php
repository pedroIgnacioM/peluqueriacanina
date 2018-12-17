<div class="modal-dialog modal-dialog2" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Agregar Corte de pelo</h4>
            <button type="button" class="close" data-dismiss="modal">
                <span> <i class="fas fa-times"></i></span>
            </button> 
        </div>
        <form class="agregar-corte-form" action="{{route('agregarCorte')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
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
                                    <option value="" selected disabled>Seleccionar</option>
                                    <optgroup label="Tipos de servicios">
                                    <option value="solo corte">Solo corte</option>
                                    <option value="baño y corte">Baño + Corte</option>
                                    <option value="solo baño">Solo baño</option>
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
                                    <option value="" selected disabled>Seleccionar</option>
                                    <optgroup label="Tamaños de Perros">
                                    <option value="pequeño">Pequeño</option>
                                    <option value="mediano">Mediano</option>
                                    <option value="grande">Grande</option>
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
                                        <option value="" selected disabled>Seleccionar</option>
                                        <optgroup label="Tipos de Cabellos">
                                        <option value="1">Rubio</option>
                                        <option value="2">Castaño</option>
                                        <option value="3">Pelo liso</option>
                                    </select>
                                </div>
                        </div>
                        {{-- Descripción --}}
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="descripcion" class="col-form-label text-md-right">{{ __('Descripción') }}</label>
                            </div>
                            <div class="col-md-8">
                                <textarea id="descripcion" rows="4" class="form-control tipo ? ' is-invalid' : '' }}" name="descripcion" required autofocus></textarea>
                            </div>
                        </div>
                        {{-- Imagen --}}
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="imagen" class="col-form-label text-md-right">{{ __('Imagen') }}</label>
                            </div>
                            <div class="col-md-9">
                                <input id="imagen" type="file" name="imagen" required>
                            </div>
                        </div>
                        {{-- Mascotas --}}
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="mascota" class="col-form-label text-md-right">{{ __('Mascota (Opcional)') }}</label>
                            </div>
                            <div class="col-md-5">
                                <select id="mascota" class="custom-select form-control tipo ? ' is-invalid' : '' }}" name="mascota" autofocus>>
                                    <option value="" selected>Ninguna</option>
                                    <optgroup label="Nombre mascota | Nombre usuario">
                                    @foreach ($mascotas as $mascota)
                                        <option value="{{$mascota->id}}">{{$mascota->identificador()}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>