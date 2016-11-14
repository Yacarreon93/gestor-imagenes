@extends('app')

@section('content')

@if(Session::has('creado'))
    <div class="alert alert-success">
        {{ Session::get('creado') }}
    </div>
@endif

<div class="container">

    <p><a href="albumes/crear-album" class="btn btn-primary" role="button">Crear Álmun</a></p>

    @if (sizeof($albumes) > 0)

        @foreach ($albumes as $album)

            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="thumbnail">        
                        <div class="caption">
                            <h3>{{ $album->nombre }}</h3>
                            <p>{{ $album->descripcion }}</p>
                            <p><a href="/validado/fotos?id={{ $album->id }}" class="btn btn-primary" role="button">Ver Fotos</a></p>
                        </div>                              
                    </div>
                </div>
            </div>

        @endforeach

    @else

        <div class="alert alert-danger">
            <p>Al parecer no tienes álbumes, crea uno!</p>
        </div>

    @endif

</div>

@endsection
