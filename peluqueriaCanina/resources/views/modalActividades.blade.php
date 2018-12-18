<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="myModalLabel">Actividad</h2>
            <button type="button" class="close" data-dismiss="modal">
                <span> <i class="fas fa-times"></i></span>
            </button> 
        </div>
        <div class="modal-body">
            @if ($actividades->isEmpty())
                <p>No existen actividades en este momento</p>
            @else
            <table class="table table-bordered">
                <tr>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                </tr>
                @foreach ($actividades as $actividad)
                    <tr>
                        <td>{{$actividad->user->nombres}}</td>
                        <td>{{$actividad->user->email}}</td>
                        <td>{{$actividad->created_at}}</td>
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
