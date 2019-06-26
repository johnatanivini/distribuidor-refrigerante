<?php

namespace App\Http\Controllers;

use App\Litragem;
use App\Marca;
use App\Produto;
use App\Sabor;
use App\Tipo;
use Illuminate\Http\Request;

class ListarProdutoController extends Controller
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
    public function index(Request $request)
    {
        $produtos = Produto::with(['tipo', 'sabor', 'marca', 'litragem'])
            ->when($request->marca, function ($query) use (&$request) {
                $query->where('marca_id', $request->marca);
            })
            ->when($request->tipo, function ($query) use (&$request) {
                $query->where('tipo_id', $request->tipo);
            })
            ->when($request->sabor, function ($query) use (&$request) {
                $query->where('sabor_id', $request->sabor);
            })
            ->when($request->litragem, function ($query) use (&$request) {
                $query->where('litragem_id', $request->litragem);
            })
            ->when($request->valor, function ($query) use (&$request) {
                $valor = str_replace('.','',$request->valor);
                $valor = str_replace(',','.',$valor);
                $query->where('valor',$valor);
            })
            ->when($request->quantidade, function ($query) use (&$request) {
                $query->where('quantidade', $request->quantidade);
            })
            ->paginate(10);

        return view('home', [
            'produtos' => $produtos,
            'marcas' => Marca::all(),
            'tipos' => Tipo::all(),
            'sabores' => Sabor::all(),
            'litragem' => Litragem::all(),
        ]);
    }
}
