<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Categorias;

use Request;
//use Illuminate\Http\Request;

class CategoriasController extends Controller {

	public function getIndex() {
        $result = \DB::table('categorias')
            ->select([
                'categorias.id',
                'categorias.categoria'
            ])
            ->get();
        //dd($result);
        return $result;
    }

    public function obtenerCategoria($id) {
        $result = \DB::table('categorias')
            ->select([
                'categoria'
            ])
            ->where('id', '=', $id)
            ->get();
        $c = $result[0];

        $this->nombre_categoria = $c->categoria;
        return $this->nombre_categoria;
    }

    public function imprimirCategorias()
    {
        $categorias = $this->getIndex();

        return view('Ventanas.categories', compact('categorias'));
    }

    public function destroy($id)
    {
        Categorias::destroy($id);

        return redirect('categorias');
    }

    public function create()
    {
        $input = Request::all();

        $categoria = new Categorias();
        $categoria->categoria = $input['description'];
        $categoria->save();

        return redirect('categorias');
    }

    public function modify($id)
    {
        $categorias = $this->getIndex();
        $category = Categorias::find($id);
        return view('Ventanas.categories', compact('categorias', 'category'));
    }

    public function modificarCategoria() {
        $input = Request::all();

        $categoria = Categorias::find($input['id']);
        $categoria->categoria = $input['description'];

        $categoria->save();
        return redirect('categorias');
    }

}
