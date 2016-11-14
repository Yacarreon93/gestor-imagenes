<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use GestorImagenes\Usuario;

class UsuariosSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) 
        { 
            Usuario::create(
            [
                'nombre' => 'usuario_'.$i,
                'email' => 'email_'.$i.'@test.com',
                'password' => bcrypt("pass_".$i),
                'pregunta' => 'pregunta_'.$i,
                'respuesta' => 'respuesta_'.$i
            ]);
        }
    }

}
