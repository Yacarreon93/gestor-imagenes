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
        foreach ($usuarios as $usuario) 
        {
            $cantidad = rand(0, 5);
            for ($i = 0; $i < $cantidad; $i++) 
            { 
                Album::create(
                [
                    'nombre' => 'album_'.$i,
                    'descripcion' => 'descripcion_'.$i,
                    'usuario_id' => $usuario->id
                ]);
            }       
        } 
    }

}
