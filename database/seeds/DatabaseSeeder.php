<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use GestorImagenes\Usuario;
use GestorImagenes\Album;
use GestorImagenes\Foto;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Model::unguard();

		// Disable foreign keys check to allow truncation
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');

		Foto::truncate();
		Album::truncate();
		Usuario::truncate();

		$this->call('UsuariosSeeder');
		$this->call('AlbumesSeeder');
		$this->call('FotosSeeder');
	}

}
