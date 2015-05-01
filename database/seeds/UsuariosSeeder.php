<?php

use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder {

    public function run() {
        \DB::table('usuarios')->insert(array(
            'username'   => 'admin',
            'password'   => '1234'
        ));
    }

}