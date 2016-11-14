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
        $contador = 0;
        foreach ($albums as $album) 
        {
            $cantidad = mt_rand(0, 5);
            for ($i = 0; $i < $cantidad; $i++) 
            { 
                $contador++;
                Foto::create(
                [
                    'nombre' => 'foto_'.$contador,
                    'descripcion' => 'descripcion_'.$contador,
                    'ruta' => '/img/test.png',
                    'album_id' => $album->id
                ]);
            }       
        } 
    }

}
