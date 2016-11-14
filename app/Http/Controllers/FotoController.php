<?php namespace GestorImagenes\Http\Controllers;

use Illuminate\Http\Request;

use GestorImagenes\Http\Requests\MostrarFotosRequest;
use GestorImagenes\Http\Requests\CrearFotoRequest;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

use GestorImagenes\Album;
use GestorImagenes\Foto;

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

    public function getIndex(MostrarFotosRequest $request)
    {
       $id = $request->get('id');
       $fotos = Album::find($id)->fotos;

        return view('fotos.mostrar', ['fotos' => $fotos, 'id' => $id]);         
    }

    public function getCrearFoto(Request $request)
    {    
        $id = $request->get('id');

        return view('fotos.crear-foto', ['id' => $id]);
    }

    public function postCrearFoto(CrearFotoRequest $request)
    {
        $album_id = $request->get('id');
        $imagen = $request->file('imagen');        

        $ruta = '/img/'.sha1(Carbon::now()).$imagen->getExtension();

        $imagen->move(getcwd().$ruta);

        Foto::create([
            'nombre' => $request->get('nombre'),
            'descripcion' => $request->get('descripcion'),
            'ruta' => $ruta,
            'album_id' => $album_id
        ]);

        return redirect('validado/fotos?id='.$album_id)->with(['creada' => 'La foto ha sido subida!']);
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
