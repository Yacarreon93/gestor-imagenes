@extends('app')

@section('content')

@if (Session::has('actualizado'))
    <div class="alert alert-success">
        {{ Session::get('actualizado') }}
    </div>
@endif

<div class="container">

    <p><a href="fotos/crear-foto?id={{ $id }}" class="btn btn-primary" role="button">Crear Foto</a></p>

    @if (sizeof($fotos) > 0)

        @foreach ($fotos as $foto)

            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="thumbnail">  
                        <img src="{{ $foto->ruta }}">      
                        <div class="caption">
                            <h3>{{ $foto->nombre }}</h3>
                            <p>{{ $foto->descripcion }}</p>  
                            <p><a href="/validado/fotos/actualizar-foto/{{ $foto->id }}" class="btn btn-primary" role="button">Editar Foto</a></p>                      
                        </div>                              
                    </div>
                </div>
            </div>

        @endforeach

    @else

        <div class="alert alert-danger">
            <p>Al parecer este álbum no contiene fotos, crea una!</p>
        </div>

    @endif

</div>

@endsection
