<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Usuarios;
use Request;
//use Illuminate\Http\Request;

class UsersController extends Controller {

	public function index()
    {
        return view('Ventanas.login');
    }

    public function validar()
    {
        $input = Request::all();

        $usuario = Usuarios::where('username', '=', $input['username'])->first();
        $resultado = 0;
        if(is_object($usuario)) {
            if($input['password'] === $usuario->password) {
                $resultado = 1;
                return redirect('users/menu');
            } else {
                $resultado = 0;
            }
        } else {
            $resultado = 0;
        }
        return view('Ventanas.login', compact('resultado'));
    }

    public function mostrarMenu()
    {
        return view('Ventanas.menu');
    }

}
