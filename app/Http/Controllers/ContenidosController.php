<?php namespace App\Http\Controllers;

use App\Categorias;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contenidos;
use App\Categorias as Cate;
use App\Palabras;
use Request;

//use Illuminate\Http\Request;

class ContenidosController extends Controller {

	public function index() {
        $result = \DB::table('contenidos')
            ->select([
                'id',
                'titulo',
                'descripcion',
                'id_categoria',
                //'palabrasClave'
            ])
            ->get();
        //$category = new Cate();
        //foreach($result as $row) {
        //    $row->categoria = $category->obtenerCategoria($row->id_categoria);
        //}
        return $result;
    }

    public function imprimirContenidos() {
        $contenidos = $this->index();
        foreach($contenidos as $contenido) {
            $categoria = Categorias::find($contenido->id_categoria);
            $contenido->categoria = $categoria['categoria'];

            $words = Palabras::where('id_contenido', '=', $contenido->id)->get();
            $palabras = array();
            foreach ($words as $word) {
                $palabras[] = $word;
            }
            $contenido->palabrasClave = '';
            foreach ($palabras as $palabra) {
                $contenido->palabrasClave .= trim($palabra->palabra).', ';
            }
            $texto = $contenido->palabrasClave;
            $largo = strlen($texto);
            $contenido->palabrasClave = substr($texto, 0, ($largo - 2));
        }
        return view('Ventanas.content', compact('contenidos'));
    }

    public function procesarFormulario() {
        $input = Request::all();

        //$contenido = new Contenidos();
        //$contenido->titulo = $input['title'];
        //$contenido->descripcion = $input['description'];
        //$contenido->id_categoria = $input['category'];
        //$contenido->save();

        $data = array('titulo'=>$input['title'], 'descripcion'=>$input['description'], 'id_categoria'=>$input['category']);
        $id = Contenidos::insertGetId($data);

        $words = $input['key_words'];

        foreach (mb_split(',', $words) as $palabra) {
            $word = new Palabras();
            $word->id_contenido = $id;
            $word->palabra = trim($palabra);
            $word->save();
        }
        return redirect('contenidos');
    }

    public function create() {
        //$controlador_categorias = new CategoriasController();
        //$vector = $controlador_categorias->getIndex();
        //$cate = [];
        //foreach($vector as $c) {
        //    $cate['id'] = $c['id'];
        //    $cate['categoria'] = $c['categoria'];
        //    $categorias[] = $cate;
        //}
        $categorias = Categorias::lists('categoria', 'id');
        return view('Ventanas.add_content', compact('categorias'));
    }

    public function verContenido($id)
    {
        $contenido = Contenidos::find($id);
        if(is_object($contenido)) {
            $categoria = Categorias::find($contenido->id_categoria);
            $contenido->categoria = $categoria['categoria'];

            $words = Palabras::where('id_contenido', '=', $id)->get();
            $palabras = array();
            foreach ($words as $word) {
                $palabras[] = $word;
            }
            $contenido->palabrasClave = '';
            foreach ($palabras as $palabra) {
                $contenido->palabrasClave .= trim($palabra->palabra).', ';
            }
            $texto = $contenido->palabrasClave;
            $largo = strlen($texto);
            $contenido->palabrasClave = substr($texto, 0, ($largo - 2));
        }
        //dd($contenido);
        return view('Ventanas.display', compact('contenido'));
    }

    public function destroy($id)
    {
        Contenidos::destroy($id);

        return redirect('contenidos');
    }

    public function modify($id)
    {
        $categorias = Categorias::lists('categoria', 'id');
        $contenido = Contenidos::find($id);

        $words = Palabras::where('id_contenido', '=', $contenido->id)->get();
        $palabras = array();
        foreach ($words as $word) {
            $palabras[] = $word;
        }
        $contenido->palabrasClave = '';
        foreach ($palabras as $palabra) {
            $contenido->palabrasClave .= trim($palabra->palabra).', ';
        }
        $texto = $contenido->palabrasClave;
        $largo = strlen($texto);
        $contenido->palabrasClave = substr($texto, 0, ($largo - 2));

        return view('Ventanas.modify_content', compact('contenido', 'categorias'));
        //return \View::make('Ventanas.modify_content', compact('contenido', 'categorias'))->with('title', $contenido->titulo);
    }

    public function modificarContenido()
    {
        $input = Request::all();

        $contenido = Contenidos::find($input['id']);
        $contenido->titulo = $input['title'];
        $contenido->descripcion = $input['description'];
        $contenido->id_categoria = $input['category'];
        //$contenido->palabrasClave = $input['key_words'];
        $contenido->save();

        $this->eliminarPalabras($input['id']);

        $words = $input['key_words'];
        $palabras = mb_split(',', $words);
        foreach ($palabras as $palabra) {
            $word = new Palabras();
            $word->id_contenido = $input['id'];
            $word->palabra = trim($palabra);
            $word->save();
        }
        return redirect('contenidos');
    }

    public function eliminarPalabras($id)
    {
        $words = Palabras::where('id_contenido', '=', $id)->get();
        $palabras = array();
        foreach ($words as $word) {
            $palabras[] = $word;
        }
        foreach ($palabras as $palabra) {
            Palabras::destroy($palabra->id);
        }
    }

}
