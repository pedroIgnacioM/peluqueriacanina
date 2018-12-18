<div class="modal-dialog modal-dialog2" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Agregar Evento</h4>
            <button type="button" class="close" data-dismiss="modal">
                <span> <i class="fas fa-times"></i></span>
            </button> 
        </div>
        <form class="agregar-evento-form" action="{{route('agregarEvento')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="modal-body">
                <div class="form-group row justify-content-md-center">
                    <div class="col-md-12">

                        {{-- Fecha --}}
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="fecha" class="col-form-label text-md-right">{{ __('Fecha') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="date" id="fecha" class="form-control tipo ? ' is-invalid' : '' }}" name="fecha" required autofocus>
                            </div>
                        </div>
                        {{-- Titulo --}}
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="titulo" class="col-form-label text-md-right">{{ __('Titulo') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="titulo" class="form-control tipo ? ' is-invalid' : '' }}" name="titulo" required autofocus>
                            </div>
                        </div>
                        {{-- Dirección --}}
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="direccion" class="col-form-label text-md-right">{{ __('Dirección') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="direccion" class="form-control tipo ? ' is-invalid' : '' }}" name="direccion" required autofocus>
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