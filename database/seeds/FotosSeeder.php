<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use GestorImagenes\Album;
use GestorImagenes\Foto;

class FotosSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $albums = Album::all();
        foreach ($albums as $album) 
        {
            $cantidad = rand(0, 5);
            for ($i = 0; $i < $cantidad; $i++) 
            { 
                Foto::create(
                [
                    'nombre' => 'foto_'.$i,
                    'descripcion' => 'descripcion_'.$i,
                    'ruta' => '/img/test.png',
                    'album_id' => $album->id
                ]);
            }       
        } 
    }

}
