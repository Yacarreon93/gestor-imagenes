<?php namespace GestorImagenes\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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
        return "Formulario para crear album";
        // return view('home');
    }

    public function postCrearAlbum()
    {
        return "Formulario para crear album";
        // return view('home');
    }

    public function getActualizarAlbum()
    {
        return "Formulario para actualizar album";
        // return view('home');
    }

    public function postActualizarAlbum()
    {
        return "Formulario para actualizar album";
        // return view('home');
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
