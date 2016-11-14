<?php namespace GestorImagenes\Http\Controllers;

use GestorImagenes\Http\Requests\EditarPerfilRequest;

use Illuminate\Support\Facades\Auth;

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

    public function postEditarPerfil(EditarPerfilRequest $request)
    {
        
        $nombre = $request->get('nombre');

        $usuario = Auth::user(); 
        $usuario->nombre = $nombre;

        if ($request->has('pasword'))
        {
            $usuario->password = bcrypt($request->get('password'));
        }

        if ($request->has('pregunta'))
        {
            $usuario->pregunta = $request->get('pregunta');
            $usuario->respuesta = $request->get('respuesta');
        }

        $usuario->save();
        
        return redirect('/validado')->with(['actualizado' => 'Su perfil ha sido actualizado!']);
    }

    // Overrided from Controller
    public function missingMethod($parameters = array())
    {
        abort(404);
    }

}
