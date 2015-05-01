<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CategoriasController as Cont;

class Categorias extends Model {

	protected $table = 'categorias';

    public function obtenerTodos() {
        $users = array();
    }

    public function obtenerCategoria($id) {
        $con = new Cont();
        $this->nombre_categoria = $con->obtenerCategoria($id);
        return $this->nombre_categoria;
    }

}
