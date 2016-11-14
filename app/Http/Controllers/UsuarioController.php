<?php namespace GestorImagenes\Http\Controllers;

class UsuarioController extends Controller {

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

    public function getEditarPerfil()
    {
        return view('usuario.actualizar');
    }

    public function postEditarPerfil()
    {
        return "Formulario para editar el perfil";
    }

    // Overrided from Controller
    public function missingMethod($parameters = array())
    {
        abort(404);
    }

}
