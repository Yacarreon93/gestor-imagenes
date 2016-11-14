<?php namespace GestorImagenes\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use GestorImagenes\Http\Requests\CrearAlbumRequest;
use GestorImagenes\Http\Requests\ActualizarAlbumRequest;

use GestorImagenes\Album;

class AlbumController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex() 
    {
        $usuario = Auth::user();
        $albumes = $usuario->albumes;

        return view('albumes.mostrar', ['albumes' => $albumes]);
    }

    public function getCrearAlbum()
    {        
        return view('albumes.crear-album');
    }

    public function postCrearAlbum(CrearAlbumRequest $request)
    {
        $usuario = Auth::user();

        Album::create([
            'nombre' => $request->get('nombre'),
            'descripcion' => $request->get('descripcion'),
            'usuario_id' => $usuario->id
        ]);

        return redirect('/validado/albumes')->with(['creado' => 'El álbum ha sido creado!']);
    }

    public function getActualizarAlbum($id)
    {
        $album = Album::find($id);

        return view('albumes.actualizar', ['album' => $album]);        
    }

    public function postActualizarAlbum(ActualizarAlbumRequest $request)
    {
        $album = Album::find($request->get('id'));

        $album->nombre = $request->get('nombre');
        $album->descripcion = $request->get('descripcion');

        $album->save();

        return redirect('/validado/albumes')->with(['actualizado', 'El álbum se actualizó!']);
    }

    public function getEliminarAlbum()
    {
        return "Formulario para eliminar album";
        // return view('home');
    }

    public function postEliminarAlbum()
    {
        return "Formulario para eliminar album";
        // return view('home');
    }

    // Overrided from Controller
    public function missingMethod($parameters = array())
    {
        abort(404);
    }
    
}
