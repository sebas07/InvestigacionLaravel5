<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('CategoriasSeeder');
        $this->call('UsuariosSeeder');
        //$this->call('ContenidosSeeder');
        //$this->call('PalabrasSeeder');
	}

}
