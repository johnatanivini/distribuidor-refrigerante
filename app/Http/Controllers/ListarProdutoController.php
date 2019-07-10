<?php

namespace App\Http\Controllers;

use App\Litragem;
use App\Marca;
use App\Sabor;
use App\Services\Contracts\ListarServiceInterface;
use App\Tipo;
use Illuminate\Http\Request;

class ListarProdutoController extends Controller
{

    private  $listarService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ListarServiceInterface $listarService)
    {
        $this->listarService = $listarService;

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $produtos = $this->listarService->listar($request)->paginate(10);

        return view('home', [
            'produtos' => $produtos,
            'marcas' => Marca::all(),
            'tipos' => Tipo::all(),
            'sabores' => Sabor::all(),
            'litragem' => Litragem::all(),
        ]);
    }
}
