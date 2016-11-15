<?php namespace GestorImagenes\Http\Controllers;

use Illuminate\Http\Request;

use GestorImagenes\Http\Requests\MostrarFotosRequest;
use GestorImagenes\Http\Requests\CrearFotoRequest;
use GestorImagenes\Http\Requests\ActualizarFotoRequest;
use GestorImagenes\Http\Requests\EliminarFotoRequest;

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

        $ruta = '/img/';
        $nombre_imagen = sha1(Carbon::now()).'.'.$imagen->guessExtension();

        $imagen->move(getcwd().$ruta, $nombre_imagen);

        Foto::create([
            'nombre' => $request->get('nombre'),
            'descripcion' => $request->get('descripcion'),
            'ruta' => $ruta.$nombre_imagen,
            'album_id' => $album_id
        ]);

        return redirect('validado/fotos?id='.$album_id)->with(['creada' => 'La foto ha sido subida!']);
    }

    public function getActualizarFoto($id)
    {
        $foto = Foto::find($id);

        return view('fotos.actualizar', ['foto' => $foto]);
    }

    public function postActualizarFoto(ActualizarFotoRequest $request)
    {
        $foto = Foto::find($request->get('id'));

        $foto->nombre = $request->get('nombre');
        $foto->descripcion = $request->get('descripcion');

        if ($request->hasFile('imagen'))
        {     
            $imagen = $request->file('imagen');

            $ruta = '/img/';
            $nombre_imagen = sha1(Carbon::now()).'.'.$imagen->guessExtension();

            $imagen->move(getcwd().$ruta, $nombre_imagen);

            $ruta_anterior = getcwd().$foto->ruta;

            if (file_exists($ruta_anterior)) 
            {
                unlink(realpath($ruta_anterior));
            }
        
            $foto->ruta = $ruta.$nombre_imagen;
        }

        $foto->save();

        return redirect('/validado/fotos?id='.$foto->album_id)->with('actualizado', 'La foto se ha actualizado!');     
    }

    public function postEliminarFoto(EliminarFotoRequest $request)
    {
        $foto = Foto::find($request->get('id'));

        $ruta_anterior = getcwd().$foto->ruta;

        if (file_exists($ruta_anterior)) 
        {
            unlink(realpath($ruta_anterior));
        }

        $foto->delete();

        return redirect('/validado/fotos?id='.$foto->album_id)->with('eliminado', 'La foto se ha eliminado!');
    }

    // Overrided from Controller
    public function missingMethod($parameters = array())
    {
        abort(404);
    }

}
