<?php

use Illuminate\Database\Seeder;

class ContenidosSeeder extends Seeder {

    public function run() {
        for($i = 0; $i <= 5; $i++) {
            \DB::table('contenidos')->insert(array(
                'titulo'        => 'Contenido numero: '.$i,
                'descripcion'   => 'Esta es la descripcion del contenido numero: '.$i,
                'id_categoria'  => rand(1, 5),
                //'palabrasClave' => 'Palabra, Clave'
            ));
        }
    }

} 