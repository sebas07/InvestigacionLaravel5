<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenidos extends Model {

	protected $table = 'contenidos';

    protected $fillable = [
        'titulo',
        'descripcion',
        'id_categoria',
        'palabrasClave'
    ];

}


