<?php

use Illuminate\Database\Seeder;

class PalabrasSeeder extends Seeder {

    public function run() {
        for($i = 0; $i <= 5; $i++) {
            \DB::table('palabras')->insert(array(
                'palabra'        => 'Palabra'.$i,
                'id_contenido'  => rand(1, 5),
            ));
        }
    }

}