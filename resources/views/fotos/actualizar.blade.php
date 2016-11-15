@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Actualizar Foto</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Al parecer algo está mal.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="/validado/fotos/actualizar-foto" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{ $foto->id }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nombre" value="{{ $foto->nombre }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Descripcion</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="descripcion" value="{{ $foto->descripcion }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Imágen max: 20MB</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="imagen">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar Foto
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
