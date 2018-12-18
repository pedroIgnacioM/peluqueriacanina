<div class="modal-dialog modal-dialog2" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="myModalLabel">Citas registradas</h2>
            <button type="button" class="close" data-dismiss="modal">
                <span> <i class="fas fa-times"></i></span>
            </button> 
        </div>
        <div class="modal-body">
            @if ($reserva_citas->isEmpty())
                <p>No existen citas en este momento</p>
            @else
            <table class="table table-bordered">
                <tr>
                    <th>Fecha de cita</th>
                    <th>Servicio</th>
                    <th>Usuario</th>
                    <th>Mascota</th>
                    <th>Fecha registro de cita</th>
                </tr>
                @foreach ($reserva_citas as $cita)
                    <tr>
                        <td>{{$cita->fecha}}</td>
                        <td>{{$cita->servicio}}</td>
                        <td>{{$cita->user->nombres}}</td>
                        <td>{{$cita->mascota->nombre}}</td>
                        <td>{{$cita->created_at}}</td>

                    </tr>
                @endforeach
            </table>
            @endif
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            </div>
        </div>
        
    </div>
</div>
