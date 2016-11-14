<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use GestorImagenes\Usuario;
use GestorImagenes\Album;

class AlbumesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = Usuario::all();
        $contador = 0;
        foreach ($usuarios as $usuario) 
        {
            $cantidad = mt_rand(0, 5);
            for ($i = 0; $i < $cantidad; $i++) 
            { 
                $contador++;
                Album::create(
                [
                    'nombre' => 'album_'.$contador,
                    'descripcion' => 'descripcion_'.$contador,
                    'usuario_id' => $usuario->id
                ]);
            }       
        } 
    }

}
