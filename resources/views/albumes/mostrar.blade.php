@extends('app')

@section('content')

@if(Session::has('creado'))
    <div class="alert alert-success">
        {{ Session::get('creado') }}
    </div>
@endif

@if(Session::has('actualizado'))
    <div class="alert alert-success">
        {{ Session::get('actualizado') }}
    </div>
@endif

@if(Session::has('eliminado'))
    <div class="alert alert-danger">
        {{ Session::get('eliminado') }}
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
                            <p><a href="/validado/albumes/actualizar-album/{{ $album->id }}" class="btn btn-primary" role="button">Editar Álbum</a></p>

                            <form class="form-horizontal" role="form" method="POST" action="/validado/albumes/eliminar-album">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{ $album->id }}">
                                <input type="submit" class="btn btn-danger" role="button" value="Eliminar">
                            </form>

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
