<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder {

    public function run() {

        $vector = array('Articulos', 'Biografias', 'Noticias', 'Entrevista', 'Comentario');

        foreach($vector as $cat) {
            \DB::table('categorias')->insert(array(
                'categoria' => $cat
            ));
        }
    }

} 