@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="card-title text-capitalize"><h1>¿Quienes Somos?</h1></div>
                                @auth
                                    @if(Auth::user()->isAdmin())
                                        {{-- Botón Editar --}}
                                        <div class="col-md-2">
                                            <a href="" class="botonModal" data-form="{{route('editarNosotrosModal',['id'=>$nosotros->id])}}" data-toggle="modal" data-target="#modal-nosotros">
                                            <span><i class="fas fa-edit iconoGaleria" ></i></span></a>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif  
                            <div class="row">
                                <div class="col-md-12">
                                    <div><h5>{{$nosotros->titulo1}}</h5></div>
                                    <p>{{$nosotros->descripcion1}}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div><h5>{{$nosotros->titulo2}}</h5></div>
                                    <p>{{$nosotros->descripcion2}}</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="container-fluid">
                                <img class="img-thumbnail" src="{{Storage::url($nosotros->imagen)}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="modal-nosotros"></div>
<script>
    // Modal
    $(document).ready(function () {
    
    $(".botonModal").click(function (ev) { // for each edit contact url
        ev.preventDefault(); // prevent navigation
        var url = $(this).data("form"); // get the contact form url
        console.log(url);
        $("#modal-nosotros").load(url, function () { // load the url into the modal
            $(this).modal('show'); // display the modal on url load
        });
    });
    $('.nosotros-form').on('submit', function () {
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                context: this,
                success: function (data, status) {
                    $('#modal-nosotros').html(data);
                }
            });
        });
    
});


</script>
            
@endsection