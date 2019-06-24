<?php

namespace App\Http\Controllers;

use App\Litragem;
use App\Marca;
use App\Sabor;
use App\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produtos = DB::table('sabores')->paginate(10);

        return view('home',[
            'produtos'=>!is_null($produtos->firstItem()) ? [] : $produtos,
            'marcas'=>Marca::all(),
            'tipos'=>Tipo::all(),
            'sabores'=>Sabor::all(),
            'litragem'=>Litragem::all(),
        ]);
    }

    public function salvarProduto(Request $request){

        return [];
    }
}
