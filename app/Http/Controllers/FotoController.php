<?php namespace GestorImagenes\Http\Controllers;

class FotoController extends Controller {

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
        return "Mostrando fotos";
    }

    public function getCrearFoto()
    {
        return "Formulario para crear foto";
        // return view('home');
    }

    public function postCrearFoto()
    {
        return "Formulario para crear foto";
        // return view('home');
    }

    public function getActualizarFoto()
    {
        return "Formulario para actualizar foto";
        // return view('home');
    }

    public function postActualizarFoto()
    {
        return "Formulario para actualizar foto";
        // return view('home');
    }

    public function getEliminarFoto()
    {
        return "Formulario para eliminar foto";
        // return view('home');
    }

    public function postEliminarFoto()
    {
        return "Formulario para eliminar foto";
        // return view('home');
    }

    // Overrided from Controller
    public function missingMethod($parameters = array())
    {
        abort(404);
    }

}
