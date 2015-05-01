<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Palabras extends Model {

    protected $table = 'palabras';

    protected $fillable = [
        'palabra'
    ];

}
